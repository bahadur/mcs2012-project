<div class="main-content">
    <?php $this->load->view("layout/breadcrumb"); ?>
    <div class="page-content">
        <div class="page-header position-relative">
            <h1>
                Create New Account

            </h1>
        </div><!--/.page-header-->


        <div class="row-fluid">
            <div class="span12" id="submit_result" style="display: none;"> 
                <div class="alert alert-block alert-success">
                    <p >
                        <strong>
                            <i class="icon-ok"></i>
                            Done!
                        </strong>
                        New Account created successfully.
                    </p>
                    <p>
                        <button class="btn btn-small">Go to main page</button>
                    </p>
                </div>
            </div>
            <form class="form-horizontal" id="validation-form" >
                <div class="span6">         
                    <div class="widget-box">
                        <div class="widget-header widget-header-blue widget-header-flat">
                            <h4 class="lighter">User Basic Information</h4>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main">

                                <div class="control-group info">
                                    <label class="control-label" for="title">Title</label>
                                    <div class="controls">
                                        <div class="span12">

                                            <select  class="span10" id="title" name="title">
                                                <option value="Mr" selected="selected">Mr.</option>
                                                <option value="Miss">Miss.</option>
                                                <option value="Mrs">Mrs.</option>

                                            </select>	
                                        </div>
                                    </div>



                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="firstName">First Name</label>
                                    <div class="controls">
                                        <div class="span12">
                                            <input type="text" class="span10"  id="firstName" name="firstName" placeholder="First Name" />
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="lastName">Last Name</label>
                                    <div class="controls">
                                        <div class="span12">
                                            <input type="text" class="span10" id="lastName" name="lastName" placeholder="Last Name" />
                                        </div>
                                    </div>
                                </div>


                                <div class="hr hr-dotted"></div>
                                <div class="control-group info">
                                    <label class="control-label" for="workPhone">Contact no
                                        <small class="text-warning">(999) 999-9999</small>
                                    </label>
                                    <div class="controls">
                                        <div class="span12">
                                            <div class="input-prepend">
                                                <span class="add-on">
                                                    <i class="icon-phone"></i>
                                                </span>

                                                <input type="text" class="span10 input-medium input-mask-phone" id="workPhone" name="workPhone" placeholder="Work Phone" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group info">
                                    <div class="controls">
                                        <div class="span12">
                                            <div class="input-prepend">
                                                <span class="add-on">
                                                    <i class="fa fa-home"></i>
                                                </span><input type="text" class="span10 input-medium input-mask-phone"  id="homePhone" name="homePhone" placeholder="Home Phone" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group info">
                                    <div class="controls">
                                        <div class="span12">
                                            <div class="input-prepend">
                                                <span class="add-on">
                                                    <i class="fa fa-mobile"></i>
                                                </span><input type="text" class="span10 input-medium input-mask-phone"  id="mobilePhone" name="mobilePhone" placeholder="mobilePhone" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group info">
                                    <div class="controls">
                                        <div class="span12">
                                            <div class="input-prepend">
                                                <span class="add-on">
                                                    <i class="fa fa-file-text-o"></i>
                                                </span><input type="text" class="span10 input-medium input-mask-phone"  id="fax" name="fax" placeholder="Fax" />
                                            </div>
                                        </div>
                                    </div>
                                </div>






                                <div class="hr hr-dotted"></div>

                                <div class="control-group info">
                                    <label class="control-label" for="address1">Address</label>
                                    <div class="controls">
                                        <div class="span12">
                                            <input type="text" class="span10" id="address1" name="address1" placeholder="address1" />
                                        </div>
                                    </div>
                                </div>        

                                <div class="control-group info">
                                    <div class="controls">
                                        <div class="span12">
                                            <input type="text" class="span10"  id="address2" name="address2" placeholder="address2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group info">
                                    <div class="controls">
                                        <div class="span12">
                                            <input type="text" class="span10"  id="address3" name="address3" placeholder="address3" />
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group info">
                                    <div class="controls">
                                        <div class="span12">
                                            <input type="text" class="span10"  id="city" name="city" placeholder="city" />
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group info">
                                    <div class="controls">
                                        <div class="span12">
                                            <input type="text" class="span10"  id="state" name="state" placeholder="state" />
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group info">
                                    <div class="controls">
                                        <div class="span12">
                                            <input type="text" class="span10"  id="country" name="country" placeholder="country" />
                                        </div>
                                    </div>
                                </div>






                                <div class="hr hr-dotted"></div>








                                <div class="control-group info">
                                    <label class="control-label" for="twitter">Social URL</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on">
                                                <i class="fa fa-twitter"></i>
                                            </span><input type="text" id="twitter" name="twitter" placeholder="twitter" />
                                        </div>
                                    </div>
                                </div> 
                                <div class="control-group info">
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on">
                                                <i class="fa fa-facebook"></i>
                                            </span><input type="text" id="facebook" name="facebook"  placeholder="facebook" />
                                        </div>
                                    </div>
                                </div> 
                                <div class="control-group info">
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on">
                                                <i class="fa fa-linkedin"></i>
                                            </span><input type="text" id="linkedin" name="linkedin"  placeholder="linkedin" />
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
                            <h4 class="lighter">User Account Information</h4>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main">

                                <div class="control-group info">
                                    <label class="control-label" for="contactType">Account Type</label>
                                    <div class="controls">
                                        <div class="span12">
                                            <select class="span10" id="contactType" name="contactType">
                                                <option value="1">Administrator :</option>
                                                <option value="2" selected="selected">Project Manager</option>
                                                <option value="3">Team Member</option>
                                                <option value="4">Client</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="companyid">Company</label>
                                    <div class="controls">
                                        <div class="span12">
                                            <?php echo form_dropdown('companyid', $companies, '', "class='span10'"); ?>
                                        </div>



                                    </div>
                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="mainContact">Main Contact</label>
                                    <div class="controls">
                                        <label>
                                            <input id="mainContact" name="mainContact" class="ace-switch ace-switch-2" type="checkbox" />
                                            <span class="lbl"></span>
                                        </label>
                                    </div>
                                </div>


                                <div class="control-group info">
                                    <label class="control-label" for="allowLogin">Allow Login</label>
                                    <div class="controls">
                                        <label>
                                            <input id="allowLogin" name="allowLogin" class="ace-switch ace-switch-2" type="checkbox" />
                                            <span class="lbl"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="hr hr-dotted"></div>
                                <div class="control-group info">
                                    <label class="control-label" for="email">Email</label>
                                    <div class="controls">
                                        <div class="span12">
                                            <div class="input-prepend span12">
                                                <span class="add-on">
                                                    <i class="fa fa-user"></i>
                                                </span><input type="text" id="email" name="email" placeholder="Email Address" class="span10" />
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="password">Password</label>
                                    <div class="controls">
                                        <div class="span12">
                                            <input type="password" id="password" name="password" placeholder="Password" class="span10" />
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group info">
                                    <label class="control-label" for="password2">Re-Password</label>
                                    <div class="controls">
                                        <div class="span12">
                                            <input type="password" id="password2" name="password2" placeholder="Re-Password" class="span10" />
                                        </div>
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

            </form>


        </div>
    </div>

</div>
<script lang="javascript">
    $(function() {

        $.mask.definitions['~'] = '[+-]';

        $('.input-mask-phone').mask('(999) 999-9999');







        jQuery.validator.addMethod("mobilePhone", function(value, element) {
            return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
        }, "Enter a valid phone number.");
        $('#validation-form').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                password2: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                firstName: {
                    required: true
                },
                mobilePhone: {
                    required: true,
                    mobilePhone: 'required'
                },
                address1: {
                    required: true

                },
                city: {
                    required: true
                },
                country: {
                    required: true
                },
                contactType: {
                    required: false
                },
                companyid: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Please provide a valid email.",
                    email: "Please provide a valid email."
                },
                password: {
                    required: "Please specify a password.",
                    minlength: "Please specify a secure password."
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
                else
                    error.insertAfter(element);
            },
            submitHandler: function(form) {
                bootbox.confirm("<h3>Please confirm the inputs.</h3>", function(result) {
                    if (result) {

                        $.ajax({
                            dataType: 'html',
                            type: 'post',
                            url: '<?php echo base_url('account/add_new') ?>',
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
    });
</script>