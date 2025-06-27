<?php
require_once "includes/class_autoloader.php";
include "header.php";

function EmptyInputPayment($name, $number, $month, $year, $cvv, $address, $phone, $state, $zip) {
    return empty($name) || empty($number) || empty($month) || empty($year) || empty($cvv)
        || empty($address) || empty($phone) || empty($state) || empty($zip);
}

if (isset($_POST["payment"])) {
    $name = $_POST["card_name"];
    $number = $_POST["card_number"];
    $month = $_POST["exp_month"];
    $year = $_POST["exp_year"];
    $cvv = $_POST["cvv"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];

    $orderID = $_GET["order_id"];
    $memberID = $_GET["member_id"];

    if (EmptyInputPayment($name, $number, $month, $year, $cvv, $address, $phone, $state, $zip)) {
        echo("<script>location.href = 'payment.php?error=empty_input&order_id=$orderID&member_id=$memberID&view_order=1';</script>");
        exit();
    }

    $conn = new Dbhandler();

    // Enregistrer le paiement
    $sql = "INSERT INTO Payment(OrderID, PaymentDate) VALUES($orderID, CURRENT_TIME)";
    $conn->conn()->query($sql) or die($conn->error);

    // Finaliser la commande
    $sql = "UPDATE Orders SET CartFlag = 0 WHERE OrderID = $orderID";
    $conn->conn()->query($sql) or die($conn->error);

    // Créer une nouvelle commande vide (panier) pour l'utilisateur
    $sql = "INSERT INTO Orders(MemberID, CartFlag) VALUES($memberID, 1)";
    $conn->conn()->query($sql) or die($conn->error);

    // Rediriger vers la page de remerciement avec l'ID pour générer la facture
    echo("<script>location.href = 'payment_done.php?order_id=$orderID';</script>");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>OG Tech PC - Paiement</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body>
<div class="container">
  <div class="col s12" style="margin-bottom: 50px;">
    <?php include "static/pages/cart_items.php"; ?>
  </div>
  <div class="selectable-card grey darken-4" id="no-hover">
    <div class="row">
      <h4 class="orange-text bold" style="padding-top: 10px;">Paiement</h4>
    </div>

    <form class="row white-text"
      action="payment.php?order_id=<?= $_GET["order_id"] ?>&member_id=<?= $_GET["member_id"] ?>&view_order=1"
      method="POST" style="margin-left: 50px;">
      <div class="col s8">
        <!-- Infos de carte -->
        <div class="row">
          <div class="input-field col s6">
            <input id="name" type="text" name="card_name" placeholder="XXX XXX XXX" class="validate white-text">
            <label class="active cyan-text" for="name">Nom sur la carte</label>
          </div>
          <div class="input-field col s6">
            <input id="card_number" type="text" name="card_number" placeholder="0000 0000 0000 0000" class="validate white-text">
            <label class="active cyan-text" for="card_number">Numéro de carte</label>
          </div>
        </div>

        <!-- Date et CVV -->
        <div class="row">
          <div class="input-field col s4">
            <input id="exp_month" type="text" name="exp_month" class="validate white-text">
            <label for="exp_month">Mois d’expiration</label>
          </div>
          <div class="input-field col s4">
            <input id="exp_year" type="text" name="exp_year" class="validate white-text">
            <label for="exp_year">Année d’expiration</label>
          </div>
          <div class="input-field col s4">
            <input id="cvv" type="text" name="cvv" class="validate white-text">
            <label for="cvv">CVV</label>
          </div>
        </div>

        <!-- Adresse -->
        <div class="row">
          <div class="input-field">
            <textarea id="home" name="address" placeholder="N° Maison, Rue, Quartier, Région, etc." class="materialize-textarea white-text"></textarea>
            <label class="active cyan-text" for="home">Adresse de facturation</label>
          </div>
        </div>

        <!-- Téléphone et code postal -->
        <div class="row">
          <div class="input-field col s4">
            <input id="phone" type="text" name="phone" class="validate white-text">
            <label for="phone">Numéro de téléphone</label>
          </div>
          <div class="input-field col s4">
            <input id="state" type="text" name="state" class="validate white-text">
            <label for="state">Région</label>
          </div>
          <div class="input-field col s4">
            <input id="zip" type="text" name="zip" class="validate white-text">
            <label for="zip">Code postal</label>
          </div>
        </div>

        <?php if (isset($_GET["error"]) && $_GET["error"] == "empty_input"): ?>
          <p style="color:red;">*Veuillez remplir tous les champs !</p>
        <?php endif; ?>

        <button type="submit" name="payment" class="btn" style="margin-bottom: 20px;">Confirmer le paiement</button>
      </div>

      <div class="col s4">
        <div class="rounded-card tint-glass-black" style="margin-top: 100px;">
          <div class="card-content">
            <label class="bold white-text" style="font-size: 24px;">Cartes acceptées</label>
            <div style= 'margin-bottom: 20px; padding: 7px 0; font-size: 40px;'>
              <i class="fa fa-cc-visa" style="color: navy;"></i>
              <i class="fa fa-cc-amex" style="color: blue;"></i>
              <i class="fa fa-cc-mastercard" style="color: red;"></i>
              <i class="fa fa-cc-discover" style="color: orange;"></i>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
<?php include "footer.php"; ?>
</html>