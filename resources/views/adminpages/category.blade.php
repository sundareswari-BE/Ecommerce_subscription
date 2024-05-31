@include('template.header')

<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Add Category Form</h2>
            <form method="POST" id="category-form" r>
                @csrf
                <div id="success-message" class="alert alert-success d-none"></div>
                <div id="error-message" class="alert alert-danger d-none"></div>
                <div class="form-group">
                    <label for="category_name" class="mt-3">New Category Name:</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" value="{{ old('category_name') }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3 w-100">Add Category</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#category-form').submit(function (event) {
            event.preventDefault();
            var formData = $(this).serialize();

            $('#error-message').hide().addClass('d-none');
            $('#success-message').hide().addClass('d-none');

            $.ajax({
                url: "{{ route('addcategory') }}",
                type: 'POST',
                data: formData,
                success: function (response) {
                    $('#success-message').text(response.success).removeClass('d-none').show();
                    $('#category_name').val(''); // Clear input after successful submission
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        for (var error in errors) {
                            errorMessage += errors[error][0] + '<br>';
                        }
                        $('#error-message').html(errorMessage).removeClass('d-none').show();
                    } else {
                        $('#error-message').text('An error occurred, please try again.').removeClass('d-none').show();
                    }
                }
            });
        });
    });
</script>
