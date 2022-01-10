<?php

namespace App\Http\Controllers\Estimate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function write1(Request $request)
    {
        $data1 = $request->all();
        var_dump($data1);
        return view('/estimate/testform', compact('data1'));
    }
}