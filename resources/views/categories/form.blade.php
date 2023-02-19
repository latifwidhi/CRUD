<x-guest-layout>
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
    
        <input 
            type="text"
            name="name"
            placeholder="Name Category"
            value="{{ old('name') }}"
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @error('name')
                {{ $message }}
            @enderror
        <input 
            type="text"
            name="slug"
            placeholder="Slug"
            value="{{ old('slug') }}"
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @error('slug')
                {{ $message }}
            @enderror
        <div class="pt-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Create
            </button>
        </div>
    </form>
</x-guest-layout>