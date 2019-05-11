<?php
require '../../00_config/connect.php';
if (isset($_POST['cre_date_start'])) {
    $tbl_name = '30_ecn';
    $search_date_start = $_POST['cre_date_start'];
    $search_date_end = $_POST['cre_date_end'];
    try{
    $statement = $pdo->prepare("SELECT *  FROM $tbl_name
    WHERE ecn_trash = 0 AND created_date  BETWEEN '$search_date_start' and '$search_date_end'
    ");
    $statement->execute();
    $result = $statement->fetchAll();
    } //try
    catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    }
}

?>
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
            <th rowspan="2"><p>Part  Name Old</p></th>
            <th rowspan="2"><p>Part No. New</p></th>
            <th rowspan="2"><p>Part Name New</p></th>
            <th rowspan="2"><p>AC</p></th>
            <th rowspan="2"><p>Model Concern</p></th>
            <th rowspan="2"><p>Reason</p></th>
            <!-- <th rowspan="2" ><p>New part/Full compatible/Non</p></th> -->
            <th rowspan="2"><p>WH Management</p></th>
            <th rowspan="1" colspan="2" class="bg-warning"><p>Production</p></th>
            <th rowspan="2"><p>Effective</p></th>
            <th rowspan="2"><p>Eff Date</p></th>
            <th rowspan="2"><p>Status ECN</p></th>
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
                <td><a href="menu_change.php?id=<?php echo base64_encode($row["menu_id"]); ?>" class="btn btn-outline-warning btn-sm"><span class="fas fa-edit fa-fw"></span></a> 
                    <button id="<?php echo ($row["menu_id"]); ?>"    class="btn btn-outline-danger btn-sm btndelete" ><span class="fas fa-trash fa-fw"></span></button></td>
                <td><?=$row['ecn_created_by']?></td>
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
                <td><?=$row['sn_break_condit']?></td>
                <td><?=$row['sn_break']?></td>
                <td><?=$row['eff']?></td>
                <td><?=date('d/m/Y' , strtotime($row['eff_date']))?></td>
                <td><?=$row['ecn_status']?></td>
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


            <script>
            $(document).ready(function() {
    $('#dataTable').DataTable({
      "pageLength": 25,
      "order": [ 2, "desc" ]
    });
  });
            </script>