<div class="main-content">
    <?php $this->load->view("layout/breadcrumb"); ?>
    <div class="page-content">
        <div class="page-header position-relative">
            <h1>Project Summary</h1>
        </div>
        <div class="row-fluid">
            <div class="span12 center">
                <div class="row-fluid">
                    <div class="inforbox-container">
                        <a href="javascript:void(0)" class="btn-projects btn btn-app btn-success radius-4" id="allProjects">
                            <i class="icon-briefcase bigger-220"></i>
                            Projects
                            <span class="badge badge-yellow"><?php echo $projects_detail["total"] ?></span>
                        </a>
                        <a href="javascript:void(0)" class="btn-projects btn btn-app btn-danger radius-4"  id="overDues"> 
                            <i class="icon-briefcase bigger-220"></i>
                            Over Dues
                            <span class="badge badge-black"><?php echo $projects_detail["overdues"] ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hr  hr-dotted"></div>
        <div class="row-fluid">
            <div class="span12 center">
                <?php
                foreach ($projects_detail["prg_cat"] as $cat_val) {
                    switch ($cat_val->category) {
                        case "Running":
                            $icn_color = "success";
                            $icn = "icon-ok bigger-220";
                            break;
                        case "On Hold":
                            $icn_color = "warning";
                            $icn = "fa fa-question bigger-300";
                            break;
                        case "Completed":
                            $icn_color = "primary";
                            $icn = "fa fa-location-arrow bigger-200";
                            break;
                        case "Canceled":
                            $icn_color = "danger";
                            $icn = "icon-bolt bigger-220";
                            break;
                    }
                    ?>
                    <a href="javascript:void(0)" class="btn-catetories btn btn-app btn-<?php echo $icn_color ?> radius-4" id="<?php echo $cat_val->projectCategoryid ?>">
                        <i class="<?php echo $icn ?>"></i>
                        <?php echo $cat_val->category ?>
                        <span class="badge badge-pink"><?php echo $cat_val->cat_count ?></span>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12  widget-container-span ui-sortable">
                <div class="widget-box"  style="opacity: 1;">
                    <div class="widget-header header-color-blue">
                        <h4 class="biger lighter"></h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <table id="projects" class="table table-striped table-bordered table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Project Manager</th>
                                        <th class="hidden-phone">Members</th>
                                        <th class="hidden-phone">Priority</th>
                                        <th class="hidden-phone">Status</th>
                                        <th>Start</th>
                                        <th>Due</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Project Manager</th>
                                        <th class="hidden-phone">Members</th>
                                        <th class="hidden-phone">Priority</th>
                                        <th class="hidden-phone">Status</th>
                                        <th>Start</th>
                                        <th>Due</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#projects").dataTable({
            "bDestroy": true,
            "bProcessing": true,
            "aoColumnDefs": [
                {  "sClass": "hidden-phone", "aTargets": [ 2 ] },
                {  "sClass": "hidden-phone", "aTargets": [ 3 ] },
                {  "sClass": "hidden-phone", "aTargets": [ 4 ] },
                { "sWidth": "25%", "aTargets": [ 0 ] },
                { "sWidth": "8%", "aTargets": [ 2 ] }
               
        
       
                ],
            "sAjaxSource": "<?php echo base_url() ?>project/get/"

        });

        $(".btn-catetories").click(function(event) {
            event.preventDefault();
            $("#projects").dataTable({
                "bDestroy": true,
                "bProcessing": true,
                "sAjaxSource": "<?php echo base_url() ?>project/getByCat/" + $(this).attr("id")

            });

        });


        $(".btn-projects").click(function(event) {
            event.preventDefault();
            var prj = ($(this).attr('id') == "overDues") ? "<?php echo base_url() ?>project/getOverDues/" : "<?php echo base_url() ?>project/get/"

            $("#projects").dataTable({
                "bDestroy": true,
                "bProcessing": true,
                "sAjaxSource": prj

            });

        });

    });
</script>
