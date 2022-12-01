<a {{ $attributes->merge(['type'=>'button' ,'class' => 'border border-blue-700 bg-blue-600 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-blue-800 focus:outline-none focus:shadow-outline']) }}>
    {{ $slot }}
</a>
