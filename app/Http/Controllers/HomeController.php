<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Department;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allRoles = User::getRolesNumbers();

        // return Auth::user()->roles[0]->pivot;
        // return Department::find(3)->sections;
        // return Section ::find(3)->department;
        // return Product::find(6)->category;
        // return Category::find(1)->products;

        return view('admin.index',compact('allRoles'));
    }
}
