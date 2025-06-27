<?php

class Item extends Dbhandler {
  /** @var int $itemID */
  private $itemID;
  private $name;
  private $brand;
  private $description;
  private $category;
  private $sellingPrice;
  private $quantityInStock;
  private $image;

  /** @var Review[] $reviews */
  private $reviews;
  /** @var float $avgRating */
  private $avgRating;

  public const CATEGORY = ["PC Packages", "Monitor & Audio", "Peripherals"];
  public const CATEGORY_ICON = ["computer", "airplay headset", "mouse"];

  function __construct($itemID) {
    $this->itemID = $itemID;
    $this->initData();
    $this->updateReviews();
  }

  public function setItem() {
    $this->setData();
  }

  protected function initData() {
    $sql = "SELECT * FROM Items WHERE ItemID = $this->itemID";
    $result = $this->conn()->query($sql) or die($this->conn()->error);

    $row = $result->fetch_assoc();
    $this->name = $row["Name"];
    $this->brand = $row["Brand"];
    $this->description = $row["Description"];
    $this->category = $row["Category"];
    $this->sellingPrice = $row["SellingPrice"];
    $this->quantityInStock = $row["QuantityInStock"];
    $this->image = $row["Image"];
  }

  protected function updateReviews() {
    $this->reviews = array();
    $sql = "SELECT OI.Feedback, OI.Rating, O.MemberID FROM OrderItems OI, Orders O
      WHERE OI.ITEMID = '$this->itemID' AND OI.OrderID = O.OrderID";
    $result = $this->conn()->query($sql) or die($this->conn()->error);

    $this->avgRating = 0;
    $totalRatings = 0;
    while ($row = $result->fetch_assoc()) {
      $feedback = $row["Feedback"];
      $rating = $row["Rating"];
      $memberID = $row["MemberID"];
      $nameResult = $this->conn()->query("SELECT Username FROM Members M WHERE MemberID = $memberID") or die($this->conn()->error);
      $username = $nameResult->fetch_array()[0];

      if ($rating != NULL) {
        if ($feedback != NULL)
          array_push($this->reviews, new Review($username, $rating, $feedback));
        else
          array_push($this->reviews, new Review($username, $rating, ""));
        
        $this->avgRating += $rating;
        $totalRatings++;
      }
    }
  }

  public function HasReviews() {
    return isset($this->reviews) && count($this->reviews) > 0;
  }

  public function checkSoldCount() {
    $sql = "SELECT SUM(OI.Quantity), O.CartFlag FROM OrderItems OI, Orders O
      WHERE ItemID = $this->itemID AND OI.OrderID = O.OrderID AND CartFlag = 0";

    $result = $this->conn()->query($sql) or die($this->conn()->error);

    while ($row = $result->fetch_assoc())
      return $row["SUM(OI.Quantity)"];
  }

  public function setData() {
    $conn = $this->conn();

    // Sécurisation des champs
    $name = $conn->real_escape_string($this->name);
    $brand = $conn->real_escape_string($this->brand);
    $description = $conn->real_escape_string($this->description);
    $category = (int) $this->category;
    $price = (float) $this->sellingPrice;
    $stock = (int) $this->quantityInStock;
    $id = (int) $this->itemID;

    $sql = "UPDATE Items SET
      Name = '$name',
      Brand = '$brand',
      Description = '$description',
      Category = $category,
      SellingPrice = $price,
      QuantityInStock = $stock
      WHERE ItemID = $id";

    $conn->query($sql) or die($conn->error);
  }

  // Setters
  public function setSellingPrice($sellingPrice) { $this->sellingPrice = $sellingPrice; }
  public function setQuantityInStock($quantityInStock) { $this->quantityInStock = $quantityInStock; }

  // Getters
  public function getItemID() { return $this->itemID; }
  public function getName() { return $this->name; }
  public function getBrand() { return $this->brand; }
  public function getDescription() { return $this->description; }
  public function getCategory() { return $this->category; }
  public function getSellingPrice() { return $this->sellingPrice; }
  public function getQuantityInStock() { return $this->quantityInStock; }
  public function getImage() { return $this->image; }
  public function getReviews() { return $this->reviews; }
  public function getAvgRatings() { return $this->avgRating / 5 * 100; }
}