<?php include '../header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/../css/style.css">
    <div class="fancy-hero-area-dynamic bg-img animated-img" style="background-color:#e54c4e">
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <div class="fancy-hero-content text-center">
              <div class="video-overview">
                <h3 style="color:white;font-size:25px;"><b>ALL VEHICLES</b></h3>
                <span class="sub-title" style="color:gold"><a href="https://dev19.webinteractive.bg/includes/pages/add-vehicle.php"><button class="btn btn-outline-light">+ ADD VEHICLE </button></a></span>
                <br><br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header success" style="background-color:#c642ff;color:white">All Active Vechicles</div>
          <div class="card-body" style="background-color:#e7adff;">
            <table class="table-responsive-md table-hover">
              <thead>
                <tr>
                  <th scope="col" style="padding-right:20px">Brand</th>
                  <th scope="col" style="padding-right:20px">Model</th>
                  <th scope="col" style="padding-right:20px">Bodywork</th>
                  <th scope="col" style="padding-right:20px">Engine</th>
                  <th scope="col" style="padding-right:20px">Color</th>
                  <th scope="col" style="padding-right:20px">Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php include '../../config.php';
                      $all_VEHICLEs = "SELECT *
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
                                     WHERE ve_status = 1";
                      $stmt = $conn->prepare($all_VEHICLEs);
                      $stmt->execute();
                      while( $row = $stmt->fetch() ) {
                         echo '<tr><td>'.$row['br_name'].'</td>
                                   <td>'.$row['mo_name'].'</td>
                                   <td>'.$row['bo_name'].'</td>
                                   <td>'.$row['en_name'].'</td>
                                   <td>'.$row['co_name'].'</td>
                                   <td><a href="https://dev19.webinteractive.bg/includes/pages/add-vehicle.php?edit='.$row['ve_id'].'"><button class="btn btn-outline-dark"><i class="fa fa-pencil"></i></button></a></td></tr>';
                      }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header success" style="background-color:#f542a4;color:white">All Inactive Vechicles</div>
          <div class="card-body" style="background-color:#ffadda;">
            <table class="table-responsive table-hover">
              <thead>
                <tr>
                  <th scope="col" style="padding-right:20px">Brand</th>
                  <th scope="col" style="padding-right:20px">Model</th>
                  <th scope="col" style="padding-right:20px">Bodywork</th>
                  <th scope="col" style="padding-right:20px">Engine</th>
                  <th scope="col" style="padding-right:20px">Color</th>
                  <th scope="col" style="padding-right:20px">Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php include '../../config.php';
                      $all_VEHICLEs = "SELECT *
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
                                     WHERE ve_status = 0";
                      $stmt = $conn->prepare($all_VEHICLEs);
                      $stmt->execute();
                      while( $row = $stmt->fetch() ) {
                         echo '<tr><td>'.$row['br_name'].'</td>
                                   <td>'.$row['mo_name'].'</td>
                                   <td>'.$row['bo_name'].'</td>
                                   <td>'.$row['en_name'].'</td>
                                   <td>'.$row['co_name'].'</td>
                                   <td><a href="https://dev19.webinteractive.bg/includes/pages/add-vehicle.php?edit='.$row['ve_id'].'"><button class="btn btn-outline-dark"><i class="fa fa-pencil"></i></button></a></td></tr>';
                      }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include '../footer.php'; ?>