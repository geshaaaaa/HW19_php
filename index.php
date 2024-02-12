<?php

require_once "databaseClasses/Connector.php";
require_once "databaseClasses/Playlists.php";
require_once "databaseClasses/Songs.php";
require_once "databaseClasses/Singers.php";

try {

    $connector = Connector::getInstance();
    $playlist = new Playlists($connector);
    echo "<pre>";
    $playlist->searchPlaylistName('Party');
    echo "<pre>";
    /*
    $playlist->insertPlaylist('Walk outside','Sad');
    $playlist->insertPlaylist('Party','Fun');
    */
    $songs = new Songs($connector);
    /* $songs->insertSong('Diamonds', 'POP', 2012,65);
     $songs->insertSong('Work','POP',2016,65);
     $songs->insertSong('HIGHEST IN THE ROOM','Rap',2019,66);
     $songs->insertSong('Summertime Sadness','Pop',2012,67);
     $songs->insertSong('Young and Beautiful',67);
     $songs->insertSong('Runaway','POP',2015,68);
     $songs->insertSong('Gimme more','POP',2007,70);*/
    $songs->searchOrderYearSongs();
    $singers = new Singers($connector);
    /*$singers->insertSinger('Rihanna','female',1988);
    $singers->insertSinger('Travis Scott','male', 1991);
    $singers->insertSinger('Lana Del Rey', 'female',1985);
    $singers->insertSinger('Aurora', 'female', 1996);
    $singers->insertSinger('Black Eyed Peas','male');
    $singers->insertSinger('Britney Spears','female',1981);*/
    //  $singers->changeName('Travis Scott', 'Jacques Berman Webster');
    $singers->searchGenderSinger('male');
    //  $singers->deleteSinger('Black Eyed Peas');

} catch (PDOException $exception) {
    echo $exception->getMessage();
}


