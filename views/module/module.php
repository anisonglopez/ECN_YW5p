<?php   
$title = "Module";
require '../layout/header.php';
?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Module</h1>
          <!-- Page Content -->
          <hr>
   <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6">
          จัดการข้อมูล Module
      </div>
      <div class="col-md-6 text-right">
        <button class="btn btn-success"onclick="location.href='user_create.php';">Create new</button>
      </div>
    </div>        
  </div>
<!-- end card header -->
  <div class="card-body">
    <div class="col-md-12">
      <table class="table table-hover table-sm " id="dataTable">
        <thead class="bg-info text-white">
          <tr>
            <th>Module Id</th>
            <th>Module Name</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</div>

<?php   require '../layout/footer.php';?>