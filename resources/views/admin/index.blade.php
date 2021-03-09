@extends("admin.layouts.master")
@section('title', 'Dashboard')
@section('css')
@endsection

@section('content')

    <h1 class="text-center text-secondary under my-4">Dashboard</h1>

    {{-- Cards Container --}}
    <div class="row justify-content-around container mx-auto">

        <div class="col-12 col-md-6 col-lg-4 p-0 m-0 mb-5">
            <div class="bg-white border rounded mx-4 py-3 shadow">
                <h2 class="card-title text-center">Users</h2>
                <h6 class="card-subtitle mb-2 text-muted text-center font-weight-bold display-1">{{ $numOfUsers }}</h6>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 p-0 m-0 mb-5">
            <div class="bg-white border rounded mx-4 py-3 shadow">
                <h2 class="card-title text-center">Roles</h2>
                <h6 class="card-subtitle mb-2 text-muted text-center font-weight-bold display-1">{{ $numOfRoles }}</h6>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 p-0 m-0 mb-5">
            <div class="bg-white border rounded mx-4 py-3 shadow">
                <h2 class="card-title text-center">Departments</h2>
                <h6 class="card-subtitle mb-2 text-muted text-center font-weight-bold display-1">{{ $numOfDepartments }}
                </h6>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 p-0 m-0 mb-5">
            <div class="bg-white border rounded mx-4 py-3 shadow">
                <h2 class="card-title text-center">Sections</h2>
                <h6 class="card-subtitle mb-2 text-muted text-center font-weight-bold display-1">{{ $numOfSections }}</h6>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 p-0 m-0 mb-5">
            <div class="bg-white border rounded mx-4 py-3 shadow">
                <h2 class="card-title text-center">Categories</h2>
                <h6 class="card-subtitle mb-2 text-muted text-center font-weight-bold display-1">{{ $numOfCategories }}
                </h6>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 p-0 m-0 mb-5">
            <div class="bg-white border rounded mx-4 py-3 shadow">
                <h2 class="card-title text-center">Products</h2>
                <h6 class="card-subtitle mb-2 text-muted text-center font-weight-bold display-1">{{ $numOfProducts }}</h6>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 p-0 m-0 mb-5">
            <div class="bg-white border rounded mx-4 py-3 shadow">
                <h2 class="card-title text-center">Orders</h2>
                <h6 class="card-subtitle mb-2 text-muted text-center font-weight-bold display-1">{{ $numOfOrders }}</h6>
            </div>
        </div>

    </div>

@endsection

@section('script')
@endsection
