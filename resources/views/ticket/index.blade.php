



<x-app-layout>

    <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                      
                    <div class="flex justify-between" >
                    <div class="flex" >
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        All Support Tickets
        </h2>
</div>
<div class="flex" >
<a href="{{ route('ticket.create') }}" class="" >Create Ticket</a>
</div>
</div>
                

       
                    </div>
                </header>

    <div class="py-12">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-8 flex flex-col items-center space-y-4">
        @foreach ($tickets as $ticket)
            <div class="w-full sm:max-w-xl px-6 py-4 bg-white dark:bg-gray-800 shadow-md">
               
                <div class="text-black flex justify-between">
                <a href="{{ route('ticket.show', $ticket->id) }}"><p>{{ $ticket->title }}</p></a>  
                    <p>{{ $ticket->description }}</p>
                    <p>{{ $ticket->created_at->diffForHumans() }}</p>
                </div>
            </div>
        @endforeach

        @if(count($tickets) == 0)
<p> You don't have any support ticket yet. </p>
        @endif
    </div>
    </div>
</x-app-layout>

