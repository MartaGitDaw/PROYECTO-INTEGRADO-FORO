<x-admin-layout>
    <div class="container mx-auto px-4 py-8 sm:px-8 flex shrink justify-center scroll-mt-5 min-h-screen">
        <div class="mt-4 rounded overflow-hidden w-full bg-white mx-3">
            <div class='mx-auto p-8'>
                <a href="{{ route('admin.index') }}" class="hover:underline"><small
                        class="text-sm text-gray-500">admin</small></a>
                >
                <a href="{{ route('admin.categories.index') }}" class="hover:underline"><small
                        class="text-sm text-gray-500">categories</small></a>
                >
                <a href="#" class="hover:underline"><small class="text-sm text-gray-500">create</small></a>

                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf

                    <h2 class="text-2xl font-semibold leading-tight">New Category</h2>
                    <p class="my-4 opacity-70">Enter the data to create a new category.</p>
                    <hr class="my-6">
                    {{-- Name --}}
                    <div>
                        <label class="uppercase text-sm font-bold opacity-70">Name</label>
                        <input name="name" type="text"
                            class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                        @error('name')
                            <p class="text-sm text-red-700">*** {{ $message }}</p>
                        @enderror
                    </div>
                    {{-- BOTONES CREAR VOLVER --}}
                    <div class="flex flex-col space-y-4">
                        <button type="submit"
                            class="text-center py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300">
                            Create
                        </button>
                        <button  type="button" onclick="history.back()"
                            class="text-center py-3 px-6 bg-gray-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300">
                            Back
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>

{{-- ver errores --}}
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif