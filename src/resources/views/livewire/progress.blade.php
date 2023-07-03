<?php
$completed = array_sum($tasks);
$total = count($tasks);
?>
<div class="text-center mb-4 mt-4">
    <h5 class="font-bold text-xl">Status</h5>
    @if($completed == 0)
    Du har inte gjort klart någon uppgift än ({{ $total }} st).
    @elseif($completed == $total)
    <span class="text-xl">&#9989;</span>  Du har klarat alla ({{ $total }}) uppgifter i det här avsnittet! 
    <br><span class="text-5xl">🎉</span>
    @else
    Du har gjort klart {{ $completed }} av {{ $total }} uppgifter.
    @endif
</div>
