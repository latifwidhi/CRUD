<x-guest-layout>
    @foreach ($categories as $category)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-3xl font-bold text-center mb-3">{{ $category->name }}</h2>
                        <p class="">{{ $category->slug }}</p>
                        {{-- <p>Category: <a href="/categories/{{ $category->category->slug }}">{{ $category->category->name }}</a></p> --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-guest-layout>