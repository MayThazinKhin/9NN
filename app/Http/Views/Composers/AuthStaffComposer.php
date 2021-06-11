<?php

namespace App\Http\Views\Composers;

use App\Models\PowerMood;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class AuthStaffComposer
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
    {   $staff = Auth::user()->name;

        $view->with('staff', $staff );
    }
}
