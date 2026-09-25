<?php

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/products', function () {
    return ProductResource::collection(Product::with('category')->paginate(15));
});
