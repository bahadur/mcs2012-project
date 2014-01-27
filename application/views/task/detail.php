
<div class="main-content">
    <?php $this->load->view("layout/breadcrumb"); ?>
    <div class="page-content">

        <div class="page-header position-relative">
            <h1>
                <?php echo $task_detail[0]->taskName ?>
                <small>
                    <i class="icon-double-angle-right"></i>
                    <?php echo $task_detail[0]->description ?>
                </small>
            </h1>
        </div><!--/.page-header-->



        <div class="row-fluid">
            <div class="span12">
                <div class="profile-user-info profile-user-info-striped">

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Status </div>

                        <div class="profile-info-value">
                            <span id="category"><?php echo $task_detail[0]->category ?></span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Date Start </div>

                        <div class="profile-info-value">
                            <span id="fstartdate"><?php echo $task_detail[0]->dateStart ?> </span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Due </div>

                        <div class="profile-info-value">
                            <span id="fduedate"><?php echo $task_detail[0]->dueDate ?></span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Priority </div>

                        <div class="profile-info-value">
                            <span id="priority"><?php echo $task_detail[0]->priority ?></span>
                        </div>
                    </div>





                    <div class="profile-info-row">
                        <div class="profile-info-name"> Action </div>

                        <div class="profile-info-value">
                            <span id="action"><button class="btn btn-info" id="btn-complete" >Complete</button></span>

                            <span id="action"><button class="btn" id="btn-message" >Message</button></span>

                        </div>
                    </div>

                </div>

                <div class="space-20"></div>
            </div>


            <!--PAGE CONTENT ENDS-->
        </div><!--/.span-->
    </div>



</div>


<script>

    $(function() {
        $("#btn-complete").click(function() {

            $.ajax({
                dataType: 'html',
                type: 'post',
                url: '<?php echo base_url('task/complete') ?>',
                data: {
                    "taskid" : <?php echo $task_detail[0]->taskid?>
                },
                
                success: function(responseData) {

                    if(responseData == 1)
                        alert("updated");
                    

                },
                error: function(responseData) {
                    bootbox.alert('Ajax request not recieved! ');
                }
            });
        });

    });

</script>