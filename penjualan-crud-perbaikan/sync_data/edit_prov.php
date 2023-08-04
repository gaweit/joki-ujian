<?php
	date_default_timezone_set('Asia/Jakarta');

	include"conn.php";

	ini_set('max_execution_time', 5000);

	$gel = $_GET['gel'];
	$ta = $_GET['ta'];
	$jur = $_GET['jur'];

    //jSON URL which should be requested
    $json_url = "http://pmb.stikom-db.ac.id/sync-reg/allmhs?api=ae9e389cec19f7e5317a1c667b69086f390a6af0";

    echo $json_url;

    $ch = curl_init( $json_url );
    $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array('Content-type: application/json')
        //CURLOPT_POSTFIELDS => $json_string
    );
    curl_setopt_array( $ch, $options ); // Setting curl options
    $result =  curl_exec($ch); // Getting jSON result string

    $decode = json_decode($result, true);
    //print_r($decode);
    
    $tambah = 0;
    $edit = 0;

    foreach ($decode['mhs'] as $row) {
        $sql = mysql_query("SELECT a.*, b.* FROM setoran_registrasi a, mahasiswa b 
        					WHERE a.nim = b.nim 
        					AND a.no_pendaftaran = '$row[no_pendaftaran]'") or die(mysql_error());
        $fd = mysql_num_rows($sql);
        $d = mysql_fetch_assoc($sql);

        if($fd > 0) 
        {
            /*
            if($row['stts_calon'] == 'B' OR $row['stts_calon'] == 'R' OR $row['stts_calon'] == 'U')
            {
                $sts = "Baru";
            }
            elseif($row['stts_calon'] == 'T')
            {
                $sts = "Pindahan";
            }*/

            mysql_query("UPDATE mahasiswa SET kabupaten = '$row[kabupaten]',
                                                provinsi_sekolah = '$row[provinsi_sekolah]' 
                        WHERE nim = '$d[nim]'") or die(mysql_error());
            $edit += 1;
        }
        else
        {
            $tambah += 1;
        }
    }

    echo "Penambahan Data Baru : ". $tambah;
    echo "<br>Perubahan Data : ". $edit;

				

		

?>