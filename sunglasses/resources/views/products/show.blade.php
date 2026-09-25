<x-layout :title="$product->title">
    <div class="flex flex-col items-center gap-[25px] py-5">
        <div class="flex flex-col items-center gap-[15px]">
            <h1 class="text-[20px] font-medium">{{ $product->title }}</h1>
            <em><p class="">Категория: {{ $product->category->name ?? 'Без категории' }}</p></em>
            <img class="rounded-lg border-black border-[1px]"
                 src="{{ $product->image_url }}"
                 alt="{{ $product->title }}"
                 width="400">
            <p>{{ $product->description }}</p>
            <h3>Цена: {{ number_format($product->price, 2, '.', ' ') }} ₽</h3>
            <div class="flex gap-[25px]">
                <p class="cursor-pointer mt-[25px] py-1 px-3 bg-[#7a9180] transition-colors duration-200 hover:bg-[#588a65] text-white rounded-[5px]">
                    <a href="{{ route('products.edit', $product) }}">Редактировать</a>
                </p>
                <form action="{{ route('products.destroy', $product) }}" method="POST"
                      onsubmit="return confirm('Удалить товар?')">
                    @csrf
                    @method('DELETE')
                    <button class="cursor-pointer mt-[25px] py-1 px-3 bg-red-500 transition-colors duration-200 hover:bg-red-700 text-white rounded-[5px]" type="submit">Удалить</button>
                </form>
            </div>
            <p class="cursor-pointer mt-[25px] py-1 px-3 bg-[#635a5a] transition-colors duration-200 hover:bg-[#211b1b] text-white rounded-[5px]"><a href="{{ route('products.index') }}">Назад в каталог</a></p>
        </div>
    </div>
</x-layout>
