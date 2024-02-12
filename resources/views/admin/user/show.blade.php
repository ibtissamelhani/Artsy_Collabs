<x-app-layout>
    <div class="flex justify-between">
          <a href="{{ route('users.index') }}">
            <svg class="w-6 h-6 hover:text-red-400 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
            </svg>
         </a>
        

    <!-- Modal toggle -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800" type="button">
            Assign Project
        </button> 
    </div>
  
  <!-- Main modal -->
  <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
               
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <form class="p-4 md:p-5" action="{{ route('assignProject', $user) }}" method="post">
                
                @csrf
                  <div class="grid gap-4 mb-4 grid-cols-2">
                      <div class="col-span-2">
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task</label>
                          <input type="text" name="task" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                      </div>
                     
                      <div class="col-span-2 ">
                          <label for="project" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project</label>
                          <select id="project" name="project_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              @foreach ($projects as $project )
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      
                  </div>
                  <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                      Assign Project
                  </button>
              </form>
          </div>
      </div>
  </div> 
  
    <div class="flex justify-center items-center ">
        
        <div class="w-full max-w-lg">
            <div class="bg-white dark:bg-gray-900 rounded shadow-md">
                <div class="px-8 py-10">
                    <div class="flex items-center justify-center">
                        <img class="h-20 w-20 rounded-full object-cover" src="{{ $user->getFirstMediaUrl('profiles') }}" alt="User Photo">
                    </div>
                    <div class="mt-3 text-center">
                        <h3 class="text-2xl text-gray-800 dark:text-white">{{ $user->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <div>
                          <label class="block mb-1 text-gray-600 dark:text-gray-400">Domain :</label>
                          <p class="text-gray-700 dark:text-gray-300">{{ $user->domain }}</p>
                        </div>
                        <div>
                          <label class="block mb-1 text-gray-600 dark:text-gray-400">Role : </label>
                          <p class="text-gray-700 dark:text-gray-300">{{ $user->role->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4 mt-6">
        @foreach ($userProjects as $userProject )
            <div class="max-w-sm bg-gray-600 rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ $userProject->getFirstMediaUrl('projects') }}" alt="Placeholder image">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $userProject->name }}</div>
                    <p class="text-gray-300 font-bold">
                       <span class="text-black">Start date :</span>  {{ $userProject->start_date }} 
                    </p>
                    <p class="text-gray-300 font-bold mb-5">
                         <span class="text-black">End date :</span> {{ $userProject->end_date }}
                     </p>
                    <span class="inline-flex items-center justify-center w-3 h-3 py-3 px-10 ms-3 text-sm font-medium 
                        @if ($userProject->status == 1)
                            text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300
                        @elseif ($userProject->status == 2)
                            text-green-800 bg-green-100 rounded-full dark:bg-green-900 dark:text-green-300
                        @else
                            text-red-800 bg-red-100 rounded-full dark:bg-red-900 dark:text-red-300
                        @endif">
                            @foreach($STATUS_RADIO as $key => $value)
                            @if ($userProject->status == $key)
                                {{ $value }}
                            @endif
                        @endforeach
                    </span>
                </div>
            </div> 
        @endforeach
                 
    </div>
    
</x-app-layout>