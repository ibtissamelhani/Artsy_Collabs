<x-app-layout>
    <a href="{{ route('projects.index') }}">
        <svg class="w-6 h-6 hover:text-red-400 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
        </svg>
    </a>
    <div class=" mt-4 rounded-lg bg-white shadow-md dark:bg-gray-800">
        <div class="p-5">
            <div class="flex flex-col items-center justify-center gap-5 py-5">
                <h5 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">{{ $project->name }}</h5>
                <img class="w-56" src="{{ $project->getFirstMediaUrl('projects') }}" alt="">
            </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block mb-1 text-gray-600 dark:text-gray-400">Name :</label>
              <p class="text-gray-700 dark:text-gray-300">{{ $project->name }}</p>
            </div>
            <div>
              <label class="block mb-1 text-gray-600 dark:text-gray-400">Start date:</label>
              <p class="text-gray-700 dark:text-gray-300">{{ $project->start_date }}</p>
            </div>
            
            <div>
                <label class="block mb-1 text-gray-600 dark:text-gray-400">Partner :</label>
                <p class="text-gray-700 dark:text-gray-300">{{ $project->partner->name }}</p>
              </div>
              <div>
                <label class="block mb-1 text-gray-600 dark:text-gray-400">End date :</label>
                <p class="text-gray-700 dark:text-gray-300">{{ $project->end_date }}</p>
              </div>
            <div class="">
              <label class="block mb-1 text-gray-600 dark:text-gray-400">Budget :</label>
              <p class="text-gray-700 dark:text-gray-300">{{ $project->budget}} $</p>
            </div>
            <div class="">
              <label class="block mb-1 text-gray-600 dark:text-gray-400">Status :</label>
              <span class="inline-flex items-center justify-center w-3 h-3 py-3 px-10 ms-3 text-sm font-medium 
              @if ($project->status == 1)
                  text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300
              @elseif ($project->status == 2)
                  text-green-800 bg-green-100 rounded-full dark:bg-green-900 dark:text-green-300
              @else
                  text-red-800 bg-red-100 rounded-full dark:bg-red-900 dark:text-red-300
              @endif"> @foreach($STATUS_RADIO as $key => $value)
                @if ($project->status == $key)
                    {{ $value }}
                @endif
            @endforeach</span>
            </div>
            <div class="col-span-2">
                <label class="block mb-1 text-gray-600 dark:text-gray-400">Description :</label>
                <p class="text-gray-700 dark:text-gray-300">{{ $project->description }}</p>
              </div>
          </div>
        </div>
      </div>
      

</x-app-layout>