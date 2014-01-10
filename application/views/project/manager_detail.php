
<div class="main-content">
    <?php $this->load->view("layout/breadcrumb"); ?>
    <div class="page-content">
        <div class="page-header position-relative">
            <h1>
                Project Detail
               
            </h1>
        </div>
        <div class="row-fluid">
            <div class="span12" id="submit_result" style="display: none;"> 
                <div class="alert alert-block alert-success">
                    <p >
                        <strong>
                            <i class="icon-ok"></i>
                            Done!
                        </strong>
                        Project update successfully.
                    </p>
                    <p>
                        <button class="btn btn-small">Go to main page</button>
                    </p>
                </div>
            </div>
            <form class="form-horizontal" id="validation-form">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-header widget-header-blue widget-header-flat">
                            <h4 class="lighter">Project Information</h4>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main">

                                <div class="control-group info">
                                    <label class="control-label" for="clientaccess">Client Access</label>
                                    <div class="controls">
                                        <div class="row-fluid">
                                            <input  disabled="" name="clientaccess" class="ace-switch ace-switch-2" type="checkbox" />
                                            <span class="lbl"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="name">Title</label>
                                    <div class="controls">
                                        <div class="span12">
                                            <input disabled=""  type="text" id="name" name="name" value="<?php echo $projects_detail[0]->name ?>" placeholder="Project Title" class="span6" />
                                            <input type="hidden" name="projectid" value="<?php echo $projects_detail[0]->projectid?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="categoryid">Category</label>
                                    <div class="controls">
                                        <div class="btn-group">
                                            <div class="span12">
                                                <?php echo form_dropdown('categoryid', $categories, $projects_detail[0]->categoryid, "class='span12'  disabled=''") ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="control-group info">
                                    <label class="control-label" for="dateStart">Start Date</label>
                                    <div class="controls">
                                        
                                            <div class="row-fluid input-append">
                                                <input class="span6 date-picker"  disabled="" name="dateStart" value="<?php echo $projects_detail[0]->fstartdate ?>" id="dateStart" type="text" data-date-format="yyyy-mm-dd" />
                                                <span class="add-on">
                                                    <i class="icon-calendar"></i>
                                                </span>
                                            </div>
                                        
                                    </div>
                                </div>

                                <div class="control-group info">
                                    
                                    <div class="controls input-append bootstrap-timepicker">
                                        <input id="dateStart_time" name="dateStart_time"  disabled=""  value="<?php echo $projects_detail[0]->fstarttime ?>" type="text" class="span6" />
                                        <span class="add-on">
                                            <i class="icon-time"></i>
                                        </span>
                                    </div>
                                </div>


                                <div class="control-group info">
                                    <label class="control-label" for="dueDate">Due Date</label>
                                    <div class="controls">
                                        
                                            <div class="row-fluid input-append">
                                                <input class="span6 date-picker" name="dueDate"  disabled="" id="dueDate" value="<?php echo $projects_detail[0]->fduedate ?>" type="text" data-date-format="yyyy-mm-dd" />
                                                <span class="add-on">
                                                    <i class="icon-calendar"></i>
                                                </span>
                                            </div>
                                        
                                    </div>
                                </div>
                                <div class="control-group info">
                                    <div class="controls input-append bootstrap-timepicker">
                                        <input id="dueDate_time" name="dueDate_time" type="text"  disabled="" value="<?php echo $projects_detail[0]->fduetime ?>" class="span6"  />
                                        <span class="add-on">
                                            <i class="icon-time"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="priority">Priority</label>
                                    <div class="controls">
                                        <div class="btn-group">
                                            <div class="span12">
                                                <?php echo form_dropdown('priority', $priorities, $projects_detail[0]->priority, "class='span12'  disabled=''") ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="description">description</label>
                                    <div class="controls">
                                        <div class="span12">
                                            <textarea class="span6 autosize-transition span6"  disabled="" name="description" id="description" placeholder="Default Text"><?php echo $projects_detail[0]->description?></textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        
                    </div>

                </div>
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-header widget-header-blue widget-header-flat">
                            <h4 class="lighter">The Team</h4>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main">
                                
                                <div class="control-group info">
                                    <label class="control-label" for="managerid">Manager</label>
                                    <div class="controls">
                                        <div class="btn-group">
                                            <div class="btn-group">
                                                <?php echo form_dropdown('managerid', $managers, $projects_detail[0]->managerid, "class='span12'  disabled=''") ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="control-group info">
                                    <label class="control-label" for="team">Team Members</label>
                                    <div class="controls"><?php if (!empty($teamMembers)) { ?>
                                        <div class="btn-group">
                                            <div class="btn-group">
                                                <?php echo form_dropdown('teamMemberid', $teamMembers, $teamMemberid, "class='chzn-select' id='teamMembers'  disabled=''") ?>
                                                <input type="hidden" name="teamMembers_hidden" id="teamMembers_hidden" />
                                            </div>
                                        </div><?php } else { echo "All Team memebers are buzy"; } ?>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                   
                </div>
                
            </form>

        </div>
    </div>
</div>
<script>
    $(function() {
        
        
        
        $("#teamMembers").chosen(); 
    });
</script>