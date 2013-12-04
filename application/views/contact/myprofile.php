<script>
    var sourceCompanies = [];
    $.each(<?php echo $companies ?>, function(k, v) {
        sourceCompanies.push({id: k, text: v});
    });

    $(function() {

        $.fn.editable.defaults.mode = 'inline';
        $.fn.editableform.loading = "<div class='editableform-loading'><i class='light-blue icon-2x icon-spinner icon-spin'></i></div>";
        $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="icon-ok icon-white"></i></button>' +
                '<button type="button" class="btn editable-cancel"><i class="icon-remove"></i></button>';



    });
</script>

<div class="main-content">
    <?php $this->load->view("layout/breadcrumb"); ?>
    <div class="page-content">
        <div class="page-header position-relative">
            <h1>
                My Profile

            </h1>
        </div><!--/.page-header-->

        <div class="row-fluid">
            <div>
                <div id="user-profile-1" class="user-profile row-fluid">
                    <div class="span3 center">
                        <div>
                            <span class="profile-picture">
                                <img id="avatar" class="editable" alt="<?php echo $profile[0]->firstName ?>'s Avatar" src="<?php echo base_url() ?>assets/avatars/<?php echo md5($profile[0]->contactid) ?>.jpg" />
                            </span>

                            <div class="space-4"></div>

                            <div class="width-80 label label-info label-large arrowed-in arrowed-in-right">
                                <div class="inline position-relative">
                                    <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-circle light-green middle"></i>
                                        &nbsp;
                                        <span class="white middle bigger-120"><?php echo $profile[0]->firstName . ' ' . $profile[0]->lastName ?></span>
                                    </a>

                                    <ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
                                        <li class="nav-header"> Change Status </li>

                                        <li>
                                            <a href="#">
                                                <i class="icon-circle green"></i>
                                                &nbsp;
                                                <span class="green">Available</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="icon-circle red"></i>
                                                &nbsp;
                                                <span class="red">Busy</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="icon-circle grey"></i>
                                                &nbsp;
                                                <span class="grey">Invisible</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="space-6"></div>

                        <div class="profile-contact-info">
                            <div class="profile-contact-links align-left">

                                <a class="btn btn-link" href="#">
                                    <i class="icon-envelope bigger-120 pink"></i>
                                    Send a message
                                </a>


                            </div>

                            <div class="space-6"></div>

                            <div class="profile-social-links center">
                                <a href="<?php echo $profile[0]->facebook ?>" class="tooltip-info" title="" data-original-title="Visit my Facebook">
                                    <i class="middle icon-facebook-sign icon-2x blue"></i>
                                </a>

                                <a href="<?php echo $profile[0]->twitter ?>" class="tooltip-info" title="" data-original-title="Visit my Twitter">
                                    <i class="middle icon-twitter-sign icon-2x light-blue"></i>
                                </a>

                                <a href="<?php echo $profile[0]->linkedin ?>" class="tooltip-error" title="" data-original-title="Visit my Pinterest">
                                    <i class="middle icon-linkedin-sign icon-2x blue"></i>
                                </a>
                            </div>
                        </div>

                        <div class="hr hr12 dotted"></div>

                        <div class="clearfix">
                            <div class="grid2">
                                <span class="bigger-175 blue">25</span>

                                <br />
                                Followers
                            </div>

                            <div class="grid2">
                                <span class="bigger-175 blue">12</span>

                                <br />
                                Following
                            </div>
                        </div>

                        <div class="hr hr16 dotted"></div>
                    </div>

                    <div class="span9">




                        <div class="profile-user-info profile-user-info-striped">
                            <?php
                            foreach ($profile[0] as $key => $value) {



                                if (in_array($key, array("contactid", "title", "email", "password", "allowLogin", "mainContact", "contactType", "companyid", "activated", "createDate")))
                                    continue;

                                $edit_type = array(
                                    "firstName" => "text",
                                    "lastName" => "text",
                                    "company" => "select2",
                                    "workPhone" => "text",
                                    "homePhone" => "text",
                                    "mobilePhone" => "text",
                                    "fax" => "text",
                                    "address1" => "text",
                                    "address2" => "text",
                                    "address3" => "text",
                                    "city" => "text",
                                    "state" => "text",
                                    "country" => "text",
                                    "twitter" => "text",
                                    "facebook" => "text",
                                    "linkedin" => "text");




                                $arr = preg_split('/(?=[A-Z])/', $key);

                                $arr = ucfirst(implode(" ", $arr));
                                ?>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?php echo $arr ?> </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="<?php echo $key ?>"><?php echo $value ?>&nbsp;</span>
                                    </div>
                                </div>

                                <script>
                                    $(function() {
                                        $('#<?php echo $key ?>').editable({
                                            type: '<?php echo $edit_type[$key] ?>',
                                            name: '<?php echo $key ?>'
    <?php echo ($key == 'company') ? ",source: sourceCompanies" : ""; ?>
                                            , success: function(response, newValue) {
                                                $.ajax({
                                                    url: '<?php echo base_url() ?>account/update/',
                                                    type: "POST",
                                                    data: {key: "<?php echo $key ?>", value: newValue},
                                                    success: function(d) {

                                                    }

                                                });
                                            }
                                        });
                                    })
                                </script>
                            <?php } ?>

                        </div>



                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


