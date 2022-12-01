<x-admin-layout>
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="flex justify-between">
                <h2 class="text-2xl font-semibold leading-tight">Categories</h2>
                <div>
                    <x-dark-button-link href="{{ route('admin.categories.create') }}">New</x-dark-button-link>
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">

                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Name
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $category->name }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                        <div class="inline-flex">
                                            <x-blue-button-link href="{{route('admin.categories.edit', $category->id)}}">Modificar</x-blue-button-link>
                                            <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-dark-button>Eliminar</x-dark-button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
