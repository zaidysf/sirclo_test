<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WeightLog;
use Validator;
use DB;

class WeightLogController extends Controller
{
    public function index()
    {
    	$weight_logs = WeightLog::orderBy('log_date', 'DESC')->get();
    	$weight_stats = WeightLog::select(DB::raw('SUM(max) AS max, SUM(min) AS min, SUM(variance) AS variance, COUNT(*) AS counted'))->first();
        return view('weight_log.index',compact('weight_logs', 'weight_stats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weight_log.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'log_date' => 'required|date|unique:weightlog',
	        'max' => 'required|numeric|min:'.$request->min,
	        'min' => 'required|numeric|max:'.$request->max
        ]);

        if ($validator->fails()) {
            return redirect()
            			->route('weight-log.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $request->request->add(['variance' => $request->max - $request->min]);
        
        WeightLog::create($request->all());
        return redirect()
        			->route('weight-log.index')
                	->with('success','WeightLog created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(WeightLog $weight_log)
    {
        return view('weight_log.show',compact('weight_log'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(WeightLog $weight_log)
    {
        return view('weight_log.edit',compact('weight_log'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,WeightLog $weight_log)
    {
        $validator = Validator::make($request->all(), [
            'log_date' => 'required|date|unique:weightlog',
	        'max' => 'required|numeric|min:'.$request->min,
	        'min' => 'required|numeric|max:'.$request->max
        ]);

        if ($validator->fails()) {
            return redirect()
            			->route('weight-log.edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $request->request->add(['variance' => $request->max - $request->min]);

        $weight_log->update($request->all());
        return redirect()->route('weight-log.index')
                        ->with('success','WeightLog updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WeightLog::destroy($id);
        return redirect()->route('weight-log.index')
                        ->with('success','WeightLog deleted successfully');
    }
}
