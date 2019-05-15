<?ob_start();?>
<?php   
$title = "ECN";
require '../layout/header.php';
 if(in_array('ECN', $role_module_chk) == FALSE) : 
  header("Location: ../base/404.php"); /* Redirect browser */
  echo "hello";
  // exit(0);
endif;
?>
<!-- Custom css -->
<link href="css/ecn.css" rel="stylesheet"/> 
<!-- Custom css -->


          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">ECN Management</h1>
          <!-- Default Card Example -->
          <div id="alert_box" class="alert alert-success  fade " style="display: none;">
  <strong id="msg_head"></strong><p id="msg_txt"></p>
  <button type="button" class="close" data-hide="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-3">
      <p>ECN ที่ใกล้ Effective Date อีก <?=$eff_exp_date ?> วันข้างหน้า </p>
      <div class="col-md-10">
<div id="loading-progress" class="loading-progress"></div>
</div>
      </div>
      <div class="col-md-3">
      
      </div>

 <div class="col-md-2">
          
      </div>

      <div class="col-md-4 text-right">
      </div>
    </div>        
  </div>
<!-- end card header -->
  <!-- <div class="card-body">
    <div class="col-md-12">
    
    </div>
  </div> -->
</div>
      <div  id='detail'></div>
        
<!-- end card -->

<?php   require '../layout/footer.php';?>
<script src='js/ecn_table.js'></script>