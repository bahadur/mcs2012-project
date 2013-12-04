<div class="main-content">
    <?php $this->load->view("layout/breadcrumb"); ?>
    <div class="page-content">
        <div class="page-header position-relative">
            <h1>
                Create Project
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
                        Project created successfully.
                    </p>
                    <p>
                        <button class="btn btn-small">Go to main page</button>
                    </p>
                </div>
            </div>
            <form class="form-horizontal" id="validation-form">
                <div class="span12">
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
                                            <input type="text" id="name" name="name" placeholder="Project Title" class="span6" />
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="categoryid">Category</label>
                                    <div class="controls">
                                        <div class="btn-group">
                                            <div class="span12">
                                                <?php echo form_dropdown('categoryid', $categories, '', "class='span12'") ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="managerid">Manager</label>
                                    <div class="controls">
                                        <div class="btn-group">
                                            <div class="btn-group">
                                                <?php echo form_dropdown('managerid', $managers, '', "class='span12'") ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="dateStart">Start Date</label>
                                    <div class="controls">
                                        
                                            <div class="row-fluid input-append">
                                                <input class="span2 date-picker" name="dateStart" id="dateStart" type="text" data-date-format="yyyy-mm-dd" />
                                                <span class="add-on">
                                                    <i class="icon-calendar"></i>
                                                </span>
                                            </div>
                                        
                                    </div>
                                </div>

                                <div class="control-group info">
                                    
                                    <div class="controls input-append bootstrap-timepicker">
                                        <input id="dateStart_time" name="dateStart_time" type="text" class="span6" />
                                        <span class="add-on">
                                            <i class="icon-time"></i>
                                        </span>
                                    </div>
                                </div>


                                <div class="control-group info">
                                    <label class="control-label" for="dueDate">Due Date</label>
                                    <div class="controls">
                                        
                                            <div class="row-fluid input-append">
                                                <input class="span2 date-picker" name="dueDate" id="dueDate" type="text" data-date-format="yyyy-mm-dd" />
                                                <span class="add-on">
                                                    <i class="icon-calendar"></i>
                                                </span>
                                            </div>
                                        
                                    </div>
                                </div>
                                <div class="control-group info">
                                    <div class="controls input-append bootstrap-timepicker">
                                        <input id="dueDate_time" name="dueDate_time" type="text" class="span6"  />
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
                                                <?php echo form_dropdown('priority', $priorities, '', "class='span12'") ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="description">description</label>
                                    <div class="controls">
                                        <div class="span12">
                                            <textarea class="span6 autosize-transition span6" name="description" id="description" placeholder="Default Text"></textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span12">
                                <button class="span4 btn btn-info" id="btn-submit" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    Submit
                                </button>


                                &nbsp; &nbsp; &nbsp;
                                <button class="span4 btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    Reset
                                </button>
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

                bootbox.confirm("<h3>Please confirm the inputs.</h3>", function(result) {
                    if (result) {
                        $.ajax({
                            dataType: 'html',
                            type: 'post',
                            url: '<?php echo base_url('project/add_new') ?>',
                            data: $(form).serialize(),
                            success: function(responseData) {
                                if (responseData == 1) {
                                    $("#validation-form").hide();
                                    $("#submit_result").attr("style", "display:block");
                                }
                                else {
                                    bootbox.alert("Coun'nt create account");
                                }
                            },
                            error: function(responseData) {
                                bootbox.alert('Ajax request not recieved!');
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
    });
</script>