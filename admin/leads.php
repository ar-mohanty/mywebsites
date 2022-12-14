<?php
session_start();
include 'config/dbcon.php';
include 'includes/header.php';
?>


<?php include '../message.php'; ?>



<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card mt-5">
            <div class="col card-header ">
              <h4 class="text-dark text-center">CONTACT FORM LEADS</h4>
            </div>
            <div class="card-body">
              <form method="get" action="">
                  <div class="row d-flex justify-content-center align-items-center">
                      <div class="col form-group">
                        <label>From Date</label>
                        <input type="date" name="from_date" value="<?php if (
                            isset($_GET['from_date'])
                        ) {
                            echo $_GET['from_date'];
                        } ?>" class="form-control">
                      </div>
                      <div class="col form-group">
                        <label>TO Date</label>
                        <input type="date" name="to_date" value="<?php if (
                            isset($_GET['to_date'])
                        ) {
                            echo $_GET['to_date'];
                        } ?>" class="form-control">
                      </div>
                      <div class="col form-group">
                        <label>Click to Filter</label> <br>
                        <button type="submit" class="btn btn-primary">Filter</button>
                      </div>
                  </div>
              </form> 


              <div class="card-body">
                <table class="table table-bordered">

                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Company Name</th>
                      <th>Service</th>
                      <th>Created_at</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (
                        isset($_GET['from_date']) &&
                        isset($_GET['to_date'])
                    ) {
                        $from_date = $_GET['from_date'];
                        $to_date = $_GET['to_date'];

                        $query = "SELECT * FROM leads WHERE created_at BETWEEN '$from_date' AND '$to_date'";
                        $query_run = mysqli_query($conn, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $row) { ?>
                                <tr>
                                  <td><?= $row['id'] ?></td>
                                  <td><?= $row['name'] ?></td>
                                  <td><?= $row['email'] ?></td>
                                  <td><?= $row['phone'] ?></td>
                                  <td><?= $row['company_name'] ?></td>
                                  <td><?= $row['service'] ?></td>
                                  <td><?= $row['created_at'] ?></td>
                                </tr>

                            <?php }
                        } else {
                            echo 'no record found';
                        }
                    } ?>
                  </tbody>
                </table>
                
              </div>

            </div>
          </div>
      </div>
  </div>
</div>






<?php
include 'includes/footer.php';
include 'includes/scripts.php';


?>
