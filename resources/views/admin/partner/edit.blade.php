<x-app-layout>
    <a href="{{ route('partners.index') }}">
        <svg class="w-6 h-6 hover:text-red-400 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
        </svg>
    </a>
        
  
    <div class="flex justify-center">
        <form class="p-4 md:p-5" method="POST" action="{{ route('partners.update', $partner->id) }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2 flex flex-col items-center justify-center">
               <label for="image-input" class="cursor-pointer">
                   <img id="preview-image"
                       class="h-28 w-28 rounded-full shadow-xl border-2 border-gray-400"
                       src="{{ $partner->getFirstMediaUrl('images') }}"
                       alt="logo">
               </label>
               <input type="file" id="image-input" name="image" value="{{ $partner->getFirstMediaUrl('images') }}" class="hidden" onchange="previewImage(event)">
             </div>
             <div class="col-span-2">
                 <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                 <input type="text" name="name" value="{{ $partner->name}}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type name" required="">
             </div>
             <div class="col-span-2 sm:col-span-1">
                 <label for="domain" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                 <input type="text" name="phone" value="{{ $partner->phone }}" id="domain" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  required="">
             </div>
             <div class="col-span-2 sm:col-span-1">
               <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
               <input type="text" name="address" value="{{ $partner->address }}" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  required="">
           </div>
             <div class="col-span-2 ">
                 <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                 <select id="category" value="{{ $partner->type }}" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                   <option >Government</option>
                   <option >Sports Associations</option>
                   <option >Cultural Associations</option>
                   <option >Nonprofit Organizations</option>
                   <option >Community Associations</option>
                 </select>
             </div>
             <div class="col-span-2">
               <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
               <input type="email" name="email" value="{{ $partner->email }}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type email" required="">
           </div>
           <div class="col-span-2">
               <input type="hidden" name="password" value="{{ $partner->password }}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type password" required="">
           </div>
         </div>
         <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
             <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
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