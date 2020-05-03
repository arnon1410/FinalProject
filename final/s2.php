<?php  
 //filter.php  
 if(isset($_POST["from_date"]))  
 {  
     $con= mysqli_connect("localhost","root","","final") or die("Error: " . mysqli_error($con));
     mysqli_query($con, "SET NAMES 'utf8' ");
     error_reporting( error_reporting() & ~E_NOTICE );
     date_default_timezone_set('Asia/Bangkok');
      $output = '';  
      $query = "  
           SELECT s.SaleDate, d.SaleID, p.productname, d.price, d.Quantity, (d.Price*d.Quantity) as amount, l.name
			FROM sales s
			LEFT OUTER JOIN sale_details d ON d.SaleID=s.SaleID
			LEFT OUTER JOIN products p ON d.productid=p.productid  
			LEFT OUTER JOIN login l ON l.username=s.username  
           WHERE SaleDate ='".$_POST["from_date"]."' ";  
      $result = mysqli_query($con, $query); 
	 $query1 ="SELECT SaleDate, SUM(GrandTotal) as total
			FROM sales
			WHERE SaleDate ='".$_POST["from_date"]."' 
			GROUP BY SaleDate
			";
	  $result1 = mysqli_query($con, $query1); 
	  $result2 = mysqli_query($con, $query1); 
	  $total = array();
	   
                     while($rs = mysqli_fetch_array($result2)) 
						{  
						$total[] = "\"".$rs['$total']."\""; 
						}
						$total[] = implode(",", $total);
                     
					  
                     while($rw = mysqli_fetch_array($result1)) 
					 {
					 
      $output .= '
	  
           <table class="table table-dark">  
                <tr>  
                <th width="15%">Date</th>  
                <th width="15%">SaleID</th>  
                <th width="20%">Product</th>  
                <th width="10%">Price</th>  
                <th width="10%">Quantity</th>
                <th width="12%">Amount</th>
                <th width="12%">Name Employ</th>
					 
                </tr>  
						<tbody></tbody>
						<tfoot>
						<tr>
						<th colspan="3">TOTAL AMOUNT</th>
						<td> '.number_format($rw["total"]).' ฿</td>
						</tr>
						</tfoot>
					 							
      '; 
	  }	  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["SaleDate"] .'</td>  
                          <td>'. $row["SaleID"] .'</td>  
                          <td>'. $row["productname"] .'</td>  
                          <td> '. $row["price"] .' ฿</td>  
                          <td>'. $row["Quantity"] .'</td>  
                          <td> '. $row["amount"] .' ฿</td> 
					 <td>'. $row["name"] .'</td>
                     </tr>  

                ';  
           }
			
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>
