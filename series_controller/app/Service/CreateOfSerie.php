<?php


namespace App\Service;


use App\Serie;
use Illuminate\Support\Facades\DB;

class CreateOfSerie
{
    public function createSerie(string $serieName, int $season_num, int $episode_num)
    {
        DB::beginTransaction(); # Same thing of
        $serie = Serie::create(['name'=>$serieName]);
        $this->createSeason($season_num, $serie, $episode_num);
        DB::commit();

        return $serie;
    }

    private function createSeason(int $season_num, $serie, int $episode_num): void
    {
        for ($i = 1; $i <= $season_num; $i++) {
            $season = $serie->seasons()->create(['number' => $i]);
            $this->createEpisode($episode_num, $season);
        }
    }

    private function createEpisode(int $episode_num, $season): void
    {
        for ($c = 1; $c <= $episode_num; $c++) {
            $season->episodes()->create(['number' => $c]);
        }
    }


}
