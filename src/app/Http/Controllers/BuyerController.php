<?php

namespace App\Http\Controllers;

use App\Services\Command\BuyerCommandService;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    //

    private BuyerCommandService $buyerCommandService;

    public function __construct(BuyerCommandService $buyerCommandService)
    {
        $this->buyerCommandService = $buyerCommandService;
    }

    public function create()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $this->buyerCommandService->create(
            $request->email,
            $request->tel,
            $request->familyName,
            $request->givenName,
            $request->prefectureId,
            $request->postalCode,
            $request->city,
            $request->town,
            $request->building,
            $request->remarks
        );

        return redirect()->route('');
    }
}
