<?php

//--------------------------------------- Définition des classes ---------------------------------------

abstract class Animal
{
	protected string $nom;
	protected string $typeAnimal;
	protected string $espece;
	protected array $position = ['X' => 0, 'Y' => 0];

	public function seDeplacer()
	{
		$positionTableau = $this->position;

		//Si le X n'est pas sur une limite, on bouge le X d'une unité aléatoirement choisie
		if ($positionTableau['X'] > 1 && $positionTableau['X'] < 10) {
			$XpileOuFace = rand(0, 1);

			if ($XpileOuFace == 0) {
				$positionTableau['X']--;
			} else {
				$positionTableau['X']++;
			}
		}
		//Si le Y n'est pas sur une limite, on bouge le Y d'une unité aléatoirement choisie
		elseif ($positionTableau['Y'] > 1 && $positionTableau['Y'] < 10) {
			$YpileOuFace = rand(0, 1);

			if ($YpileOuFace == 0) {
				$positionTableau['Y']--;
			} else {
				$positionTableau['Y']++;
			}
		}
		//X et Y sont sur une limite
		else {
			if ($positionTableau['X'] == 1) {
				$positionTableau['X']++;
			} elseif ($positionTableau['X'] == 10) {
				$positionTableau['X']--;
			} elseif ($positionTableau['Y'] == 1) {
				$positionTableau['Y']++;
			} elseif ($positionTableau['Y'] == 10) {
				$positionTableau['Y']--;
			}
		}

		$this->position = $positionTableau;
	}

	abstract function croiseUnAutreAnimal(Animal $animalQueJeCroise);
}

final class Lion extends Animal
{
	protected string $typeAnimal = "Lion";

	public function __construct(string $nom, string $espece, array $position)
	{
		$this->nom = $nom;
		$this->espece = $espece;
		$this->position = $position;
	}

	public function getNom()
	{
		return $this->nom;
	}

	public function getEspece()
	{
		return $this->espece;
	}

	public function getTypeAnimal()
	{
		return $this->typeAnimal;
	}

	public function getPosition()
	{
		return $this->position;
	}

	public function croiseUnAutreAnimal(Animal $animalQueJeCroise)
	{
		if ($animalQueJeCroise instanceof Lion) {
			return "Je m'appelle " . $this->getNom() . ", et je croise " . $animalQueJeCroise->getNom() . ", c'est un copain, je lui fais un check";
		} elseif ($animalQueJeCroise instanceof Chacal) {
			return "Je m'appelle " . $this->getNom() . ", et je mange le chacal " . $animalQueJeCroise->getNom() . ".";
		} elseif ($animalQueJeCroise instanceof Chevre) {
			return "Je m'appelle " . $this->getNom() . ", et je mange la chevre " . $animalQueJeCroise->getNom() . ".";
		} else {
			throw new Exception("Erreur de conception du développeur : L'objet passé en paramètre n'est ni un Lion, ni un Chacal, ni une Chevre...");
		}
	}
}

final class Chacal extends Animal
{
	protected string $typeAnimal = "Chacal";

	public function __construct(string $nom, string $espece, array $position)
	{
		$this->nom = $nom;
		$this->espece = $espece;
		$this->position = $position;
	}

	public function getNom()
	{
		return $this->nom;
	}

	public function getEspece()
	{
		return $this->espece;
	}

	public function getTypeAnimal()
	{
		return $this->typeAnimal;
	}

	public function getPosition()
	{
		return $this->position;
	}

	public function croiseUnAutreAnimal(Animal $animalQueJeCroise)
	{
		if ($animalQueJeCroise instanceof Lion) {
			return "Je m'appelle " . $this->getNom() . ", et je fais ma prière...car je croise " . $animalQueJeCroise->getNom();
		} elseif ($animalQueJeCroise instanceof Chacal) {
			return "Je m'appelle " . $this->getNom() . ", et Je croise " . $animalQueJeCroise->getNom() . ", c'est un copain, je lui fais un check !";
		} elseif ($animalQueJeCroise instanceof Chevre) {
			return "Je m'appelle " . $this->getNom() . ", et je mange la chevre " . $animalQueJeCroise->getNom() . ".";
		} else {
			throw new Exception("Erreur de conception du développeur : L'objet passé en paramètre n'est ni un Lion, ni un Chacal, ni une Chevre...");
		}
	}
}

final class Chevre extends Animal
{
	protected string $typeAnimal = "Chevre";

	public function __construct(string $nom, string $espece, array $position)
	{
		$this->nom = $nom;
		$this->espece = $espece;
		$this->position = $position;
	}

	public function getNom()
	{
		return $this->nom;
	}

	public function getEspece()
	{
		return $this->espece;
	}

	public function getTypeAnimal()
	{
		return $this->typeAnimal;
	}

	public function getPosition()
	{
		return $this->position;
	}

	public function croiseUnAutreAnimal(Animal $animalQueJeCroise)
	{
		if ($animalQueJeCroise instanceof Lion) {
			return "Je m'appelle " . $this->getNom() . ", et je fais ma prière...car je croise " . $animalQueJeCroise->getNom();
		} elseif ($animalQueJeCroise instanceof Chacal) {
			return "Je m'appelle " . $this->getNom() . ", et je fais ma prière...car je croise " . $animalQueJeCroise->getNom();
		} elseif ($animalQueJeCroise instanceof Chevre) {
			return "Je m'appelle " . $this->getNom() . ", et Je croise " . $animalQueJeCroise->getNom() . ", c'est une copine, je lui fais un check !";
		} else {
			throw new Exception("Erreur de conception du développeur : L'objet passé en paramètre n'est ni un Lion, ni un Chacal, ni une Chevre...");
		}
	}
}



