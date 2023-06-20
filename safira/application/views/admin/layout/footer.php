</div>
<br>
 <!-- begin theme-panel -->
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="ion-ios-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Color Theme</h5>
                <ul class="theme-list clearfix">
                    <li class="active"><a href="javascript:;" class="bg-blue" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-green" data-theme="green" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Header Styling</div>
                    <div class="col-md-7">
                        <select name="header-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">inverse</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Header</div>
                    <div class="col-md-7">
                        <select name="header-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                    <div class="col-md-7">
                        <select name="sidebar-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">grid</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Sidebar</div>
                    <div class="col-md-7">
                        <select name="sidebar-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                    <div class="col-md-7">
                        <select name="content-gradient" class="form-control input-sm">
                            <option value="1">disabled</option>
                            <option value="2">enabled</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i class="ion-refresh m-r-3"></i> Reset Local Storage</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end theme-panel -->
    
    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
  </div>
  <!-- end page container -->
  
  <!-- ================== BEGIN BASE JS ================== -->
  <script src="<?php echo base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery-migrate-1.1.0.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  <!--[if lt IE 9]>
    <script src="assets/crossbrowserjs/html5shiv.js"></script>
    <script src="assets/crossbrowserjs/respond.min.js"></script>
    <script src="assets/crossbrowserjs/excanvas.min.js"></script>
  <![endif]-->
  <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery.cookie.js"></script>
  <!-- ================== END BASE JS ================== -->
  
  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="<?php echo base_url() ?>assets/js/jquery.gritter.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery.flot.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery.flot.time.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery.flot.resize.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery.flot.pie.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery.sparkline.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery-jvectormap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery-jvectormap-world-mill-en.js"></script>
  <script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url() ?>assets/js/dashboard.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/apps.min.js"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.js"></script>
  <script src="<?php echo base_url() ?>assets/js/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/table-manage-default.demo.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/summernote.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/form-summernote.demo.min.js"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->
  
  <script>
    $(document).ready(function() {
      App.init();
      // Dashboard.init();
      TableManageDefault.init();
      FormSummernote.init();
    });
  </script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53034621-1', 'auto');
  ga('send', 'pageview');

</script>

<?php 
    if($this->session->flashdata('sukses')) {
        echo '
        <script type="text/javascript">
            $(document).ready(function(){
                $("#success-alert-modal").modal(\'show\');
            });

            setTimeout(function() {
                $(\'#success-alert-modal\').modal(\'hide\');
            }, 2000);
        </script>';
    }
 ?>
</body>


</html>
