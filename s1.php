<?php  
 $connect = mysqli_connect("localhost", "coffee.f", "IoJOCjBp1QDiSqAz", "coffee.f");  
 $query = "SELECT s.SaleDate, d.SaleID, p.ProductName, d.Price, d.Quantity, l.name
FROM sales s
LEFT OUTER JOIN sale_detail d ON d.SaleID=s.SaleID
LEFT OUTER JOIN products p ON d.ProductID=p.ProductID
LEFT OUTER JOIN login l ON l.username=s.username
ORDER BY SaleDate ";  
 $result = mysqli_query($connect, $query); 
 $query1 ="SELECT SUM(GrandTotal) as total
 FROM sales";
 $result1 = mysqli_query($connect, $query1); 
 $result2 = mysqli_query($connect, $query1); 
 $total = array();
 ?>  
 <!DOCTYPE html>  
 <html lang="en">  
      <head>  
           <title>Three piggy cafe</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
      </head>  
<body BGCOLOR = #55efc4> 
           <div class="container" style="width:900px;">  
                <h2 align="center">ยอดขายของร้าน</h2>  
                <h3 align="center">Three piggy cafe</h3><br />  
                <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="ว/ด/ป" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="ไปจ้าาา" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="20%">Date</th>  
                               <th width="30%">SaleID</th>  
                               <th width="43%">Product</th>  
                               <th width="10%">Price</th>  
                               <th width="12%">Quantity</th>  
							   <th width="12%">Name</th>
                          </tr> 
							
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["SaleDate"]; ?></td>  
                               <td><?php echo $row["SaleID"]; ?></td>  
                               <td><?php echo $row["ProductName"]; ?></td>  
                               <td><?php echo $row["Price"]; ?> ฿</td>  
                               <td><?php echo $row["Quantity"]; ?></td>  
							    <td><?php echo $row["name"]; ?></td>  
                          </tr>
							
                     <?php  
                     }  
                     ?> 
					 <?php  
                     while($rs = mysqli_fetch_array($result2)) 
						{  
						$total[] = "\"".$rs['$total']."\""; 
						}
						$total[] = implode(",", $total);
                     ?>  
					 <?php  
                     while($rw = mysqli_fetch_array($result1)) 
					 {
					 ?> 
						<tbody></tbody>
						<tfoot>
						<tr>
						<th colspan="3">ยอดขายทั้งหมด</th>
						<td><?php echo number_format($rw["total"]); ?>฿</td>
						</tr>
						</tfoot>
					 <?php  
                     }  
                     ?>						
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
 
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                if(from_date != '')  
                {  
                     $.ajax({  
                          url:"s2.php",  
                          method:"POST",  
                          data:{from_date:from_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>
