<div>
    {{-- <a wire:click="toggleLike" type="button" class="focus:outline-none Like text-red-600 w-8 h-8"><i class="far fa-heart"></i>{{count($this->)}}</a> --}}
    @if(Auth::guest())
    <span class="flex items-center space-x-2 text-red-600 ">
        <i class="far fa-heart"></i>
        <span class="text-xs font-bold text-gray-600">{{ count($this->thread->likes()) }}</span>
    </span>
    @else
    <button wire:click="toggleLike" class="flex items-center space-x-2 cursor-pointer text-red-600 ">
        <i class="far fa-heart"></i>
        <span class="text-xs font-bold text-gray-600">{{ count($this->thread->likes()) }}</span>
    </button>
    @endif
</div>
