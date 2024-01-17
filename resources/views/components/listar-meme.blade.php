<div class="mt-8">
    @if ($memes->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($memes as $meme )
                <x-meme :meme="$meme"/>
            @endforeach
        </div>

        <div class="mt-4">
            {{$memes->links('pagination::tailwind')}}
        </div>
    @else
        <p class="text-center">No hay memes</p>
    @endif
</div>