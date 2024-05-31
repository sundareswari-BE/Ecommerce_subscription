<hr class="mt-3">

<div class="container text-center p-3 ">
  <div class="col">
    <p>@copyrights-2024</p>
    <!-- <address>124, Pillayar kovil street,<br>
                 chettiyarpatti-626 122.
                </address> -->

  </div>

</div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!------------------------ carosel ----------------------------->
<script>
  $(document).ready(function() {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop: true,
       
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2000, 
        responsive: {
            0: {
                items: 1
            },
          
        }
    });
});


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

  styleButtons();
</script>
<!------------------------ Dashboard menu toggle ----------------------------->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('menuBtn').addEventListener('click', function() {
      var sidebar = document.getElementById('sidebar');
      var content = document.getElementById('mainContent');
      sidebar.classList.toggle('hide');
      content.classList.toggle('shifted');
    });
  });
</script>


<!------------------------ time out for alerts ----------------------------->
@if (session('message'))
<div class="alert  alert-success flash-message text-center text-danger">
    {{ session('message') }}
</div>
@endif


<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var flashMessages = document.querySelectorAll('.flash-message');
            flashMessages.forEach(function(flashMessage) {
                flashMessage.style.display = 'none';
            });
        }, 2000); 
    });
</script>
<!------------------------ Subscribtion-page-button disable ----------------------------->
<script>
        $(document).ready(function() {
            $(".buy-button").click(function() {
                var amount = $(this).data("amount");
                $("#subscription-amount-input").val(amount);
                $("#subscriptionModal").modal('show');
            });

            function styleButtons() {
                var activeSubscription = <?php echo json_encode($activeSubscription); ?>;
                var reachedUpgradeDate = <?php echo json_encode($reachedUpgradeDate); ?>;

                var buyButtons = document.querySelectorAll('.buy-button');

                buyButtons.forEach(function(button) {
                    if (activeSubscription) {
                        button.classList.remove('btn-primary');
                        button.classList.add('btn-light', 'disabled');
                        button.setAttribute('disabled', true);
                        button.innerHTML = '<del>' + button.innerHTML + '</del>';
                    } else if (reachedUpgradeDate) {
                        button.classList.remove('btn-light', 'disabled');
                        button.classList.add('btn-primary');
                        button.removeAttribute('disabled');
                        button.innerHTML = button.innerText;
                    } else {
                        button.classList.add('btn-primary');
                    }
                });
            }

            styleButtons();
        });
    </script>
<!------------------------ Dashboard showing product ----------------------------->
<script>
    const products = <?php echo json_encode($products); ?>;

    function renderProducts(products) {
        const productContainer = document.getElementById('product-container');
        productContainer.innerHTML = '';

        products.forEach(product => {
            const card = document.createElement('div');
            card.classList.add('col-md-4', 'mb-4', 'product-card');
            card.innerHTML = `
                <div class="card">
                    <img src="{{ asset('asset/img/') }}/${product.photo}" class="card-img-top" alt="${product.product_name}">
                    <div class="card-body">
                        <h5 class="card-title">${product.product_name}</h5>
                        <p class="card-text">Price: ₹${product.price}</p>
                        <button class="btn btn-primary buy" data-amount="${product.price}">Buy Now</button>
                    </div>
                </div>
            `;
            productContainer.appendChild(card);
        });
    }

    renderProducts(products);
</script>