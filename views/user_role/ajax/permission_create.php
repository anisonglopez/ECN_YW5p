<?php 
//echo $_POST['chkb'];
if(!empty($_POST['chkb'])) {
    $checked_count = count($_POST['chkb']);
foreach($_POST['chkb'] as $selected):
    echo $selected;
endforeach;
}
?>