<?php   
$title = "ECN";
require '../layout/header.php';
?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">ECN Management</h1>
          <!-- Default Card Example -->
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-2 text-primary">
          จัดการข้อมูล ECN
      </div>
      <div class="col-md-3">
          <p>ค้นหา
      <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" class="form-control" />
      </p>
<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>
      </div>
      <div class="col-md-6 text-right">
        <button class="btn btn-success"onclick="location.href='ecn_create.php';">Create new</button>
      </div>
    </div>        
  </div>
<!-- end card header -->
  <div class="card-body">
    <div class="col-md-12">
    
    </div>
  </div>
</div>

<div class="table-responsive">
      <table class="table table-hover table-sm table-bordered" id="dataTable">
        <thead class="bg-info text-white small">
          <tr class="text-center">
          <th rowspan="2"><p>Action</p></th>
          <th rowspan="2"><p>Create By</p></th>
          <th rowspan="2" ><p>Create Date</p></th>
            <th rowspan="2" ><p>ECN No.</p></th>
            <th rowspan="2"><p>Buddle Code</p></th>
            <th rowspan="2"><p>MINOR</p></th>
            <th rowspan="2"><p>Part No Old.</p></th>
            <th rowspan="2"><p>Part Name</p></th>
            <th rowspan="2"><p>Part No. New</p></th>
            <th rowspan="2"><p>Part Name New</p></th>
            <th rowspan="2"><p>AC</p></th>
            <th rowspan="2"><p>Part Name</p></th>
            <th rowspan="2"><p>Model Concern</p></th>
            <th rowspan="2"><p>Reason</p></th>
            <th rowspan="2" ><p>New part/Full compatible/Non</p></th>
            <th rowspan="2"><p>WH Management</p></th>
            <th rowspan="1" colspan="3" class="bg-warning"><p>Production</p></th>
            <th rowspan="2"><p>Eff Date</p></th>
            <th rowspan="2"><p>Status ECN</p></th>
            <th rowspan="1" colspan="2"><p>Actual for risk</p></th>
            <th rowspan="2"><p>Management stock (Apros)</p></th>
            <th rowspan="1" colspan="2"><p>Warehouse</p></th>
            <th rowspan="2"><p>Ddate</p></th>
            <th rowspan="1" colspan="5"><p>Follow Up Point</p></th>
            <th rowspan="2"><p>Remark/Action</p></th>      
          </tr>
          <tr class="text-center">
              <th><p>Prod Plan</p></th>
              <th><p>Serial No.Break?(Y?N)</p></th>
              <th><p>Serial No.Break</p></th>
              <th><p>Planing</p></th>
              <th><p>Wearhouse</p></th>
              <th><p>Supply date</p></th>
              <th><p>Serial No.</p></th>
              <th><p>DWG.</p></th>
              <th><p>Stock Supplier</p></th>
              <th><p>Cost Supplier</p></th>
              <th><p>QA Audit</p></th>
              <th><p>Special Request</p></th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td>testasdsssdsd</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>testsdsdsdsssd</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
                <td>test</td>
            </tr>
        </tbody>
      </table>
        </div>
<!-- end card -->

<?php   require '../layout/footer.php';?>