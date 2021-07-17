<?php

namespace App\Controllers\Status;

use App\Controllers\BaseController;

class BelumTamat extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $keyword = $this->request->getVar('search');

        $resultsearch = $this->db->table('komikmanga')->select("*")->where("status IN ('Belum Tamat') AND judul LIKE '$keyword%'")->orderBy("judul", "RANDOM")->get()->getResultArray();

        $databelum_tamat = $this->db->table('komikmanga')->select("*")->whereIn("status", ['Belum Tamat'])->orderBy("judul", "RANDOM")->get()->getResultArray();

        $tamat = $this->db->table('komikmanga')->select("status")->whereIn("status", ['Tamat'])->whereIn("judul", ["$keyword"])->get()->getResultArray();

        $genre = $this->db->table('genremanga')->select("*")->join('komikmanga', 'komikmanga.slug = genremanga.slug', 'inner')->get()->getResultArray();
        $getmangagenre = [];
        foreach ($genre as $gen) {
            $genr = "";
            $genrejudul = $this->db->table('genremanga')->select("*")->join('komikmanga', 'komikmanga.slug = genremanga.slug', 'inner')->whereIn("komikmanga.slug", [$gen['slug']])->get()->getResultArray();
            foreach ($genrejudul as $g) {
                $genr .= $g['genre'] . ", ";
            }
            $genr = substr_replace($genr, "", -1);
            $genr = substr_replace($genr, "", -1);
            array_push($getmangagenre, [
                $gen['slug'] => $genr
            ]);
        }

        for ($i = 0; $i <= count($getmangagenre) - 1; $i++) {
            if ($i >= 0 and $i <= count($getmangagenre)) {
                if ($getmangagenre[$i] === $getmangagenre[$i + 1]) {
                    unset($getmangagenre[$i]);
                }
            } else {
                break;
            }
        }
        $lst = [];
        foreach (array_values($getmangagenre) as $gt) {
            array_push($lst, [
                "genre" => $gt
            ]);
        }
        $lst = json_encode($lst);

        if ($keyword === NULL or $keyword === '' or empty($keyword)) {
            $blm = [
                "title" => "Komik Manga Status Belum Tamat",
                "belumtamat" => $databelum_tamat,
                "hasil" => "tidakcaridata",
                "search" => $keyword,
                "tamat" => "nggak",
                "genre" => $lst
            ];
            return view('status/belumtamat', $blm);
        } elseif (!empty($keyword) and !empty($resultsearch)) {
            $blm = [
                "title" => "Komik Manga Status Belum Tamat",
                "belumtamat" => $resultsearch,
                "hasil" => "cariditemukan",
                "search" => $keyword,
                "tamat" => "nggak",
                "genre" => $lst
            ];
            return view('status/belumtamat', $blm);
        } elseif (!empty($keyword) and empty($resultsearch)) {
            $blm = [
                "title" => "Komik Manga Status Belum Tamat",
                "belumtamat" => $resultsearch,
                "hasil" => "caritidakditemukan",
                "search" => $keyword,
                "tamat" => $tamat,
                "genre" => $lst
            ];
            return view('status/belumtamat', $blm);
        }
    }
}
