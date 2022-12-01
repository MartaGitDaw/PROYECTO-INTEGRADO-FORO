<a {{ $attributes->merge(['type'=>'button' ,'class' => 'border border-red-700 bg-red-700 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-red-800 focus:outline-none focus:shadow-outline']) }}>
    {{ $slot }}
</a>
