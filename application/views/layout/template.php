<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title ?></title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--basic styles-->

        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">


        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!--page specific plugin styles-->

        <!--fonts-->

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fonts.google.css" />

        <!--ace styles-->

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.gritter.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/select2.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-editable.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-timepicker.css" />

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-ie.min.css" />
        <![endif]-->


        <!--basic scripts-->

        <!--[if !IE]>-->

        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>

        <!--<![endif]-->

        <!--[if IE]>
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<![endif]-->

        <!--[if !IE]>-->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo base_url() ?>assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>

        <!--<![endif]-->

        <!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='<?php echo base_url() ?>assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='<?php echo base_url() ?>assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

        <!--page specific plugin scripts-->

        <!--[if lte IE 8]>
          <script src="<?php echo base_url('assets/js/excanvas.min.js') ?>"></script>
        <![endif]-->

        <script src="<?php echo base_url('assets/js/jquery-ui-1.10.3.custom.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.ui.touch-punch.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.easy-pie-chart.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.sparkline.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/flot/jquery.flot.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/flot/jquery.flot.pie.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/flot/jquery.flot.resize.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.dataTables.bootstrap.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.timer.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.maskedinput.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.validate.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootbox.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/x-editable/bootstrap-editable.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/x-editable/ace-editable.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.gritter.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/select2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/date-time/bootstrap-timepicker.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/date-time/moment.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/date-time/daterangepicker.min.js') ?>"></script>

        <!--ace scripts-->

        <script src="<?php echo base_url('assets/js/ace-elements.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/ace.min.js') ?>"></script>

        <!--inline scripts related to this page-->

        <!--inline styles related to this page-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

    <body>
<?php $this->load->view("layout/header"); ?>

        <div class="main-container container-fluid">
            <a class="menu-toggler" id="menu-toggler" href="#">
                <span class="menu-text"></span>
            </a>

            <?php $this->load->view("layout/menu"); ?>

<?php $this->load->view($container); ?>
            <div class="ace-settings-container" id="ace-settings-container">
                <div class="btn btn-app btn-mini btn-warning ace-settings-btn" id="ace-settings-btn">
                    <i class="icon-cog bigger-150"></i>
                </div>

                <div class="ace-settings-box" id="ace-settings-box">
                    <div>
                        <div class="pull-left">
                            <select id="skin-colorpicker" class="hide">
                                <option data-class="default" value="#438EB9" />#438EB9
                                <option data-class="skin-1" value="#222A2D" />#222A2D
                                <option data-class="skin-2" value="#C6487E" />#C6487E
                                <option data-class="skin-3" value="#D0D0D0" />#D0D0D0
                            </select>
                        </div>
                        <span>&nbsp; Choose Skin</span>
                    </div>

                    <div>
                        <input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" />
                        <label class="lbl" for="ace-settings-header"> Fixed Header</label>
                    </div>

                    <div>
                        <input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" />
                        <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                    </div>

                    <div>
                        <input type="checkbox" class="ace-checkbox-2" id="ace-settings-breadcrumbs" />
                        <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                    </div>

                    <div>
                        <input type="checkbox" class="ace-checkbox-2" id="ace-settings-rtl" />
                        <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                    </div>
                </div>
            </div><!--/#ace-settings-container-->

        </div><!--/.main-container-->

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
            <i class="icon-double-angle-up icon-only bigger-110"></i>
        </a>
    </body>
</html>
