<?php

namespace App\Http\Controllers;

use App\DTOs\ProductData;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductService $service) {}

    public function index(Request $request)
    {
        $products = Product::with('category')
            ->filter($request->only('category_id'))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $dto = ProductData::fromStoreRequest($request);
        $this->service->createProduct($dto);

        return redirect()
            ->route('products.index')
            ->with('success', 'Товар успешно добавлен!');
    }

    public function show(Product $product)
    {
        $product->load('category');
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $dto = ProductData::fromUpdateRequest($request);
        $this->service->updateProduct($product, $dto);

        return redirect()
            ->route('products.show', $product)
            ->with('success', 'Товар успешно обновлён!');
    }

    public function destroy(Product $product)
    {
        $this->service->deleteProduct($product);

        return redirect()
            ->route('products.index')
            ->with('success', 'Товар и картинка успешно удалены!');
    }
}
