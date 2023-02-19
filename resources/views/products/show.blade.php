<x-guest-layout>
    @foreach ($products as $product)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-3xl font-bold text-center mb-3">{{ $product->title }}</h2>
                        <div class="w-full h-40 overflow-hidden border object-cover rounded-md">
                            <img src="{{ asset('storage/uploads/solution/'.$product->img) }}" alt="img">
                        </div>
                        <p class="">Quantity: {{ $product->qty }}</p>
                        <p>Price: {{ $product->price }}</p>
                        {{-- <p>Category: <a href="/categories/{{ $product->category->slug }}">{{ $product->category->name }}</a></p> --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-guest-layout>