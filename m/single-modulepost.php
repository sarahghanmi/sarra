<?php
//avoir la variable meta sous le tag "meta-data"
$meta=get_post_meta($post->ID , 'meta-data' , true);
//etre sur d'avoir une reponse json
header('Content-Type: application/json');
//on peux aussi utiliser les fonctions de WP, par exemple le titre du l'article
$title = get_the_title();
//pour un avoir une rep json, en vas cree une array
$arr = array('title' => $title, 'my data' => $meta);
//convertion de array vers json
$myJSON = json_encode($arr);
//affichage de la variable de contenu json
echo $myJSON;
?>