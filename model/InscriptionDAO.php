<?php
require_once("./PdoMusic.php");

$monPdo = PdoMusic::getPdoMusic();
$mail = $_POST['mail'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$cours = $_POST['cours'];
$tel = $_POST['tel'];
$adresse = $_POST['adresse'];

$req = "INSERT into person Values(NULL,'".$nom ."','".$prenom ."','".$tel ."','".$adresse ."','".$mail ."');";

$monPdo->valideinscription($req);





$req = "SELECT person.id from person where person.nom='".$nom."' and person.prenom='".$prenom."';";

echo $req ;
$idstudent = array();
$idstudent = $monPdo->getidstudent($req);
echo "<p>".$idstudent."</p>";

$req = "INSERT into students(id) Values(".$idstudent.");";

$monPdo->valideinscription($req);
header('location:http://localhost/effrei/Ziqmu/Source/index.php?action=inscri');


//echo $req ;



try {
    $monPdo->valideinscri($idstudent,$cours);
} catch (Exception $th) {
    echo"<p>".$th."</p>";
}



?>