<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * return the related sections.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Array of \Illuminate\Http\Products
     */
    public function getAllrelatedSections(Request $request)
    {
        $department = Department::find($request->department);
        if (is_null($department))
            return [];
        else
            return $department->sections;
    }

    /**
     * return the status if Department founded or not.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Boolean
     */
    public function checkDepartmentFounded(Request $request)
    {
        $department = Department::find($request->department);
        if (is_null($department))
            return ['status' => false];
        else
            return ['status' => true];
    }
}
