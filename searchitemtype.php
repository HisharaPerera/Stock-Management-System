<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chathura Printers</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
	
</head>

<body id="page-top" class="index">

<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Chathura Printers</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="backend.php">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="insertPaper.php">Insert Paper</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="insertInk.php">Insert Ink</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="insertSeal.php">Insert Seal Handle</a>
                    </li>
					<li>
                        <a class="page-scroll" href="dashboard.php">Stock Manager</a>
                    </li>
                    <li>
                        <a href="anjana/logout.php?logout">Sign Out</a>
                        </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
	
	<?php
         if(isset($_POST['add']))
         {
            $dbhost = 'mysql.hostinger.in';
            $dbuser = 'u663784695_hish';
            $dbpass = 'hish@123';
            
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn )
            {
               die('Could not connect: ' . mysql_error());
            }
            
            $type_code = $_POST['type_code'];
            //$item_field = $_POST['item_field'];
            
             $sql = "SELECT * FROM item_type WHERE type_code='$type_code'";
             mysql_select_db('u663784695_print');
             $retval = mysql_query( $sql, $conn );
            
            if(! $retval )
            {
               die('Could not update data: ' . mysql_error());
            }
            
            while($row = mysql_fetch_array($retval, MYSQL_NUM))
            {
               echo "Type Code : {$row[0]} <br> ".
                     "Type Field : {$row[1]} <br> ".
                  "--------------------------------<br>";
            }
            
            echo "Fetched data successfully\n";
            mysql_close($conn);
         }
         else
         {
            ?>

    
    <!-- Contact Section -->
	
    <section id="contact">
        <div class="container">
            <div class="row">
			
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Search Item Type</h2>
                    
                </div>
            </div>
            <div class="row">
			<div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="post" action="<?php $_PHP_SELF ?>" name="sentMessage" id="contactForm" enctype="multipart/form-data" novalidate>
                                       
                    <select class="form-control" id="type_code" name="type_code"> 
                          <option value="1">Paper</option>
                          <option value="2" >Ink</option>
                          <option value="3" >Seal</option>
                      </select>
                   <br>
        
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
								<div class="row">
                                <button type="submit"  name="add" id="add" value="Add Item" class="btn btn-xl">Search Item Type</button>
								<button type="reset" class="btn btn-xl">Cancel</button>
                                           <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
								</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
		 <?php }?>

    <footer>
        <div class="container">
            <div class="row">
                <center><div >
                    <span class="copyright">Copyright &copy; CP 2015</span>
                </div></center>
                
            </div>
        </div>
    </footer>
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <!--<script src="js/contact_me.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>
