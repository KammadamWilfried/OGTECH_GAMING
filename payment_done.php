<?php
require_once "includes/class_autoloader.php";
include "header.php";

// Vérifie que l'ID de la commande est bien passé
if (!isset($_GET['order_id'])) {
    die("<p style='color:red;'>Order ID manquant.</p>");
}

$orderID = intval($_GET['order_id']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OG Tech - Merci</title>

  <!-- Redirection automatique vers la facture -->
  <meta http-equiv="refresh" content="5;url=generate_invoice_xml.php?order_id=<?= $orderID ?>">
</head>
<body>
  <div class="container center-align" style="margin-top: 100px;">
    <div class="rounded-card-parent" style="margin-right: 200px; margin-left: 200px;">
      <div class="rounded-card card-content">
        <h4 class="page-title green-text">Nous avons bien reçu votre paiement.</h4>
        <p>Merci pour votre achat. Vos articles commandés seront livrés en conséquence.</p>
        <p>Vous allez être redirigé(e) vers votre <strong>facture</strong> dans quelques secondes...</p>
        <div class="card-action" style='margin-top: 50px'>
          <a class="white-text btn" href="index.php">Retour à l'accueil</a>
        </div>
      </div>
    </div>
  </div>
</body>
<?php include "footer.php"; ?>
</html>