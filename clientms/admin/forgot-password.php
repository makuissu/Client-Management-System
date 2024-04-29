<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT Email FROM tbladmin WHERE Email=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tbladmin set Password=:newpassword where Email=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Votre mot de passe a ete change avec succes');</script>";
}
else {
echo "<script>alert('Email ou code invalide');</script>"; 
}
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>SYSTEME DE GESTION DE LA CLIENTELE ||Page de mots de passe oublies</title>

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!--clock init-->
	<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Le nouveau mot de passe et le champ de confirmation du mot de passe ne correspondent pas !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head> 
<body>
	<div class="error_page">

		<div class="error-top">
			<h2 class="inner-tittle page">SGC</h2>
			<div class="login">
				
				<div class="buttons login">
				<h3 class="inner-tittle t-inner" style="color: orange; font-weight: bold; text-decoration: underline orange;"> Mot de passe oublie </h3>
				</div>
				<form id="login" method="post" name="chngpwd" onSubmit="return valid();"> 

					<input type="text" class="text" placeholder="E-mail "  name="email" required="true">
					<input type="text" class="text" placeholder="Numero de telephone"  required="true" name="mobile" maxlength="10" pattern="[0-9]+">
					<input type="password" placeholder="Nouveau mot de passe"  name="newpassword" required="true">
					<input type="password" placeholder="Confirmer le nouveau mot de passe"  name="confirmpassword" required="true">
					<div class="submit"><input type="submit"   style="color: orange; font-weight: bold;" onclick="myFunction()" value="Renvoyer" name="submit" ></div>
					<div class="clearfix"></div>

					<div class="new">
						<p><a href="index.php">Deja un compte</a></p>
						<div class="clearfix"></div>
					</div>
				</form>
			</div>


		</div>


		<!--//login-top-->
	</div>

	<!--//login-->
	<!--footer section start-->
	<div class="footer">
		
		<?php include_once('includes/footer.php');?>
	</div>
	<!--footer section end-->
	<!--/404-->
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>