<?php
$base_path = substr($_SERVER['SCRIPT_FILENAME'], 0, strlen($_SERVER['SCRIPT_FILENAME']) - 9);
if (!get_file_info($base_path . "assets/avatars/" . md5($profile[0]->contactid)) . ".jpg")
    $avatar = "profile-pic.jpg";
else
    $avatar = md5($profile[0]->contactid) . '.jpg';
?>

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
                                <img id="avatar" class="editable" alt="<?php echo $profile[0]->firstName ?>'s Avatar" src="<?php echo base_url() ?>assets/avatars/<?php echo $avatar ?>" />
                            </span>

                            <div class="space-4"></div>

                            <div class="width-80 label label-info label-large arrowed-in arrowed-in-right">
                                <div class="inline position-relative">
                                    <a href="#" class="user-title-label" >
                                        <i class="icon-circle light-green middle"></i>
                                        &nbsp;
                                        <span class="white middle bigger-120"><?php echo $profile[0]->firstName . ' ' . $profile[0]->lastName ?></span>
                                    </a>


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


                            <?php } ?>

                        </div>



                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


