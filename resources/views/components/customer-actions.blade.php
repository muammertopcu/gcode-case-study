<div class="flex flex-col items-center">
    <a href="{{ $edit }}" class="text-blue-500 hover:text-blue-900">
        {{__('messages.update')}}
    </a>

    <form action="{{ $destroy }}" method="POST" onsubmit="return confirm('{{ __('message.are_you_sure')  }}')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500 hover:text-red-900">{{__('messages.delete')}}</button>
    </form>
</div>
