<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('../racine.php');
    include_once RACINE . '/service/EtudiantService.php';
    create();
}
function create()
{
    extract($_POST);
    $filename=$_FILES['image']['name'];
    $filename="IMG".rand().".jpg";
    file_put_contents("../images/".$filename, base64_decode($image));
    $es = new EtudiantService();
    $es->create(new Etudiant(1, $nom, $prenom, $ville, $sexe,$filename));
    header('Content-type: application/json');
    echo json_encode($es->findAllApi());
}
