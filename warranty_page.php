<!DOCTYPE html>
<html>
<head>
<title>Warranty Info - OG Tech PC</title>
<?php include "header.php";?>

<style>
	.text {
		font-size:18px;
		color:white;
	}
	
	.textbox {
		margin-left:200px;
		margin-right:200px;
	}
	
	.button {
		font-size:18px;
		border:3px solid white;
		cursor:pointer;
		width:140px;
		height:40px;
		background-color:transparent;
		color:white;
		box-shadow:5px 5px 3px 0px;
	}
	
	.button:hover {
		box-shadow:5px 5px 3px 0px green;
	}
	
</style>
</head>

<body>

<div class="page-title background-overlay" style="text-align:center;padding-top: 140px;padding-bottom: 140px">
<h1 style="font-weight:bold">Warranty Info</h1>
<p class="text">OG Tech / Warranty Info</p>
</div>

<div class="textbox">
	<p class="text">Quelle catastrophe ! Votre ordinateur est en panne et vous êtes trop occupé pour l’emmener en réparation. Heureusement pour vous, vous bénéficiez du service de ramassage et retour OG TECH !
Nous viendrons récupérer votre ordinateur ou matériel, le réparer ou le remplacer, puis vous le rapporter à votre convenance, vous faisant ainsi gagner du temps et de l’argent.</p>
	<br>
	<ul style="list-style:none;content:bullet;color:white">
		<li class="text">Veuillez remplir et soumettre le formulaire avant que l’un de nos collègues ne vous contacte par Email ou Whatsapp.</li>
		<br><li class="text">Emballez le matériel dans sa boîte d’origine, enveloppez-le de papier bulle, puis placez-le dans une autre boîte.
Pour un PC complet, veuillez le remettre dans sa boîte d’origine avec ses blocs de polystyrène.
Retirez la carte graphique si elle est trop lourde.
Ensuite, nous enverrons GD Express pour récupérer le colis.
(Nous NE couvrons PAS les dommages physiques causés par le transport ; ainsi, le client assume l’entière responsabilité de tout dommage physique dû à un mauvais emballage.).</li>
		<br><li class="text">Des frais de livraison et de service peuvent s’appliquer SI le matériel testé ne présente aucune panne et/ou si le problème est causé par un matériel non acheté chez OG Tech PC.
La décision finale revient au personnel de OG Tech PC.</li>
		<br><li class="text">Veuillez noter que le SERVICE GRATUIT DE RAMASSAGE ET DE RETOUR ne couvre que les produits achetés chez OG Tech PC et encore sous garantie.</li>
		<br><li class="text">En soumettant le FORMULAIRE, vous reconnaissez et acceptez les Conditions Générales ci-dessus. </li>
	</ul>
	
	<input class="button" type="button" onclick="window.location.href='warranty_form.php'" value="Warranty Form"></input>
</div>

</body>

<?php include "footer.php";?>
</html>