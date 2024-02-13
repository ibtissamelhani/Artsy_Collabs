<x-nav>
    @if (session('success'))
    <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">success</span>
        <div class="ms-3 text-sm font-medium">
            {{ session('success') }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        </button>
    </div>
@endif
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto mt-5 lg:col-span-7">
                <h1 class="max-w-2xl mb-8 text-4xl font-extrabold leading-none tracking-tight text-orange-700 md:text-5xl  dark:text-white">{{ $project->name }}</h1>
                <p class="max-w-2xl mb-4 font-light text-gray-500  md:text-lg lg:text-xl dark:text-gray-400"><span class="font-bold">partner :</span> {{ $project->partner->name }}<p>
                <p class="max-w-2xl mb-4 font-light text-gray-500  md:text-lg lg:text-xl dark:text-gray-400"><span class="font-bold">start date :</span> {{ $project->start_date}}<p>
                <p class="max-w-2xl mb-4 font-light text-gray-500  md:text-lg lg:text-xl dark:text-gray-400"><span class="font-bold">end date :</span> {{ $project->end_date }}<p>
                <p class="max-w-2xl mb-4 font-light text-gray-500  md:text-lg lg:text-xl dark:text-gray-400"><span class="font-bold">Budget :</span> {{ $project->budget }} $<p>
                <p class="max-w-2xl mb-4 font-light text-gray-500  md:text-lg lg:text-xl dark:text-gray-400"><span class="font-bold">Description :</span> {{ $project->description }} <p>
                 @if ($project->status === 1)
                    <span class="bg-blue-100 text-blue-800 mb-4 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">@foreach($STATUS_RADIO as $key => $value)
                        @if ($project->status == $key)
                            {{ $value }}
                        @endif
                    @endforeach</span> 
                @else
                    <span class="bg-green-100 text-green-800 text-md  font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                        @foreach($STATUS_RADIO as $key => $value)
                        @if ($project->status == $key)
                            {{ $value }}
                        @endif
                    @endforeach
                    </span> 
                @endif
                <p class="max-w-2xl mt-8 font-light text-gray-500  md:text-lg lg:text-xl dark:text-gray-400">Take the first step towards collaboration greatness! Submit your request now and let's create something extraordinary together<p>
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-orange-700 mt-8 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 " type="button">
                        collaborate
                </button>
            </div>
            <div class=" lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ $project->getFirstMediaUrl('projects') }}" alt="project image">
            </div>          
        </div>
    </section>
  
  <!-- Main modal -->
  <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Sign in to our platform
                  </h3>
                  <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5">
                  <form class="space-y-4" action="{{ route('collaborate', Auth::user()) }}" method="post">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task</label>
                            <input type="text" name="task" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                        </div>
                        <div class="col-span-2">
                            <input type="hidden" name="project_id" value="{{  $project->id }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        send 
                    </button>
                  </form>
              </div>
          </div>
      </div>
  </div> 
  
  
</x-nav>  