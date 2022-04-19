<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application Ziqmu.
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoMusic qui contiendra l'unique instance de la classe
 
 * @package default
 * @author Salim
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoMusic{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=bd_zicmu';   		
      	private static $user='root' ;    		
      	private static $mdp='root' ;	
        private static $monPdo;
	private static $monPdoMusic=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
    	PdoMusic::$monPdo = new PDO(PdoMusic::$serveur.';'.PdoMusic::$bdd, PdoMusic::$user, PdoMusic::$mdp); 
		PdoMusic::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoMusic::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
 
 * @return l'unique objet de la classe PdoGsb
 */
	public  static function getPdoMusic(){
		if(PdoMusic::$monPdoMusic==null){
			PdoMusic::$monPdoMusic= new PdoMusic();
		}
		return PdoMusic::$monPdoMusic;  
	}
        
        public  static function getMonPdo(){
		
		return PdoMusic::$monPdo;  
	}

	/*     
		<?php
		$stmt = $dbh->prepare("INSERT INTO REGISTRY (name, value) VALUES (?, ?)");
		$stmt->bindParam(1, $name);
		$stmt->bindParam(2, $value);

		// insertion d'une ligne
		$name = 'one';
		$value = 1;
		$stmt->execute();
	*/

 

	public   function getLesCours(){ 

		try {
		
		$cours = array();

		$req = "Select person.nom, instrument.nom, jourDate, nbPlace from cours
		INNER JOIN professeur ON cours.idProf = professeur.id
		INNER JOIN person ON professeur.id = person.id
		INNER JOIN instrument ON cours.idInstrument = instrument.id;";

		//$monPdoMusic = PdoMusic::getPdoMusic();

		//$rs = $monPdoMusic::getMonPdo()->prepare($req) ;

		$rs = self::$monPdo->prepare($req) ;

		$rs->execute() ;

		$cours = $rs->fetchAll();
		return $cours;

		} 
		catch (PDOException $e) {
		
			echo 'Échec lors de la connexion : ' . $e->getMessage();

		}


	}

	public function decreNbPlace($idCours){
		$req="SELECT nbPlace from cours where id =$idCours;";

		$rs = self::$monPdo->prepare($req);
		$rs->setFetchMode(PDO::FETCH_OBJ);

		$rs->execute();

		$nbPlace = $rs->fetch();

		return $nbPlace->nbPlace;

	}

	

	public   function getLesInscri(){ 

		try {
		
		$inscri = array();

		$req = "select pers.nom as nomAd, pers.prenom as prenomAd, c.jourDate as date, c.nbPlace as place, pers1.nom as nomProf, pers1.prenom as prenomProf, i.nom as instru, ins.idStudent as idAd, ins.idCours as idC from inscription ins 
		inner join students as a on a.id = ins.idStudent 
		inner join cours as c on c.id = ins.idCours 
		inner join professeur as prof on prof.id = c.idProf inner join person as pers on pers.id = a.id 
		inner join person as pers1 on pers1.id = prof.id 
		inner join instrument as i on i.id = c.idInstrument";

		//$monPdoMusic = PdoMusic::getPdoMusic();

		//$rs = $monPdoMusic::getMonPdo()->prepare($req) ;

		$rs = self::$monPdo->prepare($req) ;

		$rs->execute() ;

		$lesInscri = $rs->fetchAll();
		return $lesInscri;

		} 
		catch (PDOException $e) {
		
			echo 'Échec lors de la connexion : ' . $e->getMessage();

		}


	}

	public   function valideinscription(string $sql){ 

		try {

		//$monPdoMusic = PdoMusic::getPdoMusic();

		//$rs = $monPdoMusic::getMonPdo()->prepare($req) ;

		$rs = self::$monPdo->prepare($sql) ;

		$rs->execute() ;

		} 
		catch (PDOException $e) {
		
			echo 'Échec lors de la connexion : ' . $e->getMessage();

		}


	}

	public   function valideinscri($idstudents,$idCours){ 

		try {
			
			$req = "INSERT into inscription (idStudent,idCours) values(".$idstudents.",".$idCours.");";
			//$monPdoMusic = PdoMusic::getPdoMusic();
			echo $req;
			echo $idCours;
			//$rs = $monPdoMusic::getMonPdo()->prepare($req) ;

		$rs = self::$monPdo->prepare($req) ;

		$verif=$rs->execute() ;

				$nbPlace=$this->decreNbPlace($idCours);
				$nbPlace--;

				$req="UPDATE cours set nbPlace= '$nbPlace' where id ='$idCours';";
				$rs = self::$monPdo->prepare($req) ;
				echo $req;
				$rs->execute() ;
				

		} 
		catch (PDOException $e) {
		
			echo 'Échec lors de la connexion : ' . $e->getMessage();

		}


	}
	
	
	public   function getidstudent($req){ 

		try {
		
			$idstudent = array();

		//$monPdoMusic = PdoMusic::getPdoMusic();

		//$rs = $monPdoMusic::getMonPdo()->prepare($req) ;

		$rs = self::$monPdo->prepare($req) ;
		

		$rs->execute() ;

		$idstudent = $rs->fetch();
		return $idstudent[0];

		} 
		catch (PDOException $e) {
		
			echo 'Échec lors de la connexion : ' . $e->getMessage();

		}


	}

}