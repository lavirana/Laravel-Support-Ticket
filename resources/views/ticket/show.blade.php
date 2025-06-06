<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="text-black
         text-lg font-bold">{{ $ticket->title }}</h1>

        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div class="text-black flex justify-between py-4">
                <p>{{ $ticket->description }}</p>
                <p>
    {{ $ticket->created_at ? $ticket->created_at->diffForHumans() : 'Date not available' }}
</p>

                @if ($ticket->attachment)
                    <a href="{{ '/storage/' . $ticket->attachment }}" target="_blank">Attachment</a>
                @endif
            </div>
            <div class="flex justify-between" >
            <div class="flex" >
            <a href="{{ route('ticket.edit', $ticket->id); }}">
            <x-primary-button>Edit</x-primary-button>
            </a>
            <form action="{{ route('ticket.destroy', $ticket->id) }}" method="post">
                @method('delete')
                @csrf
                <x-primary-button class="ml-3">Delete</x-primary-button>
            </form>
       
        </div>
        @if(auth()->user()->isAdmin)
                <div class="flex" >
                    <form action="{{ route('ticket.update', $ticket->id) }}" method="post" >
                    @method('patch')
                    @csrf
                    <input type="hidden" name="status" value="approved" />
                    <x-primary-button>Approve</x-primary-button>
                    </form>
               

                    <form action="{{ route('ticket.update', $ticket->id) }}" method="post" >
                    @method('patch')
                    @csrf
                    <input type="hidden" name="status" value="rejected" />
                    <x-primary-button class="ml-3">Reject</x-primary-button>
                    </form>
                
                </div>
        @else
        <p>Ticket Status : {{ $ticket->status }}</p>

        @endif
        </div>
        </div>
    </div>
</x-app-layout>
