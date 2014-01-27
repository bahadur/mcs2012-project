
<div class="main-content">
    <?php $this->load->view("layout/breadcrumb"); ?>
    <div class="page-content">
        <div class="page-header position-relative">
            <h1>
                Project Detail
               
            </h1>
        </div>
        <div class="row-fluid">
            
                <div class="alert alert-block alert-success"  style="display: none;">
                    <a class="close" data-dismiss="alert"><i class="icon-remove"></i></a>
                    <p>
                        <strong>
                            <i class="icon-ok"></i>
                            Done!
                        </strong>
                        <div id="msg" >&nbsp;</div>
                    </p>
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
                                            <input name="clientaccess" class="ace-switch ace-switch-2" type="checkbox" />
                                            <span class="lbl"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="name">Title</label>
                                    <div class="controls">
                                        <div class="span12">
                                            <input type="text" id="name" name="name" value="<?php echo $projects_detail[0]->name ?>" placeholder="Project Title" class="span6" />
                                            <input type="hidden" name="projectid" value="<?php echo $projects_detail[0]->projectid?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="categoryid">Category</label>
                                    <div class="controls">
                                        <div class="btn-group">
                                            <div class="span12">
                                                <?php echo form_dropdown('categoryid', $categories, $projects_detail[0]->categoryid, "class='span12'") ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="control-group info">
                                    <label class="control-label" for="dateStart">Start Date</label>
                                    <div class="controls">
                                        
                                            <div class="row-fluid input-append">
                                                <input class="span6 date-picker" name="dateStart" value="<?php echo $projects_detail[0]->fstartdate ?>" id="dateStart" type="text" data-date-format="yyyy-mm-dd" />
                                                <span class="add-on">
                                                    <i class="icon-calendar"></i>
                                                </span>
                                            </div>
                                        
                                    </div>
                                </div>

                                <div class="control-group info">
                                    
                                    <div class="controls input-append bootstrap-timepicker">
                                        <input id="dateStart_time" name="dateStart_time"  value="<?php echo $projects_detail[0]->fstarttime ?>" type="text" class="span6" />
                                        <span class="add-on">
                                            <i class="icon-time"></i>
                                        </span>
                                    </div>
                                </div>


                                <div class="control-group info">
                                    <label class="control-label" for="dueDate">Due Date</label>
                                    <div class="controls">
                                        
                                            <div class="row-fluid input-append">
                                                <input class="span6 date-picker" name="dueDate" id="dueDate" value="<?php echo $projects_detail[0]->fduedate ?>" type="text" data-date-format="yyyy-mm-dd" />
                                                <span class="add-on">
                                                    <i class="icon-calendar"></i>
                                                </span>
                                            </div>
                                        
                                    </div>
                                </div>
                                <div class="control-group info">
                                    <div class="controls input-append bootstrap-timepicker">
                                        <input id="dueDate_time" name="dueDate_time" type="text" value="<?php echo $projects_detail[0]->fduetime ?>" class="span6"  />
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
                                                <?php echo form_dropdown('priority', $priorities, $projects_detail[0]->priority, "class='span12'") ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="description">description</label>
                                    <div class="controls">
                                        <div class="span12">
                                            <textarea class="span6 autosize-transition span6" name="description" id="description" placeholder="Default Text"><?php echo $projects_detail[0]->description?></textarea>
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
                                                <?php echo form_dropdown('managerid', $managers, $projects_detail[0]->managerid, "class='span12'") ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="control-group info">
                                    <label class="control-label" for="team">Team Members</label>
                                    <div class="controls"><?php if (!empty($teamMembers)) { ?>
                                        <div class="btn-group">
                                            <div class="btn-group">
                                                <?php echo form_dropdown('teamMemberid', $teamMembers, $teamMemberid, "class='chzn-select' id='teamMembers' data-placeholder='Choose a Team Members...'") ?>
                                                <input type="hidden" name="selectMembers_hidden" id="selectMembers_hidden" />
                                                <input type="hidden" name="deselectMembers_hidden" id="deselectMembers_hidden" />
                                                
                                            </div>
                                        </div><?php } else { echo "All Team memebers are buzy"; } ?>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                            <div class="span12">
                                <button class="span4 btn btn-info" id="btn-submit" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    Update
                                </button>


                                &nbsp; &nbsp; &nbsp;
                                <button class="span4 btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    Reset
                                </button>
                            </div>
                        </div>
                </div>
                
            </form>

        </div>
    </div>
