<button {{ $attributes->merge(['type'=>'submit' , 'class' => 'border border-gray-700 bg-gray-700 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline']) }}>
    {{ $slot }}
</button>
