<?php
session_start();
include 'includes/header.php';
include 'includes/navbar.php';
?>



<div class="formsec_container">

  <div class="form-sec">
    <h4>Contact form</h4>
    
    <form class="qryform" name="qryform" id="qryform" method="post" action="contactformcode.php" >
        <div class="form-group">
          <label>Name</label>
          <input required type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input required type="email" class="form-control" id="email" placeholder="Enter Email" 
          name="email">
        </div>
        
        <div class="form-group">
          <label>Phone No.</label>
          <input required type="text" class="form-control" id="phone" placeholder="Enter Phone no." name="phone" maxlength="10">
        </div>

        <div class="form-group">
            <label>Company Name</label>
            <input required type="text" class="form-control" id="company_name" placeholder="Enter Company Name" name="company_name">
        </div>
        
        <div class="form-group">
          <label>Service We Offer</label>
          <select required class="form-select" aria-label="Default select example" name="service" id="service">
            <option selected>Select any one</option>
            <option value="GEM">GEM</option>
            <option value="Government Grants and Funding">Government Grants and Funding</option>
            <option value="SETU">SETU</option>
            <option value="AGNII">AGNII</option>
            <option value="Digital Marketing">Digital Marketing</option>
          </select>
        </div>
        <?php include 'message.php'; ?>
        <button type="submit" name="contact_btn" class="btn btn-default btn-primary" >Submit</button>
        
    </form>
  </div>


</div>




<?php include 'includes/footer.php';
?>
