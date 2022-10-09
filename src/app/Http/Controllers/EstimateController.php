<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Estimate\CreateRequest;

class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Estimate\CreateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $estimates = [
            "no" => $request->getEstimatenumber(),
            "subject" => $request->getSubject(),
            "buyer_id" => $request->getClients(),
            "contacted_by" => $request->getStaff(),
            "submited_at" => $request->getPublishdate(),
            "is_lost" => 0,
            "expirationed_at" => $request->getEffectivedate(),
            "remarks" => $request->getRemarks(),
            "created_by" => Auth::id(),
            "updated_by" => Auth::id(),
        ];
 

        // todo:今後商品登録処理作成
        return redirect()->route('estimatelist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function show(Estimate $estimate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function edit(Estimate $estimate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estimate $estimate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estimate $estimate)
    {
        //
    }
}
