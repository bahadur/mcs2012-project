<div class="main-content">
<?php $this->load->view("layout/breadcrumb"); ?>

    <div class="page-content">
        <div class="row-fluid">
            <div class="span12">
                <!--PAGE CONTENT BEGINS-->

                <div class="error-container">
                    <div class="well">
                        <h1 class="grey lighter smaller">
                            <span class="blue bigger-125">
                                <i class="icon-sitemap"></i>
                                404
                            </span>
                            Page Not Found
                        </h1>

                        <hr />
                        <h3 class="lighter smaller">We looked everywhere but we couldn't find it!</h3>

                        <div>
                            <form class="form-search" />
                            <span class="input-icon">
                                <i class="icon-search"></i>

                                <input type="text" class="input-medium search-query" placeholder="Give it a search..." />
                            </span>
                            <button class="btn btn-small" onclick="return false;">Go!</button>
                            </form>

                            <div class="space"></div>
                            <h4 class="smaller">Try one of the following:</h4>

                            <ul class="unstyled spaced inline bigger-110">
                                <li>
                                    <i class="icon-hand-right blue"></i>
                                    Re-check the url for typos
                                </li>

                                <li>
                                    <i class="icon-hand-right blue"></i>
                                    Read the faq
                                </li>

                                <li>
                                    <i class="icon-hand-right blue"></i>
                                    Tell us about it
                                </li>
                            </ul>
                        </div>

                        <hr />
                        <div class="space"></div>

                        <div class="row-fluid">
                            <div class="center">
                                <a href="#" class="btn btn-grey">
                                    <i class="icon-arrow-left"></i>
                                    Go Back
                                </a>

                                <a href="#" class="btn btn-primary">
                                    <i class="icon-dashboard"></i>
                                    Dashboard
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!--PAGE CONTENT ENDS-->
            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div><!--/.page-content-->

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
</div><!--/.main-content-->