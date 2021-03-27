<?php include 'config.php';?>
<?php include 'includes/header.php'; ?>
<div class="fancy-hero-area bg-img animated-img" style="background-color:#e54c4e">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <div class="fancy-hero-content text-center">
          <div class="video-overview">
            <h3 style="color:white;font-size:25px;"><b>Welcome </b></h3>
            <span class="sub-title" style="color:gold">To Homepage</span><br><br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="fancy-top-features-area bg-gray" style="padding-bottom:10%">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="fancy-top-features-content">
          <div class="row no-gutters">
            <div class="col-12 col-md-4">
              <a href=""><img src="images/red-car.png" class="meh" style="width:90%"> </a>
            </div>
            <div class="col-12 col-md-4">
              <a href=""><img src="images/yellow-car.png" class="meh"> </a>
            </div>
            <div class="col-12 col-md-4">
              <a href=""><img src="images/black-car.png" class="meh" style="width:90%"> </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
	<div class="card">
		<div class="card-header" style="background-color:#e54c4e;color:white">View All Active Cars</div>
  		<div class="card-body">
        <form method="POST">
          <div class="row" style="padding-bottom:20px">
            <div class="col-sm-4">
              <label><b>Start date </b></label>
              <input id="ve_start_date" name="ve_start_date">
            </div>
            <div class="col-sm-4">
              <label><b>End date </b></label>
              <input id="ve_end_date" name="ve_end_date"> 
            </div>
            <script>
              $('#ve_start_date').datepicker({uiLibrary: 'bootstrap4'});
              $('#ve_end_date').datepicker({uiLibrary: 'bootstrap4'});
            </script>
            <div class="col-sm-4">
              <label><b style="color:white">Search </b></label><br>
              <button class='btn btn-success' type="submit" name ="search" style="width:100%"><i class="fa fa-search"></i> Search by Date</button>  
            </div>
          </div>
        </form>
        <form method="POST">
          <div class="row" style="padding-bottom:20px">
            <div class="col-sm-4">
              <label><b>Brand Name</b></label><br>
              <input type="text" name="brand_name" class="form-control">
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
              <label><b style="color:white">Search </b></label><br>
              <button class='btn btn-danger' type="submit" name ="searchname" style="width:100%"><i class="fa fa-search"></i> Search By Brand</button>  
            </div>
          </div>
        </form>
        <div class="row" style="padding-bottom:20px">
          <div class="col-sm-4">
            <form method="POST">
              <button class='btn btn-info' type="submit" name ="bluecolor" style="width:100%"><i class="fa fa-car"></i> See All Blue Cars </button>  
            </form>
          </div>
          <div class="col-sm-4">
            <form method="POST">
              <button class='btn btn-info' type="submit" name ="sportscar" style="width:100%"><i class="fa fa-car"></i> See All Sports Cars </button>  
            </form>
          </div>
          <div class="col-sm-4">
            <form method="POST">
              <button class='btn btn-info' type="submit" name ="vtype" style="width:100%"><i class="fa fa-car"></i> See All V-type Cars </button>  
            </form>
          </div>
        </div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Brand</th>
              <th scope="col">Model</th>
              <th scope="col">Bodywork</th>
              <th scope="col">Engine</th>
              <th scope="col">Color</th>
              <th scope="col">Image</th>
              <th scope="col">Date Created</th>
              <th scope="col">Date Modified</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $ve_start_date = '1900-01-01';
            $ve_end_date = date('2022-01-01');
            $brand_name = '';
            $color = '';
            $bodywork = '';
            $entype = '';
            if (isset($_POST['bluecolor'])) {
              $color = 'blue';
            }
            if (isset($_POST['sportscar'])) {
              $bodywork = 'sports car';
            }
            if (isset($_POST['vtype'])) {
              $entype = 'v type';
            }
            if (isset($_POST['searchname'])) {
              $brand_name = $_POST['brand_name'];
            }
            if(isset($_POST['search'])){
              $ve_start_date = date('Y-m-d h:m:s', strtotime($_POST['ve_start_date']));
              $ve_end_date = date('Y-m-d h:m:s', strtotime($_POST['ve_end_date']));
            }
              $all_vehicles = " SELECT *
                                FROM ve_vehicles
                                LEFT JOIN br_brands
                                ON ve_br_id = br_id
                                LEFT JOIN bo_bodyworks
                                ON ve_bo_id = bo_id
                                LEFT JOIN mo_models
                                ON ve_mo_id = mo_id
                                LEFT JOIN en_engines
                                ON ve_en_id = en_id
                                LEFT JOIN co_colors
                                ON ve_co_id = co_id
                                LEFT JOIN im_images
                                ON ve_im_id = im_id
                                WHERE ve_created_date
                                BETWEEN '$ve_start_date' 
                                AND '$ve_end_date'
                                AND ve_status = 1
                                AND br_name LIKE '%$brand_name'
                                AND co_name LIKE '%$color%'
                                AND bo_name LIKE '%$bodywork'
                                AND en_name LIKE '%$entype'";
              $stmt = $conn->prepare($all_vehicles);
              $stmt->execute();
              while($row = $stmt->fetch()) {
                echo '<tr><td>'.$row['br_name'].'</td>
                          <td>'.$row['mo_name'].'</td>
                          <td>'.$row['bo_name'].'</td>
                          <td>'.$row['en_name'].'</td>
                          <td>'.$row['co_name'].'</td>
                          <td><img src="images/'.$row['im_filename'].'" width=100px;height=100px class="img img-thumbnail"></td>
                          <td>'.$row['ve_created_date'].'</td>
                          <td>'.$row['ve_modified_date'].'</td></tr>';
            }?>
          </tbody>
        </table>
      </div>
		</div>
	</div>
</div>
<?php include 'includes/footer.php'; ?>