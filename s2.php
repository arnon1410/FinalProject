<?php  
 //filter.php  
 if(isset($_POST["from_date"]))  
 {  
      $connect = mysqli_connect("localhost", "coffee.f", "IoJOCjBp1QDiSqAz", "coffee.f");  
      $output = '';  
      $query = "  
           SELECT s.SaleDate, s.SaleID, p.ProductName, d.Price, d.Quantity, (d.Price*d.Quantity) as amount, l.name
			FROM sales s
			LEFT OUTER JOIN sale_details d ON s.SaleID=d.SaleID
			LEFT OUTER JOIN products p ON d.ProductID=p.ProductID  
			LEFT OUTER JOIN login l ON l.username=s.username  
           WHERE SaleDate ='".$_POST["from_date"]."' ";  
      $result = mysqli_query($connect, $query); 
	  $query1 ="SELECT SaleDate, SUM(GrandTotal) as total
			FROM sales
			WHERE SaleDate ='".$_POST["from_date"]."' 
			GROUP BY SaleDate
			";
	  $result1 = mysqli_query($connect, $query1); 
	  $result2 = mysqli_query($connect, $query1); 
	  $total = array();
	   
                     while($rs = mysqli_fetch_array($result2)) 
						{  
						$total[] = "\"".$rs['$total']."\""; 
						}
						$total[] = implode(",", $total);
                     
					  
                     while($rw = mysqli_fetch_array($result1)) 
					 {
					 
      $output .= '
	  
           <table class="table table-bordered">  
                <tr>  
                     <th width="20%">Date</th>  
                     <th width="30%">SaleID</th>  
                     <th width="43%">Product</th>  
                     <th width="10%">Price</th> 
					 <th width="12%">Quantity</th>
					 <th width="12%">Amount</th> 					
                     <th width="12%">Name</th>
					 
                </tr>  
						<tbody></tbody>
						<tfoot>
						<tr>
						<th colspan="3">ยอดขายทั้งหมด</th>
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
                          <td>'. $row["ProductName"] .'</td>  
                          <td> '. $row["Price"] .' ฿</td>  
                          <td>'. $row["Quantity"] .'</td>
						  <td>'. $row["amount"].'฿</td> 
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
