<?php


namespace App\Http\Controllers;


use App\Episode;
use App\Http\Requests\SeriesFormRequest;
use App\Season;
use App\Service\CreateOfSerie;
use App\Service\RemoveOfSerie;
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

    public function store(SeriesFormRequest $request, CreateOfSerie $createOfSerie)
    {
        $serie = $createOfSerie->createSerie($request->name, $request->season_num, $request->episode_num);
        $request->session()->flash(
            "message",
            "Serie {$serie->id} created with success, name = {$serie->name}"
        );

        return redirect()->route('index');
    }

    public function destroy(Request $request, RemoveOfSerie $removeOfSerie)
    {
        $nameSerie = $removeOfSerie->removeSerie($request->id);
        $request->session()->flash(
            "message",
            "Serie {$nameSerie}  deleted with success"
        );

        return redirect()->route('index');
    }

    public function editName(int $id, Request $request)
    {
        $newName = $request->name;
        $serie = Serie::find($id);
        $serie->name = $newName;
        $serie->save();
    }
}
