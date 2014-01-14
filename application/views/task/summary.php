<div class="main-content">
    <?php $this->load->view("layout/breadcrumb"); ?>
    <div class="page-content">
        <div class="page-header position-relative">
            <h1>Tasks Summary</h1>
        </div>
        
        
      
        <div class="row-fluid">
            <div class="span12  widget-container-span ui-sortable">
                <div class="widget-box"  style="opacity: 1;">
                    <div class="widget-header header-color-blue">
                        <h4 class="biger lighter"></h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <table id="project_tasks" class="table table-striped table-bordered table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>Task</th>
                                        <th>Project</th>
                                        <th>Member</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Start</th>
                                        <th>Due</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th>Task</th>
                                        <th>Project</th>
                                        <th>Member</th>
                                        <th>Priority</th>
                                        <th>Status</th>
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
        $("#project_tasks").dataTable({
            "bDestroy": true,
            "bProcessing": true,
            "aoColumnDefs": [
                
                { "sWidth": "25%", "aTargets": [ 0 ] },
                { "sWidth": "8%", "aTargets": [ 2 ] }
               
        
       
                ],
            "sAjaxSource": "<?php echo base_url() ?>task/get"

        });

       


     

    });
</script>
