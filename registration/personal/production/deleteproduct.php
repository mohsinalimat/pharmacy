<?php
      //ob_start();
	  session_start();
      
      include_once('connect.php');
                    
      if( !isset($_SESSION['user']) ) {
		header("Location: ../../index.php");
		exit;
      }
      
      $pro=$_SESSION['user'];
      
    $var="SELECT s.UserPharmacyName, s.UserAddress, s.UserContact, s.UserName, s.UserEmail, s.UserPass, s.UserWorkHours, s.UserINN, s.UserPhoto FROM pharmacy s  WHERE s.UserId='$pro'";
            $result=mysqli_query($conn, $var);
                        $row=mysqli_fetch_assoc($result)
                        ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Drugs</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
      
    <div class="container body">
       <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Pharmacy.uz</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="uploads/<?= $row["UserPhoto"] ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $row["UserName"] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
           <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="personalinfo.php">Personal Info</a></li>
                      <li><a href="changeinfo.php">Edit</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-briefcase"></i> My Pharmacy <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="changetheprice.php">Change the price</a></li>
                      <li><a href="addproduct.php">Add new product</a></li>
                      <li><a href="deleteproduct.php">Delete product</a></li>
                    </ul>
                    
                    
                    <li><a href="../../logout.php?logout"><i class="fa fa-power-off"></i>Log Out</a></li>
                </ul>
              </div>
              
            </div>
            <!-- /sidebar menu -->

            
            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="uploads/<?= $row["UserPhoto"] ?>" alt=""><?= $row["UserName"] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="personalinfo.php"> Profile</a></li>
                    <li><a href="../../logout.php?logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Here you can delete drugs from your store</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      
                    </p>
                      <form action="delete.php" method="post">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                        
                      <thead>
                        <tr>
                        <th>Name</th>
                        <th>Check to delete the product</th>
                        </tr>
                      </thead>


                      <tbody>
                          <?php
                include_once('connect.php');
                    
                        
    $var="SELECT p.id, p.product FROM product p INNER JOIN link l ON l.idDrug=p.id INNER JOIN pharmacy s ON s.UserId=l.idPharmacy WHERE s.UserId='$pro'";
            $result=mysqli_query($conn, $var);
                           $k=1;
                    while($row=mysqli_fetch_assoc($result))
                    {
                            
                           
            ?>
                        <tr>
                          <td><?= $row["product"] ?></td>
                          
                          
                           <td>
                            <input type="checkbox" name="name<?= $k ?>" value="<?= $row["id"] ?>">  
                                <?php  $k=$k+1 ?>
                           </td>
                        </tr>
                      <?php
                    }
                    ?>  
                        
                      </tbody>
                    </table>
                          <button class="btn btn-primary" id="btn" style=" width:90px;" onclick="delete.php">Delete</button>
                          </form>
                  </div>
            </div>
</div>
</div>

 
        <!-- /footer content -->
      </div>
        <!-- /page content -->

           </div>
 
     <div class="subfooter">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center">Team X © 2017 Pharmacy</p>
						</div>
					</div>
				</div>
			</div>     
        
      
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>