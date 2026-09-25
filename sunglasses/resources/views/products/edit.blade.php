<x-layout :title="'Редактировать: ' . $product->title">
    <div class="w-[50%] flex flex-col gap-[25px] py-4 items-center">
        <h1 class="font-bold text-[24px]">Редактировать товар</h1>

        <form class="bg-[#f0f0f0] drop-shadow-lg w-full p-5 gap-[15px] flex flex-col items-center border-black border-[1px] rounded-lg" method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="w-full">
                <label>
                    Категория:
                    <select name="category_id">
                        <option value="">— без категории —</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @selected(old('category_id', $product->category_id) == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </label>
                @error('category_id') <br><span style="color:red">{{ $message }}</span> @enderror
            </div>

            <div class="w-full">
                <label>
                    Название:
                    <input class="px-1 rounded-[5px] w-full border-black border-[1px]" type="text" name="title" value="{{ old('title', $product->title) }}">
                </label>
                @error('title') <br><span style="color:red">{{ $message }}</span> @enderror
            </div>

            <div class="w-full">
                <label>
                    Описание:<br>
                    <textarea class="px-1 rounded-[5px] w-full border-black border-[1px]" name="description" rows="4" cols="50">{{ old('description', $product->description) }}</textarea>
                </label>
                @error('description') <br><span style="color:red">{{ $message }}</span> @enderror
            </div>

            <div class="w-full">
                <label>
                    Цена:
                    <input class="px-1 rounded-[5px] w-full border-black border-[1px]" type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}">
                </label>
                @error('price') <br><span style="color:red">{{ $message }}</span> @enderror
            </div>

            <div class="w-full">
                <label>
                    Картинка:
                    <input class="cursor-pointer px-1 rounded-[5px] w-full border-black border-[1px]" type="file" name="image">
                </label>
                @error('image') <br><span style="color:red">{{ $message }}</span> @enderror
            </div>

            <div class="flex gap-[25px] mt-[10px]">
                <button class="bg-[#d0f0cc] transition-colors duration-200 hover:bg-[#9bd194] cursor-pointer py-1 px-3 border-black border-[1px] rounded-[5px]" type="submit">Обновить</button>
                <a class="bg-red-400 transition-colors duration-200 hover:bg-red-600 cursor-pointer py-1 px-3 border-black border-[1px] rounded-[5px]" href="{{ route('products.show', $product) }}">Отмена</a>
            </div>
        </form>
    </div>
</x-layout>
