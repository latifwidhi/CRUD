<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="hover:text-white" href="{{ route('category.create') }}">Create Category</a>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="border-red-600 text-red-700">
                {{ session()->get('message') }}
            </div>
        </div>
    @endif

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-10">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 sm:rounded-lg">
                <thead class="text-xs text-gray-700 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-6">
                            Name Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Slug
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>    
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a class="hover:text-white" href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>
                            </th>
                            <td class="px-6 py-4">
                                {{ $category->slug }}
                            </td>
                            <td class="px-6 py-4 flex">
                                <a href="{{ route('category.edit', $category->id) }}" class="font-medium text-gray-600 dark:text-white hover:text-gray-800">edit</a> |  
                                <form action="{{ route('category.destroy', ['category'=>$category->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                        <button class="font-medium text-gray-600 dark:text-white hover:text-gray-800"> delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>