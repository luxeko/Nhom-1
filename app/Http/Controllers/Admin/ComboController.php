<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Combo;
use App\Models\Product;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;

class ComboController extends Controller
{
    use StorageImageTrait;
    private $product;
    private $category;
    private $productImage;
    private $combo;

    public function __construct(Product $product, Category $category, Combo $combo)
    {
        $this->product      = $product;
        $this->category     = $category;
        $this->combo        = $combo;
    }
    public function index(){
        $data = $this->combo->latest()->paginate(5);
        $currentPage = $data->currentPage();
        $perPage = $data->perPage();
        $total = $data->total();
        return view('admin.manage_combo.index', compact('data', 'currentPage', 'perPage', 'total'));
    }
    public function create(){
        $products = $this->product->all();
      
        return view('admin.manage_combo.add', compact('products'));
    }
    public function store(Request $request){
        $product = str_replace(".", "", $request->total_price);

        dd($product);
    }
}
