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
	<?php
		require_once("database.php");
		$connect = connectToDatabase("u663784695_print");
		
		$records = viewPaperDetails($connect);
		$ink = viewInkDetails($connect);
		$handles = viewHandleDetails($connect);
		
		closeConnection($connect);
		
		$operation = "";
		if(isset($_GET["op"])){
			$operation = $_GET["op"];
		}
		
		$success = -1;
		if(isset($_GET["suc"])){
			$success = $_GET["suc"];
		}
		
		$record = "";
		if(isset($_GET["rec"])){
			$record = $_GET["rec"];
		}
		
		if($operation == "del"){
			if($success == 1){
				echo "<div class=\"alert alert-success\">
				<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Success!</strong> $record successfully deleted.
				</div>";
			}else{
				echo "<div class=\"alert alert-warning\">
				<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Warning!</strong> Record not found.
				</div>";
			}
		}else if($operation == "ins"){
			if($success == 1){
				echo "<div class=\"alert alert-success\">
				<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Success!</strong> $record successfully inserted.
				</div>";
			}else{
				echo "<div class=\"alert alert-warning\">
				<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Warning!</strong> Record was not inserted.
				</div>";
			}		
		}else if($operation == "upd"){
			if($success == 1){
				echo "<div class=\"alert alert-success\">
				<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Success!</strong> $record successfully updated.
				</div>";
			}else{
				echo "<div class=\"alert alert-warning\">
				<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
				<strong>Warning!</strong> Could not find $record to update.
				</div>";
			}		
		}
	?>
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
                        <a class="page-scroll" href="dashbord.php">Stock Manager</a>
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

	<!-- Header -->
    <header>
        <div class="container">
		<br><br><br><br><br><br>
            <div >
            <h2>Stock Manager</h2>
            <h1><i>Item</i></h1>
            <a href="additem.php"><button class="btn btn-xl">Add Item</button></a>
            <a href="updateitem.php"><button class="btn btn-xl">Update Item</button></a>
            <a href="issueitem.php"><button class="btn btn-xl">Issue Item</button></a>
            <a href="searchItem.php"><button class="btn btn-xl">Search Item</button></a>
            
            <br>
            <h1><i>Item Type</i></h1>
            <a href="addItemType.php"><button class="btn btn-xl">Add Item Type</button></a>
            <a href="updateitemtype.php"><button class="btn btn-xl">Update Item Type</button></a>
            <a href="deleteitemtype.php"><button class="btn btn-xl">Delete Item Type</button></a>
            <a href="searchitemtype.php"><button class="btn btn-xl">Search Item Type</button></a>
			<br><br>
			<a href="supplier_order.php"><button class="btn btn-xl">Place Supplier Order</button></a>
            <br><br><br><br><br><br><br>
            
            </div>
			<div class="col-md-2"></div>
			<div class="col-md-8">
			
			</div>
        </div>
    </header>
	
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
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>
