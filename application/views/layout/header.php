<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a href="#" class="brand">
                <small>
                    <i class="icon-building"></i>
                    SAB Multi Project
                </small>
            </a><!--/.brand-->
            <?php
            echo notification_all()
            ?>
            <ul class="nav ace-nav pull-right">
                <li class="grey">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-tasks"></i>
                        <span class="badge badge-grey">4</span>
                    </a>

                    <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
                        <li class="nav-header">
                            <i class="icon-ok"></i>
                            Project tasks
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">Software Update</span>
                                    <span class="pull-right">90%</span>
                                </div>

                                <div class="progress progress-mini ">
                                    <div style="width:90%" class="bar"></div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">Hardware Upgrade</span>
                                    <span class="pull-right">35%</span>
                                </div>

                                <div class="progress progress-mini progress-danger">
                                    <div style="width:35%" class="bar"></div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">Unit Testing</span>
                                    <span class="pull-right">15%</span>
                                </div>

                                <div class="progress progress-mini progress-warning">
                                    <div style="width:15%" class="bar"></div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">Bug Fixes</span>
                                    <span class="pull-right">90%</span>
                                </div>

                                <div class="progress progress-mini progress-success progress-striped active">
                                    <div style="width:90%" class="bar"></div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                See tasks with details
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="purple">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-bell-alt icon-animated-bell"></i>
                        <span class="badge badge-important">8</span>
                    </a>

                    <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
                        <li class="nav-header">
                            <i class="icon-warning-sign"></i>
                            8 Notifications
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">
                                        <i class="btn btn-mini no-hover btn-pink icon-comment"></i>
                                        New Comments
                                    </span>
                                    <span class="pull-right badge badge-info">+12</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="btn btn-mini btn-primary icon-user"></i>
                                Bob just signed up as an editor ...
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">
                                        <i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>
                                        New Orders
                                    </span>
                                    <span class="pull-right badge badge-success">+8</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">
                                        <i class="btn btn-mini no-hover btn-info icon-twitter"></i>
                                        Followers
                                    </span>
                                    <span class="pull-right badge badge-info">+11</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                See all notifications
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li id="msgBox" class="green">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i id="msg_envelope" class="icon-envelope"></i>
                        <span id="msg_badge" class="badge badge-success">&nbsp;</span>
                    </a>

                    <ul id="msg_block" class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">




                    </ul>
                </li>

                <li class="light-blue">
<?php
$base_path = substr($_SERVER['SCRIPT_FILENAME'], 0, strlen($_SERVER['SCRIPT_FILENAME']) - 9);
if (!get_file_info($base_path . "assets/avatars/" . md5($this->session->userdata('login_id')) . ".jpg"))
    $avatar = "avatar.png";
else
    $avatar = md5($this->session->userdata('login_id')) . '.jpg';
?>
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="<?php echo base_url() ?>assets/avatars/<?php echo $avatar ?>" alt="<?php echo $this->session->userdata('login_fname') ?>'s Photo" />
                        <span class="user-info">
                            <small>Welcome,</small>
<?php
echo $this->session->userdata("login_fname") . " " . $this->session->userdata("login_lname")
?>
                        </span>

                        <i class="icon-caret-down"></i>
                    </a>
                            <?php
                            echo wellcome_box();
                            ?>

                </li>
            </ul><!--/.ace-nav-->
        </div><!--/.container-fluid-->
    </div><!--/.navbar-inner-->
</div>


<script type="text/javascript">
    $(function() {

        $("#msgBox").click(function() {
            $("#msg_block").children().remove();
            $.ajax({
                url: '<?php echo base_url() ?>account/messages',
                dataType: 'json',
                success: function(msgData) {
                    var countmsg = "";
                    switch (msgData.length) {
                        case 0:
                            countmsg = "No new message.";
                            break;
                        case 1:
                            countmsg = "1 new message.";
                            break;
                        default:
                            countmsg = msgData.length + " new message.";
                            break;
                    }
                    var msgli = "";
                    msgli += '<li class="nav-header">';
                    msgli += '<i class="icon-envelope-alt"></i>';
                    msgli += countmsg;
                    msgli += '</li>';
                    $.each(msgData, function(k, v) {

                        msgli += '<li><a href="#">';
                        msgli += '<img src="<?php echo base_url() ?>assets/avatars/avatar.png" class="msg-photo" alt="Alex Avatar" />';
                        msgli += '<span class="msg-body">';
                        msgli += '<span class="msg-title">';
                        msgli += '<span class="blue">' + v['from'] + ':</span>' + v['message'] + '</span>';
                        msgli += '<span class="msg-time">';
                        msgli += '<i class="icon-time"></i>';
                        msgli += '<span> ' + v['msgtime'] + '</span>';
                        msgli += '</span>';
                        msgli += '</span>';
                        msgli += '</a>';
                        msgli += '</li>';
                    });


                    msgli += '<li>';
                    msgli += '<a href="<?php echo base_url() ?>message">';
                    msgli += 'See all messages';
                    msgli += '<i class="icon-arrow-right"></i>';
                    msgli += '</a>';
                    msgli += '</li>';
                    $("#msg_block").append(msgli);

                }
            });
        });

        var timer = $.timer(function() {
            $("#msg_envelope").removeClass('icon-animated-vertical');
            $.ajax({
                url: '<?php echo base_url() ?>account/newMessage',
                dataType: 'json',
                success: function(msgData) {
                    if (msgData > 0)
                        $("#msg_envelope").addClass('icon-animated-vertical');
                    $("#msg_badge").text(msgData);

                }
            });
        });

        timer.set({time: 5000, autostart: true});

        $.ajax({
            url: '<?php echo base_url() ?>account/newMessage',
            dataType: 'json',
            success: function(msgData) {

                $("#msg_envelope").addClass('icon-animated-vertical');
                $("#msg_badge").text(msgData);
            }
        });
    });
</script>      