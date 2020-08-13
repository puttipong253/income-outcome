<?php

namespace App\Http\Controllers;
use App\Models\IncomeOutcome;
use Illuminate\Http\Request;

class IncomeOutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return IncomeOutcome::get();
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
    public function store(Request $request)
    {
        $incomeOutcome = new IncomeOutcome([
            'date' => $request->input('date'),
            'status' => $request->input('status'),
            'count' => $request->input('count'),
            'description' => $request->input('description'),
            'balance' => $request->input('balance')
        ]);
        $incomeOutcome->save();
        return $incomeOutcome;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return IncomeOutcome::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $incomeOutcome = IncomeOutcome::find($id);
        $incomeOutcome->date = $request->input('date');
        $incomeOutcome->status = $request->input('status');
        $incomeOutcome->count = $request->input('count');
        $incomeOutcome->description = $request->input('description');
        $incomeOutcome->balance = $request->input('balance');
        $incomeOutcome->save();
        return $incomeOutcome;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incomeOutcome = IncomeOutcome::find($id);
        $incomeOutcome->destroy($id);
        return 'delete successfuly';
    }
}
