
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery Ajax Bootstrap</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<div class="container">
  <div class="jumbotron">
    <h1>Orders</h1>      
  </div>     
</div>
<body onload="viewdata()">
  <p><br/></p>
  <div class="container">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      Add Order
    </button>
    <br/>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Order</h4>
          </div>
          <div class="modal-body">

            <form>
              <div class="form-group">
                <label for="supId">Supplier ID</label>
                <select class="form-control" id="supId">
                  <?php
                    include "config.php";
                    $res2 = $conn->query("select supId from supplier");
                    while ($row = $res2->fetch_assoc()) {
                      echo "<option value=\"supId\">" . $row['supId'] . "</option>";
                    }
                    ?>
                </select>
              </div>
              <div class="form-group">
                <label for="orderDate">Order Date</label>
                <input type="date" class="form-control" id="orderDate">
              </div>
              <div class="form-group">
                <label for="delDate">Delivery Date</label>
                <input type="date" class="form-control" id="delDate" width="5">
              </div>
              <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea type="text" class="form-control" rows="5" id="remarks"></textarea>
              </div>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="save" class="btn btn-primary">Save</button>


          </div>
        </div>
      </div>
    </div>    
    <div id="info"></div>
    <br/>
    <div id="viewdata"></div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script>

  function viewdata(){
   $.ajax({
    type: "GET",
    url: "SupplierOrder/getdata.php"
  }).done(function( data ) {
   $('#viewdata').html(data);
 });
}

$('#save').click(function(){
	
	var supId = $('#supId').val();
	var orderDate = $('#orderDate').val();
	var delDate = $('#delDate').val();
	var remarks = $('#remarks').val();
	
	var datas="supId="+supId+"&orderDate="+orderDate+"&delDate="+delDate+"&remarks="+remarks;

	$.ajax({
    type: "POST",
    url: "SupplierOrder/newdata.php",
    data: datas
  }).done(function( data ) {
   $('#info').html(data);
   viewdata();
 });
});
function updatedata(str){
	
	var id = str;
	var supId = $('#supId'+str).val();
	var orderDate = $('#orderDate'+str).val();
	var delDate = $('#delDate'+str).val();
	var remarks = $('#remarks'+str).val();
	
	var datas="supId="+supId+"&orderDate="+orderDate+"&delDate="+delDate+"&remarks="+remarks;

	$.ajax({
    type: "POST",
    url: "SupplierOrder/updatedata.php?id="+id,
    data: datas
  }).done(function( data ) {
   $('#info').html(data);
   viewdata();
 });
}
function deletedata(str){
	
	var id = str;

	$.ajax({
    type: "GET",
    url: "SupplierOrder/deletedata.php?id="+id
  }).done(function( data ) {
   $('#info').html(data);
   viewdata();
 });
}

function viewItems(str){

  var id = str;

  $.ajax({
   type: "GET",
   url: "SupplierOrder/viewItems.php?id="+id
 }).done(function( data ) {
  $('#info').html(data);
  viewdata();
});
}



</script>
</body>

