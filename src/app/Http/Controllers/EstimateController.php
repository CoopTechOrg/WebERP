<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use Illuminate\Http\Request;

// DB操作処理準備
use Illuminate\Support\Facades\DB;
// Authファザード使用準備
use Illuminate\Support\Facades\Auth;
// リクエストクラス使用準備
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // 登録処理
    public function store(CreateRequest $request)
    {
        // 入力したデータを取得
        // カラムに紐づけ
        /***** estimatesテーブル部 *****/
        $estimates = [
            "no" => $request->estimate_number,	
            "subject" => $request->subject,
            "buyer_id" => $request->clients,
            "contacted_by" => $request->staff,
            "submited_at" => $request->publish_date,
            "is_lost" => 0,
            "expirationed_at" => $request->effective_date,
            "remarks" => $request->remarks,
            "created_by" => Auth::id(),
            "updated_by" => Auth::id(),	
        ];

		
        // DB登録処理
        DB::table("estimates")->insert($estimates);

        /***********商品テーブルに登録する処理作る***********/	
        // リダイレクト(後でリダイレクト先変更する)
        return view("estimate.index");
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
