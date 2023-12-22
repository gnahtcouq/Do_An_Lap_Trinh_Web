<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/slick/slick.min.js"></script>
<script src="js/main.js"></script>

<script>
    $(document).ready(function() {
        $('.btn-minus, .btn-plus').on('click', function(e) {
            e.preventDefault();
            var masp = $(this).data('masp');
            var action = $(this).data('action');

            $.ajax({
                type: 'GET',
                url: 'controller/themhangcontroller.php',
                data: {
                    masp: masp,
                    action: action
                },
                success: function() {
                    // Reload the page or update the cart section as needed
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>

<script>
    function validateForm() {
        // Get the selected payment method
        var paymentMethod = document.querySelector('input[name="payment"]:checked');

        // Check if a payment method is selected
        if (!paymentMethod) {
            alert('Vui lòng chọn phương thức thanh toán trước khi đặt hàng.');
            return false; // Prevent form submission
        }

        // If the payment method is selected, allow form submission
        return true;
    }
</script>