//--------------------------------------- Execution des classes sans Thread ---------------------------------------

$Lion1 = new Lion("RoiDeLaJungle", "Lion d'Atlas", ['X' => 1, 'Y' => 2]);

//var_dump($Lion1);
//$Lion1->seDeplacer();
//var_dump($Lion1);

//echo $Lion1->getEspece();
//var_dump($Lion1->getPosition());

$Chacal1 = new Chacal("CharognardDeService", "Chacal doré", ['X' => 1, 'Y' => 2]);
$Chacal2 = new Chacal("CharognardDeService2", "Chacal doré", ['X' => 1, 'Y' => 2]);
//var_dump($Chacal1);
//echo $Chacal1->getNom();

$Chevre1 = new Chevre("BrouteuseDeService", "Chevre Alpine", ['X' => 1, 'Y' => 2]);
$Chevre2 = new Chevre("BrouteuseDeService2", "Chevre Alpine", ['X' => 1, 'Y' => 2]);
//var_dump($Chevre1);
//echo $Chevre1->getNom();

$Lion2 = new Lion("PrinceDeLaJungle", "Lion d'Atlas", ['X' => 1, 'Y' => 3]);
//echo $Lion1->croiseUnAutreAnimal($Lion2);

///// Je force les rencontres entre animaux pour tester tous les cas avant de mettre ca dans des threads => Tout marche !
//echo $Lion1->croiseUnAutreAnimal($Chevre1);
//echo $Chacal1->croiseUnAutreAnimal($Chevre1);
//echo $Chevre1->croiseUnAutreAnimal($Chevre2);



//--------------------------------------- Execution des classes avec Thread ---------------------------------------
// ****************************** Cette partie avec Threads ne fonctionne pas encore ******************************

/*
	Résumé de mes problèmes = REX (Retour D'EXpérience) :

	PI je tape le compte-rendu plusieurs semaines après les problèmes. Donc pas facile de tout se remémorer et dans le bon ordre !

	Comme la classe Thread n'est pas reconnue, j'installe des fichiers / librairies / packages (je sais plus en détail) qui gère les Thread
	=> Ca foire... 
	Je bidouille dans le php.ini
	=> Ca foire toujours... 
	Je regarde les logs de PHP
	=> Y'a pleins de trucs (du coup c'est dur de s'y retrouver), on a l'impression que toutes les librairies dans le dossier ext posent problème...
	=> Je supprime le repertoire ext, et j'en recréer un nouveau vide, et j'y ajoute juste le librairie qui est sensé faire marcher les Thread
	=> Ca chie encore... 
	=> Je regarde les droits sur ce fichier "*thread*.dll" et les dossiers parents : j'essaie de mettre tous les droits pour tout le monde
	=> Ca chie toujours... 
	Je fais des recherches sur les Thread en PHP sur Internet : certains disent que faut faire tourner le code sur Linux Ubuntu
	=> J'installe Ubuntu pour Windows, mais pas simple de se mettre là dedans
	=> Je fais d'autres recherches sur les Thread en PHP : 
	- un mec de très haut niveau dit que ca marche sous Windows
	- sa vidéo est une conférence de 45 minutes environ : https://afup.org/talks/2116-thread-safety-en-php-zts
	A ce moment là, mon programme chie mais en plus il fait foirer tout mon environnement de DEV PHP...
	=> Je ne peux plus créer de projets SF...et j'ai un test technique avec du SF à faire pour un recruteur...
	Je réinstalle WAMP : j'avais bien fait avant un bck des projets mais pas des bases dans MySQL...mais y'avait pas grand chose
	=> Je constate que c'est WAMP qui installe plusieurs versions de PHP dans C:\wamp64\bin\php\
	Je fais pointer mes VE vers le bon dossier php : C:\wamp64\bin\php\php7.4.26\
	=> Je peux refaire du PHP natif et du MySQL (ce qui me permet de faire le test pour MDS)
	=> Mais ca chie encore pour SF (et donc je ne peux pas encore faire le projet pour WebAtrio)
	J'essaie de refaire marcher SF et notamment de créer un projet SF :
	=> J'ai encore des problèmes techniques (composer notamment) mais je résous ces problèmes (voir mes notes dans mes G Docs)
	=> Mon environnement est fonctionnel à nouveau !!! (PHP, MySQL, SF)
	Mais tout est à refaire pour faire fonctionner les Threads sur ce projet (ecosysteme-animalier)
*/

//phpinfo();
//die;

class MyThread extends Thread
{
	/**
	 * @var string
	 * Variable to contain the message to be displayed.
	 */
	private $message;

	public function __construct(string $message)
	{
		// Set the message value for this particular instance.
		$this->message = $message;
	}

	// The operations performed in this function is executed in the other thread.
	public function run()
	{
		echo $this->message;
	}
}

// Instantiate MyThread
$myThread = new MyThread("Hello from an another thread!");
// Start the thread. Also it is always a good practice to join the thread explicitly.
// Thread::start() is used to initiate the thread,
$myThread->start();
// and Thread::join() causes the context to wait for the thread to finish executing
$myThread->join();
