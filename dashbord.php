<?php

    if (isset($_POST['add'])) {
        header('Location: add_item.php');
    } 
    else if (isset($_POST['update'])) {
        header('Location: update_item.php');
    } 
    else if (isset($_POST['delete'])) {
        header('Location: issue_item.php');
    }
    else if (isset($_POST['search'])) {
        header('Location: search_item.php');
    }
    else if (isset($_POST['add1'])) {
        header('Location: add_item_type.php');
    }
    else if (isset($_POST['update1'])) {
        header('Location: update_item_type.php');
    }
    else if (isset($_POST['delete1'])) {
        header('Location: delete_item_type.php');
    }
       
    else if (isset($_POST['search1'])) {
         header('Location: search_item_type.php');
    }    
 
?>


<!DOCTYPE html>
<html>
<head>
	<title>Dashbord</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/dashbord.css"/>
</head>
<body>
	<div class="container">
        <div class="jumbotron">
        <h1>Chathura Printers</h1>
        <p><h2>Stock Manager</h2></p>
        </div>
        <form name="form" role="form" method="post" action="<?php $_PHP_SELF ?>">
             <h4>Item</h4>

             
                 <button type="submit"  name="add"     id="add"     value="Add Item"         class="btn btn-primary">Add Item</button>
                 <button type="submit"  name="update"  id="update"  value="Update Item"      class="btn btn-info">Update Item</button>
                 <button type="submit"  name="delete"  id="delete"  value="Delete Item Type" class="btn btn-warning">Issue Item</button>
                 <button type="submit"  name="search"  id="search"  value="Search Item"      class="btn btn-success">Search Item</button>
                
            
            <br><br>
            <h4>Item Type</h4>

            
                <button type="submit"  name="add1"    id="add1"    value="Add Item Type"    class="btn btn-primary">Add Item Type</button>
                <button type="submit"  name="update1" id="update1" value="Update Item Type" class="btn btn-info">Update Item Type</button>
                <button type="submit"  name="delete1" id="delete1" value="Delete Type Code" class="btn btn-warning">Delete Type Field</button>
                <button type="submit"  name="search1" id="search1" value="Search Item Type" class="btn btn-success">Search Item Type</button>
            
            

        </form>
    </div>
</body>
</html>