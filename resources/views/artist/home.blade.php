<x-nav>
    {{-- @if (session('error'))
    <div id="alert-3" class="flex items-center p-4  text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">success</span>
        <div class="ms-3 text-sm font-medium">
            {{ session('error') }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        </button>
    </div>
@endif --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight text-orange-700 md:text-5xl  dark:text-white">ArtsyCollabs: <br>Where Creativity Converges</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Discover a vibrant community of artists and creatives on ArtsyCollabs, where collaboration is celebrated and masterpieces are born.<p>
                
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset('images/logo-b.png') }}" alt="hero image">
            </div>                
        </div>
    </section>

    <section class="grid grid-cols-4 gap-4 px-20 pt-20 bg-orange-800/5 pb-8 mx-auto">
        @foreach ($projects as $project )
            <div class="rounded-lg bg-white   shadow-md hover:shadow-2xl dark:bg-neutral-700">
                <a href="{{ route('Artists.show',$project->id) }}">
                    <img class="rounded-t-lg  h-52  " style="width: 100%;" src="{{ $project->getFirstMediaUrl('projects') }}" alt="" />
                </a>
                <div class="p-6">
                    <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">{{ $project->name }}</h5>
                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">partner :{{ $project->partner->name }}</p>
                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">From : {{ $project->start_date }} To {{ $project->end_date }}</p>
                    @if ($project->status === 1)
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">@foreach($STATUS_RADIO as $key => $value)
                            @if ($project->status == $key)
                                {{ $value }}
                            @endif
                        @endforeach</span> 
                    @else
                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                            @foreach($STATUS_RADIO as $key => $value)
                            @if ($project->status == $key)
                                {{ $value }}
                            @endif
                        @endforeach
                        </span> 
                    @endif
                </div>
            </div>  
        @endforeach
       
    </section>
</x-nav>