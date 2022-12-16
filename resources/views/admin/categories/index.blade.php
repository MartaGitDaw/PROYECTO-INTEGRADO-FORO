<x-admin-layout>
    <x-container>
        <nav class="text-blue-500 text-xs mt-5 lg:mt-0">
            <a href="{{ route('admin.index') }}" class="hover:underline">admin</a>
            >
            <a href="{{ route('admin.categories.index') }}" class="hover:underline">categories</a>
        </nav>
        <div class="flex mr-3 rounded-md mt-3 lg:mb-4 justify-between">
            <form name="buscar" action="{{ route('admin.categories.index') }}" method="GET" class="flex w-full">
                <input name="name" type="search"
                    class="p-2 rounded border-2 border-slate-200 focus:border-blue-500 focus:outline-none"
                    placeholder="search...">
                <button type="submit">
                    <div class="flex bg-slate-200 items-center p-2 rounded border-2 hover:bg-slate-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </form>
            <div>
                <x-dark-button-link href="{{ route('admin.categories.create') }}">New</x-dark-button-link>
            </div>
        </div>
        <x-table>
            <thead>
                <tr>
                    <x-th-table>Name</x-th-table>
                    <x-th-table>Actions</x-th-table>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <x-td-table>
                            <div class="flex items-center">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $category->name }}
                                </p>
                            </div>
                        </x-td-table>
                        <x-td-table>
                            <div class="inline-flex justify-between">
                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                    class="text-gray-500 hover:text-blue-500 mx-5" title="Edit">
                                    <i class="far fa-edit"> </i>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-500 hover:text-red-500 mx-5"
                                        title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </x-td-table>
                    </tr>
                @endforeach
            </tbody>
        </x-table>
        <div class="mt-4 mb-4">
            {{ $categories->links() }}
        </div>
    </x-container>
</x-admin-layout>
