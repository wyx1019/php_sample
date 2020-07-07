<?php 
require_once('menu.php');

class Food extends Menu {
  private $spiciness;
  
  public function __construct($name, $price, $image,$description, $spiciness) {
    parent::__construct($name, $price, $image, $description);
    $this->spiciness = $spiciness;
  }
  
  public function getSpiciness() {
    return $this->spiciness;
  }
  
}
