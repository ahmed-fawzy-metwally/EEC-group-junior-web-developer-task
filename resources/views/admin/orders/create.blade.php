@extends("admin.layouts.master")
@section('title', 'Create order')
@section('css')
@endsection

@section('content')
    <div class="mt-3 mb-2">
        @if (session()->has('success'))
            <div class="container alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>

    <h1 class="text-center text-secondary under mt-4 mb-2   ">New order</h1>
    <div class="row w-75 mx-auto mt-3">
        <div class="col-sm-12">
            <form action='{{ route('order.store') }}' method="POST" class="row">
                @csrf

                <div class="form-group mb-3 col-12 col-md-6 px-0">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror"
                        value="{{ old('date') }}">
                    <p class="validation-message text-danger" style="display: none">VALIDATION</p>
                </div>

                {{-- User select --}}
                <div class="form-group mb-3 col-12 col-md-6 px-0">
                    <label for="user">User</label>
                    <select name="user" id="user" class="custom-select">
                        <option value="null" disabled selected>Choose a user</option>
                        @foreach ($users as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                    <p class="validation-message text-danger" style="display: none">VALIDATION</p>
                </div>

                {{-- Department select --}}
                <div class="form-group mb-3 col-12 col-md-6 px-0">
                    <label for="department">Department</label>
                    <select name="department" id="department" class="custom-select">
                        <option value="null" disabled selected>Choose a department</option>
                        @foreach ($departments as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                    <p class="validation-message text-danger" style="display: none">VALIDATION</p>
                </div>

                {{-- Section select --}}
                <div class="form-group mb-3 col-12 col-md-6 px-0">
                    <label for="section">Section</label>
                    <select name="section" id="section" class="custom-select">
                        <option value="null" disabled selected>Choose a Section</option>
                    </select>
                    <p class="validation-message text-danger" style="display: none">VALIDATION</p>
                </div>


                {{-- Products --}}
                <h3 class="text-muted h1 mt-3 py-2 col-12">Products</h3>
                <hr>
                <div class="order-container">
                    <div class="order-products-container row col-12 shadow mt-4 mx-0">
                        {{-- Category select --}}
                        <div class="form-group mb-3 col-12 col-md-6 col-lg-4 px-0">
                            <label>Category</label>
                            <select name="category[]"
                                class="custom-select categories @error('category') is-invalid @enderror">
                                <option value="null" disabled selected>Choose a Category</option>
                                @foreach ($categories as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            <p class="validation-message text-danger" style="display: none">VALIDATION</p>
                        </div>

                        {{-- Product select --}}
                        <div class="form-group mb-3 col-12 col-md-6 col-lg-4 px-0">
                            <label>Product</label>
                            <select name="product[]]" class="custom-select products @error('product') is-invalid @enderror">
                                <option value="null" disabled selected>Choose a Product</option>
                            </select>
                            <p class="validation-message text-danger" style="display: none">VALIDATION</p>
                        </div>

                        {{-- Product Comment --}}
                        <div class="form-group mb-3 col-12 col-md-6 col-lg-4 px-0">
                            <label>Product Comment</label>
                            <textarea name="product-comment[]]" rows="1" placeholder="Comment"
                                class="form-control @error('product-comment') is-invalid @enderror">{{ old('product-comment.0') }}</textarea>

                            <p class="validation-message text-danger" style="display: none">VALIDATION</p>
                        </div>

                        {{-- Product quantity --}}
                        <div class="form-group mb-3 col-12 col-md-6 col-lg-4 px-0">
                            <label>Product Quantity</label>
                            <input type="number" min="1" name="product-quantity[]"
                                class="form-control products-quantity @error('product-quantity') is-invalid @enderror"
                                placeholder="Product Quantity" value="{{ old('product-quantity') }}">
                            <p class="validation-message text-danger" style="display: none">VALIDATION</p>
                        </div>


                        {{-- Product Price --}}
                        <div class="form-group mb-3 col-12 col-md-6 col-lg-4 px-0">
                            <label>Product Price</label>
                            <input name="product-price[]" placeholder="Price"
                                class="form-control products-price @error('product-price') is-invalid @enderror"
                                value="{{ old('product-price.0') }}">
                            <p class="validation-message text-danger" style="display: none">VALIDATION</p>
                        </div>

                        {{-- Total Product Quantity Price --}}
                        <div class="form-group mb-3 col-12 col-md-6 col-lg-4 px-0">
                            <label>Total Product Quantity Price</label>
                            <input name="product-total-quantity-price[]" disabled placeholder="Total Quantity Price"
                                class="form-control @error('product-total-quantity-price') is-invalid @enderror"
                                value="{{ old('product-total-quantity-price.0') }}">
                            <p class="validation-message text-danger" style="display: none">VALIDATION</p>
                        </div>

                    </div>
                </div>

                <div class="col-12 px-0">
                    <a href="javascript:" id="add-product" class=" btn btn-dark mb-3 col-12 col-md-6 col-lg-3 mt-3">+Add
                        Product To Order</a>
                </div>

                <input type="submit" value="Create Order" id="oredr-submit" class="btn btn-success mb-3">
                <p class="validation-message text-danger ml-5" style="display: none">VALIDATION</p>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('js/ajax-requests.js') }}"></script>
    <script src="{{ asset('js/order.js') }}"></script>
@endsection
