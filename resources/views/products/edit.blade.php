<x-guest-layout>
    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <input 
            type="text"
            name="title"
            placeholder="Name Product"
            value="{{ old('title', $product->title) }}"
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @error('title')
                {{ $message }}
            @enderror
        <input 
            type="number"
            name="qty"
            placeholder="Quantity"
            value="{{ old('qty', $product->qty) }}"
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @error('qty')
                {{ $message }}
            @enderror
        <input 
            type="number"
            name="price"
            placeholder="Price"
            value="{{ old('price', $product->price) }}"
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @error('price')
                {{ $message }}
            @enderror
        <input 
            type="file"
            name="img"
            value="{{ old('img', $product->img) }}"
            class="w-24 sm:max-w-md mt-3 px-5 py-4 overflow-hidden sm:rounded-lg">
            @error('img')
                {{ $message }}
            @enderror

        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
            Update
        </button>
    </form>
</x-guest-layout>