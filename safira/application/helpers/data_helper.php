<?php 	


function ambil_field_tabel($nama_tabel,$primary,$idnya,$nama_field)
{
    $CI =& get_instance();
    $data = $CI->db->get_where($nama_tabel, array($primary=>$idnya))->row_array();
    return $data[$nama_field];
}

function get_url_youtube($url)
{
	parse_str( parse_url( $url, PHP_URL_QUERY ), $vars );
    
    $id=$vars['v'];
    $dt=file_get_contents("http://www.youtube.com/get_video_info?video_id=$id&el=embedded&ps=default&eurl=&gl=US&hl=en");
    //var_dump(explode("&",$dt));
        
        $x=explode("&",$dt);
        $t=array(); $g=array(); $h=array();
        foreach($x as $r){
            $c=explode("=",$r);
            $n=$c[0]; $v=$c[1];
            $y=urldecode($v);
            $t[$n]=$v;
        }
        $streams = explode(',',urldecode($t['url_encoded_fmt_stream_map']));
        foreach($streams as $dt){ 
            $x=explode("&",$dt);
            foreach($x as $r){
                $c=explode("=",$r);
                $n=$c[0]; $v=$c[1];
                $h[$n]=urldecode($v);
            }
            $g[]=$h;
        }
        //echo json_encode($g[0],JSON_PRETTY_PRINT);
       // var_dump( $g[1]["quality"],true);
        return $g[0]["url"];
}



function upload_gambar_biasa($nama_gambar, $lokasi_gambar, $tipe_gambar, $ukuran_gambar, $name_file_form)
{
    $CI =& get_instance();
    $nmfile = $nama_gambar."_".time();
    $config['upload_path'] = './'.$lokasi_gambar;
    $config['allowed_types'] = $tipe_gambar;
    $config['max_size'] = $ukuran_gambar;
    $config['file_name'] = $nmfile;
    // load library upload
    $CI->load->library('upload', $config);
    // upload gambar 1
    $CI->upload->do_upload($name_file_form);
    $result1 = $CI->upload->data();
    $result = array('gambar'=>$result1);
    $dfile = $result['gambar']['file_name'];

    return $dfile;

}


