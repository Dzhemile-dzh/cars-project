<?php 
  include '../header.php'; 
  include '../../config.php';
?>
  <link rel="stylesheet" type="text/css" href="/../css/style.css">
    <div class="fancy-hero-area-dynamic bg-img animated-img" style="background-color:#e54c4e">
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <div class="fancy-hero-content text-center">
              <div class="video-overview">
                <h3 style="color:white;font-size:25px;"><b>ADD IMAGE</b></h3>
                <mo><mo>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php if(isset($_POST['upload'])) 
{ 
	$folder ="../../images/"; 
	$im_filename = $_FILES['im_filename']['name']; 
	$path = $folder . $im_filename ; 
	$target_file = $folder.basename($_FILES["im_filename"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$allowed = array('jpeg','png' ,'jpg'); 
	$filename = $_FILES['im_filename']['name']; 
	$ext = pathinfo($filename, PATHINFO_EXTENSION); 
	if(!in_array($ext,$allowed) ) 
	{ 
	 		echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
	}else{ 
		move_uploaded_file( $_FILES['im_filename'] ['tmp_name'], $path); 
		$sth = $conn->prepare("insert into im_images(im_filename)values(:im_filename) "); 
		$sth->bindParam(':im_filename',$im_filename); 
		$sth->execute(); 
	} 
} 
?> 
<div class="container" style="padding-top:50px">
	<form method="POST" enctype="multipart/form-data"> 
		<input type="file" name="im_filename" class="btn btn-primary"> 
		<input type="submit" name="upload" class="btn btn-primary"> 
	</form>
	<table class="table table-hover">
	    <thead>
	        <tr>
	            <th scope="col" style="padding-right:20px">ID</th>
	            <th scope="col" style="padding-right:20px">Image</th>
	        </tr>
	    </thead>
		<?php
		include '../../config.php';
		$select = $conn->prepare("SELECT * FROM im_images ");$select->setFetchMode(PDO::FETCH_ASSOC);$select->execute();
		while($data=$select->fetch()){?>
			<tr>
				<td><?php echo $data['im_id']; ?></td>
				<td><img src="../../images/<?php echo $data['im_filename']; ?>" width="100px" height="100px"></td>
			</tr>
		<?php }?>
	</table>
</div>