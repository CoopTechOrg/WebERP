<?php

namespace App\Http\Controllers\Estimate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function createEstimate(Request $request)
    {
        $estimateData = $request->all();
        return view('/estimate/show', compact('estimateData'));
    }
}