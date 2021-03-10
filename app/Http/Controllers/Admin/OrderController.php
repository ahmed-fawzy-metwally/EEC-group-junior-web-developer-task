<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Category;
use App\Models\Department;
use App\Models\Order;
use App\Models\Section;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        $departments = Department::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');

        return view('admin.orders.create', compact('users', 'departments', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date|after:yesterday',
            'user' => 'required|numeric',
            'department' => 'required|numeric',
            'section' => 'required|numeric',

            "category" => "required|array",
            'category.*' => 'required|numeric',

            "product" => "required|array",
            "product.*" => "required|numeric",

            'product-comment' => 'required|array',
            'product-comment.*' => 'nullable',

            'product-quantity.*' => 'required',
            'product-quantity' => 'required',

            'product-price' => 'required|array',
            'product-price.*' => 'required',
        ]);
        
        $order = Order::Create([
            'order_number' => Section::find($request->section)->name.'-'.(Order::where('section_id', $request->section)->count()+1).'-'.date("Y"),
            'date' => $request->date,
            'section_id' => $request->section,
            'user_id' => $request->user,
        ]);

        $numOfProducts = count($request->category);
        for ($i=0; $i < $numOfProducts ; $i++) { 
            DB::table('order_product')->insert([
                'product_id' => $request['product'][$i],
                'order_id' => $order->id,
                'quantity' => $request['product-quantity'][$i],
                'price' => $request['product-price'][$i],
                'comment' => $request['product-comment'][$i],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }

        return redirect()->back()->with(session()->flash('success', 'Order is Created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $orderNumber = $order->order_number;
        $order->delete();

        return redirect()->back()->with(session()->flash('success', $orderNumber . 'Order is Deleted successfully .'));
    }

    public function rules($request)
    {
        // dd($request->all());
        // dd($validator->fails());
        // Basic rules for one product
        $rules = [
            'date' => 'bail|required|date|after:yesterday',
            'user' => 'bail|required|numeric|min:1',
            'department' => 'bail|required|numeric|min:1',
            'section' => 'bail|required|numeric|min:1',

            'category' => 'bail|required|numeric|min:1',
            'product' => 'bail|required|numeric|min:1',
            'product-quantity' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'product-comment' => 'bail|nullable|min:3',
            'product-price' => 'bail|required|numeric|min:1',
            'product-total-quantity-price' => 'bail|required|numeric|min:1',
        ];

        // get only submitted data without token
        $requestData = $request->all();
        unset($requestData['_token']);

        // get added products more than one product
        $addedProduct = array_diff_key($requestData, $rules);
        dump($rules);
        //Add added products to rules
        foreach ($addedProduct as $key => $value) {
            $rules[$key] = 'bail|required|number|min:1';
        }
        return $rules;
    }
}
