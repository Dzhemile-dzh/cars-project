<?php include '../header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/../css/style.css">
  <div class="fancy-hero-area-dynamic bg-img animated-img" style="background-color:#e54c4e">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="fancy-hero-content text-center">
            <div class="video-overview">
              <h3 style="color:white;font-size:25px;"><b>ALL COLORS</b></h3>
              <span class="sub-title" style="color:gold"><a href="https://dev19.webinteractive.bg/includes/pages/add-color.php"><button class="btn btn-outline-light">+ ADD COLOR </button></a></span><br><br>
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
          <div class="card-header success" style="background-color:#ffcf40;color:white">All NON-METALIC COLORS</div>
          <div class="card-body" style="background-color:#ffebad;">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Color Name</th>
                  <th scope="col">Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                include '../../config.php';
                $all_colors = "SELECT * FROM co_colors
                               WHERE co_metalic = 0";
                $stmt = $conn->prepare($all_colors);
                $stmt->execute();
                while( $row = $stmt->fetch() ) {
                  echo '<tr><td>'.$row['co_name'].'</td>
                        <td><a href="https://dev19.webinteractive.bg/includes/pages/add-color.php?edit='.$row['co_id'].'"><button class="btn btn-outline-dark"><i class="fa fa-pencil"></i></button></a></td></tr>';
                }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header success" style="background-color:#D1B02A;color:white">All METALIC COLORS</div>
          <div class="card-body" style="background-color:#ECDFA8;">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Color Name</th>
                  <th scope="col">Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                include '../../config.php';
                $all_colors = "SELECT * FROM co_colors
                               WHERE co_metalic = 1";
                $stmt = $conn->prepare($all_colors);
                $stmt->execute();
                while( $row = $stmt->fetch() ) {
                  echo '<tr><td>'.$row['co_name'].'</td>
                        <td><a href="https://dev19.webinteractive.bg/includes/pages/add-color.php?edit='.$row['co_id'].'"><button class="btn btn-outline-dark"><i class="fa fa-pencil"></i></button></a></td></tr>';
                }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include '../footer.php'; ?>