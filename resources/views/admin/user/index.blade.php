<x-app-layout>
<!-- Modal toggle -->
<button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-orange-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
  </button>
  
  <!-- Main modal -->
  <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Create New User
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <form class="p-4 md:p-5">
                  <div class="grid gap-4 mb-4 grid-cols-2">
                     <div class="col-span-2 flex flex-col items-center justify-center">
                        <label for="image-input" class="cursor-pointer">
                            <img id="preview-image"
                                class="h-28 w-28 rounded-full shadow-xl border-2 border-gray-400"
                                src="https://images.unsplash.com/photo-1523199455310-87b16c0eed11?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                                alt="logo">
                        </label>
                        <input type="file" id="image-input" name="image" class="hidden" onchange="previewImage(event)">
                    </div>
                      <div class="col-span-2">
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full name</label>
                          <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">domain</label>
                          <input type="text" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                          <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                          <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <option selected="">Artist</option>
                              <option value="TV">Admin</option>
                          </select>
                      </div>
                      <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                    </div>
                  </div>
                  <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                      Add new user
                  </button>
              </form>
          </div>
      </div>
  </div> 
  
    <div class="container mx-auto px-4 py-5">
        <table class="w-full text-left rounded-lg overflow-hidden">
            <thead class="bg-orange-100">
                <tr>
                    <th class="px-4 py-2">profile</th>
                    <th class="px-4 py-2">name</th>
                    <th class="px-4 py-2">email</th>
                    <th class="px-4 py-2">role</th>
                    <th class="px-4 py-2">domain</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-2"><img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                    </td>
                    <td class="px-4 py-2">John Doe</td>
                    <td class="px-4 py-2">john.doe@example.com</td>
                    <td class="px-4 py-2">Admin</td>
                    <td class="px-4 py-2">art</td>
                </tr>
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-2"><img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                    </td>
                    <td class="px-4 py-2">John Doe</td>
                    <td class="px-4 py-2">john.doe@example.com</td>
                    <td class="px-4 py-2">Admin</td>
                    <td class="px-4 py-2">art</td>
                </tr>
            </tbody>
        </table>
        <div class="mt-4">
            <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200">
                <div class="flex-1 flex justify-start">
                    <a href="#" class="px-4 py-2 mr-1 text-sm bg-gray-200 rounded hover:bg-gray-300">Previous</a>
                    <a href="#" class="px-4 py-2 ml-1 text-sm bg-gray-200 rounded hover:bg-gray-300">Next</a>
                </div>
                <div class="text-sm">
                    Page 1 of 10
                </div>
            </nav>
        </div>
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