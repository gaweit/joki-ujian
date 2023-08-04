<?php
	include"conn.php";

	$q = mysql_query("SELECT * FROM mahasiswa WHERE nim = '$_GET[nim]'") 
	or die(mysql_error());

	if ($q) {
		$po = array();
		if (mysql_num_rows($q)) {
			$p = mysql_fetch_assoc($q);
			foreach ($p as $key => $value) {
				$po[$key] = $value;

			}
			
		}

		//echo json_encode(array('mhs' => $po));
		echo json_encode($po);
	}

?>