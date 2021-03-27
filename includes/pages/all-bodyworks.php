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
            <h3 style="color:white;font-size:25px;"><b>ALL BODYWORKS</b></h3>
            <span class="sub-title" style="color:gold"><a href="https://dev19.webinteractive.bg/includes/pages/add-bodywork.php"><button class="btn btn-outline-light">+ ADD BODYWORKS </button></a></span><br><br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
      <div class="card-header success" style="background-color:#4788ff;color:white">All BODYWORKS</div>
        <div class="card-body" style="background-color:#a3c3ff;">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Bodywork Name</th>
                <th scope="col">Date Created</th>
                <th scope="col">Date Modified</th>
                <th scope="col">Edit</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $all_users = "SELECT * FROM bo_bodyworks";
                $stmt = $conn->prepare($all_users);$stmt->execute();
                while( $row = $stmt->fetch() ) {
                  echo '<tr><td>'.$row['bo_name'].'</td>
                            <td>'.$row['bo_created_date'].'</td>
                            <td>'.$row['bo_modified_date'].'</td>
                            <td><a href="https://dev19.webinteractive.bg/includes/pages/add-bodywork.php?edit='.$row['bo_id'].'"><button class="btn btn-outline-info"><i class="fa fa-pencil"></i></button></a></td></tr>';
              }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include '../footer.php'; ?>