<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
</head>
<body>
  <div class="container text-center p-3">
    <div class="col">
      <p>&copy; 2024 @copyrights</p>
      <!-- <address>124, Pillayar kovil street,<br> chettiyarpatti-626 122.</address> -->
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <!----------------------------------------------- Carousel ----------------------------->
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
              }
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
  

    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('menuBtn').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        var content = document.getElementById('mainContent');
        sidebar.classList.toggle('hide');
        content.classList.toggle('shifted');
      });
    });



  @if (session('message'))
  <div class="alert alert-success flash-message text-center text-danger">
    {{ session('message') }}
  </div>
  @endif

    document.addEventListener('DOMContentLoaded', function() {
      setTimeout(function() {
        var flashMessages = document.querySelectorAll('.flash-message');
        flashMessages.forEach(function(flashMessage) {
          flashMessage.style.display = 'none';
        });
      }, 2000);
    });



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
  





function renderProducts(products) {
    const productContainer = document.getElementById('product-container');
    productContainer.innerHTML = '';

    // Group products by category name
    const groupedProducts = products.reduce((acc, product) => {
        // Check if category_name is defined
        if (product.category_name) {
            acc[product.category_name] = acc[product.category_name] || [];
            acc[product.category_name].push(product);
        }
        return acc;
    }, {});

    
    for (const [categoryName, productsInCategory] of Object.entries(groupedProducts)) {
        const categoryRow = document.createElement('div');
        categoryRow.classList.add('row', 'mb-2');
        categoryRow.innerHTML = `<div class="col"><h4>${category_name}</h4></div>`;
        productContainer.appendChild(categoryRow);

       
        const productRow = document.createElement('div');
        productRow.classList.add('row');
        productsInCategory.forEach(product => {
            const card = document.createElement('div');
            card.classList.add('col-6', 'col-md-3', 'mb-2','p-4', 'product-card');
            card.innerHTML = `
                <div class="card">
                    <img src="{{ asset('asset/img/') }}/${product.photo}" class="card-img-top" alt="${product.product_name}">
                    <div class="card-body">
                        <p class="card-title">${product.product_name}</p>
                        <p class="card-text">Price: ₹${product.price}</p>
                    </div>
                </div>
            `;
            productRow.appendChild(card);
        });
        productContainer.appendChild(productRow);
    }
}

renderProducts(products);

</script>
</body>
</html>
