<?php   
$title = "ECN";
require '../layout/header.php';
?>
<!-- Custom css -->
<link href="css/ecn.css" rel="stylesheet"/> 
<!-- Custom css -->

<div class="col-md-12">
<div id="loading-progress" class="loading-progress"></div>
</div>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">ECN Management</h1>
          <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-3">
      <p>ค้นหา จากวันที่ ECN Date
      <input type="text" name="daterange" value="<?=date("d/m/Y", strtotime('-30 days')) . ' - ' . date("d/m/Y");?>" class="form-control" />
      </p>

      </div>
      <div class="col-md-3">
      
      </div>

 <div class="col-md-2">
          
      </div>

      <div class="col-md-4 text-right">
        <p>
        <button class="btn btn-success"onclick="location.href='ecn_create.php';">Create new</button>
        </p>
        <p>
        <button class="btn btn-success"onclick="location.href='ecn_create.php';">Load file</button>
        <button class="btn btn-success"onclick="location.href='ecn_create.php';">Import .csv</button>
      <button class="btn btn-success"onclick="location.href='ecn_create.php';">Export .csv</button>
        </p>
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