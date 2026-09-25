<?php

namespace App\DTOs;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\UploadedFile;

readonly class ProductData
{
    public function __construct(
        public ?int $categoryId,
        public string $title,
        public string $description,
        public float $price,
        public ?UploadedFile $image,
    ) {}

    public static function fromStoreRequest(StoreProductRequest $req): self
    {
        return new self(
            categoryId:  $req->validated('category_id') ? (int) $req->validated('category_id') : null,
            title:       $req->validated('title'),
            description: $req->validated('description'),
            price:       (float) $req->validated('price'),
            image:       $req->file('image'),
        );
    }

    public static function fromUpdateRequest(UpdateProductRequest $req): self
    {
        return new self(
            categoryId:  $req->validated('category_id') ? (int) $req->validated('category_id') : null,
            title:       $req->validated('title'),
            description: $req->validated('description'),
            price:       (float) $req->validated('price'),
            image:       $req->file('image'),
        );
    }
}
