<?php
include_once '../racine.php';
include_once RACINE.'/service/EtudiantService.php';
extract($_GET);
$filename="IMG".rand().".jpg";
 file_put_contents("../images/".$filename, base64_decode($image));
$es = new EtudiantService();
$es->create(new Etudiant(1, $nom, $prenom, $ville, $sexe,$filename));
header("location:../ws/index.php");