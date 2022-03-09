<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class HeaderCategoryComponent extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.header-category-component',['categories'=>$categories]);
    }
}
