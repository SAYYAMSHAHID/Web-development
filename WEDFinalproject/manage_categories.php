<?php
require('top.inc.php');
isAdmin();
$phonename = '';
$image = '';
$phoneprice = '';
$network = '';
$dimension = '';
$weight = '';
$build = '';
$display = '';
$resolution = '';
$os = '';
$chipset = '';
$cpu = '';
$memory = '';
$camera = '';
$video = '';
$battery = '';
$charging = '';
$colour = '';
$msg = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
	$id = get_safe_value($con, $_GET['id']);
	$res = mysqli_query($con, "select * from subcategories where id='$id'");
	$check = mysqli_num_rows($res);
	if ($check > 0) {
		$row = mysqli_fetch_assoc($res);
		$phonename = $row['phonename'];
		$image = $row['image'];
		$phoneprice = $row['phoneprice'];
		$network = $row['network'];
		$dimension = $row['dimension'];
		$weight = $row['weight'];
		$build = $row['build'];
		$display = $row['display'];
		$resolution = $row['resolution'];
		$os = $row['os'];
		$chipset = $row['chipset'];
		$cpu = $row['cpu'];
		$memory = $row['memory'];
		$camera = $row['camera'];
		$video = $row['video'];
		$battery = $row['battery'];
		$charging = $row['charging'];
		$colour = $row['colour'];
	} else {
		header('location:categories.php');
		die();
	}
}

if (isset($_POST['submit'])) {
	$phonename = get_safe_value($con, $_POST['phonename']);
	$image = get_safe_value($con, $_POST['image']);
	$phoneprice = get_safe_value($con, $_POST['phoneprice']);
	$network = get_safe_value($con, $_POST['network']);
	$dimension = get_safe_value($con, $_POST['dimension']);
	$weight = get_safe_value($con, $_POST['weight']);
	$build = get_safe_value($con, $_POST['build']);
	$display = get_safe_value($con, $_POST['display']);
	$resolution = get_safe_value($con, $_POST['resolution']);
	$os = get_safe_value($con, $_POST['os']);
	$chipset = get_safe_value($con, $_POST['chipset']);
	$cpu = get_safe_value($con, $_POST['cpu']);
	$memory = get_safe_value($con, $_POST['memory']);
	$camera = get_safe_value($con, $_POST['camera']);
	$video = get_safe_value($con, $_POST['video']);
	$battery = get_safe_value($con, $_POST['battery']);
	$charging = get_safe_value($con, $_POST['charging']);
	$colour = get_safe_value($con, $_POST['colour']);

	$res = mysqli_query($con, "select * from subcategories where phonename='$phonename'");
	$check = mysqli_num_rows($res);


	if ($check > 0) {
		if (isset($_GET['id']) && $_GET['id'] != '') {
			$getData = mysqli_fetch_assoc($res);
		}
	}

	if (isset($_GET['id']) && $_GET['id'] != '') {
		mysqli_query($con, "update subcategories set phonename='$phonename' where id='$id'");
		echo '<script>alert("1")</script>';

	} else {
		
		 mysqli_query($con, "insert into subcategories(phonename,image,phoneprice,network,dimension,weight,build,display,resolution,os,chipset,cpu,memory,camera,video,battery,charging,colour,status) 
		 	values('$phonename','$image','$phoneprice','$network','$dimension','$weight','$build','$display','$resolution','$os',
			'$chipset','$cpu','$memory','$camera','$video','$battery','$charging','$colour','1')");
	}
	header('location:categories.php');
	die();

}
?>
<div class="content pb-0">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header"><strong>Detail FORM</strong> </div>
					<form method="post">
						<div class="card-body card-block">
							<div class="form-group">
								<label for="phone" class=" form-control-label">Categories</label>
								<input type="file" name="image">
								<input type="text" name="phonename" placeholder="PHONE NAME" class="form-control"
									required value="<?php echo $phonename ?>">
								<input type="text" name="phoneprice" placeholder="PHONE PRICE" class="form-control"
									required value="<?php echo $phoneprice ?>">
								<h1>SPECFICATIONS</h1>
								<input type="text" name="network" placeholder="NETWORK" class="form-control" required
									value="<?php echo $network ?>">
								<input type="text" name="dimensions" placeholder="DIMENSIONS" class="form-control"
									required value="<?php echo $dimension ?>">
								<input type="text" name="weight" placeholder="WEIGHT" class="form-control" required
									value="<?php echo $weight ?>">
								<input type="text" name="build" placeholder="BUILD" class="form-control" required
									value="<?php echo $build ?>">
								<input type="text" name="display" placeholder="DISPLAY" class="form-control" required
									value="<?php echo $dimension ?>">
								<input type="text" name="resolution" placeholder="RESOLUTIONS" class="form-control"
									required value="<?php echo $resolution ?>">
								<input type="text" name="os" placeholder="OS" class="form-control" required
									value="<?php echo $os ?>">
								<input type="text" name="chipset" placeholder="CHIPSET" class="form-control" required
									value="<?php echo $chipset ?>">
								<input type="text" name="cpu" placeholder="CPU" class="form-control" required
									value="<?php echo $cpu ?>">
								<input type="text" name="memory" placeholder="MEMORY" class="form-control" required
									value="<?php echo $memory ?>">
								<input type="text" name="camera" placeholder="MAIN CAMERA" class="form-control" required
									value="<?php echo $camera ?>">
								<input type="text" name="video" placeholder="VIDEOS" class="form-control" required
									value="<?php echo $video ?>">
								<input type="text" name="battery" placeholder="BATTERY" class="form-control" required
									value="<?php echo $battery ?>">
								<input type="text" name="charging" placeholder="CHARGING" class="form-control" required
									value="<?php echo $charging ?>">
								<input type="text" name="colour" placeholder="COLOR" class="form-control" required
									value="<?php echo $colour ?>">

							</div>
							<button id="payment-button" name="submit" type="submit"
								class="btn btn-lg btn-info btn-block">
								<span id="payment-button-amount">SUBMIT</span>
							</button>
							<div class="field_error">
								<?php echo $msg ?>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div