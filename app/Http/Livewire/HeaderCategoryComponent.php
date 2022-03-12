<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class HeaderCategoryComponent extends Component
{
    public function render()
    {
        $categories = Category::where('status', 1)->whereNull('deleted_at')->get();
        return view('livewire.header-category-component',['categories'=>$categories]);
    }
}
