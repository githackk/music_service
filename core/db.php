<?php
 
 global $pdo;
 $pdo = new \PDO(
     'mysql:host=localhost:3306;dbname=test',
     "root",
     "polytech"
 );

 

 function getTrack($id){
     global $pdo;
     $res = $pdo->query('select track.id, track.name, singer.alias as composer, track.genre_id as genre, track.music, track.img from track, singer where track.singer_id=singer.id and track.id='.$id.';');
     return $res->fetch();
 }

 function getAllTracks(){
     global $pdo;
     $res = $pdo->query('select track.id, track.name, singer.alias as composer, track.music, track.img from track, singer where track.singer_id=singer.id;');
     return $res;
 }

 function getAllGenre(){
     global $pdo;
     $res = $pdo->query('select * from genre;');
     return $res;
 }

 function getAllComposers(){
    global $pdo;
    $res = $pdo->query('select * from singer;');
    return $res;
}

function getTracksByGenre($id){
    global $pdo;
     $res = $pdo->query('select track.name, singer.alias as composer, track.music, track.img from track, singer where track.singer_id=singer.id and track.genre_id='.$id.';');
     return $res;
}

function searchTrack($str){
    global $pdo;
     $res = $pdo->query('select track.name, singer.alias as composer, track.music, track.img from track, singer where track.name like \'%'.$str.'%\' and track.singer_id=singer.id;');
     return $res;
}

function countSearch($str){
    global $pdo;
     $res = $pdo->query('select count(*) as count from track, singer where track.name like \'%'.$str.'%\' and track.singer_id=singer.id;');
     return $res->fetch();
}

function saveTrack($singer_id, $name, $genre_id, $img, $music){
    global $pdo;
    $sqlString = "INSERT INTO track (singer_id, name,genre_id,img,music) VALUES ('$singer_id','$name','$genre_id','img/$img', 'music/$music')";
    return $pdo->exec($sqlString);
}

function deleteTrack($id){
    global $pdo;
    $sqlString = "DELETE FROM track WHERE id = ".$id.";";
    return $pdo->exec($sqlString);
}

function updateTrack($id, $singer_id, $name, $genre_id, $img, $music){
    global $pdo;
    $sqlString = "UPDATE track SET singer_id='$singer_id', name='$name', genre_id='$genre_id', img='$img', music='$music' WHERE track.id='$id';";
    return $pdo->exec($sqlString);
}