<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Department;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $numOfUsers = User::count();
        $numOfRoles = Role::count();
        $numOfDepartments = Department::count();
        $numOfSections = Section::count();
        $numOfCategories = Category::count();
        $numOfProducts = Product::count();
        $numOfOrders = Order::count();

        return view('admin.index', compact('numOfUsers', 'numOfRoles', 'numOfDepartments', 'numOfSections', 'numOfCategories', 'numOfProducts', 'numOfOrders'));
    }
}
