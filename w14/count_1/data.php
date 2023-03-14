<?php
header('Content-Type: application/json');

require_once('connectdb.php');

$sqlQuery = "SELECT count(prj_id) as project_count,(ptt_name) as project_type from project join project_type on prj_ppt_id = ptt_id group by project_type;";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>