@props(['product'])

<article class="flex flex-col gap-[15px] items-center bg-[#ededed] p-2 rounded-lg border-[#1f1f1f] border-[1px]">
    <img class='w-[200px] h-[200px] object-cover rounded-lg border-black border-[1px] drop-shadow-lg'
         src="{{ $product->image_url }}"
         alt="{{ $product->title }}"
         width="200">

    <em><p class="text-[#a3a3a3]">Категория: {{ $product->category->name ?? 'Без категории' }}</p></em>

    <h2 class="font-medium">{{ $product->title }}</h2>

    <p>Цена: {{ number_format($product->price, 2, '.', ' ') }} ₽</p>

    <a class="py-1 px-3 bg-[#635a5a] transition-colors duration-200 hover:bg-[#211b1b] text-white rounded-[5px]" href="{{ route('products.show', $product) }}">Подробнее</a>
</article>
