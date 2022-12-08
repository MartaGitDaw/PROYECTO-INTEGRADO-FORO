<x-app-layout>
    <div class="container mx-auto px-4 py-4 sm:px-8 flex shrink-0 justify-center min-h-screen p-8">
        <div class="mt-12 lg:mt-8 overflow-hidden w-full mx-3">
            <!-- component -->
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden mt-4 lg:mt-0">
                <table id="table_users" class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Name
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Threads
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                likes
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                                                alt="{{ Str::substr($user->name, 0, 1) }}"
                                                class="rounded-full h-10 w-10 flex items-center justify-center mr-3 border-2 border-blue-500">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$user->name}}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <a href="{{ route('threads.user', $user) }}">
                                        @php
                                            $cont=0;
                                            foreach($threads as $thread){
                                                if ($user->id == $thread->user_id){
                                                    $cont++;
                                                }
                                            }
                                            echo $cont;
                                        @endphp
                                        </a>
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        likes
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
