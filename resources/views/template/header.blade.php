<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce with subscription</title>
  <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/d8bcc82f5b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <!-- Sidebar -->
  <div class="sidebar px-4" id="sidebar">
    <h2 class="text-center text-light mb-4">Categories</h2>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link text-light" href="#"><i class="fa-solid fa-gauge-simple-high"></i> Dashboard</a>
        <hr class="m-0 text-light">
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="#"><i class="fa-solid fa-layer-group"></i> Category</a>
        <hr class="m-0 text-light">
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="#"><i class="fa-solid fa-tag"></i> Products</a>
        <hr class="m-0 text-light">
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="#"><i class="fa-solid fa-bookmark"></i> Your Cart</a>
        <hr class="m-0 text-light">
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="#"><i class="fa-solid fa-cart-shopping"></i> Your Orders</a>
        <hr class="m-0 text-light">
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
      </li>

    </ul>

    <div class="subscription-box">
      <a class="nav-link text-light mt-3 upgrade_button  subscription-link" href=" {{ route('subcribtionformshowdata') }}">

        <i class="fa-solid fa-wand-magic-sparkles"></i>Upgrade Your Subscription</a>

    </div>

  </div>

  <div class="content " id="mainContent">
 
<!------------------------------------------- top-nav ------------------------------------------>


<nav class="navbar navbar-expand-sm navbar-light bg-dark dashboard-nav p-3">
    <div class="container-fluid">
        <i class="fa-solid fa-bars text-light me-5" id="menuBtn"></i>
        <div class="collapse navbar-collapse" id="navbarNav">
            <form class="d-flex">
                <input class="form-control me-2 search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light searchbtn" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<!------------------------------------------- Alerts ------------------------------------------>
@if (session('message'))
<div class="flash-message" class="text-center text-primary">
    {{ session('message') }}
</div>
@endif
