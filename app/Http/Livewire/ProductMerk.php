<?php

namespace App\Http\Livewire;

use App\Merk;
use App\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductMerk extends Component
{
    use WithPagination;

    public $search, $merk;

    protected $updateQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($merkId)
    {
        $merkDetail = Merk::find($merkId);

        if($merkDetail) {
            $this->merk = $merkDetail;
        }
    }

    public function render()
    {
        if($this->search) {
            $products = Product::where('merk_id', $this->merk->id)->where('nama', 'like', '%'.$this->search.'%')->paginate(8);
        }else {
            $products = Product::where('merk_id', $this->merk->id)->paginate(8);
        }
        
        return view('livewire.product-index', [
            'products' => $products,
            'title' => 'Jersey '.$this->merk->nama
        ]);
    }
}
