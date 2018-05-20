<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Resources\TurnResource;
use App\Turn;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TurnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->input('from') !== null) {
            $start = Carbon::createFromTimestampMs($request->input('from'))->format('Y-m-d H:i:s');
        } else {
            $start = new Carbon('first day of this month');
        }

        if ($request->input('to') !== null) {
            $end = Carbon::createFromTimestampMs($request->input('to'))->format('Y-m-d H:i:s');
        } else {
            $end = new Carbon('first day of next month');
        }

        $turns = Turn::whereBetween('start', [$start, $end])->orderBy('start')->get();
        $turnsCollection = TurnResource::collection($turns);
        return view('turns.index', compact('turnsCollection','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $contact = $request->input('contact');
        $contacts = Contact::all();
        return view('turns.create', compact('contacts','contact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turn = new Turn();
        $turn->fill($request->all());
        $turn->save();
        $request->session()->flash('message', 'success|Turn Created!');

        return redirect()->route('turns.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turn $turn
     * @return \Illuminate\Http\Response
     */
    public function show(Turn $turn)
    {
        return view('turns.view', compact('turn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Turn $turn
     * @return \Illuminate\Http\Response
     */
    public function edit(Turn $turn)
    {
        $contacts = Contact::all();
        return view('turns.edit', compact('contacts','turn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Turn $turn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turn $turn)
    {
        $turn->fill($request->all());
        $turn->save();
        $request->session()->flash('message', 'success|Turn updated!');

        return redirect()->route('turns.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Turn $turn
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Turn $turn)
    {
        $turn->delete();
        $request->session()->flash('message', 'success|Turn Deleted!');

        return redirect()->route('turns.index');
    }

    /**
     * turns via API
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function turns(Request $request)
    {
        $start = Carbon::createFromTimestampMs($request->input('from'))->format('Y-m-d H:i:s');
        $end = Carbon::createFromTimestampMs($request->input('to'))->format('Y-m-d H:i:s');

        $turns = Turn::whereBetween('start', [$start, $end])->get();
        $turnsCollection = TurnResource::collection($turns);
        return response()->json(
            (object)[
                'success' => 1,
                'result' => $turnsCollection
            ]
        );
    }
}
