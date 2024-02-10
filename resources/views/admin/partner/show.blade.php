<x-app-layout>
    <a href="{{ route('partners.index') }}">
        <svg class="w-6 h-6 hover:text-red-400 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
        </svg>
    </a>
    <div class=" mt-4 rounded-lg bg-white shadow-md dark:bg-gray-800">
        <div class="p-5">
            <div class="flex flex-col items-center justify-center gap-5 py-5">
                <h5 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">{{ $partner->name }}</h5>
                <img class="w-56" src="{{ $partner->getFirstMediaUrl('images') }}" alt="">
            </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block mb-1 text-gray-600 dark:text-gray-400">Name</label>
              <p class="text-gray-700 dark:text-gray-300">{{ $partner->name }}</p>
            </div>
            <div>
              <label class="block mb-1 text-gray-600 dark:text-gray-400">Email</label>
              <p class="text-gray-700 dark:text-gray-300">{{ $partner->email }}</p>
            </div>
            <div>
              <label class="block mb-1 text-gray-600 dark:text-gray-400">Phone</label>
              <p class="text-gray-700 dark:text-gray-300">{{ $partner->phone }}</p>
            </div>
            <div>
                <label class="block mb-1 text-gray-600 dark:text-gray-400">Type</label>
                <p class="text-gray-700 dark:text-gray-300">{{ $partner->type }}</p>
              </div>
            <div class="col-span-2">
              <label class="block mb-1 text-gray-600 dark:text-gray-400">Address</label>
              <p class="text-gray-700 dark:text-gray-300">{{ $partner->address }}</p>
            </div>
          </div>
        </div>
      </div>
      

</x-app-layout>