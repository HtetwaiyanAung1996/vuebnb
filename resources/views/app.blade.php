<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Vuebnb</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
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
        @{{images}}
    <!-- container start -->
        <div class="container">
        <!-- v-if testing -->
            <p v-if="myval"> Hello Vue </p>
            <p v-else> GoodBye Vue</p>
        <!--end  -->
        <!-- start style (insert image) binding -->
            <div class="header">
                <div class="header-img"
                    :style="headerImageStyle"
                    v-on:click="modalOpen = true"
                >
        <!-- adding modal open function in image and button -->
                    <button class="view-photos">View Photos</button>
                </div>
            </div>
        <!-- end style(insert image) binding -->
            <div class="heading">
                <h1>@{{title}}</h1>
                <p>@{{address}}</p>
            </div>
            <hr>
            {{-- !-- list more button --> --}}
            <div class="about">
                <h3>About This Listing</h3>
                <p :class="{ contracted: contracted }">@{{about}}</p>
            <!-- event listener -->
                <button v-if="contracted" class="more" v-on:click="contracted = false">+ More</button>
            </div>
            <!-- end of list more button -->
            <!-- fontawasome class binding -->
            <div class="lists">
            <hr>
                <div class="amenities list">
                    <div class="title"><strong>Amenities</strong>
                    </div>
                <div class="content">
                    <div class="list-item" v-for="amenity in amenities">
                        <i class="fa fa-lg" :class="amenity.icon"></i>
                        <span>@{{ amenity.title }}</span>
                    </div>
                </div>
            </div>
        <!-- end of fontawasome class binding -->
            <hr>
        <!-- start price list -->
            <div class="prices list">
                    <div class="title">
                        <strong>Prices</strong>
                    </div>
                    <div class="content">
                        <div class="list-item" v-for="price in prices">
                            @{{price.title}}: <strong>@{{price.value}}</strong>
                        </div>
                    </div>
            </div>
        <!-- end of price list -->
            </div>
        </div>
    <!-- container end -->
    <!-- modal with close -->
        <div id="modal" :class="{ show : modalOpen }">
            <button v-on:click="modalOpen = false" class="modal-close">
                &times;
            </button>
            <div class="modal-content">
                <image-carousel :images="images"></image-carousel>
            </div>
        </div>
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