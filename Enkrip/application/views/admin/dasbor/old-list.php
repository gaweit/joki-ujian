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
  <div class="col-md-3 col-sm-6">
    <div class="widget widget-stats bg-gradient-blue">
      <div class="stats-icon"><i class="  fa fa-database"></i></div>
      <div class="stats-info">
        <h4>DATA MAHASISWA</h4>
        <p><?php echo $karyawan ?></p>
      </div>
      <div class="stats-link">

        <a href="<?php echo base_url('admin/karyawan') ?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
      </div>
    </div>
  </div>
  <!-- end col-3 -->
  <!-- begin col-3 -->
  <div class="col-md-3 col-sm-6">
    <div class="widget widget-stats bg-gradient-aqua">
      <div class="stats-icon"><i class="fa fa-home"></i></div>
      <div class="stats-info">
        <h4>DATA BIDANG</h4>
        <p><?php echo $bidang ?></p>
      </div>
      <div class="stats-link">
        <a href="<?php echo base_url('admin/bidang') ?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
      </div>
    </div>
  </div>
  <!-- end col-3 -->

  <!-- begin col-3 -->
  <div class="col-md-3 col-sm-6">
    <div class="widget widget-stats bg-gradient-orange">
      <div class="stats-icon"><i class="fa fa-home"></i></div>
      <div class="stats-info">
        <h4>DATA SERTIFIKAT</h4>
        <p><?php echo $sertifikat ?></p>
      </div>
      <div class="stats-link">
        <?php if ($this->session->userdata('akses_level') != "Admin") {  ?>
          <a href="<?php echo base_url('admin/sertifikat_admin') ?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
        <?php } else { ?>
          <a href="<?php echo base_url('admin/sertifikat_admin') ?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- end col-3 -->

  <!-- begin col-3 -->
  <div class="col-md-3 col-sm-6">
    <div class="widget widget-stats bg-gradient-red">
      <div class="stats-icon"><i class="fa fa-user"></i></div>
      <div class="stats-info">
        <h4>DATA USER/ADMIN</h4>
        <p><?php echo $Tes ?></p>
      </div>
      <div class="stats-link">
        <a href="<?php echo base_url('admin/user') ?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
      </div>
    </div>
  </div>
  <!-- end col-3 -->

  <div class="col-md-12 col-sm-12">
    <div class="widget widget-stats bg-gradient-aqua">
      <div class="stats-icon"><i class="fa fa-wifi"></i></div>
      <div class="stats-info">
        <h1 align="center" style="text-transform: uppercase;color: white">
          <b>selamat datang <?php echo $user_aktif->nama ?> <br>
            <img width="30%" src="<?php echo base_url() ?>/assets/img/gaweicon.png" alt="">
          </b>
      </div>

    </div>
  </div>

</div>
<!-- end row -->


<!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/chart/canvasjs.min.js"></script> -->