<script>
    $(function() {


        try {
            if (/msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()))
                Image.prototype.appendChild = function(el) {
                }
            var last_gritter;
            $('#avatar').editable({
                type: 'image',
                name: 'avatar',
                value: null,
                image: {
                    //specify ace file input plugin's options here
                    btn_choose: 'Change Avatar',
                    droppable: true,
                    /**
                     //this will override the default before_change that only accepts image files
                     before_change: function(files, dropped) {
                     return true;
                     },
                     */

                    //and a few extra ones here
                    name: 'avatar', //put the field name here as well, will be used inside the custom plugin
                    max_size: 110000, //~100Kb
                    on_error: function(code) {//on_error function will be called when the selected file has a problem
                        if (last_gritter)
                            $.gritter.remove(last_gritter);
                        if (code == 1) {//file format error
                            last_gritter = $.gritter.add({
                                title: 'File is not an image!',
                                text: 'Please choose a jpg|gif|png image!',
                                class_name: 'gritter-error gritter-center'
                            });
                        } else if (code == 2) {//file size rror
                            last_gritter = $.gritter.add({
                                title: 'File too big!',
                                text: 'Image size should not exceed 100Kb!',
                                class_name: 'gritter-error gritter-center'
                            });
                        }
                        else {//other error
                        }
                    },
                    on_success: function() {
                        $.gritter.removeAll();
                    }
                },
                url: function(params) {
                    // ***UPDATE AVATAR HERE*** //
                    //You can replace the contents of this function with examples/profile-avatar-update.js for actual upload


                    var deferred = new $.Deferred

                    //if value is empty, means no valid files were selected
                    //but it may still be submitted by the plugin, because "" (empty string) is different from previous non-empty value whatever it was
                    //so we return just here to prevent problems
                    var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
                    if (!value || value.length == 0) {

                        deferred.resolve();
                        return deferred.promise();
                    }


                    //dummy upload
                    setTimeout(function() {
                        if ("FileReader" in window) {
                            //for browsers that have a thumbnail of selected image
                            var thumb = $('#avatar').next().find('img').data('thumb');
                            if (thumb)
                                $('#avatar').get(0).src = thumb;
                        }

                        deferred.resolve({'status': 'OK'});

                        if (last_gritter)
                            $.gritter.remove(last_gritter);
                        last_gritter = $.gritter.add({
                            title: 'Avatar Updated!',
                            text: 'Uploading to server can be easily implemented. A working example is included with the template.',
                            class_name: 'gritter-info gritter-center'
                        });

                    }, parseInt(Math.random() * 800 + 800))

                    return deferred.promise();
                },
                success: function(response, newValue) {
                    $.ajax({
                        url: '<?php echo base_url() ?>account/test',
                        type: "POST",
                        data: {img_name: "aaa.jpg", image: $(this).attr('src')},
                        success: function(d) {


                        }
                    });

                }
            })
        } catch (e) {
        }
        ;


    });
</script>