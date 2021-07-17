<?php

namespace App\Controllers\Kategori;

use App\Controllers\BaseController;

class Terpopuler extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $keyword = $this->request->getVar('search');

        $resultsearch = $this->db->table('komikmanga')->select("*")->where("rating > 7 AND judul LIKE '$keyword%'")->orderBy("rating", "DESC")->get()->getResultArray();

        $dataterpopuler = $this->db->table('komikmanga')->select("*")->where("rating > 7")->orderBy("rating", "DESC")->get()->getResultArray();

        $terendah = $this->db->table('komikmanga')->select("*")->where("rating <= 7")->whereIn("judul", ["$keyword"])->get()->getResultArray();
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
                "title" => "Komik Manga Terpopuler",
                "terpopuler" => $dataterpopuler,
                "hasil" => "tidakcaridata",
                "search" => $keyword,
                "terendah" => "nggak",
                "genre" => $lst
            ];
            return view('kategori/terpopuler', $baru);
        } elseif (!empty($keyword) and !empty($resultsearch)) {
            $baru = [
                "title" => "Komik Manga Terpopuler",
                "terpopuler" => $resultsearch,
                "hasil" => "cariditemukan",
                "search" => $keyword,
                "terendah" => "nggak",
                "genre" => $lst
            ];
            return view('kategori/terpopuler', $baru);
        } elseif (!empty($keyword) and empty($resultsearch)) {
            $baru = [
                "title" => "Komik Manga Terpopuler",
                "terpopuler" => $resultsearch,
                "hasil" => "caritidakditemukan",
                "search" => $keyword,
                "terendah" => $terendah,
                "genre" => $lst
            ];
            return view('kategori/terpopuler', $baru);
        }
    }
}
