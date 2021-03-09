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

    <h1 class="text-center text-secondary under mt-4 mb-2">{{ $order->order_number }} order</h1>
    <div class="responsive-table row m-0 p-0">
        <div class="my-5 col-12 col-md-8 col-lg-5 m-0 p-0">
            <table id="table1" class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Number</th>
                        <td>{{ $order->order_number }}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{ $order->date }}</td>
                    </tr>
                    <tr>
                        <th>Department</th>
                        <td>{{ $order->section->department->name }}</td>
                    </tr>
                    <tr>
                        <th>Section</th>
                        <td>{{ $order->section->name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="responsive-table">
        <div class="mb-5">
            <table id="table1" class="table table-bordered table-striped text-center">
                <thead class="bg-secondary">
                    <tr>
                        <th class="text-center text-white">Serial Number</th>
                        <th class="text-center text-white">Name</th>
                        <th class="text-center text-white">Comment</th>
                        <th class="text-center text-white">Quantity</th>
                        <th class="text-center text-white">Item Price</th>
                        <th class="text-center text-white">Items Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPrice = 0;
                        $counter = 1;
                        foreach ($order->products as $product) {
                            echo '<tr>
                                                        <td>' .
                                $counter .
                                '</td>
                                                        <td>' .
                                $product->name .
                                ' </td>
                                                        <td>' .
                                $product->pivot->comment .
                                ' </td>
                                                        <td>' .
                                $product->pivot->quantity .
                                ' </td>
                                                        <td>' .
                                $product->pivot->price .
                                ' </td>
                                                        <td>' .
                                $product->pivot->quantity * $product->pivot->price .
                                ' </td>
                                                    </tr>';
                                $totalPrice += $product->pivot->quantity * $product->pivot->price;
                                $counter++;
                        }
                    @endphp

                    <tr>
                        <th colspan="5">Total Price</th>
                        <td>{{ $totalPrice }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{route('order.index')}}" class="btn btn-secondary">Back to orders</a>
        </div>
    </div>
@endsection

@section('script')
@endsection
