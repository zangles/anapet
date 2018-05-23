<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Turn;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalTurns = Turn::all()->count();
        $totalContacts = Contact::all()->count();

        $twoMonth = Carbon::now()->firstOfMonth()->subMonth(2)->format('Y-m-d H:i:s');
        $oneMonth = Carbon::now()->firstOfMonth()->subMonth(1)->format('Y-m-d H:i:s');
        $startMonth = Carbon::now()->firstOfMonth()->format('Y-m-d H:i:s');

        $totalTurns2Month = Turn::whereBetween('start', [$twoMonth, $oneMonth])->count();
        $totalTurns1Month = Turn::whereBetween('start', [$oneMonth, $startMonth])->count();

        if ($totalTurns2Month != 0) {
            $incrementoTurnos = $totalTurns1Month - $totalTurns2Month;
            $porcentajeTurnos = number_format(($incrementoTurnos / $totalTurns2Month) * 100, 2);
        } else {
            $porcentajeTurnos = 0;
        }

        $totalContacts2Month = Contact::whereBetween('created_at', [$twoMonth, $oneMonth])->count();
        $totalContacts1Month = Contact::whereBetween('created_at', [$oneMonth, $startMonth])->count();

        if ($totalContacts2Month != 0) {
            $incrementoContactos = $totalContacts1Month - $totalContacts2Month;
            $porcentajeContactos = number_format(($incrementoContactos / $totalContacts2Month) * 100, 2);
        } else {
            $porcentajeContactos = 0;
        }

        return view('dashboard.index', compact('totalTurns1Month', 'totalContacts1Month','porcentajeContactos', 'porcentajeTurnos'));
    }
}
