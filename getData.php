<?php

$xml = new DOMDocument();
$xml->load("AJAX - XML.xml");

$songs = $xml->getElementsByTagName("song");

$sortedID = [];
foreach($songs as $song){
    array_push($sortedID, $song->getAttribute("songCode"));
}
sort($sortedID);
$songList = [];

foreach($sortedID as $id){
    foreach($songs as $song){
        if($id == $song->getAttribute("songCode")){
            array_push($songList, $song);
            break;
        }
    }
}

$html = "<table cellspacing='0' onmouseout='hoverStop();'>
<tr class='ltable'>
    <th>Song Code</th>
    <th>Title</th>
    <th>Genre</th>
    <th>Singer</th>
    <th>Album</th>
</tr>";

foreach ($songList as $song) {
    $songCode = $song->getAttribute("songCode");
    $songAtt = intval($songCode);
    $title = $song->getElementsByTagName("title")[0]->nodeValue;
    $genreList = $song->getElementsByTagName("genre");
    $singer = $song->getElementsByTagName("singer")[0]->nodeValue;
    $album = $song->getElementsByTagName("album")[0]->nodeValue;
    $imgPath = $song->getElementsByTagName("imagePath")[0]->nodeValue;

    $html .= "<tr onmouseover='hover($songAtt)'><td>$songCode</td><td>$title</td>";
    $genreStr = "";
    if(count($genreList) == 1){
        $genreStr = $genreList->item(0)->nodeValue;
    }else{
        for($i =0 ; $i < count($genreList); $i++){
            $genreStr .= ($i == count($genreList)-1) ? $genreList->item($i)->nodeValue : $genreList->item($i)->nodeValue . ", ";
        }
    }
    $html .= "<td>$genreStr</td><td>$singer</td><td>$album</td></tr>";
}
echo $html;

?>