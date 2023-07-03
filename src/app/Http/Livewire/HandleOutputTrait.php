<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Save;
use App\Models\Task;
use App\Models\Statistics;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


trait HandleOutputTrait {

    public $solved = '';

    public function handleOutput($id, $code, $output) {
            if($id == $this->editorId) {
                $userId = Auth::id();
                $this->answer = json_decode($output);
                $emit_solved_task = false;
                
                if($this->sameSolution($this->answer, $this->correctAnswer)) {
                    $this->solved = true;
                    $emit_solved_task = true;
                
                    DB::table('statistics')->where('code_id', $id)->increment('total_solved');
                    if(!$userId) {
                        DB::table('statistics')->where('code_id', $id)->increment('guest_solved');
                    }
                   
                }
                else {
                    $this->solved = false;
                    $this->emit('notSolvedTask', $this->editorId);
                }

                DB::table('statistics')->where('code_id', $id)->increment('total_attempts');
                if(!$userId) {
                    DB::table('statistics')->where('code_id', $id)->increment('guest_attempts');
                }

                
                if($userId) {
                    //save if: solved or not solved once (don't save if solved before and now failed)
                    if($this->solved || !$this->solvedOnce) { 
                        $save = Save::updateOrCreate(
                            ['user_id' => $userId, 'code_id' => $this->editorId],
                            ['code' => $code]
                        );
                    }
                    if($this->solved) {
                        Task::updateOrCreate(
                            ['user_id' => $userId, 'code_id' => $this->editorId],
                            ['completed' => true]   
                        );
                        
                    }
                    else {
                        Task::updateOrCreate(
                            ['user_id' => $userId, 'code_id' => $this->editorId],
                            ['completed' => false]   
                        );
                    }
                }

                if($emit_solved_task) {
                    $this->emit('solvedTask', $this->editorId);
                }
            }
        }

        private function sameSolution($a, $b) {
            if(count($a) != count($b)) {
                //Log::debug( count($a) . ' != ' . count($b) );
                return false;
            }
            for($i=0;$i<count($a);$i++) {
                if(trim($a[$i]) != trim($b[$i])) {
                    //Log::debug(trim($a[$i]) . ' != ' . trim($b[$i]));
                    return false;
                }
            }
            return true;
        }
    }