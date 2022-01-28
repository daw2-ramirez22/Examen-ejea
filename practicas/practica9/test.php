<?php
require_once('class.collection.php');
require_once("observable.php");
require_once("abstract_widget.php");
require_once("CompositePattern2.php");


$dat = new DataSource();
$datB = new DataSource();

$widgetA = new BasicWidget();
$widgetB = new FancyWidget();
$widgetC = new MenuWidget();

$dat->addObserver($widgetA);
$dat->addObserver($widgetB);
$dat->addObserver($widgetC);

$dat->addRecord("barco", "$12.95", 1955,"Cristian");
$dat->addRecord("guitar", "$13.95", 2003,"Federico");
$dat->addRecord("banjo", "$100.95", 1945,"Federico");
$dat->addRecord("piano", "$120.95", 1999,"Cristian");


$widgetA->draw();
$widgetB->draw();
$widgetC->draw();
echo '<br>';
echo '<br>';

//creo colecione
$datSource = new Collection();
//meto datos en coleccion
$datSource-> addItem($dat);
$datSource-> addItem($datB);


//creo colecione
$datWidget = new Collection();
//meto datos en coleccion
$datWidget-> addItem($widgetA);
$datWidget-> addItem($widgetB);
$datWidget-> addItem($widgetC);


//coleccion ya creada
$colFoo = new Collection();
$colFoo->addItem(new Foo("Steve", 14), "steve");
$colFoo->addItem(new Foo("Ed", 37), "ed");
$colFoo->addItem(new Foo("Bob", 49));

$objSteve = $colFoo->getItem("steve");

print $objSteve; //prints "Steve is number 14"

$colFoo->removeItem("steve"); //deletes the "steve" object

try {
  $objSteve = $colFoo->getItem("steve"); //throws KeyInvalidException
} catch (KeyInvalidException $kie) {
  print "Thec collection doesn't contain anything called 'steve'";
}


class Foo{

  private $_name;
  private $_number;

  public function __construct($name, $number){
    $this->_name = $name;
    $this->_number = $number;
  }

  public function __toString() {
    return $this->_name . ' is number ' . $this->_number;
  }

}

?>