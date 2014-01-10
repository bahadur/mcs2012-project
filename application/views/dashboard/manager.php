<div class="main-content">
    <?php $this->load->view("layout/breadcrumb"); ?>

    <div class="page-content">
        <div class="page-header position-relative">
            <h1>
                Dashboard
                <small>
                    <i class="icon-double-angle-right"></i>
                    overview &amp; stats
                </small>
            </h1>
        </div><!--/.page-header-->

        <div class="row-fluid">
            <div class="span12">
                <!--PAGE CONTENT BEGINS-->
                <div class="left">
                    <span id="project_btn"  class="btn btn-app btn-medium btn-light no-hover">
                        <span class="bigger-150 blue"> <?php echo $projects_detail["total"] ?> </span>

                        <br />
                        <span class="smaller-90">  Projects </span>
                    </span>

                    <span id="task_btn" class="btn btn-app btn-medium btn-yellow no-hover">
                        <span class="bigger-175"> 32 </span>

                        <br />
                        <span class="smaller-90"> My Tasks </span>
                    </span>

                    <span id="member_btn" class="btn btn-app btn-medium btn-pink no-hover">
                        <span class="bigger-175"> 4 </span>

                        <br />
                        <span class="smaller-90"> My Members </span>
                    </span>






                </div>




                <!--PAGE CONTENT ENDS-->
            </div><!--/.span-->

            <div class="row-fluid">
                <div class="span6">
                    <h3 class="header smaller lighter blue">Projects in Action</h3>
                    <div class="table-header">
                        Results for "Projects"
                    </div>
                    <table id="project_details" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>

                                <th>Project Name</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>

                <div class="span6">
                    <h3 class="header smaller lighter blue">Tasks</h3>
                    <div class="table-header">
                        Results for "Tasks"
                    </div>
                    <table id="task_details" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Project Name</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th>Task</th>
                                <th>Project Name</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>



            </div>

        </div><!--/.row-fluid-->
    </div><!--/.page-content-->


</div><!--/.main-content-->
<script>
    $(function() {

        $("#project_btn").on("click", function() {
            
            $("#project_details thead").html('<tr><th>Project Name</th><th>Start Date</th><th>Due Date</th></tr>');
            $("#project_details tfoot").html('<tr><th>Project Name</th><th>Start Date</th><th>Due Date</th></tr>');
            $("#project_details").dataTable({
                "bProcessing": true,
                "bDestroy": true,
                "sAjaxSource": "<?php echo base_url() ?>account/projects",
            });
        });
        
        
        $("#project_btn").on("click", function() {
            
            $("#project_details thead").html('<tr><th>Project Name</th><th>Start Date</th><th>Due Date</th></tr>');
            $("#project_details tfoot").html('<tr><th>Project Name</th><th>Start Date</th><th>Due Date</th></tr>');
            $("#project_details").dataTable({
                "bProcessing": true,
                "bDestroy": true,
                "sAjaxSource": "<?php echo base_url() ?>account/projects",
            });
        });
        
       

        $("a.prj_id").click(function() {
           alert("clicked");
        });

        $("#member_btn").on("click", function() {

            $("#project_details").dataTable({
                "bProcessing": true,
                "bRetrieve": true,
                "bDestroy": true,
                "sAjaxSource": "<?php echo base_url() ?>account/members",
            });
        });

        $("#project_details").dataTable({
        
            "bProcessing": true,
            "sAjaxSource": "<?php echo base_url() ?>account/projects",
        });

        $("#task_details").dataTable({
            "bProcessing": true,
            "sAjaxSource": "<?php echo base_url() ?>account/tasks",
        });

        $("#member_details").dataTable({
            "bProcessing": true,
            "sAjaxSource": "<?php echo base_url() ?>account/members",
        });


        

    });
</script>


