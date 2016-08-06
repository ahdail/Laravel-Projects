<?php
namespace Ecommerce\Http\Controllers;
;
use Ecommerce\Category;
use Ecommerce\Http\Requests;
use Ecommerce\Product;
use Ecommerce\ProductImage;
use Ecommerce\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    private $productModel;
    public function __construct(Product $productModel)
    {
        // $this->middleware('auth'); - verifica se o usuario esta logado
        $this->productModel = $productModel;
    }
    public function index()
    {
        $products = $this->productModel->orderBy('id', 'DESC')->paginate(10);
        return view('products.index', compact('products'));
    }
    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');
        return view('products.create', compact('categories'));
    }
    public function store(Requests\ProductRequest $request)
    {
        $product = $this->productModel->fill($request->all());
        $product->save();
        //$inputTags = array_map('trim', explode(',', $request->get('tags')));
        //$this->storeTag($inputTags,$product->id);
        return redirect()->route('products')->with('product_store', 'Product create!');

    }
    public function edit($id, Category $category)
    {
        $categories = $category->lists('name', 'id');
        $product = $this->productModel->find($id);
        return view('products.edit', compact('product', 'categories'));
    }
    public function update(Requests\ProductRequest $request, $id)
    {
        $this->productModel->findOrNew($id)->update($request->all());
        //$input = array_map('trim', explode(',', $request->get('tags')));
        //$this->storeTag($input,$id);
        return redirect()->route('products')->with('product_update', 'Product updated!');
    }
    public function destroy($id)
    {
        $product = $this->productModel->find($id);

        if($product)
        {
            $product->delete();
            return redirect()->route('products')->with('product_destroy', 'Product deleted!');
        }

        return redirect()->route('products')->with('product_exist', 'Product not exist!');
    }



}