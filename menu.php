<?php
class Menu
{
  protected $name;
  protected $price;
  protected $image;
  protected $description;
  private $orderCount = 0;
  protected static $count = 0;

  public function __construct($name, $price, $image, $description)
  {
    $this->name = $name;
    $this->price = $price;
    $this->image = $image;
    $this->description = $description;
    self::$count++;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getImage()
  {
    return $this->image;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function getOrderCount()
  {
    return $this->orderCount;
  }

  public function setOrderCount($orderCount)
  {
    $this->orderCount = $orderCount;
  }

  public function getTaxIncludedPrice()
  {
    return floor($this->price * 1.08);
  }

  public function getTotalPrice()
  {
    return $this->getTaxIncludedPrice() * $this->orderCount;
  }

  public function getReviews($reviews)
  {
    $reviewsForMenu = array();
    foreach ($reviews as $review) {
      if ($review->getMenuName() == $this->name) {
        $reviewsForMenu[] = $review;
      }
    }
    return $reviewsForMenu;
  }


  public static function getCount()
  {
    return self::$count;
  }

  public static function findByName($menus, $name)
  {
    foreach ($menus as $menu) {
      if ($menu->getName() == $name) {
        return $menu;
      }
    }
  }
}
