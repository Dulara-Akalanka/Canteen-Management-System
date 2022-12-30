<?php 

session_start();
if(!isset($_SESSION['username'])) {
    header("Location: ../../index.php");
}

include('inc/header.php');
include 'Invoice.php';
$invoice = new Invoice();

if(!empty($_POST['productName']) && $_POST['productName']) {	
	$invoice->saveInvoice($_POST);
}
?>

<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">

<body>
<div class="topnav">
<ul>
<li><img src="logo2.PNG" /></li>      
<div style="margin-right:100px">          
<li style = "color:white;float:right;font-size:50px;">
<table>
<tr ><td></td>
	<td style = "font-family: serif;">
<?php
// Print the array from getdate()
getdate();
//echo "<br><br>";
// Return date/time info of a timestamp; then format the output
$mydate=getdate(date("U"));
echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
?>
</td>
</tr>
<tr>
<td></td>
<td style = "font-size:20px;float:right;  padding-top: 10px;
  padding-bottom: 20px;
  padding-left: 30px;
  padding-right: 40px;">
<a href="../login/logout.php"><button class="btn btn-danger" style = "margin-right:50px;">LOG OUT</button></a>
</td>
</tr>
</table>
</li>
</div>
</ul>
</div>

<div class="container content-invoice" id = "div1">
	<form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
		<div class="load-animate animated fadeInUp">
			
			<input id="currency" type="hidden" value="$">
			<div class="row">


				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
					<h3>From,</h3>
					<p style = "font-size:20px;">
					<?php echo "Dish-R" ?><br>	
					<?php echo "Negombo" ?><br>	
					<?php echo "031 2285245" ?><br>
					<?php echo"dish-r@gmail.com" ?><br>	<br>
					</p>

<?php 

$test=	$invoice->getItems();
	
?>
				</div>      		
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
					<h3>Customer,</h3>
					<div class="form-group">
						<input type="text" class="form-control" name="customerName" id="companyName" placeholder="Customer Name" autocomplete="off" >
					</div>
					
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table table-bordered table-hover" id="invoiceItem">	
						<tr>
							<th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
							
							<th width="38%">Item Name</th>
							<th width="15%">Quantity</th>
							<th width="15%">Price</th>								
							<th width="15%">Total</th>
						</tr>							
						<tr>
							<td><input class="itemRow" type="checkbox" ></td>
							
							
							<td>	
							<select name="productName[]" id="productName_1"  class="form-control" onchange="myFunction(this)">
                              <?php 
                                 foreach($test as $row){
                                 ?>
                              <option id="<?php echo $row['item_name']; ?>" value="<?php echo $row['item_name']; ?>" class="vegitable custom-select" >
                                 <?php echo $row['item_name']; ?>
                              </option>
                              <?php  }?>   
                           </select>
						
								 </td>
						
							<td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
							<td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
							<td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="on" readonly></td>
						</tr>						
					</table>
				</div>
			</div>
			
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<span class="form-inline">
						<div class="form-group">
							<label>Subtotal: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">Rs.</div>
								<input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
							</div>
						</div>
						<div class="form-group">
							<label>Tax Rate: &nbsp;</label>
							<div class="input-group">
								<input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
								<div class="input-group-addon">%</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tax Amount: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">Rs.</div>
								<input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
							</div>
						</div>							
						<div class="form-group">
							<label>Total: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">Rs.</div>
								<input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
							</div>
						</div>
					</span>
				</div>
			</div>		      	
		</div>
	</form>			
</div>
</div>	
<hr style="height:3px;border-width:0;color:black;background-color:black">
<center>
<div class="row">	
	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
		<div class="form-group">
			<button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
			<button class="btn btn-success" id="addRows" type="button">+ Add More</button>
			<br><br>
			<input type="hidden" value="<?php echo 'userid'; ?>" class="form-control" name="userId">
			<input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Save Invoice" onclick="printContent('div1')" class="btn btn-success submit_btn invoice-save-btm">						
		</div>			
	</div> 
</div>
</center>
</body>


<!-- code for prnting the bill -->
<script>
    function printContent(e1){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(e1).innerHTML;
        document.body.innerHTML=printcontent;
        window.print();
        document.body.innerHTML=restorepage;
    }
   
</script>


