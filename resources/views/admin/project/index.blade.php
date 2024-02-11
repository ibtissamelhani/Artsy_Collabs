<x-app-layout>
    <!-- Modal toggle -->
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bbg-orange-700	 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-700	 dark:hover:bg-orange-800	 dark:focus:ring-blue-800" type="button">
        Create New Project
      </button>
      
      <!-- Main modal -->
      <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
          <div class="relative p-4 w-full max-w-md max-h-full">
              <!-- Modal content -->
              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <!-- Modal header -->
                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                          Create New Project
                      </h3>
                      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                          <span class="sr-only">Close modal</span>
                      </button>
                  </div>
                  <!-- Modal body -->
                  <form class="p-4 md:p-5" method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2 flex flex-col items-center justify-center">
                            <label for="image-input" class="cursor-pointer">
                                <img id="preview-image"
                                    class="h-28 w-28 rounded-full shadow-xl border-2 border-gray-400"
                                    src="{{ asset('images/image.png') }}"
                                    alt="logo">
                            </label>
                            <input type="file" id="image-input" name="image" class="hidden" onchange="previewImage(event)">
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type name" required="">
                        </div>
                      
                        <div class="col-span-2 sm:col-span-1">
                            <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                        </div>
                       
                        <div class="col-span-2 sm:col-span-1">
                            <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Partner</label>
                            <select id="category" name="partner_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected></option>
                                @foreach ($partners as $partner)
                              <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                              @endforeach 
                            </select>
                        </div>
                        
                        <div class="col-span-2 sm:col-span-1">
                            <label for="budget" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Budget</label>
                            <input type="number" name="budget" id="budget" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter budget" required="">
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">status</label>
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @foreach($STATUS_RADIO as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea name="description" id="description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type description" required=""></textarea>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Add new project
                    </button>
                </form>
                
              </div>
          </div>
        </div> 
    
        <div class="grid grid-cols-3 gap-4">
            @foreach ($projects as $project)
            <div class="max-w-sm mt-12 rounded-lg bg-white shadow-md dark:bg-gray-600"> 
                <img class="h-48 w-full rounded-t-lg object-cover object-center" src="{{ $project->getFirstMediaUrl('projects') }}" alt="Photo"> 
                <div class="p-5"> 
                    <h5 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">{{ $project->name }}</h5> 
                    <span class="inline-flex items-center justify-center w-3 h-3 py-3 px-10 ms-3 text-sm font-medium 
                    @if ($project->status == 1)
                        text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300
                    @elseif ($project->status == 2)
                        text-green-800 bg-green-100 rounded-full dark:bg-green-900 dark:text-green-300
                    @else
                        text-red-800 bg-red-100 rounded-full dark:bg-red-900 dark:text-red-300
                    @endif">
                        @foreach($STATUS_RADIO as $key => $value)
                        @if ($project->status == $key)
                            {{ $value }}
                        @endif
                    @endforeach
                    </span>
                </div> 
                <div class="flex justify-end gap-4 pb-5 px-6">
                    <a href="{{ route('projects.show',$project->id) }}" class="dark:hover:text-blue-500">
                        <span class="material-symbols-outlined dark:hover:text-blue-500">
                            visibility
                        </span>
                    </a>
                    <a href="{{ route('projects.edit', $project->id) }}" class="dark:hover:text-yellow-500">
                        <span class="material-symbols-outlined dark:hover:text-yellow-500">
                            edit
                        </span>
                    </a>
                
                    <form action="{{ route('projects.destroy', $project->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button>
                            <span class="material-symbols-outlined dark:hover:text-red-500 hover:text-red-500">
                                delete
                            </span>
                        </button>
                    </form>
                </div>
            </div>
            
            @endforeach
        </div>
     
       
         
     
    
        <script>
            function previewImage(event) {
                const input = event.target;
                const preview = document.getElementById('preview-image');
        
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
        
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    }
        
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </x-app-layout>