    <x-layout>
        <div class="flex flex-col items-center">
            <h1 class="font-bold text-[32px]">Каталог товаров</h1>

            @if(session('success'))
                <p><strong>{{ session('success') }}</strong></p>
            @endif
            <div class="py-3">
                <form method="GET" action="{{ route('products.index') }}">
                    <label>
                        Категория:
                        <select name="category_id" onchange="this.form.submit()">
                            <option value="">Все категории</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    @selected(request('category_id') == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                    <noscript><button type="submit">Фильтровать</button></noscript>
                </form>
                <hr class="py-1">
            </div>

            @if($products->isEmpty())
                <p>Товаров нет.</p>
            @else
                <div class="max-w-[1440px] w-full flex flex-col items-center">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-[25px]">
                        @foreach($products as $product)
                            <x-product-card :product="$product" />
                        @endforeach
                    </div>
                </div>
                {{ $products->links() }}
            @endif
        </div>
    </x-layout>
