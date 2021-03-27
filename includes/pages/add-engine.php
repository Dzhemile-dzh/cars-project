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
                <h3 style="color:white;font-size:25px;"><b><?php if ($_GET['edit'] > 0){ echo 'EDIT ';} else{ echo 'ADD '; }?>ENGINES</b></h3>
                <span class="sub-title" style="color:gold"><a href="https://dev19.webinteractive.bg/includes/pages/all-engines.php"><button class="btn btn-outline-light">SEE ALL ENGINES</button></a></span>
                <br><br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="card">
        <div class="card-header" style="background-color:#e54c4e;color:white"><?php if ($_GET['edit'] > 0){ echo 'EDIT ';} else{ echo 'ADD '; }?> Engines</div>
        <div class="card-body">
          <form method="POST" action="../../insertion.php">
            <div class="row">
              <div class="col-sm-6">
                <input type="hidden" name="en_id"  id="en_id" value = "<?php $id = $_GET['edit']; echo $id;?>">
                <label>Engine name </label>
                <input type="text" class="form-control" name="en_name" id="en_name" required="[A-Za-z]{2,}"
                <?php 
                  if(isset($_GET['edit'])){ 
                      $id = $_GET['edit'];
                      $engine_name = "SELECT *
                                    FROM en_engines
                                    where en_id = $id ";
                      $stmt = $conn->prepare($engine_name);
                      $stmt->execute();
                      while( $row = $stmt->fetch() ) {?>
                        value = "<?php echo $row['en_name'];?>"
                <?php } }?> >
              </div>
            </div>

            <div class="row" style="padding-top:20px">
              <div class="col-sm-12">
               <input type="hidden" name="en_modified_date" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly="readonly"> 
                <?php if(isset($_GET['edit'])){ ?>
                  <button class="btn btn-primary" type="submit" name="EDIT_ENGINE">EDIT</button>
                <?php } else{ ?>
                  <input type="hidden" name="en_created_date" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly="readonly"> 
                  <button class="btn btn-primary" type="submit" name="ADD_ENGINE">ADD</button>
                <?php }?>

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php include '../footer.php'; ?>