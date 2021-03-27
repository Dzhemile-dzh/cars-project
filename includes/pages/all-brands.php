<?php 
  include '../header.php';
  include '../../config.php'; 
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/../css/style.css">
<div class="fancy-hero-area-dynamic bg-img animated-img" style="background-color:#e54c4e">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <div class="fancy-hero-content text-center">
          <div class="video-overview">
            <h3 style="color:white;font-size:25px;"><b>ALL BRANDS</b></h3>
            <span class="sub-title" style="color:gold"><a href="https://dev19.webinteractive.bg/includes/pages/add-brand.php"><button class="btn btn-outline-light">+ ADD BRAND </button></a></span><br><br>
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
        <div class="card-header success" style="background-color:#12a353;color:white">All <b>Active</b> Brands</div>
        <div class="card-body" style="background-color:#d8ffd6">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Brand Name</th>
                <th scope="col">Date Created</th>
                <th scope="col">Date Modified</th>
                <th scope="col">Edit</th>
              </tr>
            </thead>
          <tbody>
            <?php 
              $all_users = "SELECT *
                            FROM br_brands
                            WHERE br_status = 1";
              $stmt = $conn->prepare($all_users);
              $stmt->execute();
              while($row = $stmt->fetch()){
                echo '<tr><td>'.$row['br_name'].'</td>
                          <td>'.$row['br_created_date'].'</td>
                          <td>'.$row['br_modified_date'].'</td>
                          <td><a href="https://dev19.webinteractive.bg/includes/pages/add-brand.php?edit='.$row['br_id'].'"><button class="btn btn-outline-success"><i class="fa fa-pencil"></i></button></a></td></tr>';
            }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-header success" style="background-color:#ff9f19;color:white">All <b>InActive</b> Brands</div>
      <div class="card-body" style="background-color:#ffeed6">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Brand Name</th>
              <th scope="col">Date Created</th>
              <th scope="col">Date Modified</th>
              <th scope="col">Edit</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $all_users = "SELECT *
                            FROM br_brands
                            WHERE br_status = 0";
              $stmt = $conn->prepare($all_users);
              $stmt->execute();
              while( $row = $stmt->fetch() ) {
                echo '<tr><td>'.$row['br_name'].'</td>
                          <td>'.$row['br_created_date'].'</td>
                          <td>'.$row['br_modified_date'].'</td>
                          <td><a href="https://dev19.webinteractive.bg/includes/pages/add-brand.php?edit='.$row['br_id'].'"><button class="btn btn-outline-warning"><i class="fa fa-pencil"></i></button></a></td></tr>';
            }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include '../footer.php'; ?>