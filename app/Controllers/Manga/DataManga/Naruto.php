<?php

namespace App\Controllers\Manga\DataManga;

use App\Controllers\BaseController;

class Naruto extends BaseController
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}
	public function index()
	{
		$resultdata = $this->db->table('komikmanga')->select("*")->whereIn("slug", ["naruto"])->get()->getResultArray();

		$getgenre = $this->db->table('genremanga')->select("genre")->whereIn("slug", ["naruto"])->get()->getResultArray();

		$getchapter = $this->db->table('listchaptermanga')->select("*")->whereIn("slug", ["naruto"])->get()->getResultArray();

		$genr = "";
		foreach ($getgenre as $g) {
			$genr .= $g['genre'] . ", ";
		}
		$genr = substr($genr, 0, -1);
		$genr = substr($genr, 0, -1);
		$datanaruto = [
			"title" => "Komik Naruto",
			"datanaruto" => $resultdata,
			"genrenaruto" => $genr,
			"chapternaruto" => $getchapter
		];
		return view('manga/datamanga/naruto/index', $datanaruto);
	}
}
