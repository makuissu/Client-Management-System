<div class="sidebar-menu">
    <header class="logo">
        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="dashboard.php"> <span id="logo"> <h1>SGC</h1></span> 
            <!--<img id="logo" src="" alt="Logo"/>--> 
        </a> 
    </header>
    <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
    <!--/down-->
    <div class="down">  

    
    
        <?php
$aid=$_SESSION['clientmsaid'];
$sql="SELECT AdminName from  tbladmin where ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
        <a href="dashboard.php"><img src="images/chastl.jpg" height="100" width="90"></a>
        <a href="dashboard.php"><span class=" name-caret"><?php  echo $row->AdminName;?></span></a>
        
        <?php $cnt=$cnt+1;}} ?>
        <ul>
            <li><a class="tooltips" href="admin-profile.php"><span>Profil</span><i class="lnr lnr-user"></i></a></li>
            <li><a class="tooltips" href="change-password.php"><span>Parametres</span><i class="lnr lnr-cog"></i></a></li>
            <li><a class="tooltips" href="logout.php"><span>Deconnexion</span><i class="lnr lnr-power-switch"></i></a></li>
        </ul>
    </div>
    <!--//down-->
    <div class="menu">
        <ul id="menu" >
            <li><a href="dashboard.php"><i class="fa fa-tachometer"></i> <span>Page d'accueil</span></a></li>

            <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span> Services</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="add-services.php"> Ajouter des services</a></li>
                    <li id="menu-academico-boletim" ><a href="manage-services.php">Gerer les services</a></li>
                   
                </ul>
            </li>
            <li><a href="add-client.php"><i class="fa fa-user"></i> <span>Ajouter des clients</span></a></li>
            <li><a href="manage-client.php"><i class="fa fa-table"></i> <span>Liste des clients</span></a></li>
            <li><a href="invoices.php"><i class="fa fa-file-text-o"></i> <span>Facture</span></a></li>

            <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span> Rapport </span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="bwdates-reports-ds.php">Rapports entre les dates </a></li>
                    <li id="menu-academico-boletim" ><a href="sales-reports.php">Rapport de ventes</a></li>
                   
                </ul>
            </li>
            <li><a href="search-invoices.php"><i class="fa fa-search"></i> <span>Rechercher une facture</span></a></li>
            
      
        </ul>
    </div>
</div>