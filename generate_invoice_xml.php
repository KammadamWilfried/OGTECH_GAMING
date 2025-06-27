<?php
require_once "includes/class_autoloader.php";

if (!isset($_GET['order_id'])) {
    die("Order ID is missing.");
}

$order_id = intval($_GET['order_id']);

// Connexion à la base
$conn = new Dbhandler();

// 1. Récupérer le nom du client
$query = "SELECT m.username AS client_name
          FROM Orders o
          JOIN Members m ON o.MemberID = m.MemberID
          WHERE o.OrderID = $order_id LIMIT 1";
$result = $conn->conn()->query($query);
$row = $result->fetch_assoc();
$client_name = $row["client_name"] ?? "Client inconnu";

// 2. Récupérer les produits de la commande
$query = "SELECT i.Name AS product_name, oi.Quantity AS quantity, i.SellingPrice AS unit_price
          FROM OrderItems oi
          JOIN Items i ON oi.ItemID = i.ItemID
          WHERE oi.OrderID = $order_id";
$result = $conn->conn()->query($query);

// 3. Créer le fichier XML
$xml = new SimpleXMLElement('<facture></facture>');
$xml->addChild('order_id', $order_id);
$xml->addChild('client', $client_name);
$xml->addChild('date', date('Y-m-d H:i:s'));

$items = $xml->addChild('items');
$total = 0;

while ($row = $result->fetch_assoc()) {
    $line = $items->addChild('item');
    $line->addChild('name', $row['product_name']);
    $line->addChild('quantity', $row['quantity']);
    $line->addChild('unit_price', $row['unit_price']);
    $line->addChild('total', $row['unit_price'] * $row['quantity']);
    $total += $row['unit_price'] * $row['quantity'];
}

$xml->addChild('total', $total);

// 4. Sauvegarder dans le dossier factures/
if (!file_exists("factures")) {
    mkdir("factures", 0777, true);
}
$xml->asXML("factures/facture_$order_id.xml");

// 5. Rediriger vers la facture HTML
header("Location: invoice.php?order_id=$order_id");
exit;
?>