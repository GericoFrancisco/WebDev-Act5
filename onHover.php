<?php

$code = $_GET["songCode"];

$xml = new DOMDocument();
$xml->load("AJAX - XML.xml");

$songList = $xml->getElementsByTagName("song");

$selectedSong = "";
foreach($songList as  $song){
    $songCode = $song->getAttribute("songCode");
    if($songCode == $code) {
        $resTitle = $song->getElementsByTagName("title")[0]->nodeValue;
        $genreList = $song->getElementsByTagName("genre");
        $resSinger = $song->getElementsByTagName("singer")[0]->nodeValue;
        $resAlbum = $song->getElementsByTagName("album")[0]->nodeValue;
        $resImgPath = $song->getElementsByTagName("imagePath")[0]->nodeValue;
        $genreStr = "";
        if(count($genreList) == 1){
            $genreStr = $genreList->item(0)->nodeValue;
        }else{
            for($i =0 ; $i < count($genreList); $i++){
                $genreStr .= ($i == count($genreList)-1) ? $genreList->item($i)->nodeValue : $genreList->item($i)->nodeValue . ", ";
            }
        }
        $selectedSong = "<p id='title'>$resTitle</p><hr>".
        "<img src='$resImgPath' alt='Album Art' id='songImg'>".
        "<div id='details'><label>SongCode</label><p id='songCode'>$songCode</p>".
        "<label>Genre</label><p id='genre'>$genreStr</p>".
        "<label>Singer</label><p id='singer'>$resSinger</p>".
        "<label>Album</label><p id='album'>$resAlbum</p></div>";
    }
}
echo $selectedSong;

