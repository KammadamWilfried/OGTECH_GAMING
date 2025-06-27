<?php
require_once "includes/class_autoloader.php";
include "header.php";

if (!isset($_GET['order_id'])) {
    die("<p style='color:red;'>Order ID manquant.</p>");
}

$order_id = intval($_GET['order_id']);
$xmlPath = "factures/facture_$order_id.xml";

if (!file_exists($xmlPath)) {
    die("<p style='color:red;'>Facture introuvable.</p>");
}

$facture = simplexml_load_file($xmlPath);
?>

<div class="container" style="margin-top: 60px; margin-bottom: 80px;">
    <div class="card-panel white z-depth-3">
        <h4 class="center-align orange-text text-darken-2">Facture n°<?= $facture->order_id ?></h4>
        <div class="row">
            <div class="col s6">
                <p><strong>Client :</strong> <?= $facture->client ?></p>
                <p><strong>Date :</strong> <?= $facture->date ?></p>
            </div>
            <div class="col s6 right-align">
                <p><strong>OG TECH</strong></p>
                <p>www.ogtech.com</p>
            </div>
        </div>

        <table class="highlight responsive-table">
            <thead class="orange lighten-4">
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($facture->items->item as $item): ?>
                    <tr>
                        <td><?= $item->name ?></td>
                        <td><?= $item->quantity ?></td>
                        <td><?= number_format((float)$item->unit_price, 2) ?> €</td>
                        <td><?= number_format((float)$item->total, 2) ?> €</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot class="orange lighten-5">
                <tr>
                    <th colspan="3" class="right-align">Montant Total :</th>
                    <th><?= number_format((float)$facture->total, 2) ?> €</th>
                </tr>
            </tfoot>
        </table>

        <div class="center-align" style="margin-top: 30px;">
            <a href="index.php" class="btn orange darken-2">Retour à l'accueil</a>
            <a onclick="window.print();" class="btn grey darken-3">Imprimer la facture</a>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>