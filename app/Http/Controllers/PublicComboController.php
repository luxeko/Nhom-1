<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use Illuminate\Http\Request;

class PublicComboController extends Controller
{
    private $combo;
    public function __construct(Combo $combo)
    {
        $this->combo = $combo;
    }
    public function index(){
        $combos = $this->combo->all();
        return view('livewire.all-combo-component.blade', compact('combos'));
    }
}
