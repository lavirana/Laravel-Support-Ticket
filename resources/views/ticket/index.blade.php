



<x-app-layout>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-8 flex flex-col items-center space-y-4">
        @foreach ($tickets as $ticket)
            <div class="w-full sm:max-w-xl px-6 py-4 bg-white dark:bg-gray-800 shadow-md rounded-lg">
               
                <div class="text-black flex justify-between">
                <a href="{{ route('ticket.show', $ticket->id) }}"><p>{{ $ticket->title }}</p></a>  
                    <p>{{ $ticket->description }}</p>
                    <p>{{ $ticket->created_at->diffForHumans() }}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>

