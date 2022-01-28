<head>
<style>
.mainmenubtn {
    background-color: grey;
    color: black;
    border: none;
    cursor: pointer;
    padding:20px;
    margin-top:20px;
}
.mainmenubtn:hover {
    background-color: lightcoral;
    }
.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-child {
    display: none;
    background-color: grey;
    min-width: 200px;
}
.dropdown-child a {
    color: black;
    padding: 20px;
    text-decoration: none;
    display: block;
}
.dropdown:hover .dropdown-child {
    display: block;
}
</style>     
</head>
<body>
<?php
interface Observer {
  public function update(Observable $subject);
}


abstract class Widget implements Observer {

  protected $internalData = array();

  abstract public function draw();

  public function update(Observable $subject) {
         $this->internalData = $subject->getData();
  }
}

class BasicWidget extends Widget {

  function __construct() {
  }

       public function draw() {
         $html = "<table border=1 width=130>";
         $html .= "<tr><td colspan=3 bgcolor=#cccccc>
                        <b>Instrument Info<b></td><td bgcolor=#cccccc><b>Propietario</b>
                        </td></tr>";

         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $instms = $this->internalData[0];
                $prices = $this->internalData[1];
                $years =  $this->internalData[2];
                $propietarios =  $this->internalData[3];

                $html .=  "<tr><td>$instms[$i]</td><td> $prices[$i]</td>
                           <td>$years[$i]</td><td>$propietarios[$i]
                           </td></tr>";
                }
         $html .= "</table><br>";
         echo $html;
       }
}


class FancyWidget extends Widget {
  
  function __construct() {
  }
  
  public function draw() {
         $html = 
         "<table border=0 cellpadding=5 width=270 bgcolor=#6699BB>
                <tr><td colspan=4 bgcolor=#cccccc>
                <b><span class=blue>Our Latest Prices<span><b>
                </td></tr>
                <tr><td><b>instrument</b></td>
                <td><b>price</b></td><td><b>date issued</b>
                </td><td><b>Propietario</b>
                </td></tr>";
         
         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $instms = $this->internalData[0];
                $prices = $this->internalData[1];
                $years =  $this->internalData[2];
                $propietarios =  $this->internalData[3];
                
                $html .= 
                "<tr><td>$instms[$i]</td><td> 
                        $prices[$i]</td><td>$years[$i]
                        </td><td>$propietarios[$i]
                        </td></tr>";
                }
         $html .= "</table><br>";
         echo $html;
  }

  
}

class MenuWidget extends Widget {

       function __construct() {
       }

       public function draw() {
           
              $html = '<div class="dropdown">
              <button class="mainmenubtn">Menu</button>
              <div class="dropdown-child">
              ';
              

              $numRecords = count($this->internalData[0]);

              for($i = 0; $i < $numRecords; $i++) {
                     $type = $this->internalData[0];
                     $name = $this->internalData[1];
                     $year = $this->internalData[2];
                     $propietarios = $this->internalData[3];

                     $html .=" <tr>
                            <td>
                            <a>$type[$i],$name[$i],$year[$i],$propietarios[$i]</a>
                            </td>
                      </tr>";
              }

              $html .="
                      </div>
                      </div>";
         
              echo $html;
       }
}
?>
<body>
