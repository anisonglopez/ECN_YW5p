<?php   
$title = "new page";
require '../layout/header.php';
?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">User</h1>
          <!-- Page Content -->
          <hr>
   <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6">
          จัดการข้อมูลผู้ใช้งาน
      </div>
      <div class="col-md-6 text-right">
        <button class="btn btn-success"onclick="location.href='user_create.php';">Create new</button>
      </div>
    </div>        
  </div>
<!-- end card header -->
  <div class="card-body">
    <div class="col-md-12">
      <table class="table table-hover table-bordered" id="dataTable">
        <thead>
          <tr>
            <th>ชื่อผู้ใช้งาน</th>
            <th>แผนก</th>
            <th>กลุ่มผู้ใช้งาน</th>
            <th>อีเมล</th>
            <th>Active</th>
            <th>Lock</th>
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