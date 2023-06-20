<?php
//dapatkan id_user yang di daftarkan saat login
$id_user    = $this->session->userdata('id_user');
$user_aktif = $this->user_model->detail($id_user);

?>
<!-- Success Alert Modal -->
<div id="success-alert-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-filled green-bg">
            <div class="modal-body p-3">
                <div class="text-center">
                    <i class="icon-check2 h1"></i>
                    <h5 class="mt-2"><?php echo $this->session->flashdata('sukses'); ?></h5>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
//Notifikasi  hak akses
if ($this->session->flashdata('terbatas')) {
  echo '<div class="alert alert-danger"><i class="fa fa-close"> </i>';
  echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
   </button>';
  echo $this->session->flashdata('terbatas');
  echo '</div>';
}

//notifikasi sukses
if ($this->session->flashdata('sukses')) {
  echo '<div class="alert alert-success"><i class="fa fa-check"> </i>';
  echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
 </button>';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<!-- begin row -->
<div class="row">
    <!-- begin col-3 -->

</div>