</div>
<script>
    $(function() {
         var sel = new Array();
                var desel =  new Array();
        $('.date-picker').datepicker().next().on(ace.click_event, function() {
            $(this).prev().focus();
        });
        $('#validation-form').validate({
            rules: {
                dateStart: {
                    required: true

                },
                dueDate: {
                    required: true

                }
            },
            messages: {
                dateStart: {
                    required: "Please provide Prject Start Date."

                },
                dueDate: {
                    required: "Please provide Prject Due Date."

                }
            },
            highlight: function(e) {
                $(e).closest('.control-group').removeClass('info').addClass('error');
            },
            success: function(e) {
                $(e).closest('.control-group').removeClass('error').addClass('info');
                $(e).remove();
            },
            errorPlacement: function(error, element) {
                if (element.is(':checkbox') || element.is(':radio')) {
                    var controls = element.closest('.controls');
                    if (controls.find(':checkbox,:radio').length > 1)
                        controls.append(error);
                    else
                        error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
                }
                else if (element.is('.select2')) {
                    error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
                }
                else if (element.is('.chzn-select')) {
                    error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
                }
                else if(element.is('.date-picker')){
                    error.insertAfter(element.siblings('[class*="add-on"]:eq(0)'));
                }
                else
                    error.insertAfter(element);
            },
            submitHandler: function(form) {

                bootbox.confirm("<h3>Values changes will be update permenantly. click ok to confirm.</h3>", function(result) {
                    if (result) {
//                        var items = [];
//                        $("#teamMembers option:selected").map(function(){ items.push($(this).val()); }).get().join(", ");
//                        var rs = items.join(', ');
                        //$('#selectMembers_hidden').val(rs);
                        $.ajax({
                            dataType: 'html',
                            type: 'post',
                            url: '<?php echo base_url('project/update') ?>',
                            data: $(form).serialize(),
                            success: function(responseData) {
                                
                                $("#validation-form").hide();
                                $(".alert div#msg").text("Data successfully update.");
                               
                                
                                    if (responseData == 2) {
                                        $(".alert").removeClass("alert-success");
                                        $(".alert").addClass("alert-warning");
                                        $(".alert div#msg").text("Data successfully update. But member(s) that you select has/have task in running stage");
                                    
                                    } 
                                    $(".alert").fadeIn(800);
//                                else {
//                                    bootbox.alert("Could not update record");
//                                }
                                
                            },
                            error: function(responseData) {
                                bootbox.alert('Ajax request not recieved! ');
                            }
                        });
                    }
                });
            },
            invalidHandler: function(form) {
                
                
                bootbox.alert("<h3>Validation Error.</h3><br>Please complete the fields in red.");
            }
        });
        $('#dueDate_time').timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false
        });
        $('#dateStart_time').timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false
        });
        $("#teamMembers").chosen({
        
            width: "95%",
            
            
            
            
            
        }).on('change', function(evt, params) {
//               console.log("Selected:    ");
//                console.log(params.selected);
//                console.log("  Deselected    ");
//                console.log(params.deselected);

                 if(params.selected!=null)
                    {
                        if($.inArray(params.selected,sel) < 0){
                            if($.inArray(params.selected,desel) >= 0){
                                
                                desel.splice(desel.indexOf(params.selected), 1);
                                $('#deselectMembers_hidden').val(desel.join(', '));
                            }
                            sel.push(params.selected);
                            $('#selectMembers_hidden').val(sel.join(', '));
                            
                        }
                    }
                if(params.deselected!=null)
                    {
                        
                        if($.inArray(params.deselected,desel) < 0){
                            if($.inArray(params.deselected,sel) >= 0){
                                sel.splice(sel.indexOf(params.deselected), 1);
                                 $('#selectMembers_hidden').val(sel.join(', '));
                                
                            }
                            desel.push(params.deselected);
                            $('#deselectMembers_hidden').val(desel.join(', '));
                        }
                    }
                
                
    
                
                
            
          }); 
        
    });
</script>