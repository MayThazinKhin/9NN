<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Services\Period\PeriodFacade;
use App\Models\Period;
use App\Models\PowerMood;
use App\Models\Session;
use Illuminate\Http\Request;

class PowerMoodController extends Controller
{
    public function switch(Request $request)
    {
        if($request->input('switch') !== null) {
            $data['start_date'] = now();
            PowerMood::create($data);

        }
        if($request->input('switch') == null) {
            $data['end_date'] = now();
            $latest_power = PowerMood::where('end_date',null)->first();
            $latest_power->update($data);
        }
        $periods = Period::where('end_time',null)->get();
        foreach ($periods as $period){
            $data['session_id'] = $period->session_id;
            $data['period_id'] = $period->id;
            PeriodFacade::end($data);
            PeriodFacade::start($data);
        }
        return redirect()->back();
    }
}
