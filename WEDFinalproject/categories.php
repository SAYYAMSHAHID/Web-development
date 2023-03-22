<?php
require('top.inc.php');
isAdmin();
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update subcategories set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from subcategories where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from subcategories order by phonename asc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">CATEGORIES </h4>
				   <h4 class="box-link"><a href="manage_categories.php">ADD Phone</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   
							   <th>ID</th>
							   <th>phonename</th>
							   <th>phoneimage</th>
							   <th>phoneprice</th>
							   <th>network</th>
							   <th>dimension</th>
							   <th>weight</th>
							   <th>build</th>
							   <th>display</th>
							   <th>resolution</th>
							   <th>os</th>
							   <th>chipset</th>
							   <th>cpu</th>
							   <th>memory</th>
							   <th>camera</th>
							   <th>video</th>
							   <th>battery</th>
							   <th>charging</th>
							   <th>colour</th>
							   <th>status</th>

							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							  
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['phonename']?></td>
							   <td><?php echo $row['image']?></td>
							   <td><?php echo $row['phoneprice']?></td>
							   <td><?php echo $row['network']?></td>
							   <td><?php echo $row['dimension']?></td>
							   <td><?php echo $row['weight']?></td>
							   <td><?php echo $row['build']?></td>
							   <td><?php echo $row['display']?></td>
							   <td><?php echo $row['resolution']?></td>
							   <td><?php echo $row['os']?></td>
							   <td><?php echo $row['chipset']?></td>
							   <td><?php echo $row['cpu']?></td>
							   <td><?php echo $row['memory']?></td>
							   <td><?php echo $row['camera']?></td>
							   <td><?php echo $row['video']?></td>
							   <td><?php echo $row['battery']?></td>
							   <td><?php echo $row['charging']?></td>
							   <td><?php echo $row['colour']?></td>
							   <td>
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_categories.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>