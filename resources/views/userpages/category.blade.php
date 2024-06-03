<!DOCTYPE html>
<html>
<head>
    <title>Categories and Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .list-group-item {
            font-size: 12px; /* Reduced font size for categories */
        }
        .card {
            font-size: 12px; /* Reduced font size for cards */
            border: none; /* Remove border for cards */
        }
        .card-title {
            font-size: 14px; /* Font size for product titles */
        }
        .card-img-top {
            max-height: 200px; /* Limit height of product images */
            object-fit: cover; /* Maintain aspect ratio for images */
        }
        .card-text {
            font-size: 12px; /* Font size for product descriptions and prices */
        }
    </style>
</head>
<body>
    @include('template.header')

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-12">
                <h2>Categories</h2>
                <div class="list-group list-group-horizontal">
                    @foreach ($categories as $category)
                        <a href="{{ route('categoryPage', ['category_id' => $category->id]) }}" class="list-group-item list-group-item-action">
                            {{ $category->category_name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h2>Products</h2>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('asset/img/' . $product->photo) }}" class="card-img-top" alt="Product Image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->product_name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="card-text">${{ $product->price }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
{{-- <div class="row">
    <div class="col-12">
        <h2>Products</h2>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('asset/img/' . $product->photo) }}" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->product_name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">${{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div> --}}
