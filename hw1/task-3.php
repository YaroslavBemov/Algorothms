<?php

//Написать аналог «Проводника» в Windows для директорий на сервере при помощи итераторов.

define("DS", DIRECTORY_SEPARATOR);
$directory = "";
$path = "C:\\";

if (isset($_GET["directory"])) {
    $directory = $_GET["directory"];
    $path = $_GET["path"];
}

$directory = new DirectoryIterator($path . DS . $directory);

?>

<ul>
    <? foreach ($directory as $dir): ?>
        <? if (!$dir->isDot()): ?>
            <li>
                <a href="?directory=<?= $dir->getFilename(); ?>&path=<?= $directory->getPath(); ?>"><?= $dir->getFilename(); ?></a>
            </li>
        <? endif; ?>
    <? endforeach; ?>
</ul>

