<?php

namespace App\Livewire;

use App\Models\Meme;
use Livewire\Component;

class LikeMeme extends Component
{
    public $meme;
    public $isLiked;
    public $likes;

    public function mount($meme){
        $this->isLiked = $meme->checkLike(auth()->user());
        $this->likes = $meme->likes->count();
    }

    public function render()
    {
        return view('livewire.like-meme');
    }

    public function like(){
        if($this->meme->checkLike(auth()->user())){
            $this->meme->where('user_id', auth()->user()->id)->delete();
            $this->isLiked = false;
            $this->likes--;
        }else{
            $this->meme->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
            $this->likes++;
        }

        $this->meme = Meme::find($this->meme->id);
    }
}
