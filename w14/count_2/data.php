<?php
header('Content-Type: application/json');

require_once('connectdb.php');

$sqlQuery = "SELECT count(prj_id) as project_count,concat(ttl_name,lct_fname,' ',lct_lname) as lecturer_name from project right join lecturer on prj_lct_id = lct_id join title on lct_ttl_id = ttl_id group by lecturer_name;";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>