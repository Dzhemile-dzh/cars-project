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
            <h3 style="color:white;font-size:25px;"><b><?php if ($_GET['edit'] > 0){ echo 'EDIT ';} else{ echo 'ADD '; }?>COLOR</b></h3>
            <span class="sub-title" style="color:gold"><a href="https://dev19.webinteractive.bg/includes/pages/all-colors.php"><button class="btn btn-outline-light">SEE ALL COLORS</button></a></span><br><br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="card">
    <div class="card-header" style="background-color:#e54c4e;color:white"><?php if ($_GET['edit'] > 0){ echo 'EDIT ';} else{ echo 'ADD '; }?> COLOR</div>
    <div class="card-body">
      <form method="POST" action="../../insertion.php" name="add_color">
        <div class="row">
          <div class="col-sm-6">
            <input type="hidden" name="co_id"  id="co_id" value = "<?php $id = $_GET['edit']; echo $id;?>">
            <label>Color name </label>
            <input type="text" class="form-control" name="co_name" id="co_name" required="[A-Za-z]{2,}"
            <?php 
              if(isset($_GET['edit'])){ 
                $id = $_GET['edit'];
                $color_name = "SELECT *
                               FROM co_colors
                               where co_id = $id ";
                $stmt = $conn->prepare($color_name);$stmt->execute();
                while( $row = $stmt->fetch() ) {?>
                    value = "<?php echo $row['co_name'];?>"
            <?php }}?> >
          </div>
          <div class="col-sm-6">
            <?php if(isset($_GET['edit'])){?>
            <label>Is Metalic </label>              
            <div  style="zoom:1.6">
              <input type="checkbox" class="control-input" id="co_metalic" name="co_metalic" 
              <?php 
                  $id = $_GET['edit'];
                  $model_status ="SELECT *
                                  FROM co_colors
                                  where co_id = $id ";$stmt = $conn->prepare($model_status);$stmt->execute();
                  while( $row = $stmt->fetch() ) {if($row['co_metalic'] == '0'){?>
                    value = '1'
               >    <?php }}}?>        
              <?php 
                if(isset($_GET['edit'])){ 
                  $id = $_GET['edit'];
                  $model_status ="SELECT *
                                  FROM co_colors
                                  where co_id = $id ";$stmt = $conn->prepare($model_status);$stmt->execute();
                  while( $row = $stmt->fetch() ) {if($row['co_metalic'] == '1'){?><i class="fa fa-check" style="color:green"></i>
                    
              <?php }else{?><i class="fa fa-close" style="color:red"></i>
            </div>
            </div>
            <?php }}}?>
          </div>

        </div>
        <div class="row" style="padding-top:20px">
          <div class="col-sm-12"> 
            <?php if(isset($_GET['edit'])){ ?>
              <button class="btn btn-primary" type="submit" name="EDIT_COLOR">EDIT</button>
            <?php } else{ ?>
              <button class="btn btn-primary" type="submit" name="ADD_COLOR">ADD</button>
            <?php }?>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include '../footer.php'; ?>