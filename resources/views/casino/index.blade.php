@extends('layouts.app') @section('content')

<script>
    var points = <?php echo $playerPoints; ?>;

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
    </div>

    <div class="row">
                <div class="col-lg-2">
                    <p>
                         points :
                        <b id="points">
                             {{ $playerPoints }}
                        </b>
                    </p>
                </div>
                <div class="col-lg-10">
                    <h2 class="text-center">
                        Products
                    </h2>
                </div>
    </div>

</div>

@endsection @section('internal_js')

<script>


</script>
@endsection
