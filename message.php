<?php
if (isset($_SESSION['message'])) { ?>
      
      <div class="alert alert-warning d-flex justify-content-center" role="alert">
        <b><?= $_SESSION['message'] ?></b>
      </div>

    <?php unset($_SESSION['message']);}

?>
