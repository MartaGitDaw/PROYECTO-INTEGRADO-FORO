<div>
    @if (Auth::guest())
            <a href="{{ route('login') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500">
                <span class="flex items-center space-x-2 text-red-600 ">
                <i class="far fa-heart"></i>
                <span class="text-xs font-bold text-gray-600">{{ count($this->thread->likes()) }}</span>
                </span>
            </a>
    @else
        <button wire:click="toggleLike" class="flex items-center space-x-2 cursor-pointer text-red-600 ">
            @if($thread->isLikedBy(Auth::user()))
            <i class="fas fa-heart"></i>
            @else
            <i class="far fa-heart"></i>
            @endif
            <span class="text-xs font-bold text-gray-600">{{ count($this->thread->likes()) }}</span>
        </button>
    @endif
</div>
