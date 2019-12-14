<?php
require '../../00_config/connect.php';
session_start();
$TABLE_NAME = '30_ecn';
$TABLE_FK = '30_ecn_attach';
if (isset($_POST['_id'])):
    $id = $_POST['_id'];
    try{
        $statement = $pdo->prepare("SELECT *  FROM $TABLE_NAME 
        JOIN $TABLE_FK ON $TABLE_NAME.ecn_id = $TABLE_FK.ecn_id
        WHERE $TABLE_NAME .ecn_id = $id
        ");
        $statement->execute();
        $result = $statement->fetchAll();
      } //try
      catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
      }
?>
      <table class="table table-hover table-sm small" id="dataTable">
        <thead class=" bg-gray-400">
          <tr>
            <th>File Name</th>
            <th>Description</th>
            <th>Upload Date</th>
            <th>Upload By</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row) : ?>
                  <tr class="bg-gray-200">
                    <td><?php echo ($row["file_name"]); ?></td>
                    <td><?php echo ($row["att_desc"]); ?></td>
                    <td><?php echo ($row["updated_date"]); ?></td>
                    <td><?php echo ($row["updated_by"]); ?></td>
                    <td><button class="btn btn-outline-success btn-sm">
                            <a href="file_upload/uploads/<?=$row['file_name']?>">
                            <span class="fas fa-download fa-fw"></span>
                            </a>
                    </button>
                    </td>
                  </tr>
                  <?php endforeach; ?>
        </tbody>
      </table>


 <?php
endif //end isset
?>
