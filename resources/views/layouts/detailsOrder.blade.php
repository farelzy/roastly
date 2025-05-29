<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ordered Details | Roastly</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="px-20 py-8 bg-[#FEFDF8]">
    <header class="flex items-start">
        <button onclick="history.back()">
            <img src="{{ asset('icon/arrow-left.png') }}" alt="" class="w-8 h-8">
        </button>
        <div class="w-full flex flex-col items-center mb-10">
            <h1 class="text-4xl font-bold text-[#402F0B]">{{ $drink->name }}</h1>
            <h1 class="text-xl font-bold text-[#B97D0E]">price: Rp {{ number_format($drink->price, 0, ',', '.') }}</h1>
        </div>
    </header>
    <main class="my-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 *:h-[30rem]">
            <div class="bg-white p-6 rounded-lg shadow-md flex justify-center">
                @if($drink->image)
                    <img src="{{ asset('storage/' . $drink->image) }}" alt="{{ $drink->name }}" class="max-h-full object-contain">
                @else
                    <img src="https://via.placeholder.com/400x400?text=No+Image" alt="No Image" class="max-h-full object-contain">
                @endif
            </div>
            <div class="bg-white col-span-2 p-6 rounded-lg shadow-md flex flex-col justify-between">
                <p class="text-sm">{{ $drink->description ?? 'No description available.' }}</p>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="drink_id" value="{{ $drink->id }}">
                    <input type="hidden" name="quantity" value="1"> <div>
                        <div class="mb-4">
                            <p class="font-semibold mb-2">Size :</p>
                            <div class="flex gap-4">
                                @forelse ($toppings['size'] as $topping)
                                    <label class="inline-flex items-center gap-2 cursor-pointer">
                                        <input
                                            type="radio"
                                            name="size_id"
                                            value="{{ $topping->id }}"
                                            class="form-radio text-orange-900 rounded-md"
                                            @if($loop->first) checked @endif
                                        >
                                        <span>{{ $topping->name }}</span>
                                        @if ($topping->price > 0)
                                            (+Rp{{ number_format($topping->price, 0, ',', '.') }})
                                        @endif
                                    </label>
                                @empty
                                    <p class="text-gray-500 text-sm">No size options available.</p>
                                @endforelse
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="font-semibold mb-2">Sugar:</p>
                            <div class="flex gap-x-12">
                                @forelse ($toppings['sugar'] as $topping)
                                    <label class="inline-flex items-center gap-2 cursor-pointer">
                                        <input
                                            type="radio"
                                            name="sugar_id"
                                            value="{{ $topping->id }}"
                                            class="form-radio text-orange-900 rounded-md"
                                            @if($loop->first) checked @endif
                                        >
                                        <span>{{ $topping->name }}</span>
                                        @if ($topping->price > 0)
                                            (+Rp{{ number_format($topping->price, 0, ',', '.') }})
                                        @endif
                                    </label>
                                @empty
                                    <p class="text-gray-500 text-sm">No sugar options available.</p>
                                @endforelse
                            </div>
                        </div>
                        <div class="mb-6">
                            <p class="font-semibold mb-2">Ice Cube:</p>
                            <div class="flex gap-4">
                                @forelse ($toppings['ice'] as $topping)
                                    <label class="inline-flex items-center gap-2 cursor-pointer">
                                        <input
                                            type="radio"
                                            name="ice_id"
                                            value="{{ $topping->id }}"
                                            class="form-radio text-orange-900 rounded-md"
                                            @if($loop->first) checked @endif
                                        >
                                        <span>{{ $topping->name }}</span>
                                        @if ($topping->price > 0)
                                            (+Rp{{ number_format($topping->price, 0, ',', '.') }})
                                        @endif
                                    </label>
                                @empty
                                    <p class="text-gray-500 text-sm">No ice options available.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-4">
                        <button type="submit"
                            class="px-6 py-2 border border-yellow-600 text-yellow-600 rounded-full hover:bg-yellow-100 transition">ADD
                            TO CART</button>
                        <button type="button" onclick="window.location.href='/menu/payment_order'" class="px-6 py-2 bg-yellow-700 text-white rounded-full hover:bg-yellow-800 transition">BUY
                            NOW</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>