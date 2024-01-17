<div>
    <div class="mb-3 flex justify-between gap-2 items-center">
        <a href="{{route('memes.index',$meme->user)}}" class="flex gap-3 items-center">
            <img class="rounded-full max-w-10" src="{{$meme->user->imagen ? asset('perfiles/'.$meme->user->imagen) : asset('img/usuario.svg')}} " alt="Imagen de Perfil de {{$meme->user->username}}">
            <p class="font-black">{{$meme->user->username}}</p>
        </a>

        <p class="text-gray-600">{{$meme->created_at->diffForHumans()}}</p>
    </div>

    <a href="{{route('memes.show',['meme'=>$meme,'user'=>$meme->user])}}">
        <img loading="lazy" class="w-full" src="{{asset('uploads').'/'.$meme->imagen}}" alt="Meme de {{$meme->user->username}}">
    </a>

    <div class="flex justify-between items-center mt-3">
        @auth
            <livewire:like-meme :meme="$meme"/>
        @endauth

        <div class="flex justify-between items-center gap-2">
            @auth
                @if ($meme->user_id === auth()->user()->id)
                    <form action="{{route('memes.destroy',$meme)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>                          
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</div>