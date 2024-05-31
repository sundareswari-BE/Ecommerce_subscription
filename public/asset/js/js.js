
    $(document).ready(function() {
        $(".buy-button").click(function() {
            var amount = $(this).data("amount");
            $("#subscription-amount-input").val(amount);
            $("#formContainer").show();
        });

        // Function to style buttons
        function styleButtons() {
            var purchasedSubscriptions = @json($purchasedSubscriptions);
            var buyButtons = document.querySelectorAll('.buy-button');

            buyButtons.forEach(function(button) {
                var amount = button.getAttribute('data-amount');
                if (purchasedSubscriptions.includes(amount)) {
                    button.classList.add('btn', 'btn-light', 'disabled');
                    button.innerHTML = '<del>' + button.innerHTML + '</del>';
                } else {
                    button.classList.add('btn', 'btn-primary');
                }
            });
        }

        // Call the function to style buttons on page load
        styleButtons();

        // Show modal if subscription limit is reached
       
    });
