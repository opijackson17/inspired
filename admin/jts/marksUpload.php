<?php 

$host = "localhost"; 
$user = "root";
$pass = ""; 
$db_name = "schoolsolution"; 

$con = new mysqli($host,$user,$pass,$db_name);
	
	$query = "SELECT * FROM marks ORDER BY markID DESC";
	$run = $con->query($query);
	$row = $run->fetch_array();

	//while($row = $run->fetch_array()) :
		?>
	
		<div id="chat_data">
			
			<table class="table table-striped table-bordered responsive">
                       
            <tbody>
            <tr>
            	<td><?php echo $row['class'];?> <?php echo $row['term'];?> <?php echo $row['examType'];?> <?php echo $row['year'];?> Saved Successfully</td>
            </tr>
            </tbody>

            </table>
		</div>
<?php //endwhile;?>