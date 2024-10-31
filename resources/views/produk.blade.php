<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/produk.css') }}">
</head>
<body>
    <div class="container"> 
        <header>
            <div>
                <div class="title"> Produk Pilihan </div>
            </div>
            <div class="icon-cart">
                <svg class="w-[23px] h-[23px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                    </svg>
                <span>0</span>
            </div>
        </header>
            <div class="listproduct">
                <div class="item">
                    <img src="{{ asset('img/paket a.jpg') }}" alt="Paket Franchise" class="gambar">
                    <h2> Paket Hemat A </h2>
                    <div class="price"> Rp.19.000.000,-</div>
                    <button class="addCart"> Add To Cart </button>
                </div>
            </div>
        </header>
    </div>
    <div class="cartTab">
        <h1> Shopping Cart</h1>
        <div class="listCart">
            <div class="item">
                <div class="image">
                    <img src="image/1.png" alt="">
                </div>
                <div class="name">
                    name
                </div>
                <div class="totalprice">
                    $200
                </div>
                <div class="quantity">
                    <span class="minus"></span>
                    <span>1</span>
                    <span class="plus"></span>
                </div>
            </div>
        </div>
        <div class="btn">
            <button class="close"> Close </button>
            <button class="checkOut"> CheckOut </button>
        </div>
    </div>

    <script src="produk.js"></script>
</body>
</html>