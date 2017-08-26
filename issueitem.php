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
                
            $item_id = $_POST['item_id'];
            mysql_select_db('u663784695_print');

            $sql = "SELECT quantity,reoder_level FROM item WHERE item_id = '$item_id'";
            $retval = mysql_query($sql,$conn);
            $row = mysql_fetch_array($retval);

            $new_quantity = $row[0]-1;
            $reoder_level = $row[1];

            $sql1 = "UPDATE item SET quantity=$new_quantity WHERE item_id = '$item_id'";

            if($new_quantity == -1){
                echo "Stock Empty...!";
            }
            else if($new_quantity <= $reoder_level){
              $retval1 = mysql_query( $sql1, $conn );
              //echo "Lower than reoder level can oder new stock...!";
               $message = "Lower than reoder level can oder new stock...! You have successfully Issue Item..!!";
               echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else{
              $retval1 = mysql_query( $sql1, $conn );
              //echo "item issue seccessfully...!";
              $message = "You have successfully Issue Item..!!";
              echo "<script type='text/javascript'>alert('$message');</script>";
            }
            
                /*if(! $retval1 )
                {
                   die('Could not delete data: ' . mysql_error());
                }*/
            
            //echo "Deleted data successfully\n";
            
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
                    <h2 class="section-heading">Issue Item</h2>
                    
                </div>
            </div>
            <div class="row">
            <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="post" action="<?php $_PHP_SELF ?>" name="sentMessage" id="contactForm" enctype="multipart/form-data" novalidate>
                                       
                    <input type="text" class="form-control" id="item_id" name="item_id" placeholder="Item ID">
                   <br>
                 

                   
            
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <div class="row">
                                <button type="submit"  name="add" id="add" value="Add Item" class="btn btn-xl">Issue Item</button>
                                <button type="reset" class="btn btn-xl">Cancel</button>
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
