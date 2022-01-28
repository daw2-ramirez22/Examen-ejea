<html>
<body>
<head>
<style>
body {font : 12px verdana; font-weight:bold}
td {font : 11px verdana;}
</style>
</head>

<?php

abstract class AbstractZona {
  
  private $nom;
  private $superficie;
  private $poblacio;
  private $zonas = array();

  
  public function add(AbstractZona $zonas) {
     array_push($this->zonas, $zonas);
  }
  
  public function remove(AbstractZona $zonas) {
     array_pop($this->zonas);
  }
        
  public function hasChildren() {
    return (bool)(count($this->zonas) > 0);
  }
    
  public function getChild($i) {
    return $this->zonas[$i];
  }
  public function getzonas() {
    return $this->zonas;
  }



  public function getDescription() {
    echo $this->getNom(). " - " .  $this->getSuperficie() . " - " . $this->getPoblacio();
    if ($this->hasChildren()) {
      echo " :<br>";
      foreach($this->zonas as $zonas) {
         echo "<table cellspacing=5 border=0><tr><td>&nbsp;&nbsp;&nbsp;</td><td>-";
         $zonas->getDescription();
         echo "</td></tr></table>";
      }        
    }
  }


 public function setNom($nom) {
   $this->nom = $nom;
 }
  
 public function getNom() {
   return $this->nom;
 }
         
 public function setSuperficie($superficie) {
    $this->superficie = $superficie;
 }

 public function getSuperficie() {
   return $this->superficie;
  }

 public function setPoblacio($poblacio) {
    $this->poblacio = $poblacio;
 }

 public function getPoblacio() {
   return $this->poblacio;
  }


}


class Continent extends AbstractZona {
  function __construct($nom, $superficie, $poblacio) {
    parent::setNom($nom);
    parent::setSuperficie($superficie);
    parent::setPoblacio($poblacio);
  }   
  
  public function sumarPoblacio(){

    $poblacioTotal = 0;
  
    if ($this->hasChildren()) {
      foreach($this->getzonas() as $zona) {
      $poblacioTotal = $poblacioTotal + $zona ->sumarPoblacio();
      }
    } 

    return $poblacioTotal;
  }


  public function sumarSuperficie(){

    $superficietotal = 0;
  
    if ($this->hasChildren()) {
      foreach($this->getzonas() as $zona) {
      $superficietotal = $superficietotal + $zona ->sumarSuperficie();
      }
    } 

    return $superficietotal;
  }

}

class Pais extends AbstractZona {
  function __construct($nom, $superficie, $poblacio) {
   parent::setNom($nom);
   parent::setSuperficie($superficie);
   parent::setPoblacio($poblacio);
  }

  public function sumarPoblacio(){

    $poblacioTotal = 0;
    if ($this->hasChildren()) {
      foreach($this->getzonas() as $zona) {
      $poblacioTotal = $poblacioTotal + $zona ->getPoblacio();
      }
    } 
    return $poblacioTotal;
  }

   public function sumarSuperficie(){

    $superficietotal = 0;
    if ($this->hasChildren()) {
      foreach($this->getzonas() as $zona) {
      $superficietotal = $superficietotal + $zona ->getSuperficie();
      }
    } 
    return $superficietotal;
  }
}

class Ciutat extends AbstractZona {
  function __construct($nom, $superficie, $poblacio) {
    parent::setNom($nom);
    parent::setSuperficie($superficie);
    parent::setPoblacio($poblacio);
  }
}

class Poble extends AbstractZona {
  function __construct($nom, $superficie, $poblacio) {
    parent::setNom($nom);
    parent::setSuperficie($superficie);
    parent::setPoblacio($poblacio);
  }
}


$ciutat1 = new Ciutat("Paris", 5 , 7 );
$ciutat2 = new Ciutat("Tolouse", 7 , 6);
$ciutat3 = new Ciutat("Marsella", 6, 8);

$poble1 = new Poble("Barcelona", 7 , 8 );
$poble2 = new Poble("Madrid", 7 , 8 );
$poble3 = new Poble("Bilbao", 8 , 8 );

$pais1 = new Pais("Espanya", 5 , 5);
$pais1->add($ciutat1);
$pais1->add($ciutat2);
$pais1->add($ciutat3);

$pais2 = new Pais("Francia", 2 , 3 );
$pais2->add($poble1);
$pais2->add($poble2);
$pais2->add($poble3);

$continente1 = new Continent("Europa", 1, 9);
$continente1->add($pais1);
$continente1->add($pais2);
$continente2 = new Continent("America", 2, 5);
$continente2->add($pais2);
$continente2->add($pais1);

echo "Lista del mundo: <p>";
$continente1->getDescription();
$continente2->getDescription();

echo "Lista de Poblacion : <p>";
echo $pais2->getNom() . ":";
echo $pais2->sumarPoblacio();
echo "<br>";
echo $continente2->getNom(). ":";
echo $continente2->sumarPoblacio();
echo "<br>";
echo $pais1->getNom() . ":";
echo $pais1->sumarPoblacio();
echo "<br>";
echo $continente1->getNom(). ":";
echo $continente1->sumarPoblacio();
echo "<br>";
echo "<br>";
echo "Lista de Superficie : <p>";
echo $pais2->getNom() . ":";
echo $pais2->sumarSuperficie();
echo "<br>";
echo $continente2->getNom(). ":";
echo $continente2->sumarSuperficie();
echo "<br>";
echo $pais1->getNom() . ":";
echo $pais1->sumarSuperficie();
echo "<br>";
echo $continente1->getNom(). ":";
echo $continente1->sumarSuperficie();






?>

</body>
</html>


