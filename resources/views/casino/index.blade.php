@extends('layouts.app') @section('content')

<script>
    var points = {{ $playerPoints ? $playerPoints : 0 }};
    var attempts = {{ $attempts ? $attempts : 0}};

    function buyProduct(product) {
        var product = product;
        var productId = "product"+product.id;
        console.log(productId);
        axios.post('/redeem-product', {
            'id': product.id
        }).then(function (response) {
            swal(response.data.message);
            if (response.data.status === 200) {
                console.log(points - product.price_in_points);
                $('#'+productId).attr("disabled",true);
            }
        }).catch(function (error) {
            console.log(error)
        })
}

                    // setInterval(() => {
                    //     console.log('hello');
                    //     currentDate = new Date();
                    //     console.log(currentDate.getHours() + ":" +
                    //         currentDate.getMinutes() + ":" +
                    //         currentDate.getSeconds())
                    // }, 100);

</script>

<div class="container casino-bg">
    <div class="row">
        <div class="col-lg-4 offset-lg-4">
            <div>
                <div id="slot1" class="slot"></div>
                <div id="slot2" class="slot"></div>
                <div id="slot3" class="slot"></div>
                <div class="clear"></div>
            </div>
            <div class="text-center">
                <div class="col-lg-2">
                    <button id="control" class="btn btn-success">Spin Now</button>
                </div>
            </div>
            <div id="result"></div>

        </div>

        <div class="col-lg-4">
            attempts : <p id="attempts"> {{ $attempts }} </p>
            Time : <p id="time"></p>
        </div>
    </div>


    <div class="col-lg-12">
        Use Points to redeem following products :-
        <p>
            points :
            <b id="points">
                {{ $playerPoints }}
            </b>
        </p>
    </div>


    @include('casino.products')
</div>

@endsection @section('internal_js')

<script>


</script>
@endsection
