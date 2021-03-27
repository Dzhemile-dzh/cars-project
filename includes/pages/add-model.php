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
                <h3 style="color:white;font-size:25px;"><b><?php if ($_GET['edit'] > 0){ echo 'EDIT ';} else{ echo 'ADD '; }?>MODEL</b></h3>
                <span class="sub-title" style="color:gold"><a href="https://dev19.webinteractive.bg/includes/pages/all-models.php"><button class="btn btn-outline-light">SEE ALL MODELS</button></a></span>
                <mo><mo>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="card">
        <div class="card-header" style="background-color:#e54c4e;color:white"><?php if ($_GET['edit'] > 0){ echo 'EDIT ';} else{ echo 'ADD '; }?> MODEL</div>
        <div class="card-body">
          <form method="POST" action="../../insertion.php" name="add_model">
            <div class="row">
              <div class="col-sm-6">
                <input type="hidden" name="mo_id"  id="mo_id" value = "<?php $id = $_GET['edit']; echo $id;?>">
                <label>Model name </label>
                <input type="text" class="form-control" name="mo_name" id="mo_name" required="[A-Za-z]{2,}"
                <?php 
                  if(isset($_GET['edit'])){ 
                      $id = $_GET['edit'];
                      $model_name = "SELECT *
                                    FROM mo_models
                                    where mo_id = $id ";
                      $stmt = $conn->prepare($model_name);
                      $stmt->execute();
                      while( $row = $stmt->fetch() ) {?>
                        value = "<?php echo $row['mo_name'];?>"
                <?php } }?> >
              </div>
              <div class="col-sm-6">
                <label>Status active </label>
                <div  style="zoom:1.6">
                  <input type="checkbox" class="control-input" id="mo_status" name="mo_status"                     
                  <?php 
                      if(isset($_GET['edit'])){ 
                          $id = $_GET['edit'];
                          $model_status = "SELECT *
                                        FROM mo_models
                                        where mo_id = $id ";$stmt = $conn->prepare($model_status);$stmt->execute();
                          while( $row = $stmt->fetch() ) {if($row['mo_status'] == '0'){?>
                            value = '1'
                    <?php }}}?> >
                    <?php 
                    if(isset($_GET['edit'])){ 
                      $id = $_GET['edit'];
                      $model_status ="SELECT *
                                      FROM mo_models
                                      where mo_id = $id";$stmt = $conn->prepare($model_status);$stmt->execute();
                      while( $row = $stmt->fetch() ) {if($row['mo_status'] == '1'){?><i class="fa fa-check" style="color:green"></i>
                        
                  <?php }else{?><i class="fa fa-close" style="color:red"></i><?php }}}?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label>Brand</label><br>
                <?php
                  $brands = "SELECT * FROM br_brands";
                  $stmta = $conn->prepare($brands);$stmta->execute();
                  echo '<select class="form-control" name="mo_br_id" id="mo_br_id" >
                        <option value="" disabled selected hidden>Choose Brand...</option>';
                  while( $row = $stmta->fetch() ) {
                    $selected = ''; 
                    echo ('<option value="'. $row['br_id'].'" '.$selected.'>'. $row['br_name'].'</option>');
                  }?></select>
              </div>
              
            </div>
            <div class="row" style="padding-top:20px">
              <div class="col-sm-12">
               <input type="hidden" name="mo_modified_date" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly="readonly"> 
                <?php if(isset($_GET['edit'])){ ?>
                  <button class="btn btn-primary" type="submit" name="EDIT_MODEL">EDIT</button>
                <?php } else{ ?>
                  <input type="hidden" name="mo_created_date" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly="readonly"> 
                  <button class="btn btn-primary" type="submit" name="ADD_MODEL">ADD</button>
                <?php }?>

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php include '../footer.php'; ?>