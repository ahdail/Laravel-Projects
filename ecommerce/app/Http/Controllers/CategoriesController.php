<?php

namespace Ecommerce\Http\Controllers;

use Ecommerce\Category;
use Ecommerce\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

use Ecommerce\Http\Requests;

class CategoriesController extends Controller
{
    private $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function index (){

        $categories = $this->categoryModel->paginate(5);

        return view ('categories.index', compact('categories'));
    }

    public function create (){
        return view('categories.create');
    }

    public function store(CategoryRequest $request) {

        $input = $request->all();

        $category = $this->categoryModel->fill($input);
        $category->save();

        return redirect()->route('categories');
    }


    public function edit($id){

        $category = $this->categoryModel->find($id);

        return view('categories.edit', compact('category'));


    }

    public function update(CategoryRequest $request, $id){

        $this->categoryModel->find($id)->update($request->all());

        return redirect()->route('categories');

    }

    public function destroy($id){

        $this->categoryModel->find($id)->delete();

        return redirect()->route('categories');

    }


}
