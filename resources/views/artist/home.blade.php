<x-nav>
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
            <div class="rounded-lg bg-white  shadow-md hover:shadow-2xl dark:bg-neutral-700">
                <a href="#!">
                    <img class="rounded-t-lg" src="{{ $project->getFirstMediaUrl('projects') }}" alt="" />
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
                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
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