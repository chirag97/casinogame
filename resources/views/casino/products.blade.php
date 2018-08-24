<?php

$newProducts = $products->merge($user->products);

?>


<div class="col-lg-12">
    <div class="card-columns">


        @foreach($newProducts as $product)
        <div class="card" style="width: 18rem; background: #fedb4e;">
            <img class="card-img-top" src="http://via.placeholder.com/300x200.png" alt="Card image cap">
            <div class="card-body">
                <h4>
                    {{ $product->name }}
                </h4>
                <p class="card-text" style="color: #000000;">Points Required :
                    <b>{{ $product->price_in_points }}</b>
                </p>
                <button class="btn" onclick="buyProduct({{ $product }})" {{ $product->pivot ? ($product->pivot->product_id ? 'disabled' : '') :
                '' }}  id="product{{ $product->id }}" style="background: brown; color:#fff; font-weight: bolder;">
                    REDEEM
                </button>
            </div>
        </div>
        @endforeach
        <!-- <div class="card" style="width: 18rem; background: #fedb4e;">
            <img class="card-img-top" src="http://via.placeholder.com/300x200.png" alt="Card image cap">
            <div class="card-body">
                <p class="card-text" style="color: #000000;">Points Required :
                    <b>200</b>
                </p>
                <button class="btn" style="background: brown; color:#fff; font-weight: bolder;">
                    REDEEM
                </button>
            </div>
        </div>
        <div class="card" style="width: 18rem; background: #fedb4e;">
            <img class="card-img-top" src="http://via.placeholder.com/300x200.png" alt="Card image cap">
            <div class="card-body">
                <p class="card-text" style="color: #000000;">Points Required :
                    <b>500</b>
                </p>
                <button class="btn" style="background: brown; color:#fff; font-weight: bolder;">
                    REDEEM
                </button>
            </div>
        </div> -->
    </div>
</div>
