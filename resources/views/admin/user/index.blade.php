<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container mx-auto px-4 sm:px-8">
                    <div class="py-8">
                        <div class="flex justify-between">
                            <h2 class="text-2xl font-semibold leading-tight">Users</h2>
                        </div>

                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                User
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Roles
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Permissions
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Created at
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                                    <div class="flex items-center">
                                                       
                                                        <div class="ml-3">
                                                            <a href="" class="whitespace-no-wrap text-lg text-indigo-700 no-underline hover:underline">
                                                                {{ $user->username }}
                                                            </a>
                                                            <p class="text-gray-900 whitespace-no-wrap text-xs">
                                                                {{ $user->name . ' ' . $user->surnames }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">rol</p>
                                                </td>
                                                <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">Permissions</p>
                                                </td>
                                                <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $user->created_at }}
                                                    </p>
                                                </td>
                                               
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>

