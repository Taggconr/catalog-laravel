<header class="bg-[#64687a] p-4  w-full flex flex-col items-center">
    <div class="max-w-[1440px] w-full items-center  flex justify-between gap-[25px]">
        <div class="text-white relative bottom-1 border-black rounded-lg border-[1px] p-3">
            <a href='/' class="flex gap-[4px] ">мой
                <span class="relative top-1">логотип</span>
            </a>
        </div>
        <div class="bg-black w-full p-1 rounded-lg">
            .
        </div>
        <nav class="">
            <ul class="flex gap-[25px]">
                <li class="">
                    <a href="{{ route('home') }}" class="text-[#d6d6d6] transition-colors duration-200 hover:text-white">
                        Главная
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('products.index') }}" class="text-[#d6d6d6] transition-colors duration-200 hover:text-white">
                        Каталог
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('products.create') }}" class="text-[#d6d6d6] transition-colors duration-200 hover:text-white">
                        Создать
                    </a>
                </li>
                <li class="">
                    <a href="" class="text-[#d6d6d6] transition-colors duration-200 hover:text-white">
                        Поддержка
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
