<?php
abstract class Observable {

  private $observers = array();

  public function addObserver(Observer $observer) {
         array_push($this->observers, $observer);
  }

  public function notifyObservers() {
         for ($i = 0; $i < count($this->observers); $i++) {
                 $widget = $this->observers[$i];
                 $widget->update($this);
         }
     }
}


class DataSource extends Observable {

  private $names;
  private $prices;
  private $years;
  private $propietarios;

  function __construct() {
         $this->names = array();
         $this->prices = array();
         $this->years = array();
         $this->propietarios = array();
  }

       public function addRecord($name, $price, $year,$propietario) {
         array_push($this->names, $name);
         array_push($this->prices, $price);
         array_push($this->years, $year);
         array_push($this->propietarios, $propietario);
         $this->notifyObservers();
       }

  public function getData() {
         return array($this->names, $this->prices, $this->years,$this->propietarios);
  }
}
?>
