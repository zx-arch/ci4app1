<?php

namespace App\Controllers;

use Database;

class Home extends BaseController
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}
	public function index()
	{
		$keyword = $this->request->getVar('search');
		$resultsearch = $this->db->table('komikmanga')->select("*")->where("judul LIKE '$keyword%'")->get()->getResultArray();
		$resultkomik = $this->db->table('komikmanga')->orderBy("judul", "RANDOM")->get()->getResultArray();
		$genre = $this->db->table('genremanga')->select("*")->join('komikmanga', 'komikmanga.slug = genremanga.slug', 'inner')->get()->getResultArray();
		// $acakkomik = [];
		// function randomGen($min, $max, $quantity)
		// {
		// 	$numbers = range($min, $max);
		// 	shuffle($numbers);
		// 	return array_slice($numbers, 0, $quantity);
		// }

		// $randomindex = randomGen(0, count($resultkomik) - 1, count($resultkomik) + 1);
		// foreach ($randomindex as $r) {
		// 	array_push($acakkomik, $resultkomik[$r]);
		// }
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
			$datahome = [
				"title" => "Halaman Home",
				"home" => $resultkomik,
				"hasil" => "tidakcaridata",
				"search" => "masihkosong",
				"genre" => $lst
			];
			return view('home', $datahome);
		} elseif (!empty($keyword) and !empty($resultsearch)) {
			$datahome = [
				"title" => "Halaman Home",
				"home" => $resultsearch,
				"hasil" => "cariditemukan",
				"search" => $keyword,
				"genre" => $lst
			];
			return view('home', $datahome);
		} elseif (!empty($keyword) and empty($resultsearch)) {
			$datahome = [
				"title" => "Halaman Home",
				"home" => $resultsearch,
				"hasil" => "caritidakditemukan",
				"search" => $keyword,
				"genre" => $lst
			];
			return view('home', $datahome);
		}
	}
}
