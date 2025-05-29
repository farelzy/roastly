<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Payments | Roastly</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="w-full px-20 py-8 bg-[#FEFDF8]">
    <header class="flex items-start">
        <button onclick="history.back()">
            <img src="{{ asset('icon/arrow-left.png') }}" alt="" class="w-8 h-8" />
        </button>
        <div class="w-full flex flex-col text-center mb-10">
            <h1 class="text-xl font-bold text-[#B97D0E]">Payment Options</h1>
            <h1 class="text-4xl font-bold text-[#402F0B]">Payment Methods</h1>
        </div>
    </header>

    <form method="POST" action="{{ route('payment.process', $order->id) }}">
        @csrf
        <main class="w-full flex items-center lg:items-start lg:flex-row flex-col gap-6 mt-10" x-data="{ paymentMethod: 'credit' }">
            <!-- Payment Methods -->
            <div class="w-3/4">
                <div class="space-y-10">
                    <!-- Metode Pembayaran -->
                    <div class="flex flex-wrap md:flex-nowrap gap-4">
                        <!-- Credit Card -->
                        <div
                            @click="paymentMethod = 'credit'"
                            :class="paymentMethod === 'credit' ? 'bg-[#402F0B] text-white' : 'bg-white text-[#402F0B]'"
                            class="flex flex-col items-center justify-center p-6 w-full rounded-xl shadow cursor-pointer transition-all duration-200"
                        >
                            <img
                                :src="paymentMethod === 'credit' ? '{{ asset('icon/creditActive.png') }}' : '{{ asset('icon/credit.png') }}'"
                                alt="Credit Card"
                                class="w-48 mb-4"
                            />
                            <span
                                :class="paymentMethod === 'credit' ? 'text-white' : 'text-[#402F0B]'"
                                class="text-base font-semibold text-center"
                                >Credit Card</span
                            >
                        </div>

                        <!-- QRIS -->
                        <div
                            @click="paymentMethod = 'qris'"
                            :class="paymentMethod === 'qris' ? 'bg-[#402F0B] text-white' : 'bg-white text-[#402F0B]'"
                            class="flex flex-col items-center justify-center p-6 w-full rounded-xl shadow hover:shadow-lg cursor-pointer transition-all duration-200"
                        >
                            <img
                                :src="paymentMethod === 'qris' ? '{{ asset('icon/qr-codeActive.png') }}' : '{{ asset('icon/qr-code.png') }}'"
                                alt="QRIS"
                                class="w-48 mb-4"
                            />
                            <span
                                :class="paymentMethod === 'qris' ? 'text-white' : 'text-[#402F0B]'"
                                class="text-base font-semibold text-center"
                                >QRIS</span
                            >
                        </div>

                        <!-- Cash -->
                        <div
                            @click="paymentMethod = 'cash'"
                            :class="paymentMethod === 'cash' ? 'bg-[#402F0B] text-white' : 'bg-white text-[#402F0B]'"
                            class="flex flex-col items-center justify-center p-6 w-full rounded-xl shadow hover:shadow-lg cursor-pointer transition-all duration-200"
                        >
                            <img
                                :src="paymentMethod === 'cash' ? '{{ asset('icon/cashActive.png') }}' : '{{ asset('icon/cash.png') }}'"
                                alt="CASH"
                                class="w-48 mb-4"
                            />
                            <span
                                :class="paymentMethod === 'cash' ? 'text-white' : 'text-[#402F0B]'"
                                class="text-base font-semibold text-center"
                                >CASH</span
                            >
                        </div>
                    </div>

                    <!-- Card Type & Number: TAMPIL HANYA JIKA Credit Card -->
                    <div x-show="paymentMethod === 'credit'" x-transition>
                        <h2 class="text-xl font-bold text-[#402F0B] mb-4">Card Type</h2>

                        <div x-data="{ selectedBank: '' }">
                            <div class="flex flex-wrap gap-4 mb-6">
                                <!-- BNI -->
                                <label
                                    class="flex items-center gap-2 px-6 py-4 bg-white rounded-2xl shadow cursor-pointer transition-all duration-200"
                                    :class="{ 'ring-2 ring-[#402F0B] bg-[#402F0B]/10': selectedBank === 'bni' }"
                                >
                                    <input
                                        type="radio"
                                        name="bank"
                                        value="bni"
                                        class="form-radio text-[#402F0B]"
                                        x-model="selectedBank"
                                    />
                                    <img src="{{ asset('img/bni.png') }}" alt="BNI" class="h-8" />
                                </label>

                                <!-- BCA -->
                                <label
                                    class="flex items-center gap-2 px-6 py-4 bg-white rounded-2xl shadow cursor-pointer transition-all duration-200"
                                    :class="{ 'ring-2 ring-[#402F0B] bg-[#402F0B]/10': selectedBank === 'bca' }"
                                >
                                    <input
                                        type="radio"
                                        name="bank"
                                        value="bca"
                                        class="form-radio text-[#402F0B]"
                                        x-model="selectedBank"
                                    />
                                    <img src="{{ asset('img/bca.png') }}" alt="BCA" class="h-8" />
                                </label>

                                <!-- Mandiri -->
                                <label
                                    class="flex items-center gap-2 px-6 py-4 bg-white rounded-2xl shadow cursor-pointer transition-all duration-200"
                                    :class="{ 'ring-2 ring-[#402F0B] bg-[#402F0B]/10': selectedBank === 'mandiri' }"
                                >
                                    <input
                                        type="radio"
                                        name="bank"
                                        value="mandiri"
                                        class="form-radio text-[#402F0B]"
                                        x-model="selectedBank"
                                    />
                                    <img src="{{ asset('img/mandiri.png') }}" alt="Mandiri" class="h-8" />
                                </label>

                                <!-- BRI -->
                                <label
                                    class="flex items-center gap-2 px-6 py-4 bg-white rounded-2xl shadow cursor-pointer transition-all duration-200"
                                    :class="{ 'ring-2 ring-[#402F0B] bg-[#402F0B]/10': selectedBank === 'bri' }"
                                >
                                    <input
                                        type="radio"
                                        name="bank"
                                        value="bri"
                                        class="form-radio text-[#402F0B]"
                                        x-model="selectedBank"
                                    />
                                    <img src="{{ asset('img/bri.png') }}" alt="BRI" class="h-8" />
                                </label>
                            </div>

                            <h2 class="text-xl font-bold text-[#402F0B] mb-2">Card Number</h2>
                            <input
                                type="text"
                                name="card_number"
                                placeholder="Enter card number"
                                class="w-full p-4 text-[#402F0B] border rounded-2xl shadow focus:outline-none focus:ring-2 focus:ring-[#402F0B] transition-all duration-200"
                            />
                        </div>
                    </div>

                    <!-- Card Type & Number: TAMPIL HANYA JIKA QRIS -->
                    <div x-show="paymentMethod === 'qris'" x-transition>
                        <h2 class="text-xl font-bold text-[#402F0B] mb-2">Your Barcode</h2>
                        <div class="lg:w-1/4 px-6 py-4 bg-white rounded-2xl shadow">
                            <img src="{{ asset('img/QRIS.png') }}" alt="Barcode" class="w-full" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:w-1/4 w-full">
                <div
                    class="min-h-96 bg-white rounded-2xl shadow-md shadow-neutral-300/40 px-6 pt-6 pb-12 text-sm"
                >
                    <h2 class="text-base font-bold text-[#402F0B] mb-3">Order Summary</h2>
                    <hr class="border-t border-[#E0DCD6] mb-4" />

                    <div class="flex justify-between text-[#A19580] mb-2">
                        <span>Items</span>
                        <span class="text-[#402F0B] font-medium">{{ $totalItems ?? $order->items->sum('quantity') }}</span>
                    </div>
                    
                    <div class="flex justify-between text-[#A19580] mb-2">
                        <span>Sub Total</span>
                        <span class="text-[#402F0B] font-semibold">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                    </div>

                    <div class="flex justify-between text-[#A19580] mb-2">
                        <span>Shipping</span>
                        <span class="text-[#402F0B] font-medium">Rp {{ number_format($order->shipping_cost ?? 0, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-[#A19580] mb-4">
                        <span>Taxes</span>
                        <span class="text-[#402F0B] font-medium">Rp {{ number_format($order->taxes ?? 0, 0, ',', '.') }}</span>
                    </div>

                    <hr class="border-t border-[#E0DCD6] mb-3" />

                    <div class="flex justify-between text-[#402F0B] font-bold text-base">
                        <span>Total</span>
                        <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                    </div>

                    <button
                        type="submit"
                        class="w-full mt-8 text-white bg-[#B97D0E] py-3 rounded-full hover:bg-[#402F0B] transition-all duration-200"
                    >
                        Proceed to Payment
                    </button>
                </div>
            </div>

            <!-- Hidden input untuk metode pembayaran -->
            <input type="hidden" name="payment_method" :value="paymentMethod" />
        </main>
    </form>

    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>
