<?php
$routes->get('/naruto/(:any)', function ($method) {
    if (strpos($method, "naruto") === 0 and strpos($method, "chapter") === 7 and strpos($method, "-") === 6 and (int) filter_var(strstr($method, 'chapter-'), FILTER_SANITIZE_NUMBER_INT) < 0 and is_numeric(explode("-", $method)[2])) {
        $getnumberchapter = explode("-", $method);
        $getnumberchapter = intval($getnumberchapter[2]);
        if ($getnumberchapter <= 711 and $getnumberchapter !== 88 and $getnumberchapter !== 91 and $getnumberchapter !== 99 and $getnumberchapter !== 102 and $getnumberchapter !== 103 and $getnumberchapter !== 106 and $getnumberchapter !== 111 and $getnumberchapter !== 118 and $getnumberchapter !== 124) {
            for ($i = 1; $i <= 711; $i++) {
                if ($i === 676 or $i === 680 or $i === 698) {
                    if ($method === "naruto-chapter-$i") {
                        $datanaruto = [
                            "title" => "Komik Naruto Chapter $i"
                        ];
                        return view('manga/chapter/naruto/naruto_chapter_' . $i, $datanaruto);
                    } elseif ($method === "naruto-chapter-$i.5") {
                        $datanaruto = [
                            "title" => "Komik Naruto Chapter $i.5"
                        ];
                        return view('manga/chapter/naruto/naruto_chapter_' . $i . '_5', $datanaruto);
                    }
                } else {
                    if ($i === 88 or $i === 91 or $i === 99 or $i === 102 or $i === 103 or $i === 106 or $i === 111 or $i === 118 or $i === 124 or $i === 150 or $i === 151 or $i === 153 or $i === 156 or $i === 163 or $i === 175 or $i === 186 or $i === 192 or $i === 194 or $i === 198 or $i === 203 or $i === 212 or $i === 218 or $i === 232 or $i === 233 or $i === 239 or $i === 242 or $i === 243 or $i === 309 or $i === 310 or $i === 324 or $i === 330 or $i === 348 or $i === 484 or $i === 502) {
                        continue;
                    } else {
                        if ($method === "naruto-chapter-$i") {
                            $datanaruto = [
                                "title" => "Komik Naruto Chapter $i",
                                "chapter" => "Chapter $i"
                            ];
                            return view('manga/chapter/naruto/naruto_chapter_' . $i, $datanaruto);
                        }
                    }
                }
            }
        } else {
            session()->setFlashdata("warning", "Tidak Tersedia Komik Naruto Chapter $getnumberchapter");
            return view("url_handle_chapter");
        }
    } else {
        session()->setFlashdata("warning", "$method");
        return view("bad_url");
    }
});
$routes->get('/one-piece/(:any)', function ($method) {
    for ($i = 1; $i <= 1018; $i++) {
        if ($i <= 61 or $i >= 63 and $i <= 899 or $i >= 901 and $i <= 912 or $i >= 914 and $i <= 956 or $i >= 958 and $i <= 965 or $i >= 967 and $i <= 972 or $i >= 974 and $i <= 986 or $i >= 992 and $i <= 994 or $i === 999 or $i === 1001 or $i === 1004) {
            // lakuin
        } elseif ($i === 62) {
            // lakuin
        } elseif ($i === 900 or $i === 913 or $i === 957) {
            // lakuin
        } elseif ($i === 966 or $i === 973 or $i >= 987 and $i <= 989 or $i >= 995 and $i <= 998 or $i === 1002 or $i === 1003 or $i >= 1005 and $i <= 1018) {
            // lakuin
        } elseif ($i === 990 or $i === 991) {
            // array_push($data, [
            //     "slug"  => "one-piece",
            //     "chapter" => "chapter-$i",
            //     "created_at" => Time::now(),
            //     "updated_at" => Time::now()
            // ]);
            // array_push($data, [
            //     "slug"  => "one-piece",
            //     "chapter" => "chapter-$i.5.hd",
            //     "created_at" => Time::now(),
            //     "updated_at" => Time::now()
            // ]);
        } elseif ($i === 1000) {
            // lakuin
        }
    }
});
$routes->get('/ao-no-exorcise/(:any)', function ($method) {
    for ($i = 1; $i <= 132; $i++) {
        if ($i <= 45 or $i >= 50 and $i <= 98 or $i >= 100 and $i <= 115 or $i >= 117 and $i <= 120 or $i === 122 or $i === 123 or $i === 132) {
            // lakuin 
        } elseif ($i === 46) {
            // lakuin 
        } elseif ($i >= 47 and $i <= 49 or $i === 121 or $i >= 124 and $i <= 127 or $i >= 129 and $i <= 131) {
            // lakuin 
        } elseif ($i === 99 or $i === 116 or $i === 128) {
            // lakuin 
        }
    }
});
