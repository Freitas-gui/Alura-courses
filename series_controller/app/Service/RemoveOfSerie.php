<?php


namespace App\Service;

use Illuminate\Support\Facades\DB;
use App\{Serie, Season, Episode};


class RemoveOfSerie
{
    public function removeSerie(int $serieId): String
    {
        $nameSerie = '';
        # transaction to: All this columns are deleted together
        DB::transaction(function () use ($serieId, &$nameSerie){
            $serie = Serie::find($serieId);
            $nameSerie = $serie->name;
            $this->removeSeason($serie);
            $serie->delete();
        });
        return $nameSerie;
    }

    private function removeSeason($serie): void
    {
        $serie->seasons->each(function (Season $season) {
            $this->removeEpisodes($season);
            $season->delete();
        });

    }

    private function removeEpisodes(Season $season): void
    {
        $season->episodes->each(function (Episode $episode) {
            $episode->delete();
        });
    }
}
