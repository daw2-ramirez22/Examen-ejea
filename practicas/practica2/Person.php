<?php

class Person{
	var $age;
	var $eye_color;
	var $name;

	public $one;
	private $two =3;
	protected $three =3;

	private $word;

	static $population = 0;
	static $people = 20;
	/*GETTER y SETTER tal cual como pone la practica*/
	public function __set($property, $value){
		if( (property_exists($this,$property)) ){
			echo "Has actualizado la propiedad " . $property . " con el valor " . $value . "<br>";
			$this -> $property = $value; 

		}else{
			echo "No has actualizado la propiedad " . $property . "<br>";
		}
	}

	/*Creo un if por si la propiedad no existe*/
	public function __get($property){
		if( (property_exists($this,$property)) ){
			echo "<br>La propiedad es: " . $property . "<br>";
		}else{
			echo "<br>La propiedad " . $property . " no existe <br>";
		}

		
	}

	public function __construct($age, $eye_color){
		$this->age = $age;
		$this->eye_color = $eye_color;
		echo "This is the age: " . $this->age . "<br/>";
		echo "This is the eye color: " . $this->eye_color . "<br/>"; 
		self::$population++;
		echo "This is the current number of instance: " . self::$population;
	}

	static public function say_population(){
		echo "This is the population: " . self::$population;
	}

	function sayNums(){
		echo $this->one;
		echo $this->two;
		echo $this->three;
	}

	function say_age(){
		echo "This is the age: " . $this->age;
	}

	
}

$dude = new Person(22,"Brown");
$girl = new Person(44,"Blue");
$bob = new Person(55,"Green");

/*Llamo a los objetos y muestro los atributos a ver si existen o no*/
echo $dude->haha;
echo $dude->age;
echo $dude->one;
echo $dude->two;
echo $dude->three;
echo $dude->population;

echo $girl->haha;
echo $girl->age;
echo $girl->one;
echo $girl->two;
echo $girl->three;
echo $girl->population;

echo $bob->haha;
echo $bob->age;
echo $bob->one;
echo $bob->two;
echo $bob->three;
echo $bob->population;





