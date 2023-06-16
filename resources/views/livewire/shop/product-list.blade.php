<div class="space-y-4">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 " x-data="{ filterMenuOpen: false }">
        <div class="fixed lg:block lg:flex-none lg:relative top-0 left-0 h-full overflow-y-scroll z-40"
            :class="filterMenuOpen ? 'block' : 'hidden'">


            <div class=" w-screen max-w-xs lg:max-w-screen-md lg:w-full">
                <div
                    class=" h-full min-h-screen lg:h-auto lg:min-h-full card  p-3 bg-white border border-gray-200 rounded shadow dark:bg-gray-800 dark:border-gray-700 text-gray-800 dark:text-gray-100">
                    <div class="flex">
                        <p class="font-bold flex-grow">Filters</p>

                        <button type="button" x-on:click="filterMenuOpen = false"
                            class="-m-2 p-2 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 lg:hidden">
                            <span class="sr-only">Close panel</span>
                            <!-- Heroicon name: outline/x-mark -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">



                    <div>
                        <div class="rounded p-2.5 dark:bg-gray-900 bg-gray-50">
                            {{ __('Categories') }}
                        </div>


                        <ul class="px-2 ">
                            @foreach ($categories as $category)
                                <div class="flex gap-3 my-2 items-center">
                                    <input wire:model="cat_id" id="cat-{{ $category->id }}" type="checkbox"
                                        value="{{ $category->id }}"
                                        class="flex-none w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="cat-{{ $category->id }}"
                                        class="flex-grow cursor-pointer ">{{ $category->title }}</label>
                                    <p class="flex-none">({{ $category->products_count }})</p>
                                </div>
                            @endforeach
                        </ul>


                    </div>

                </div>

            </div>
        </div>
        <div class=" lg:col-span-3 ">
            <div
                class="flex items-center card w-full  p-2  bg-white border border-gray-200 rounded shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="flex-grow">
                    <button x-on:click="filterMenuOpen = true"
                        class="lg:hidden  items-center gap-2 bg-gray-200 rounded px-5 py-1">
                        {{-- <x-ri-filter-3-line class="inline" /> --}}
                        Filter
                    </button>
                </div>



                <div class="justify-self-end">
                    <select id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Default sorting</option>
                        <option value="US">Price low-high</option>
                        <option value="CA">Price high-low</option>
                        <option value="FR">Latest</option>
                        <option value="DE">Olderst</option>
                    </select>
                </div>
            </div>




            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-6 relative">

                @foreach ($products as $product)
                    <x-card class="px-0 py-0 rounded transition-none overflow-hidden ">

                        <a href="{{ route('shop.products.show', $product) }}">
                            <div class=" aspect-w-16 aspect-h-9 ">

                                @if ($product->getMedia('product-thumbnails')->last())
                                    {{ $product->getMedia('product-thumbnails')->last() }}
                                @else
                                    {!! $product->getFallbackImage() !!}
                                @endif


                            </div>
                        </a>

                        <div class="info p-2 h-full">
                            <a href="{{ route('shop.products.show', $product) }}">
                                <h2 class="truncate font-bold">{{ $product->title }}</h2>
                            </a>
                            <p class=" text-gray-500 text-xs">
                                {{ count($product->categories) ? $product->categories[0]->title : __('Uncategorised') }}
                            </p>
                            <div class="flex items-end justify-between mt-2">
                                <div class="">
                                    <h3 class=" font-bold">৳{{ $product->selling_price }}
                                        <span
                                            class="ml-1 font-normal line-through text-gray-500">৳{{ $product->original_price }}</span>
                                    </h3>

                                    <div class="rating text-yellow-300 ">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= ceil($product->reviews_avg_rating))
                                                <x-svg.star-solid class="w-4 h-4 inline" />
                                            @else
                                                <x-svg.star-outlined class="w-4 h-4 inline" />
                                            @endif
                                        @endfor
                                        <span class="text-gray-500 text-sm">({{ $product->reviews_count }})</span>
                                    </div>

                                </div>
                                <div class="">
                                    <button wire:click="addToCart({{ $product->id }})" wire:loading.attr="disabled"
                                        class=" border border-primary-600 rounded py-1.5 px-3 hover:bg-primary-600 hover:text-gray-100 transition-all flex items-center gap-1">
                                        <span wire:loading.remove wire:target="addToCart({{ $product->id }})">
                                            <x-svg.cart class="w-4 h-4 inline" />
                                            {{ __('Add to cart') }}
                                        </span>
                                        <span wire:loading wire:target="addToCart({{ $product->id }})">
                                            <x-svg.spinner class="w-4 h-4 inline animate-spin" />
                                            {{ __('Adding to cart') }}
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </x-card>
                @endforeach
            </div>

            <div>
                {{ $products->links('pagination.tailwind-livewire') }}
            </div>

            <div wire:loading wire:target="gotoPage,cat_id">
                <div
                    class="fixed z-40 flex tems-center justify-center inset-0 bg-gray-700 dark:bg-gray-900 dark:bg-opacity-50 bg-opacity-50 transition-opacity">
                    <div class="flex items-center justify-center ">
                        <div class="w-40 h-40 border-t-4 border-b-4 border-green-900 rounded-full animate-spin">
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
