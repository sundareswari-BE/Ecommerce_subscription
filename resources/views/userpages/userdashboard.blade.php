@include('template.header')



<!-------------------------------------------------------- section-1------------------------------------ -->

<div class="row m-1">
    <div class="banner mt-3">
        <div class="owl-carousel owl-theme carosel-img">
            <div class="item ">
                <img src="{{ asset('asset/img/toys.jfif') }}" alt="Toys">
            </div>
            <div class="item ">
                <img src="{{ asset('asset/img/pets.jpg') }}" alt="Toys">
            </div>
            <div class="item ">
                <img src="{{ asset('asset/img/offer.jpg') }}" alt="Toys">
            </div>
            <div class="item ">
                <img src="{{ asset('asset/img/gift.jpg') }}" alt="Toys">
            </div>

        </div>
    </div>
</div>

<!-------------------------------------------------------- section-2------------------------------------ -->





<div class="container mt-5">
        <hr>
        <h2 class="text-center mt-5"><b>Products</b></h2>
        <div class="container">
    <div class="row" id="product-container"></div>
</div>
    </div>










<hr class="mt-3">
































</div>
@include('template.footer')