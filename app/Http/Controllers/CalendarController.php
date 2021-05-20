<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Departement;

class CalendarController extends Controller
{
    public function calendar()
    {
        $epent = Event::has('departement')->get();//s('departement')->get();
    //  dd( $epent);
        return view('calendar',['epentlist'=>$epent]);
    }
}
