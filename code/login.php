<link rel="stylesheet" type="text/css" href="styles/css.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link rel="icon"type="jpg" href="img/logo.jpg">
<title>Connexion </title>
<meta charset="utf-8">

<div class="login">
	<h1>Login</h1>
	<form action="" method="post" name="Login_Form">
		<table width="400" border="0" aligne="center" cellpadding="5" cellspacing="1" class="Table">
			<?php if(isset($msg)){?>
				<tr>
					<td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
				</tr>
			<?php } ?>
			<label for="username">
				<i class="fas fa-user"></i>
			</label>
			<input type="text" name="Username" placeholder="Nom d'utilisateur" class="Input" required>
			<label for="password">
				<i class="fas fa-lock"></i>
			</label>
			<input type="password" name="Password" placeholder="Mot de passe" class="Input" required>
			<input type="submit" name="Submit" value="Login" class="Button3">
		</table>
	</form>
</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="main.js"></script>


<?php session_start();
if(isset($_POST['Submit'])){
	$logins = array('login' => 'mdp', 'admin' => 'admin');

	$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
	$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

if(isset($logins[$Username]) && $logins[$Username] == $Password){
	$_SESSION['UserData']['Username']=$logins[$Username];
	header("location:index.php");
exit;
}else { ;?>
	<script>alert("Nom d'utilisateur ou mot de passe incorrect");</script>
<?php  
};
};
?>	