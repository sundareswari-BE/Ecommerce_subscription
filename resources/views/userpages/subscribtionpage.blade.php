<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Plans</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
@if (session('message'))
<div class="alert  alert-success flash-message text-center text-success">
    {{ session('message') }}
</div>
@endif
@if (session('success'))
<div class="alert alert-success flash-message text-center text-success mx-5">
    {{ session('success') }}
</div>
@endif
@if (session('error'))
<div class=" alert alert-danger flash-message text-center text-danger mx-5">
    {{ session('error') }}
</div>
@endif

    <a href="{{ route('logout') }}" method="POST">Logout</a>


    <div class="container mt-5">
        <hr>
        <h2 class="text-center mt-5"><b>Pricing and Plans</b></h2>
        <h5 class="text-center mt-5">View our straightforward ecommerce website pricing. Once you're happy click "Pay & Activate"<br> to complete the activation process with the chosen plan and we'll do the rest!</h5>
        <div class="row mt-5">
            <!-- Subscription Cards -->
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title"><b>Single</b></h5>
                        <p class="card-text">₹ 2000</p>
                        <p>A simple and affordable plan for small businesses</p>
                        <hr>
                        <p><b>Basic plan includes:</b></p>
                        <p><i class="fa-solid fa-circle-check"></i> 30% Discount</p>
                        <p><i class="fa-solid fa-circle-check"></i> Free exchange</p>
                        <p><i class="fa-solid fa-circle-check"></i> Return charge free</p>
                        <button class="btn btn-primary buy-button" data-amount="2000">Pay & Activate</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title"><b>Multiple</b></h5>
                        <p class="card-text">₹ 3000</p>
                        <p>A simple and affordable plan for medium businesses</p>
                        <hr>
                        <p><b> Basic plus includes:</b></p>
                        <p><i class="fa-solid fa-circle-check"></i> 50% Discount</p>
                        <p><i class="fa-solid fa-circle-check"></i> Free exchange</p>
                        <p><i class="fa-solid fa-circle-check"></i> Return charge free</p>
                        <button class="btn btn-primary buy-button" data-amount="3000">Pay & Activate</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title"><b>Enterprise</b></h5>
                        <p class="card-text">₹ 5000</p>
                        <p>This standard plan is geared toward growing businesses</p>
                        <hr>
                        <p><b>Standard plan includes:</b></p>
                        <p><i class="fa-solid fa-circle-check"></i> 50% Discount</p>
                        <p><i class="fa-solid fa-circle-check"></i> Free shipping</p>
                        <p><i class="fa-solid fa-circle-check"></i> Free exchange</p>
                        <p><i class="fa-solid fa-circle-check"></i> Return charge free</p>
                        <button class="btn btn-primary buy-button" data-amount="5000">Pay & Activate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Subscription Form Modal -->
    <div class="modal fade" id="subscriptionModal" tabindex="-1" role="dialog" aria-labelledby="subscriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="subscriptionModalLabel">Subscribe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="subscription-form" method="post" action="{{ route('subscribtionformstoredata') }}">
                        {{ csrf_field() }}
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="subscriber-name" name="subscriber-name" value="{{ $userData->name }}" readonly>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="sub" class="form-label">Subscription:</label>
                            <input type="text" class="form-control" id="subscription-amount-input" name="subscription_amount" value="" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Subscription Limit Reached Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Alert</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your Subscription is reached...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @include('template.footer')

   
<script>
    function styleButtons() {
    var activeSubscription = <?php echo json_encode($activeSubscription); ?>;
    var reachedUpgradeDate = <?php echo json_encode($reachedUpgradeDate); ?>;

    var upgradeButton = document.querySelector('.upgrade_button');

    if (activeSubscription) {
      upgradeButton.style.display = 'none';
    } else if (reachedUpgradeDate) {
      upgradeButton.style.display = 'block';
    } else {
      upgradeButton.classList.add('btn-primary');
    }
  }
  </script>
