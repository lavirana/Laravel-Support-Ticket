<x-app-layout>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Create Ticket
        </h2>
    </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">


    <form method="post" action="{{ route('ticket.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
       



<div>
    <x-input-label for="title" :value="__('Title')" />

    <x-text-input id="title"
                  name="title"
                  type="text"
                  class="mt-1 block w-full"
                  :value="old('title')"
                  autofocus
                  autocomplete="title" />

    <x-input-error class="mt-2" :messages="$errors->get('title')" />
</div>

<div>
    <x-input-label for="description" :value="__('Description')" />

    <x-textarea id="description" name="description" />

    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

<div>
    <x-input-label for="attachment" :value="__('Attachment (if any)')" />
    <x-file-input id="attachment" name="attachment" />
    <x-input-error class="mt-2" :messages="$errors->get('attachment')" />
</div>
    

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Create') }}</x-primary-button>
        </div>
    </form>

    </div></div></div>

</section>



</x-app-layout>
