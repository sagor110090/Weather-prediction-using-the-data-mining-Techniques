 
<?php
include('server.php') ;


					
					


					
					
					
include('session.php');
include('header.php') ;
include('Navbar.php');					
?>
 
    <div class="container" style="width: 100%;
margin-top: 10px;">
        <div class="card">
            <div class="card-body">
			
			<div class="input-group mb-3" style="width: 60%;
margin-left: 85%;" >
<form  method="post" action="show_tb.php" >


  <div class="input-group-append">
     <select class="selectpicker" name="table" >
    <option value="winter">Winter</option>
    <option value="spring">Spring</option>
    <option value="summer">Summer</option>
    <option value="autumn">Autumn</option>


  </select>
   <button type="submit"    class="btn btn-primary" name="show_tb" type="button">Search</button>
  </div>
</div>
 </form>
       
	<div class="header">
		<h2>Data List</h2>
	</div>

                <table class="table table-striped table-hover">
             
                        <tr>
                            <td>count</td>
                            <td>data</td>
                            
                            <td>TemMax</td>
                            <td>TemAvg</td>
                           <td>TemMin</td>
						   
                           <td>HuMax</td>
                           <td>HuMin</td>
                           <td>WindMax</td>
                           <td>winMin</td>
                           <td>outlook</td>
                          
                      </tr>         
<?php
if(isset($_POST['show_tb'])){
$data=$_POST['table'];
 
                    $sql = "SELECT * FROM $data ";
                   
                    $result =  mysqli_query($db, $sql);
                    
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['day'] . "</td>";
echo "<td>" . $row['date'] . "</td>";

echo "<td>" . $row['TemMax'] . "</td>";
echo "<td>" . $row['TemAvg'] . "</td>";
echo "<td>" . $row['TemMin'] . "</td>";

echo "<td>" . $row['HuMax'] . "</td>";
echo "<td>" . $row['HuMin'] . "</td>";

echo "<td>" . $row['WindMax'] . "</td>";
echo "<td>" . $row['WindMin'] . "</td>";
echo "<td>" . $row['outlook'] . "</td>";



 
?>

		
			
        </tr>
		
		
<?php } }?>
		</table>
		
		</div>
		</div>
		</div>
<?php 






include('footer.php');
 


?>