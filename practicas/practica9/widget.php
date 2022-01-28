<?php
require_once("observable.php");
require_once("abstract_widget.php");


$dat = new DataSource();
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



?>
