<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>SYSTEME DE GESTION DE LA CLIENTELE|| Voir la facture </title>
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
	<!-- /js -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!-- //js-->
</head> 
<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<?php include_once('includes/header.php');?>
				<!-- //header-ends -->
				<!--outter-wp-->
				<div class="outter-wp">
					<!--sub-heard-part-->
					<div class="sub-heard-part">
						<ol class="breadcrumb m-b-0">
							<li><a href="dashboard.php">Accueil</a></li>
							<li class="active">Voir la facture</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
		<div class="graph-visual tables-main" id="exampl">
						
					
						<h3 class="inner-tittle two">Details des services </h3>
						<?php
$invid = intval($_GET['invoiceid']);
$sql_client = "SELECT tblclient.ContactName, tblclient.CompanyName, tblclient.Workphnumber, tblclient.Email, tblclient.AccountID, tblinvoice.PostingDate 
               FROM tblclient   
               JOIN tblinvoice ON tblclient.ID = tblinvoice.Userid 
               WHERE tblinvoice.BillingId = :invid 
               LIMIT 1";
$query_client = $dbh->prepare($sql_client);
$query_client->bindParam(':invid', $invid, PDO::PARAM_INT);
$query_client->execute();

$row_client = $query_client->fetch(PDO::FETCH_OBJ);

if ($row_client) {
    ?>
    <div class="graph">
        <div class="tables">
            <h4>Facture #<?php echo $invid; ?></h4>
            <table class="table table-bordered" width="100%" border="1">
                <tr>
                    <th colspan="8">Details client</th>
                </tr>
                <tr>
                    <th>Nom de la compagnie</th>
                    <td><?php echo htmlentities($row_client->CompanyName); ?></td>
                    <th>Nom</th>
                    <td><?php echo htmlentities($row_client->ContactName); ?></td>
                    <th>Numero</th>
                    <td><?php echo htmlentities($row_client->Workphnumber); ?></td>
                    <th>Email </th>
                    <td><?php echo htmlentities($row_client->Email); ?></td>
                </tr>
                <tr>
                    <th>Id compte</th>
                    <td><?php echo htmlentities($row_client->AccountID); ?></td>
                    <th>Date facture</th>
                    <td colspan="6"><?php echo htmlentities($row_client->PostingDate); ?></td>
                </tr>
            </table>
            <table class="table table-bordered" width="100%" border="1">
                <tr>
                    <th colspan="3">Details des services</th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Service</th>
                    <th>Prix</th>
                </tr>

                <?php
                $sql_services = "SELECT tblservices.ServiceName, tblservices.ServicePrice  
                                 FROM tblinvoice 
                                 JOIN tblservices ON tblservices.ID = tblinvoice.ServiceId 
                                 WHERE tblinvoice.BillingId = :invid";
                $query_services = $dbh->prepare($sql_services);
                $query_services->bindParam(':invid', $invid, PDO::PARAM_INT);
                $query_services->execute();

                $rows_services = $query_services->fetchAll(PDO::FETCH_OBJ);

                $cnt = 1;
                $gtotal = 0; // Initialisez la variable $gtotal à 0 avant la boucle
                foreach ($rows_services as $row_service) {
                    ?>
                    <tr>
                        <th><?php echo $cnt; ?></th>
                        <td><?php echo $row_service->ServiceName ?></td>
                        <td><?php echo $subtotal = $row_service->ServicePrice . " Fcfa " ?></td>
                    </tr>
                    <?php
                    $cnt++;
                    $gtotal += $row_service->ServicePrice; // Ajoutez le prix de chaque service au total
                }
                ?>

                <tr>
                    <th colspan="2" style="text-align:center">Grand Total</th>
                    <th><?php echo $gtotal . " Fcfa" ?></th>
                </tr>
            </table>
<table class="table table-bordered" width="100%" border="1"> 
<tr>

<p style="margin-top:1%"  align="center">
  <i class="fa fa-print fa-2x" style="cursor: pointer;"  OnClick="CallPrint(this.value)" ></i>
</p>

							</div>

						</div>
				
					</div>
					<!--//graph-visual-->
				</div>
				<!--//outer-wp-->
				<?php include_once('includes/footer.php');?>
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<?php include_once('includes/sidebar.php');?>
		<div class="clearfix"></div>		
	</div>
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {                
			if (toggle)
			{
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({"position":"absolute"});
			}
			else
			{
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({"position":"relative"});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>
</body>
</html>
<?php }  ?>