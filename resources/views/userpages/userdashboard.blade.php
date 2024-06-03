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
    <div class="container mt-5">
        @foreach($products->groupBy('category_id') as $categoryId => $categoryProducts)
            <div class="mb-4">
                <h2 class="text-center mb-4">{{ $categoryNames[$categoryId] }}</h2>
                <div class="row">
                    @foreach($categoryProducts as $product)
                        <div class="col-lg-4 col-md-6 mb-4 border">
                            <div class="card h-25 shadow-sm">
                                <img src="{{ asset('asset/img/') }}/{{ $product->photo }}" class="card-img-top" alt="{{ $product->product_name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->product_name }}</h5>
                                    <p class="card-text">Price: ₹{{ $product->price }}</p>
                                    {{-- <p class="card-text">{{ $product->description }}</p> --}}
                                </div>
                                {{-- <div class="card-footer bg-transparent border-0">
                                    <a href="#" class="btn btn-primary btn-sm">View Details</a>
                                </div> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    
</div>



    
    
    <hr>
    {{-- <h2 class="text-center mt-5"><b>Products</b></h2>
    <div class="container">
        <div id="product-container" class="row"></div>
    </div> --}}
</div>









<hr class="mt-3">
































</div>
@include('template.footer')