<div class="main-content">
    <?php $this->load->view("layout/breadcrumb"); ?>
    <div class="page-content">
        <div class="page-header position-relative">
            <h1>
                Project Summary

            </h1>
        </div>
        <div class="row-fluid">
            <div class="span10 center">
                <div class="row-fluid">

                    <div class="inforbox-container">
                        <div class="infobox infobox-green">
                            <div class="infobox-progress">
                                
                            </div>
                            <div class="infobox-data">
                                <span class="infobox-data-number">
                                    3
                                </span>
                                <div class="infobox-content">Projects</div>
                            </div>
                        </div>

                        <div class="infobox infobox-red">
                            <div class="infobox-data">
                                <span class="infobox-data-number">
                                    0
                                </span>
                                <div class="infobox-content">Over Dues</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hr  hr-dotted"></div>
        <div class="row-fluid">
            <div class="span10 center">
                <div class="infobox infobox-red">
                            <div class="infobox-data">
                                <span class="infobox-data-number">
                                    0
                                </span>
                                <div class="infobox-content">Current</div>
                            </div>
                        </div>
                <div class="infobox infobox-red">
                            <div class="infobox-data">
                                <span class="infobox-data-number">
                                    0
                                </span>
                                <div class="infobox-content">On Hold</div>
                            </div>
                        </div>
                <div class="infobox infobox-red">
                            <div class="infobox-data">
                                <span class="infobox-data-number">
                                    0
                                </span>
                                <div class="infobox-content">With Client</div>
                            </div>
                        </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12  widget-container-span ui-sortable">
                <?php foreach ($project_categories as $key => $value) { ?>
                    <div class="widget-box"  style="opacity: 1;">
                        <div class="widget-header header-color-blue">
                            <h4 class="biger lighter"><?php echo $value ?></h4>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main">


                                <table id="projects_<?php echo $key ?>" class="table table-striped table-bordered table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Project Manager</th>
                                            <th>Priority</th>
                                            <th>Start</th>
                                            <th>Due</th>


                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Project Manager</th>
                                            <th>Priority</th>
                                            <th>Start</th>
                                            <th>Due</th>

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                    <script>
                        $(function() {
                            $("#projects_<?php echo $key ?>").dataTable({
                                "bProcessing": true,
                                "sAjaxSource": "<?php echo base_url() ?>project/get/<?php echo $key ?>"

                                        });

                                    });

                    </script>
                <?php } ?>
            </div>




        </div>
    </div>
</div>
<script>
 
</script>

