<?php 
  include '../header.php'; 
  include '../../config.php';
?>
  <link rel="stylesheet" type="text/css" href="/../css/style.css">
  <script src="https://cdn.tiny.cloud/1/s1j0lu2xxn3f6vjqozri0zpjgw65n4w1d08iuqm0zhubexei/tinymce/5/tinymce.min.js"></script>
    <div class="fancy-hero-area-dynamic bg-img animated-img" style="background-color:#e54c4e">
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <div class="fancy-hero-content text-center">
              <div class="video-overview">
                <h3 style="color:white;font-size:25px;"><b><?php if ($_GET['edit'] > 0){ echo 'EDIT ';} else{ echo 'ADD '; }?>VECHICLE</b></h3>
                <span class="sub-title" style="color:gold"><a href="https://dev19.webinteractive.bg/includes/pages/all-vehicles.php"><button class="btn btn-outline-light">SEE ALL VEHICLES</button></a></span>
                <mo><mo>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="card">
        <div class="card-header" style="background-color:#e54c4e;color:white"><?php if ($_GET['edit'] > 0){ echo 'EDIT ';} else{ echo 'ADD '; }?> VEHICLE</div>
        <div class="card-body">
          <form method="POST" action="../../insertion.php" name="add_vehicle">
            <input type="hidden" name="ve_id"  id="ve_id" value = "<?php $id = $_GET['edit']; echo $id;?>">
            <div class="row">
              <div class="col-sm-6">
                <label>Brand</label><br>
                <?php
                  $brands = "SELECT * FROM br_brands WHERE br_status = 1";$stmta = $conn->prepare($brands);$stmta->execute();
                  echo '<select class="form-control" name="ve_br_id" id="ve_br_id">
                        <option value="" disabled selected hidden>Choose Brand...</option>';
                  while( $row = $stmta->fetch() ) {
                    $selected = ''; 
                    echo ('<option value="'. $row['br_id'].'" '.$selected.'>'. $row['br_name'].'</option>');
                  }?></select>
              </div>
              <div class="col-sm-6">
                <label>Model</label><br>
                <?php
                  $models = "SELECT * FROM mo_models WHERE mo_status = 1";$stmta = $conn->prepare($models);$stmta->execute();
                  echo '<select class="form-control" name="ve_mo_id" id="ve_mo_id">
                        <option value="" disabled selected hidden>Choose Model...</option>';
                  while( $row = $stmta->fetch() ) {
                    $selected = ''; 
                    echo ('<option value="'. $row['mo_id'].'" '.$selected.'>'. $row['mo_name'].'</option>');
                  }?></select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label>Bodywork</label><br>
                <?php
                  $bodyworks = "SELECT * FROM bo_bodyworks";$stmta = $conn->prepare($bodyworks);$stmta->execute();
                  echo '<select class="form-control" name="ve_bo_id" id="ve_bo_id">
                        <option value="" disabled selected hidden>Choose Bodywork...</option>';
                  while( $row = $stmta->fetch() ) {
                    $selected = ''; 
                    echo ('<option value="'. $row['bo_id'].'" '.$selected.'>'. $row['bo_name'].'</option>');
                  }?></select>
              </div>
              <div class="col-sm-6">
                <label>Engine</label><br>
                <?php
                  $engines = "SELECT * FROM en_engines";$stmta = $conn->prepare($engines);$stmta->execute();
                  echo '<select class="form-control" name="ve_en_id" id="ve_en_id">
                        <option value="" disabled selected hidden>Choose Engine...</option>';
                  while( $row = $stmta->fetch() ) {
                    $selected = ''; 
                    echo ('<option value="'. $row['en_id'].'" '.$selected.'>'. $row['en_name'].'</option>');
                  }?></select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label>Color</label><br>
                <?php
                  $colors = "SELECT * FROM co_colors";$stmta = $conn->prepare($colors);$stmta->execute();
                  echo '<select class="form-control" name="ve_co_id" id="ve_co_id">
                        <option value="" disabled selected hidden>Choose Color...</option>';
                  while( $row = $stmta->fetch() ) {
                    $selected = ''; 
                    echo ('<option value="'. $row['co_id'].'" '.$selected.'>'. $row['co_name'].'</option>');
                  }?></select>
              </div>
              <div class="col-sm-6">
                <label>Status active </label>
                <div  style="zoom:1.6">
                  <input type="checkbox" class="control-input" id="ve_status" name="ve_status"
                    <?php 
                      if(isset($_GET['edit'])){ 
                          $id = $_GET['edit'];
                          $model_status = "SELECT *
                                        FROM ve_vehicles
                                        where ve_id = $id ";$stmt = $conn->prepare($model_status);$stmt->execute();
                          while( $row = $stmt->fetch() ) {if($row['ve_status'] == '0'){?>
                            value = '1'
                    <?php }}}?> >
                    <?php 
                    if(isset($_GET['edit'])){ 
                      $id = $_GET['edit'];
                      $model_status ="SELECT *
                                      FROM ve_vehicles
                                      where ve_id = $id";$stmt = $conn->prepare($model_status);$stmt->execute();
                      while( $row = $stmt->fetch() ) {if($row['ve_status'] == '1'){?><i class="fa fa-check" style="color:green"></i>
                        
                  <?php }else{?><i class="fa fa-close" style="color:red"></i><?php }}}?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">            
                <label>Image</label><br>
                <?php
                  $images = "SELECT * FROM im_images";$stmta = $conn->prepare($images);$stmta->execute();
                  echo '<select class="form-control" name="ve_im_id" id="ve_im_id" onChange="showImage(this.value)">
                        <option value="" disabled selected hidden>Choose Image...</option>';
                  while( $row = $stmta->fetch() ) {
                    $selected = ''; 
                    echo ('<option value="'. $row['im_id'].'" '.$selected.'>'. $row['im_filename'].'</option>');
                  }?></select>
                  
              </div>
              <div class="col-sm-6">
                <label>Version</label><br>
                <input type="text" class="form-control" name="ve_version" id="ve_version" 
                <?php 
                  if(isset($_GET['edit'])){ 
                      $id = $_GET['edit'];
                      $version_name = "SELECT *
                                       FROM ve_vehicles
                                       where ve_id = $id ";
                      $stmt = $conn->prepare($version_name);
                      $stmt->execute();
                      while( $row = $stmt->fetch() ) {?>
                        value = "<?php echo $row['ve_version'];?>"
                <?php } }?> >
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <label>Info</label><br>
                <textarea class="form-control" name="ve_info" id="ve_info" >
                <?php 
                  if(isset($_GET['edit'])){ 
                      $id = $_GET['edit'];
                      $version_name = "SELECT *
                                       FROM ve_vehicles
                                       where ve_id = $id ";
                      $stmt = $conn->prepare($version_name);
                      $stmt->execute();
                      while( $row = $stmt->fetch() ) {
                         echo $row['ve_info'];
                 } }?> </textarea>
              </div>
            </div>
            <div class="row" style="padding-top:20px">
              <div class="col-sm-12">
               <input type="hidden" name="ve_modified_date" value="<?php echo date('Y-m-d H:i:s'); ?>" > 
                <?php if(isset($_GET['edit'])){ ?>
                  <button class="btn btn-primary" type="submit" name="EDIT_VEHICLE">EDIT</button>
                <?php } else{ ?>
                  <input type="hidden" name="ve_created_date" value="<?php echo date('Y-m-d H:i:s'); ?>"> 
                  <button class="btn btn-primary" type="submit" name="ADD_VEHICLE">ADD</button>
                <?php }?>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php include '../footer.php'; ?>
