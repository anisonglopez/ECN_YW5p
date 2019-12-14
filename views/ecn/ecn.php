<?ob_start();?>
<?php   
$title = "ECN";
require '../layout/header.php';
 if(in_array('ECN', $role_module_chk) == FALSE) : 
  header("Location: ../base/404.php"); /* Redirect browser */
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
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  
</div>
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-3">
      <!-- <p>
        <input type="radio" name="search_condit" id="search_date" onclick="search_con()"  value="1" checked/> ECN Create Date
      <input type="text" name="daterange"  id="daterange"  value="<?=date("d/m/Y", strtotime('-30 days')) . ' - ' . date("d/m/Y");?>" class="form-control" />
      </p> -->
      <p>
        <input type="radio" name="search_condit" id="search_part_no" onclick="search_con()" value="2" checked /> Part No
      <input type="text" name="part_no_search" id="part_no_search"  class="form-control" placeholder="Input Part no"  />
      </p>

      <div class="col-md-10">
<div id="loading-progress" class="loading-progress" style="display: none;"></div>
</div>
      </div>
      <div class="col-md-3">
      <p>
            <input type="radio" name="search_condit" id="search_status" onclick="search_con()" value="3" /> ECN Status
            <select class="form-control" name="ecn_status" id="ecn_status"  required>
                  <?php include 'utility/ecn_status.php';?>
            </select>
      </p>
      <p>
          <button class="btn btn-info" id="search" type="submit"> Search</button>
      </p>
      </div>

      <div class="col-md-6 text-right">

        <button class="btn btn-success"onclick="location.href='ecn_create.php';">Create new</button>
        <button class="btn btn-primary"onclick="location.href='../../file_import/ecn/ecn_import_template_updated_24072019.xlsx';">Load Template</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#import_excel_modal">Import Excel</button>
      <button class="btn btn-primary"  onclick="export_excel()" >Export Excel</button>
      <!-- <a href="ajax/ecn_export.php"  class="btn btn-info" download>Download!</a> -->

      </div>
    </div>        
  </div>
<!-- end card header -->
  <!-- <div class="card-body">
    <div class="col-md-12">
    
    </div>
  </div> -->
</div>
      <!-- <div id="detail"></div> -->
      <div class="table-responsive">
      <table class="table table-hover table-sm small" id="dataTableServerside">
      <thead class="bg-info text-white small">
          <tr class="text-center">
          <th rowspan="2"><p>Action</p></th>
          <!-- <th rowspan="2"><p>Last Updated By</p></th> -->
          <th rowspan="2" ><p>Create Date</p></th>
            <th rowspan="2"><p>ECN No.</p></th>
            <th rowspan="2"><p>Buddle Code</p></th>
            <!-- <th rowspan="2"><p>MINOR</p></th> -->
            <th rowspan="2"><p>Part No Old.</p></th>
            <!-- <th rowspan="2"><p>Part  Name Old</p></th> -->
            <th rowspan="2"><p>Part No. New</p></th>
            <th rowspan="2"><p>Part Name New</p></th>
            <!-- <th rowspan="2"><p>AC</p></th> -->
            <!-- <th rowspan="2" class="model_concern"><p>Model Concern</p></th> -->
            <th rowspan="2"><p>Reason</p></th>
            <!-- <th rowspan="2" ><p>New part/Full compatible/Non</p></th> -->
            <th rowspan="2"><p>WH Management</p></th>
            <th rowspan="1" colspan="1" class="bg-warning"><p>Production</p></th>
            <th rowspan="2"><p>Effective</p></th>
            <th rowspan="2"><p>Eff Date</p></th>
            <th rowspan="2"><p>Status ECN</p></th>
            <!-- <th rowspan="1" colspan="2"><p>Actual for risk</p></th> -->
            <!-- <th rowspan="2"><p>Management stock (Apros)</p></th> -->
            <!-- <th rowspan="1" colspan="2"><p>Warehouse</p></th> -->
            <!-- <th rowspan="2"><p>Ddate</p></th> -->
            <!-- <th rowspan="1" colspan="5"  class="bg-warning"><p>Follow Up Point</p></th> -->
            <!-- <th rowspan="2"><p>Buyer</p></th>      
            <th rowspan="2"><p>Supplier</p></th>     
            <th rowspan="2"><p>First PO</p></th>     
            <th rowspan="2"><p>First Deliver</p></th>      
            <th rowspan="2"><p>Remark/Action</p></th>       -->
          </tr>
          <tr class="text-center">
              <!-- <th><p>Prod Plan</p></th> -->
              <!-- <th><p>Serial No.Break?(Y?N)</p></th> -->
              <th><p>Serial No.Break</p></th>
              <!-- <th><p>Planing</p></th>
              <th><p>Wearhouse</p></th> -->
              <!-- <th><p>Supply date</p></th>
              <th><p>Serial No.</p></th> -->
              <!-- <th><p>DWG.</p></th>
              <th><p>Stock Supplier</p></th>
              <th><p>Cost Supplier</p></th>
              <th><p>QA Audit</p></th>
              <th><p>Special Request</p></th> -->
          </tr>
        </thead>
      </table>
      </div>
