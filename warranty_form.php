<!DOCTYPE html>
<html>

<head>
<title>Warranty form - OG Tech</title>
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
	
	textarea {
		resize:none;
		outline:none;
		background-color:transparent;
		width:100%;
		height:120px;
		overflow:auto;
	}
	
	textarea:focus {
		outline:solid #44a69b;
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
<h1 style="font-weight:bold">Warranty Form</h1>
<p class="text">OG Tech / Warranty Form</p>
</div>

<div class="textbox">
	<p class="text">Quelle catastrophe ! Votre ordinateur est en panne et vous êtes trop occupé pour l’emmener en réparation. Heureusement pour vous,
vous êtes couvert par le service de ramassage et de retour OG TECH ! Nous viendrons récupérer votre ordinateur ou matériel, le réparer ou le remplacer,
et vous le rapporter à votre convenance, vous faisant ainsi gagner du temps et de l’argent.</p>
	<br><br>
	<form method="post">
	<table class="text">
		<tr>
			<td>Email:</td>
		</tr>
		<tr>
			<td><input class="text" type="email" name="email" required="required" placeholder="Example : john123@mail.com"></input></td>
		</tr>
		<tr>
			<td>Full name:</td>
		</tr>
		<tr>
			<td><input class="text" name="name" required="required" placeholder="Example : Kammadam Wilfried"></input></td>
		</tr>
		<tr>
			<td>Address:</td>
		</tr>
		<tr>
			<td><textarea class="text" name="address" required="required" placeholder="Example : Yaounde Ngousso, Mobile Omnisport, Douala Akwa Nord, Yaounde Odza"></textarea></td>
		</tr>
		<tr>
			<td>Contact Number</td>
		</tr>
		<tr>
			<td><input class="text" type="tel" name="contact" required="required" placeholder="Example : 621270674"></input></td>
		</tr>
		<tr>
			<td>Product name:</td>
		</tr>
		<tr>
			<td><input class="text" type="text" name="product_name" required="required" placeholder="Example : Asus B85M-G"></input></td>
		</tr>
		<tr>
			<td>Problems that you are facing:</td>
		</tr>
		<tr>
			<td><textarea class="text" name="problem_statement" required="required" placeholder="Example : Moniteur non fonctionnel"></textarea></td>
		</tr>
		<tr>
			<td><input class="button" type="submit" name="submit" value="Submit form"></input></td>
		</tr>
	</table>
	</form>
</div>

<?php include "footer.php";?>
</body>

</html>