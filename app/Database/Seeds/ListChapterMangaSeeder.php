<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;

class ListChapterMangaSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $count = 0;
        // untuk data silakan import sqlnya dulu, lalu jalankan looping dibawah ini satu per satu

        $this->db->table("listchaptermanga")->insertBatch($data);
    }
}
