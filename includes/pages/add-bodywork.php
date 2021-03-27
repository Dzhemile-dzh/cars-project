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
              <?php if ($_GET['edit'] > 0){ echo 'EDIT ';} else{ echo 'ADD '; }?>BODYWORKS</b>
            </h3>
            <span class="sub-title" style="color:gold"><a href="https://dev19.webinteractive.bg/includes/pages/all-bodyworks.php"><button class="btn btn-outline-light">SEE ALL BODYWORKS</button></a></span><br><br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="card">
    <div class="card-header" style="background-color:#e54c4e;color:white">
      <?php if ($_GET['edit'] > 0){ echo 'EDIT ';}else{ echo 'ADD '; }?> Bodywork
    </div>
    <div class="card-body">
      <form method="POST" action="../../insertion.php">
        <div class="row">
          <div class="col-sm-6">
            <input type="hidden" name="bo_id" id="bo_id" value="<?php $id = $_GET['edit']; echo $id;?>">
            <label>Bodywork name </label>
            <input type="text" class="form-control" name="bo_name" id="bo_name" required="[A-Za-z]{2,}"
            <?php 
              if(isset($_GET['edit'])){ 
                $id = $_GET['edit'];
                $bodywork_name = "SELECT *
                                  FROM bo_bodyworks
                                  WHERE bo_id = $id ";
                $stmt = $conn->prepare($bodywork_name);
                $stmt->execute();
                while( $row = $stmt->fetch() ) {?>
                  value = "<?php echo $row['bo_name'];?>"
            <?php }} ?> >
          </div>
        </div>
        <div class="row" style="padding-top:20px">
          <div class="col-sm-12">
            <input type="hidden" name="bo_modified_date" value="<?php echo date('Y-m-d H:i:s'); ?>"> 
            <?php if(isset($_GET['edit'])){ ?>
              <button class="btn btn-primary" type="submit" name="EDIT_BODYWORK">EDIT</button>
            <?php }else{ ?>
              <input type="hidden" name="bo_created_date" value="<?php echo date('Y-m-d H:i:s'); ?>"> 
              <button class="btn btn-primary" type="submit" name="ADD_BODYWORK">ADD</button>
            <?php }?>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include '../footer.php'; ?>