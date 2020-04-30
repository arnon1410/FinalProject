<?php  
 //filter.php  
 if(isset($_POST["from_date"]))  
 {  
      $connect = mysqli_connect("localhost", "coffee.f", "IoJOCjBp1QDiSqAz", "coffee.f");  
      $output = '';  
      $query = "  
           SELECT s.SaleDate, d.SaleID, p.ProductName, d.Price, d.Quantity, l.name
			FROM sales s
			LEFT OUTER JOIN sale_detail d ON d.SaleID=s.SaleID
			LEFT OUTER JOIN products p ON d.ProductID=p.ProductID  
			LEFT OUTER JOIN login l ON l.username=s.username  
           WHERE SaleDate ='".$_POST["from_date"]."' ";  
      $result = mysqli_query($connect, $query);  
      $output .= '
           <table class="table table-bordered">  
                <tr>  
                     <th width="20%">Date</th>  
                     <th width="30%">SaleID</th>  
                     <th width="43%">Product</th>  
                     <th width="10%">Price</th> 
					<th width="12%">Quantity</th>					 
                     <th width="12%">Name</th>
					 
                </tr>  
				<tbody></tbody>
						<tfoot> 
						<tr>
						<th colspan="3">ยอดขายรายวัน</th>
						<th id="total_order"></th>
						</tr>
						</tfoot>	
      ';  
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
