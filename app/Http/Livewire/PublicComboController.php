<?php

namespace App\Http\Livewire;

use App\Models\Combo;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PublicComboController extends Component
{
    
    use WithPagination;
    public function render(){
        $combos = Combo::where('status', 'Active')->get();
        // dd($combos);
        return view('livewire.all-combo-component', [
            'combos' => $combos, ])->layout('layout');
    }
}
