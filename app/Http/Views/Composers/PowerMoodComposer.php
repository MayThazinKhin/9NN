<?php

namespace App\Http\Views\Composers;

use App\Models\PowerMood;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class PowerMoodComposer
{



    public function __construct()
    {
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {   $mee_pyat = false;
        $latest_power = PowerMood::where('end_date',null)->first();
        if($latest_power) $mee_pyat = true;
        $view->with('mee_pyat', $mee_pyat );
    }
}
