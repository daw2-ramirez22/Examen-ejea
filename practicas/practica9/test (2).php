<?php
require_once('class.collection.php');
require_once("observable.php");
require_once("abstract_widget.php");

/*PARTE 1 */

$dat = new DataSource();
$datB = new DataSources();
$widgetA = new BasicWidget();
$widgetB = new FancyWidget();
$widgetC = new MenuWidget();

$dat->addObserver($widgetA);
$dat->addObserver($widgetB);
$datB->addObserver($widgetC);

$dat->addRecord("drum", "$12.95", 1955);
$dat->addRecord("guitar", "$13.95", 2003);
$dat->addRecord("banjo", "$100.95", 1945);
$dat->addRecord("piano", "$120.95", 1999);

$datB->addRecord("percusion","drum", "Startone", 1955);
$datB->addRecord("cuerda","guitar", "Fender", 2003);
$datB->addRecord("viento","flauta", "Stentor", 1945);
$datB->addRecord("cuerda percutida","piano", "Yamaha", 1999);

$widgetA->draw();
$widgetB->draw();
$widgetC->draw();



/*PARTE 2 */
$datSource = new Collection();
$datWidget = new Collection();

$datSource-> addItem($dat);
$datSource-> addItem($datB);
$datWidget-> addItem($widgetA);
$datWidget-> addItem($widgetB);
$datWidget-> addItem($widgetC);




/*TEST YA HECHO POR PROFE */
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