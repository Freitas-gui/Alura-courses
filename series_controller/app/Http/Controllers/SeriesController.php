<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Serie;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = Serie::query()->orderBy('name')->get();

        $message = $request->session()->get('message');


        return view('series.index',compact('series', 'message'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3'
        ]);

        $serie = Serie::create($request->all());
        $request->session()->flash(
            "message",
            "Serie {$serie->id} created with success, name = {$serie->name}"
        );

        return redirect()->route('index');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash(
            "message",
            "Serie deleted with success"
        );

        return redirect()->route('index');
    }
}
