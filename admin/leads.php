<?php
session_start();
include 'config/dbcon.php';
include 'includes/header.php';
?>


<?php include '../message.php'; ?>

<h4 class="text-dark pl-3 m-5 text-center">CONTACT FORM LEADS</h4>

<div class="container d-flex align-items-center justify-content-center">


  

  <table class="table table-hover table-light">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email Id</th>
        <th scope="col">Phone</th>
        <th scope="col">Company Name</th>
        <th scope="col">Service</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $getcontactdata = 'SELECT * FROM leads';
        $getcontactdata_run = mysqli_query($conn, $getcontactdata);

        if (mysqli_num_rows($getcontactdata_run) > 0) {
            foreach ($getcontactdata_run as $row) { 
              ?>

                    <tr>
                      <td><?= $row['id'] ?></td>
                      <td><?= $row['name'] ?></td>
                      <td><?= $row['email'] ?></td>
                      <td><?= $row['phone'] ?></td>
                      <td><?= $row['company_name'] ?></td>
                      <td><?= $row['service'] ?></td>
                    </tr>

                <?php }
        } else {
             ?>
                <tr>
                  <td colspan="6" class="text-center text-danger">No Data Found</td>
                </tr>
            <?php
        }
        ?>
      
    </tbody>
  </table>

</div>






<?php
include 'includes/footer.php';
include 'includes/scripts.php';


?>
