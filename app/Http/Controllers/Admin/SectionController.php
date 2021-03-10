<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * return the status if section founded or not.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Boolean
     */
    public function checkSectionFounded(Request $request)
    {
        $section = Section::find($request->section);
        if (is_null($section))
            return ['status' => false];
        else
            return ['status' => true];
    }
}
