
<div class="main-content">
    <?php $this->load->view("layout/breadcrumb"); ?>
    <div class="page-content">

        <div class="page-header position-relative">
            <h1>
                <?php echo $projects_detail[0]->name ?>
                <small>
                    <i class="icon-double-angle-right"></i>
                    3 styles with inline editable feature
                </small>
            </h1>
        </div><!--/.page-header-->
        
        <div class="well well-small"> <?php echo $projects_detail[0]->description ?> </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="profile-user-info profile-user-info-striped">

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Status </div>

                        <div class="profile-info-value">
                            <span id="category"><?php echo $projects_detail[0]->category?></span>
                        </div>
                    </div>
                    
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Date Start </div>

                        <div class="profile-info-value">
                            <span id="fstartdate"><?php echo $projects_detail[0]->fstartdate ?> <?php echo $projects_detail[0]->fstarttime ?></span>
                        </div>
                    </div>
                    
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Due </div>

                        <div class="profile-info-value">
                            <span id="fduedate"><?php echo $projects_detail[0]->fduedate ?> <?php echo $projects_detail[0]->fduetime ?></span>
                        </div>
                    </div>
                    
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Priority </div>

                        <div class="profile-info-value">
                            <span id="priority"><?php echo $projects_detail[0]->priority ?></span>
                        </div>
                    </div>
                    
                </div>
                <div class="space-20"></div>
            </div>
            <div class="span6">
                <table id="tasks" class="table table-striped table-bordered table-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Memeber</th>
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
<script>
    $(function() {
        $("#tasks").dataTable({
            "bProcessing": true,
            "sAjaxSource": "<?php echo base_url() ?>task/tasks",
        });


        $("#teamMembers").chosen();
    });
</script>