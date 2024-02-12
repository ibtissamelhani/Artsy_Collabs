<x-app-layout>
    <a href="{{ route('projects.index') }}">
        <svg class="w-6 h-6 hover:text-red-400 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
        </svg>
    </a>
    <div class="flex justify-center">
        <form class="p-4 md:p-5" method="POST" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2 flex flex-col items-center justify-center">
                <label for="image" class="cursor-pointer">
                    <img id="preview-image"
                        class="h-28 w-28 rounded-full shadow-xl border-2 border-gray-400"
                        src="{{ $project->getFirstMediaUrl('projects') }}"
                        alt="logo">
                </label>
                <input type="file" id="image" name="image" value="{{ $project->getFirstMediaUrl('projects') }}"  class="hidden" onchange="previewImage(event)">
            </div>
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" id="name" value="{{ $project->name }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type name" required="">
            </div>
          
            <div class="col-span-2 sm:col-span-1">
                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ $project->start_date }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
            </div>
           
            <div class="col-span-2 sm:col-span-1">
                <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date</label>
                <input type="date" name="end_date" id="end_date" value="{{ $project->end_date }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
            </div>
            <div class="col-span-2">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Partner</label>
                <select id="category" name="partner_id" value="{{ $project->partner->name }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    @foreach ($partners as $partner)
                  <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                  @endforeach 
                </select>
            </div>
            
            <div class="col-span-2 sm:col-span-1">
                <label for="budget" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Budget</label>
                <input type="number" name="budget" id="budget" value="{{ $project->budget }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter budget" required="">
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">status</label>
                <select id="status" name="status"  
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                @foreach($STATUS_RADIO as $key => $value)
                        <option value="{{ $key }}"  @if ($project->status == $key) selected @endif>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea name="description" id="description"  rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type description" required="">{{ $project->description }}</textarea>
            </div>
        </div>
        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Edit
        </button>
    </form>
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