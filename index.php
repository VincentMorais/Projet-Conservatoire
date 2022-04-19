<?php
require_once("./model./PdoMusic.php");

$monPdo = PdoMusic::getPdoMusic();

if(!isset($_REQUEST['action']))
{
$action = 'accueil';
}
else {
$action = $_REQUEST['action'];
}
// vue qui crée l’en-tête de la page
include("vues/v_tete.php");
switch($action)
{
    case 'accueil':
        // vue qui crée le contenu de la page d’accueil
        include("vues/v_accueil.php");
        break;
    case 'inscription':
        // vue qui crée le contenu de la page d’accueil
        include("vues/v_inscription.php");
        break;
    case 'cours':
        // vue qui crée le contenu de la page d’accueil
        $lesCours= $monPdo->getLesCours();
        //var_dump($lesCours);
        include("vues/v_cours.php");
        break;
        case 'inscri':
            // vue qui crée le tableau des inscris
            $lesInscri = $monPdo->getLesInscri();
            
            include("vues/v_inscri.php");
            break;

            case 'pdf':
                //ajout de pdf au tableau
             //   include("vues/pdf.php");
               include("vues/pdf.php");

              

                break;
                case 'inscripdf':
                    $monPdo = PdoMusic::getPdoMusic();
                    $Inscriptions = $monPdo->getLesInscri();
                    $num = $_REQUEST["numInscri"];
                    $inscription = $Inscriptions[$num] ;
                 
                    include("vues/pdf.php");
                    creerPdf($inscription);
                    break;

                    

            
    default:
        include("vues/v_accueil.php");
        break;
}
// vue qui crée le pied de page
include("vues/v_pied.php") ;
?>