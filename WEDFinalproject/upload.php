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

	} else {
		$status = $statusMsg = '';
		if (isset($_POST["submit"])) {
			echo '<script>alert("2")</script>';

			$status = 'error';
			if (!empty($_FILES["image"]["name"])) {
				// Get file info 
				$fileName = basename($_FILES["image"]["name"]);
				$fileType = pathinfo($fileName, PATHINFO_EXTENSION);

				// Allow certain file formats 
				$allowTypes = array('jpg', 'png', 'jpeg', 'gif');
				if (in_array($fileType, $allowTypes)) {
					$image = $_FILES['image']['tmp_name'];
					$imgContent = addslashes(file_get_contents($image));

					// Insert image content into database 
					$insert = mysqli_query($con, "insert into subcategories(phonename,image,phoneprice,network,dimension,weight,build,display,resolution,os,chipset,cpu,memory,camera,video,battery,charging,colour,status) 
					values('$phonename','$imgContent','$phoneprice','$network','$dimension','$weight','$build','$display','$resolution','$os',
					'$chipset','$cpu','$memory','$camera','$video','$battery','$charging','$colour','1')");
					if ($insert) {
						$status = 'success';
						$statusMsg = "File uploaded successfully.";
					} else {
						$statusMsg = "File upload failed, please try again.";
					}
				} else {
					$statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
				}
			} else {
				$statusMsg = 'Please select an image file to upload.';
			}
		}
		// mysqli_query($con, "insert into subcategories(phonename,image,phoneprice,network,dimension,weight,build,display,resolution,os,chipset,cpu,memory,camera,video,battery,charging,colour,status) 
		// 	values('$phonename','$image','$phoneprice','$network','$dimension','$weight','$build','$display','$resolution','$os',
		// 	'$chipset','$cpu','$memory','$camera','$video','$battery','$charging','$colour','1')");
	}
	header('location:categories.php');
	die();

}
?>