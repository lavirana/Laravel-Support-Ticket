<x-app-layout>

<section>
  

    <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Update Support Ticket
        </h2>
                    </div>
                </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">


    <form method="post" action="{{ route('ticket.update', $ticket->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
<div>
    <x-input-label for="title" :value="__('Title')" />

    <x-text-input id="title"
                  name="title"
                  type="text"
                  class="mt-1 block w-full"
                  value="{{ $ticket->title }}"
                  autofocus
                  autocomplete="title" />

    <x-input-error class="mt-2" :messages="$errors->get('title')" />
</div>

<div>
    <x-input-label for="description" :value="__('Description')" />

    <x-textarea id="description" name="description" value="{{ $ticket->description }}" />

    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

<div>

@if ($ticket->attachment)
                    <a href="{{ '/storage/' . $ticket->attachment }}" target="_blank">See Attachment</a>
                @endif

    <x-input-label for="attachment" :value="__('Attachment (if any)')" />
    <x-file-input id="attachment" name="attachment" />
    <x-input-error class="mt-2" :messages="$errors->get('attachment')" />
</div>
    

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>
        </div>
    </form>

    </div></div></div>

</section>



</x-app-layout>
