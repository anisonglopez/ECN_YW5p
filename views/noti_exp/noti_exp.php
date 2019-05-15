<?ob_start();?>
<?php   
$title = "ECN";
require '../layout/header.php';
if(in_array('NTI', $role_module_chk) == FALSE) : 
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
  <button type="button" class="close" data-hide="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="card mb-4">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6">
      <p>ECN ที่ใกล้ Effective Date อีก <?=$eff_exp_date_int ?> วันข้างหน้า </p>
      <div class="col-md-10">
<div id="loading-progress" class="loading-progress"></div>
</div>
      </div>
      <!-- <div class="col-md-3">
      
      </div> -->

 <div class="col-md-2">
          
      </div>

      <div class="col-md-4 text-right">
      <button class="btn btn-success">Send Mail</button>
      </div>
    </div>        
  </div>
<!-- end card header -->
  <!-- <div class="card-body">
    <div class="col-md-12">
    
    </div>
  </div> -->
</div>
<?php
    $tbl_name = '30_ecn';
    $search_date_start = date("Y/m/d");
    $search_date_end = date("Y/m/d", strtotime('+'.$eff_exp_date_int.' days'));
    try{
    $statement = $pdo->prepare("SELECT *  FROM $tbl_name
    WHERE ecn_trash = 0 
    AND eff_date  BETWEEN '$search_date_start' and '$search_date_end'
    AND eff = 'Effective' AND ecn_status = 'Follow_up'
    ");
    $statement->execute();
    $result = $statement->fetchAll();
    } //try
    catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    }

?>
<div class="table-responsive">
      <table class="table table-hover table-sm table-bordered" id="dataTable">
        <thead class="bg-info text-white small">
          <tr class="text-center">
          <th rowspan="2"><p>Status ECN</p></th>
          <th rowspan="2"><p>Effective</p></th>
            <th rowspan="2"><p>Eff Date</p></th>
          <th rowspan="2"><p>Last Updated By</p></th>
          <th rowspan="2" ><p>Create Date</p></th>
            <th rowspan="2"><p>ECN No.</p></th>
            <th rowspan="2"><p>Buddle Code</p></th>
            <th rowspan="2"><p>MINOR</p></th>
            <th rowspan="2"><p>Part No Old.</p></th>
            <th rowspan="2"><p>Part  Name Old</p></th>
            <th rowspan="2"><p>Part No. New</p></th>
            <th rowspan="2"><p>Part Name New</p></th>
            <th rowspan="2"><p>AC</p></th>
            <th rowspan="2" class="model_concern"><p>Model Concern</p></th>
            <th rowspan="2"><p>Reason</p></th>
            <!-- <th rowspan="2" ><p>New part/Full compatible/Non</p></th> -->
            <th rowspan="2"><p>WH Management</p></th>
            <th rowspan="1" colspan="2" class="bg-warning"><p>Production</p></th>


            <!-- <th rowspan="1" colspan="2"><p>Actual for risk</p></th> -->
            <!-- <th rowspan="2"><p>Management stock (Apros)</p></th> -->
            <!-- <th rowspan="1" colspan="2"><p>Warehouse</p></th> -->
            <!-- <th rowspan="2"><p>Ddate</p></th> -->
            <th rowspan="1" colspan="5"  class="bg-warning"><p>Follow Up Point</p></th>
            <th rowspan="2"><p>Buyer</p></th>      
            <th rowspan="2"><p>Supplier</p></th>     
            <th rowspan="2"><p>First PO</p></th>     
            <th rowspan="2"><p>First Deliver</p></th>      
            <th rowspan="2"><p>Remark/Action</p></th>      
          </tr>
          <tr class="text-center">
              <!-- <th><p>Prod Plan</p></th> -->
              <th><p>Serial No.Break?(Y?N)</p></th>
              <th><p>Serial No.Break</p></th>
              <!-- <th><p>Planing</p></th>
              <th><p>Wearhouse</p></th> -->
              <!-- <th><p>Supply date</p></th>
              <th><p>Serial No.</p></th> -->
              <th><p>DWG.</p></th>
              <th><p>Stock Supplier</p></th>
              <th><p>Cost Supplier</p></th>
              <th><p>QA Audit</p></th>
              <th><p>Special Request</p></th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row) : ?>
            <tr class="small">
              <td><?=$row['ecn_status']?></td>
               <td><?=$row['eff']?></td>
                <td><?=date('d/m/Y' , strtotime($row['eff_date']))?></td>
                <td><?=$row['ecn_updated_by']?></td>
                <td width="40"><?=date('d/m/Y' , strtotime($row['created_date']))?></td>
                <td><?=$row['ecn_no']?></td>
                <td><?=$row['buddle_code']?></td>
                <td><?=$row['minor']?></td>
                <td><?=$row['part_no_old']?></td>
                <td><?=$row['part_name_old']?></td>
                <td><?=$row['part_no_new']?></td>
                <td><?=$row['part_name_new']?></td>
                <td><?=$row['ac']?></td>
                <td><?=$row['model_concern']?></td>
                <td><?=$row['reason']?></td>
                <td><?=$row['wh_m']?></td>
                <td class="text-center"><?=$row['sn_break_condit']?></td>
                <td><?=$row['sn_break']?></td>
                <td><?=$row['dwg']?></td>
                <td><?=$row['stock_sup']?></td>
                <td><?=$row['cost_sup']?></td>
                <td><?=$row['qa_audit']?></td>
                <td><?=$row['sp_req']?></td>
                <td><?=$row['buyer']?></td>
                <td><?=$row['sup']?></td>
                <td><?=$row['first_po']?></td>
                <td><?=date('d/m/Y' , strtotime($row['first_deliver']))?></td>
                <td><?=$row['remark']?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
<!-- end card -->
<?php   require '../layout/footer.php';?>
<script>
 var table = $('#dataTable').DataTable();
</script>