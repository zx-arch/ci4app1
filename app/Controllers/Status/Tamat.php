<?php

namespace App\Controllers\Status;

use App\Controllers\BaseController;

class Tamat extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $keyword = $this->request->getVar('search');
        $resultsearch = $this->db->table('komikmanga')->select("*")->where("status IN ('Tamat') AND judul LIKE '$keyword%'")->orderBy("judul", "RANDOM")->get()->getResultArray();

        $datatamat = $this->db->table('komikmanga')->select("*")->whereIn("status", ['Tamat'])->orderBy("judul", "RANDOM")->get()->getResultArray();

        // $acakkomik = [];
        // function randomGen($min, $max, $quantity)
        // {
        //     $numbers = range($min, $max);
        //     shuffle($numbers);
        //     return array_slice($numbers, 0, $quantity);
        // }

        // $randomindex = randomGen(0, count($datatamat) - 1, count($datatamat) + 1);
        // foreach ($randomindex as $r) {
        //     array_push($acakkomik, $datatamat[$r]);
        // }

        $belumtamat = $this->db->table('komikmanga')->select("status")->whereIn("status", ['Belum Tamat'])->whereIn("judul", ["$keyword"])->get()->getResultArray();

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
            $baru = [
                "title" => "Komik Manga Status Tamat",
                "tamat" => $datatamat,
                "hasil" => "tidakcaridata",
                "search" => $keyword,
                "belumtamat" => "sudah",
                "genre" => $lst
            ];
            return view('status/tamat', $baru);
        } elseif (!empty($keyword) and !empty($resultsearch)) {
            $baru = [
                "title" => "Komik Manga Status Tamat",
                "tamat" => $resultsearch,
                "hasil" => "cariditemukan",
                "search" => $keyword,
                "belumtamat" => "sudah",
                "genre" => $lst
            ];
            return view('status/tamat', $baru);
        } elseif (!empty($keyword) and empty($resultsearch)) {
            $baru = [
                "title" => "Komik Manga Status Tamat",
                "tamat" => $resultsearch,
                "hasil" => "caritidakditemukan",
                "search" => $keyword,
                "belumtamat" => $belumtamat,
                "genre" => $lst
            ];
            return view('status/tamat', $baru);
        }
    }
}
