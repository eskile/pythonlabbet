<div class="bg-gray-800">
    <div class="max-w-screen-xl mx-auto bg-gray-800">
        <div class="px-2 sm:px-8 lg:px-48 text-center py-8 sm:py-24  text-white">
            <div class="text-center sm:flex">
                <div class="sm:w-1/3 mb-5">
                    <div class="w-1/2 mx-auto mb-2 text-xl border-b-2 border-white">Material</div>
                    <a href="/turtle" class="hover:underline">Turtle-kursen</a><br>
                    <a href="/grundkurs" class="hover:underline">Grundkurs del 1</a><br>
                    <a href="/grundkurs-del-2" class="hover:underline">Grundkurs del 2</a><br>
                    <a href="/problemlosning" class="hover:underline">Problemlösning</a><br>
                </div>
                <div class="sm:w-1/3 mb-5">
                    <div class="w-1/2 mx-auto mb-2 text-xl border-b-2 border-white">Länkar</div>
                    
                    <a href="/koda" class="hover:underline">Koda fritt</a><br>
                    <a href="/resurser" class="hover:underline">Resurser</a><br>
                    <a href="/om-pythonlabbet" class="hover:underline">Mer om Pythonlabbet</a><br>
                    <a href="/blogg/advent-of-code-2021" class="hover:underline">Advent of Code 2021</a><br>

                </div>
                <div class="sm:w-1/3 mb-5">
                    &copy;2022 Pythonlabbet.se<br>
                    <a href="/sekretesspolicy" class="hover:underline">Sekretesspolicy</a><br>
                </div>
        </div>
    </div>
    @livewireScripts
    @auth
        @if(request()->user()->is_teacher )
            @livewire('teacher-live')
        @endif
    @endauth
</div>