<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season, Request $request)
    {
        $episodes = $season->episodes;
        $seasonId = $season->id;
        $message = $request->session()->get('message');


        return view('episodes.index', compact('episodes','seasonId', 'message'));
    }

    public function watch(Season $season, Request $request)
    {
        $episodesWatched = $request->episodes;
        if($episodesWatched==null)
            $episodesWatched=[];
        $season->episodes->each(function (Episode $episode)
            use ($episodesWatched){
            $episode->watched = in_array(
                $episode->id,
                $episodesWatched
            );
        });
        $season->push();
        $request->session()->flash('message', 'Episodes marked as watched');

        return redirect()->back();
    }
}
