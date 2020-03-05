<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Vuebnb</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/vue-style.css') }}" type="text/css">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>
</head>
<!-- start body -->
<body>
    <div id="toolbar">
        <img class="icon" src="{{ asset('images/logo.png') }}">
        <h1>vuebnb</h1>
    </div>
    <div id="app">
        <my-component></my-component>
        @{{images[0]}}
        <header-image
            :image-url="images[0]"
            @header-clicked="openModal"
        ></header-image>
    <!-- container start -->
        <div class="container">
        <!-- v-if testing -->
            <p v-if="myval"> Hello Vue </p>
            <p v-else> GoodBye Vue</p>
        <!--end  -->

            <div class="heading">
                <h1>@{{title}}</h1>
                <p>@{{address}}</p>
            </div>
            <hr>
            {{-- !-- list more button --> --}}
            <div class="about">
                <h3>About This Listing</h3>
            <expandable-text>@{{ about }}</expandable-text>
            <!-- event listener -->
            </div>
            <!-- end of list more button -->
            <!-- fontawasome class binding -->
            <div class="list">
                <feature-list title ="Anemitites">
                    <div class="list-item" v-for="amenity in amenities">
                        <i class="fa fa-lg" :class="amenity.icon"></i>
                        <span>@{{ amenity.title }}</span>
                    </div>
                </feature-list>
                <feature-list title="Prices">
                    <div class="list-item" v-for="price in prices">
                        @{{price.title}}: <strong>@{{price.value}}</strong>
                    </div>
                </feature-list>
            </div>
        <!-- end of fontawasome class binding -->
        <!-- start price list -->
        <!-- end of price list -->
        </div>
    <!-- container end -->
    <!-- modal with close -->
    {{-- show is the class of modal which is inside style.css and initially false (modal open is false) --}}
            <modal-window ref="imagemodal">
                <image-carousel :images="images"></image-carousel>
            </modal-window>
        </div>
    
    
    <script>
        window.vuebnb_listing_model = "{!! addslashes(json_encode($model)) !!}"
        // window.vuebnb_listing_model = @json($model);//"{!! addslashes(json_encode($model)) !!}"    
    </script>
    <script>
        // console.log(window.vuebnb_listing_model);
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    
</body>
<!-- end body -->
</html>