<!-- end card -->

<?php   require '../layout/footer.php';?>
<?php   require 'modal/import_excel_modal.php';?>
<?php   require 'modal/export_excel_modal.php';?>
<script src='js/ecn_table.js'></script>
<script>
 $(document).ready(function() {
        // var table = $('#dataTable').DataTable({
        // stateSave: true,
        // "pageLength": 25,
        // "order": [ 0, "asc" ]
        // });
        var table = $('#dataTableServerside').DataTable({
          destroy: true,
          stateSave: true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: "ecn_serverside.php",
            dataSrc: function ( data ) {
          //  recordsTotal = data.recordsTotal;
           return data.data;
         } 
        },
        "pageLength": 25,
        drawCallback: function( settings ) {
        }    
});

$('#dataTableServerside tbody').on( 'click', '.btndelete', function () {
        var _id = this.id;
        var result = confirm("Want to delete?");
          if (result) {
            table
          .row( $(this).parents('tr') )
          .remove()
          .draw();
            $.ajax({
             type: "POST",
             url: "ajax/ecn_delete.php",
             data:{_id:_id},
             success: function(data)
             {
              $('#alert_box').show();
               console.log(data);
                  if(data == 'error'){
                      // alert_box.className = 'alert alert-danger alert-dismissible fade show';
                      // msg_head.innerHTML= 'Error !!';
                      // msg_txt.innerHTML= 'พบปัญหา ไม่สามารถลบข้อมูลได้ กรูราติดต่อเจ้าหน้าที่ ที่เกี่ยวข้อง';
                      alert('พบปัญหา ไม่สามารถลบข้อมูลได้ กรูราติดต่อเจ้าหน้าที่ ที่เกี่ยวข้อง');
                  }else{
                      // alert_box.className = 'alert alert-success alert-dismissible fade show';
                      // msg_head.innerHTML= 'Success !!';
                      // msg_txt.innerHTML= 'ลบข้อมูลสำเร็จ';
                      alert('ลบข้อมูลสำเร็จ');
                  }
                  
             }
           });
          }
    });

    //View file
    $('#dataTableServerside tbody').on( 'click', '.viewfile', function () {
        var _id = this.id;
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        console.log(row)
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            $.ajax({
             type: "POST",
             url: "ajax/ecn_viewfile.php",
             data:{_id:_id},
             success: function(data)
             {
              row.child(data).show();
              tr.addClass('shown');
             }
           });
   }
});

    $('#search').click(function(){
      var search_by_part_no = document.getElementById("search_part_no");
    var search_status = document.getElementById("search_status");
    var part_no_search = document.getElementById("part_no_search").value;
    var ecn_status = document.getElementById("ecn_status").value;
    if(search_by_part_no.checked == true){
        var table = $('#dataTableServerside').DataTable({
            destroy: true,
            stateSave: true,
          "processing": true,
          "serverSide": true,
          "ajax": {
            "type": 'GET',
              url: "ecn_serverside.php",
            "data": {part_no_search:part_no_search}
          },
          "pageLength": 25,
          drawCallback: function( settings ) {

          }
});
}
    if(search_status.checked == true){
      var table = $('#dataTableServerside').DataTable({
            destroy: true,
            stateSave: true,
          "processing": true,
          "serverSide": true,
          "ajax": {
            "type": 'GET',
              url: "ecn_serverside.php",
            "data": {ecn_status:ecn_status}
          },
          "pageLength": 25,
          drawCallback: function( settings ) {

          }
});
    }

    //View file
    $('#dataTableServerside tbody').on( 'click', '.viewfile', function () {
        var _id = this.id;
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        console.log(row)
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            $.ajax({
             type: "POST",
             url: "ajax/ecn_viewfile.php",
             data:{_id:_id},
             success: function(data)
             {
              row.child(data).show();
              tr.addClass('shown');
             }
           });
   }
});
    });
});


function search_submit(){
    var search_by_part_no = document.getElementById("search_part_no");
    var search_status = document.getElementById("search_status");
    var part_no_search = document.getElementById("part_no_search").value;
    var ecn_status = document.getElementById("ecn_status").value;
    if(search_by_part_no.checked == true){
        var table = $('#dataTableServerside').DataTable({
            // destroy: true,
            stateSave: true,
          "processing": true,
          "serverSide": true,
          "ajax": {
            "type": 'GET',
              url: "ecn_serverside.php",
            "data": {part_no_search:part_no_search}
          },
          "pageLength": 25,
          drawCallback: function( settings ) {

          }
});
}
    if(search_status.checked == true){
        $.ajax({              
            url: "ajax/ecn_table.php",
            type: 'POST',
            data: {ecn_status:ecn_status},
            beforeSend: function() {
                $('#detail').html('กำลังโหลด ..');        
            },
            success: function(data) {
                $('#detail').html(data);          
            }
        });
    }
}
</script>
