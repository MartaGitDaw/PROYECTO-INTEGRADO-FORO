<x-admin-layout>
    <div class="container mx-auto py-4 flex justify-center">
        <x-foro-navbar></x-foro-navbar>
        <div class="mt-4 rounded overflow-hidden w-full lg:w-8/12 md:w-8/12 bg-white mx-3 md:mx-0 lg:mx-0">
            <div class='mx-auto space-y-6'>
                <a href="{{ route('admin.index') }}" class="hover:underline"><small
                        class="text-sm text-gray-500">admin</small></a>
                >
                <a href="{{ route('admin.categories.index') }}" class="hover:underline"><small
                        class="text-sm text-gray-500">categories</small></a>
                >
                <a href="#" class="hover:underline"><small class="text-sm text-gray-500">edit</small></a>
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <h2 class="text-2xl font-semibold leading-tight">Category {{ $category->name }}</h2>
                    <p class="my-4 opacity-70">Enter the new name for the category.</p>
                    <hr class="my-6">
                    {{-- Name --}}
                    <div>
                        <label class="uppercase text-sm font-bold opacity-70">Name</label>
                        <input name="name" type="text" value="{{ $category->name }}"
                            class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                        @error('name')
                            <p class="text-sm text-red-700">*** {{ $message }}</p>
                        @enderror
                    </div>
                    {{-- BOTONES CREAR VOLVER --}}
                    <div class="flex flex-col space-y-4">
                        <button type="submit"
                            class="text-center py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300">
                            Update
                        </button>
                        <a href="{{ route('admin.categories.index') }}" type="button"
                            class="text-center py-3 px-6 bg-gray-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300">
                            Back
                        </a>
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
