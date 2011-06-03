<?php
// PHP 5

// class definition
class Bear {
    // define properties
    public $name;
    public $weight;

    // define methods
    public function eat($units) {
        echo $this->name." is eating ".$units." units of food... ";
        $this->weight += $units;
    }
}

?>
<?php

// create instance
$baby = new Bear;
$baby->name = "Baby Bear";
$baby->weight = 1000;

// now create another instance
// this one has independent values for each property
$brother = new Bear;
$brother->name = "Brother Bear";
$brother->weight = 1000;

// retrieve properties
echo $baby->name." weighs ".$baby->weight." units ";
echo $brother->name." weighs ".$brother->weight." units ";

// call eat()
$baby->eat(100);
$baby->eat(50);
$brother->eat(11);

// retrieve new values
echo $baby->name." now weighs ".$baby->weight." units ";
echo $brother->name." now weighs ".$brother->weight." units ";

?>