<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title ?></title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--basic styles-->

        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />

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

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-ie.min.css" />
        <![endif]-->

        <!--inline styles related to this page-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>

    <body class="login-layout">
        <div class="main-container container-fluid">
            <div class="main-content">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="login-container">
                            <div class="row-fluid">
                                <div class="center">
                                    <h1>
                                        <i class="icon-building green"></i>
                                        <span class="red">SAB</span>
                                        <span class="white">Multi Project</span>
                                    </h1>
                                    <h4 class="blue">&copy; MCS-2012</h4>
                                </div>
                            </div>

                            <div class="space-6"></div>

                            <div class="row-fluid">
                                <div class="position-relative">
                                    <div id="login-box" class="login-box visible widget-box no-border">
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <h4 class="header blue lighter bigger">
                                                    <i class="icon-coffee green"></i>
                                                    Account Activations
                                                </h4>
                                                <div id="msg" class="alert">
                                                    <?php echo $result ?>
                                                </div>
                                                <div class="space-6"></div>




                                            </div><!--/widget-main-->


                                        </div><!--/widget-body-->
                                    </div><!--/login-box-->
                                </div><!--/position-relative-->
                            </div>
                        </div>
                    </div><!--/.span-->
                </div><!--/.row-fluid-->
            </div>
        </div><!--/.main-container-->

        <!--basic scripts-->

        <!--[if !IE]>-->

        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>

        <!--<![endif]-->

        <!--[if IE]>
        <script src="<?php echo base_url() ?>assets/jquery.min.js"></script>
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
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

        <!--page specific plugin scripts-->

        <!--ace scripts-->

        <script src="<?php echo base_url() ?>assets/js/ace-elements.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/ace.min.js"></script>

        <!--inline scripts related to this page-->


    </body>
</html>
