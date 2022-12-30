<?php

function write_to_console($data) {
	$console = $data;
	if (is_array($console))
	$console = implode(',', $console);
   
	echo "<script>console.log('Console: " . $console . "' );</script>";
   }

class Invoice{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "restaurant";   
	private $invoiceUserTable = 'invoice';	
    private $invoiceOrderTable = 'invoice';
	private $invoiceOrderItemTable = 'invoice_item';
	private $dbConnect = false;
   
	public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }	
	

	public function saveInvoice($POST) {	
	
		$sqlInsert = "
			INSERT INTO ".$this->invoiceOrderTable."(  customer_name, order_total_before_tax, order_total_tax, order_total_after_tax) 
			VALUES ('".$POST['customerName']."', '".$POST['subTotal']."', '".$POST['taxRate']."', '".$POST['totalAftertax']."')";		
		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId = mysqli_insert_id($this->dbConnect);
	
		
	for ($i = 0; $i < count($POST['productName']); $i++) {
			$sqlInsertItem = "
			INSERT INTO ".$this->invoiceOrderItemTable."(invoice_id, item_name, order_item_quantity, order_item_price, order_item_final_amount) 
			VALUES ('" .$lastInsertId ."', '"  .$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);

			$sqlUpdate_stock = "UPDATE `item` SET `quantity`=`quantity` - '".$POST['quantity'][$i]. "' WHERE item_name='".$POST['productName'][$i]."'";		
		mysqli_query($this->dbConnect, $sqlUpdate_stock);

		}    
  	
	}
	public function getItems(){
		$sqlQuery = "SELECT `item_id`, `item_name`, `unit_price` FROM `item`";
		return  $this->getData($sqlQuery);
	}	

	public function getPrice($id){
		return $id;
	}	

	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	
}
?>