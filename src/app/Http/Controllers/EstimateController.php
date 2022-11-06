<?php

namespace App\Http\Controllers;

use App\Http\Requests\Estimate\CreateRequest;
use App\Models\Estimate;
use App\Services\Command\EstimateCommandService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EstimateController extends Controller
{
    private EstimateCommandService $estimateCommandService;

    public function __construct(EstimateCommandService $estimateCommandService)
    {
        $this->estimateCommandService = $estimateCommandService;
    }

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
     * @return View
     */
    public function create(): View
    {
        return view('estimate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        // Estimateモデル呼び出し
        $this->estimateCommandService->create($request);

        // todo:今後商品登録処理作成
        return redirect()->route('estimate.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Estimate $estimate
     * @return \Illuminate\Http\Response
     */
    public function show(Estimate $estimate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Estimate $estimate
     * @return \Illuminate\Http\Response
     */
    public function edit(Estimate $estimate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Estimate $estimate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estimate $estimate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Estimate $estimate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estimate $estimate)
    {
        //
    }
}
