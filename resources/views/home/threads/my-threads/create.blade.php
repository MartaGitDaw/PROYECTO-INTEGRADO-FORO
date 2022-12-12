<x-app-layout>
    <x-container>
        <nav class="text-blue-500 text-xs mt-5 lg:mt-0 mb-3">
            <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
            >
            <span>My Threads</span>
            /
            <span>Create</span>
        </nav>

        <form action="{{ route('threads.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h2 class="text-2xl font-semibold leading-tight">New Thread</h2>
            <p class="my-4 opacity-70">Enter the data to create a new thread.</p>
            <hr class="my-6">
            {{-- Name --}}
            <div>
                <label class="uppercase text-sm font-bold opacity-70">Title</label>
                <input name="title" type="text"
                    class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                @error('title')
                    <p class="text-sm text-red-700">*** {{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="uppercase text-sm font-bold opacity-70">Description</label>
                <textarea name="description" type="text"
                    class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none"></textarea>
                @error('description')
                    <p class="text-sm text-red-700">*** {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="uppercase text-sm font-bold opacity-70">
                    Picture
                </label>
                <div class="grid grid-cols-1 mt-5 mx-7">
                    {{-- VER Imagen previa --}}
                    <div class='flex items-center justify-center w-full mb-4'>
                        <img id="imagenSeleccionada">
                    </div>
                    <div class='flex items-center justify-center w-full'>
                        <label
                            class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                            <div class='flex flex-col items-center justify-center pt-7'>
                                <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <p class=' text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>
                                    Select a picture</p>
                            </div>
                            <input name="image" id="imagen" type='file' class="hidden" />
                        </label>
                    </div>
                </div>
                @error('image')
                    <p class="text-sm text-red-700">*** {{ $message }}</p>
                @enderror
            </div>
            {{-- lista_id --}}
            <div class="mb-4">
                <label class="uppercase text-sm font-bold opacity-70">Category</label>
                <select name="category_id" id="category_id"
                    class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                    <option value="">- Seleccionar -</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                
                @error('category_id')
                    <p class="text-sm text-red-700">*** {{ $message }}</p>
                @enderror
            </div>

            {{-- user_id --}}
            <input type="text" hidden name="user_id" value="{{ $user->id }}">
            {{-- BOTONES CREAR VOLVER --}}
            <div class="flex flex-col space-y-4 mb-6">
                <button type="submit"
                    class="text-center py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300">
                    Create
                </button>
                <button type="button" onclick="history.back()"
                    class="text-center py-3 px-6 bg-gray-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300">
                    Back
                </button>
            </div>

        </form>

    </x-container>
</x-app-layout>
{{-- SCRIPT PARA VER LA IMAGEN PRESELECCIONADA --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(e) {
        $('#imagen').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>

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