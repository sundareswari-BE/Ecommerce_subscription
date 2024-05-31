@include('template.header')


<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Add Category Form</h2>
            <form method="POST" id="category-form" action="{{ route('addcategory')}}">
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


