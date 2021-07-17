<?php
$genre = json_decode($genre, true);
for ($i = 0; $i <= 9999; $i++) {
    try {
        if ($genre[$i] === $genre[$i + 1]) {
            unset($genre[$i]);
        }
    } catch (Exception $e) {
        break;
    }
}
?>
<?php $this->extend("layout/template"); ?>
<?php $this->section("content"); ?>