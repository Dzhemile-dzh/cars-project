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
            <h3 style="color:white;font-size:25px;"><b>
              <?php if ($_GET['edit'] > 0){ echo 'EDIT ';} else{ echo 'ADD '; }?>BRAND</b>
            </h3>
            <span class="sub-title" style="color:gold"><a href="https://dev19.webinteractive.bg/includes/pages/all-brands.php"><button class="btn btn-outline-light">SEE ALL BRANDS</button></a></span><br><br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="card">
    <div class="card-header" style="background-color:#e54c4e;color:white">
      <?php if ($_GET['edit'] > 0){ echo 'EDIT ';} else{ echo 'ADD '; }?> Brand
    </div>
    <div class="card-body">
      <form method="POST" action="../../insertion.php">
        <div class="row">
          <div class="col-sm-6">
            <input type="hidden" name="br_id"  id="br_id" value = "<?php $id = $_GET['edit']; echo $id;?>">
            <label>Brand name </label>
            <input type="text" class="form-control" name="br_name" id="br_name" required="[A-Za-z]{2,}"
            <?php 
              if(isset($_GET['edit'])){ 
                $id = $_GET['edit'];
                $brand_name = " SELECT *
                                FROM br_brands
                                where br_id = $id ";
                $stmt = $conn->prepare($brand_name);
                $stmt->execute();
                while( $row = $stmt->fetch() ) {?>
                  value = "<?php echo $row['br_name'];?>"
            <?php } }?> >
          </div>
          <div class="col-sm-6">
            <label>Status active </label>
            <div  style="zoom:1.6">
              <input type="checkbox" class="control-input" id="br_status" name="br_status"
              <?php 
                if(isset($_GET['edit'])){ 
                  $id = $_GET['edit'];
                  $model_status = "SELECT *
                                   FROM br_brands
                                   where br_id = $id ";$stmt = $conn->prepare($model_status);$stmt->execute();
                  while( $row = $stmt->fetch() ) {if($row['br_status'] == '0'){?> value = '1' <?php }}}?> >
                <?php 
                  if(isset($_GET['edit'])){ 
                    $id = $_GET['edit'];
                    $model_status ="SELECT *
                                    FROM br_brands
                                    where br_id = $id";$stmt = $conn->prepare($model_status);$stmt->execute();
                    while( $row = $stmt->fetch() ) {if($row['br_status'] == '1'){?><i class="fa fa-check" style="color:green"></i>      
              <?php }else{?><i class="fa fa-close" style="color:red"></i><?php }}}?>
            </div>
          </div>
        </div>
        <div class="row" style="padding-top:20px">
          <div class="col-sm-12">
            <input type="hidden" name="br_modified_date" value="<?php echo date('Y-m-d H:i:s'); ?>"> 
            <?php if(isset($_GET['edit'])){ ?>
              <button class="btn btn-primary" type="submit" name="EDIT_BRAND">EDIT</button>
            <?php } else{ ?>
              <input type="hidden" name="br_created_date" value="<?php echo date('Y-m-d H:i:s'); ?>"> 
              <button class="btn btn-primary" type="submit" name="ADD_BRAND">ADD</button>
            <?php }?>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include '../footer.php'; ?>