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
        // Estimateモデル呼び出し
        $estimates = new Estimate();
        $estimates->no = $request->getEstimatenumber();
        $estimates->subject = $request->getSubject();
        $estimates->buyer_id = $request->getClients();
        $estimates->contacted_by = $request->getStaff();
        $estimates->submitted_at = $request->getPublishdate();
        $estimates->is_lost = 0;
        $estimates->expired_at = $request->getEffectivedate();
        $estimates->remarks = $request->getRemarks();
        $estimates->created_by = Auth::id();
        $estimates->updated_by = Auth::id();
        $estimates->save(); 

        // todo:今後商品登録処理作成
        return redirect()->route('estimate.index');
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
