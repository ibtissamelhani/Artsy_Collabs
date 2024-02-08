<x-app-layout>

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
                        <p class="text-gray-600 dark:text-gray-400">{{ $user->domain }}</p>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>