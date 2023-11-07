<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message','Category has been deleted successfully!');
    }

    public function deleteSubcategory($id)
    {
        $scategory = Subcategory::find($id);
        $scategory->delete();
        session()->flash('message','Subcategory has been deleted successfully!');
    }

    public function render()
    {
        $categories = Category::paginate(10);
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
