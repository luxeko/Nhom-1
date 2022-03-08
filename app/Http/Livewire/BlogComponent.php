<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;

class BlogComponent extends Component
{
    private $blog;
    public function mount(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function render()
    {
        $blogs = Blog::where('status', '=', 1)->paginate(3);
        return view('livewire.blog-component', ['blogs'=>$blogs])->layout('layout');
    }
}
