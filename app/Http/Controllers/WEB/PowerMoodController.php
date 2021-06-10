<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\PowerMood;
use Illuminate\Http\Request;

class PowerMoodController extends Controller
{
    public function switch(Request $request)
    {

        if($request->input('switch') !== null)
        {
            $data['start_date'] = now();
            PowerMood::create($data);
        }
        if($request->input('switch') == null)
        {
            $data['end_date'] = now();
            $last_row = PowerMood::latest()->first();
            $last_row->update($data);
        }

        return redirect()->back();
    }
}
