@extends("admin.layouts.master")
@section('title', 'All orders')
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

    <h1 class="text-center text-secondary under mt-4 mb-2">All orders</h1>

    @if (count($orders))
        <div class="responsive-table">
            <div class="my-5">
                <table id="table1" class="table table-bordered table-striped">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="text-center text-white">Number</th>
                            <th class="text-center text-white">Date</th>
                            <th class="text-center text-white">Department</th>
                            <th class="text-center text-white">Section</th>
                            <th class="text-center text-white">Items Category</th>
                            <th class="text-center text-white">Items</th>
                            <th class="text-center text-white"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->date }}</td>
                                <td>{{ $order->section->department->name }}</td>
                                <td>{{ $order->section->name }}</td>
                                <td>
                                    @php
                                        $categories = [];
                                        foreach ($order->products as $product) {
                                            array_push($categories, $product->category->name);
                                        }
                                        $categories = array_unique($categories);
                                        $categories = implode(',<br>', $categories);
                                    @endphp
                                    {!! $categories !!}
                                </td>
                                <td>
                                    @php
                                        $products = [];
                                        foreach ($order->products as $product) {
                                            array_push($products, $product->name . ' (' . $product->pivot->quantity . ' * ' . $product->pivot->price . ')');
                                        }
                                        $products = implode(',<br>', $products);
                                    @endphp
                                    {!! $products !!}
                                </td>

                                <td>
                                    <a href="{{route('order.show',$order->id)}}" class="d-inline-block btn btn-primary mx-1 mb-2">View</a>
                                    <a href="{{route('order.edit',$order->id)}}" class="d-inline-block btn btn-warning mx-1 mb-2">Edit</a>
                                    <form class="d-inline-block" action="{{ route('order.destroy', $order->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="d-inline-block btn btn-danger mx-1 mb-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="w-50 mx-auto alert alert-danger">There is no Orders</div>
    @endif
    <div class="row justify-content-center">
        <a href="{{route('order.create')}}" class="btn btn-primary col-6 col-md-3 col-lg-2 mb-3">New Order</a>
    </div>
@endsection

@section('script')
@endsection
