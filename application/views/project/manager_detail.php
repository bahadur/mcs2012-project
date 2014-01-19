
<div class="main-content">
    <?php $this->load->view("layout/breadcrumb"); ?>
    <div class="page-content">

        <div class="page-header position-relative">
            <h1>
                <?php echo $projects_detail[0]->name ?>
                <small>
                    <i class="icon-double-angle-right"></i>
                    <?php echo $projects_detail[0]->description ?>
                </small>
            </h1>
        </div><!--/.page-header-->

       

        <div class="row-fluid">
            <div class="span12">
                <div class="profile-user-info profile-user-info-striped">

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Status </div>

                        <div class="profile-info-value">
                            <span id="category"><?php echo $projects_detail[0]->category ?></span>
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
                    
                     <div class="profile-info-row">
                        <div class="profile-info-name"> Members </div>

                        <div class="profile-info-value">
                            <span id="members"><?php echo count($projectMembers) ?></span>
                        </div>
                    </div>
                    
                     <div class="profile-info-row">
                        <div class="profile-info-name"> Tasks </div>

                        <div class="profile-info-value">
                            <span id="project_tasks"><?php echo count($project_tasks) ?></span>
                        </div>
                    </div>
                    
                    <div class="profile-info-row">
                        <div class="profile-info-name"> Action </div>

                        <div class="profile-info-value">
                            <span id="action"><button class="btn btn-info" disabled="disabled" >Complete</button></span>
                            <span id="action"><button class="btn btn-danger" >Hold</button></span>
                            <span id="action"><button class="btn" >Cancel</button></span>
                            
                        </div>
                    </div>

                </div>
                <div class="space-20"></div>
            </div>
            <div class="row-fluid">
                <div class="span9">
                    <div class="space"></div>

                    <div id="calendar"></div>
                </div>

                <div class="span3">
                    <div class="widget-box transparent">
                        <div class="widget-header">
                            <h4>Team Members</h4>
                        </div>

                        <div class="widget-main">
                            <div id="external-events">
                                <?php 
                               
                                foreach ($projectMembers as $members){ 
//                                    label-grey    
//                                    label-success
//                                    label-important
//                                    label-important
//                                    label-yellow
//                                    label-pink
//                                    label-info
                                ?>
                                <div class="external-event label-info" data-class="label-info">
                                    <i class="icon-move"></i>
                                    <?php echo $members->firstName?> <?php echo $members->lastName?> [Tasks: <?php echo $members->tasks_count?> ]
                                </div>
                                <?php }?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--PAGE CONTENT ENDS-->
        </div><!--/.span-->
    </div>
    <div class="row-fluid">
         
    <div class="span12">
        <div class="widget-container-span ui-sortable">
            <div class="widget-box"  style="opacity: 1;">
                <div class="widget-header header-color-blue">
                    <h4 class="biger lighter">Tasks</h4>
                </div>
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


</div>




</div>
</div>

<?php 



$js_events = "";
$js_evdates = "";
foreach($project_tasks as $tasks){
    
    $js_evdates .= " var task_".$tasks->taskid."_start_date = new Date('".$tasks->dateStart."');\n\n";
    
    $js_evdates .= " var task_".$tasks->taskid."_sd = task_".$tasks->taskid."_start_date.getDate();\n";
    $js_evdates .= " var task_".$tasks->taskid."_sm = task_".$tasks->taskid."_start_date.getMonth();\n";
    $js_evdates .= " var task_".$tasks->taskid."_sy = task_".$tasks->taskid."_start_date.getFullYear();\n\n";
    
    $js_evdates .= " var task_".$tasks->taskid."_end_date = new Date('".$tasks->dueDate."');\n\n";
    $js_evdates .= " var task_".$tasks->taskid."_ed = task_".$tasks->taskid."_end_date.getDate();\n";
    $js_evdates .= " var task_".$tasks->taskid."_em = task_".$tasks->taskid."_end_date.getMonth();\n";
    $js_evdates .= " var task_".$tasks->taskid."_ey = task_".$tasks->taskid."_end_date.getFullYear();\n";
    
    $js_events .=  ",{\n";
    $js_events .=  "\ttitle: '".$tasks->taskName."',\n";
    $js_events .=  "\tstart: new Date(task_".$tasks->taskid."_sy, task_".$tasks->taskid."_sm, task_".$tasks->taskid."_sd),\n";
    $js_events .=  "\tend: new Date(task_".$tasks->taskid."_ey, task_".$tasks->taskid."_em, task_".$tasks->taskid."_ed),\n";
    $js_events .=  "\tclassName: 'label-info'\n";
    $js_events .=  "}\n";
                }
                ?>
<script>
    $(function() {
        
        

        $("#tasks").dataTable({
            "bProcessing": true,
            "sAjaxSource": "<?php echo base_url() ?>task/tasks/" +<?php echo $projects_detail[0]->projectid ?>
        });


        $("#teamMembers").chosen();

        

        $('#external-events div.external-event').each(function() {

		
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};

		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);

		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
		
	});

        var start_date = new Date('<?php echo $projects_detail[0]->fstartdate ?> <?php echo $projects_detail[0]->fstarttime ?>');
        var sd = start_date.getDate();
        var sm = start_date.getMonth();
        var sy = start_date.getFullYear();
        
        var end_date = new Date('<?php echo $projects_detail[0]->fduedate ?> <?php echo $projects_detail[0]->fduetime ?>');
        var ed = end_date.getDate();
        var em = end_date.getMonth();
        var ey = end_date.getFullYear();
        
        <?php echo $js_evdates?>
        var calendar = $('#calendar').fullCalendar({
            month: sm,
            year: sy,
            buttonText: {
                prev: '<i class="icon-chevron-left"></i>',
                next: '<i class="icon-chevron-right"></i>'
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: [
                
                {
                    title: '<?php echo $projects_detail[0]->name?> <?php echo $projects_detail[0]->description?>',
                    start: new Date(sy, sm, sd),
                    end: new Date(ey, em, ed),
                    className: 'label-success'
                    
                }
                <?php echo $js_events?>
                
                
                ],
            
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(date, allDay) { // this function is called when something is dropped
		
			// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');
			var $extraEventClass = $(this).attr('data-class');
			
			
			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);
			
			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];
			
			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			
			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}
			
		},
            
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {

                
                if(start >= start_date && start <= end_date){
                    //bootbox.alert("Please select within the range.");
                    
                    
                    <?php 
                   
                    $frm = "<div class='control-group info>";
                        $frm .= "<lable class='control-lable' for='member'>Member</lable>";
                            $frm .= "<div class='controls'>";
                                $frm .= "<div class='btn-group'>";
                                $frm .= "<select name='member' id='newMember'>";
                                 foreach ($projectMembers as $members){ 
                                    $frm .= "<option value='".$members->contactid."'>".$members->firstName."</option>";

                                 }
                                $frm .= "</select>";
                                $frm .= "</div>";
                        $frm .= "</div>";
                    $frm .= "</div>";
                    
                    $frm .= "<div class='control-group info>";
                        $frm .= "<lable class='control-lable' for='task'>Task</lable>";
                            $frm .= "<div class='controls'>";
                                $frm .= "<div class='btn-group'>";
                                $frm .= "<input name='task' id='newTask' />";
                                $frm .= "</div>";
                        $frm .= "</div>";
                    $frm .= "</div>";
                    
                    $frm .= "<div class='control-group info>";
                        $frm .= "<lable class='control-lable' for='task'>Description</lable>";
                            $frm .= "<div class='controls'>";
                                $frm .= "<div class='btn-group'>";
                                $frm .= "<textarea name='description' id='newDescription' ></textarea>";
                                $frm .= "</div>";
                        $frm .= "</div>";
                    $frm .= "</div>";
                    
                   
                    
                   
                    
                        
                    ?>
                    
                    bootbox.confirm("<form id='frm_task'><h4 class='lighter'>"+start.getDate()+"-"+(start.getMonth()+1)+"-"+start.getFullYear()+" to "+end.getDate()+"-"+(end.getMonth()+1)+"-"+end.getFullYear()+"</h4>"+"<?php echo $frm?>"+"<input type='hidden' name='projectid' id='newProjectid' value='"+<?php echo $projects_detail[0]->projectid ?>+"' /><input type='hidden' name='startDate' id='newStartDate' value='"+start.getFullYear()+"-"+(start.getMonth()+1)+"-"+start.getDate()+"' /><input type='hidden' name='endDate' id='newEndDate' value='"+end.getFullYear()+"-"+(end.getMonth()+1)+"-"+end.getDate()+"' /></form>", function(result) {
                        if(result){
                            
                                        
                            $.ajax({
                                dataType: 'html',
                                type: 'post',
                                url: '<?php echo base_url('task/update') ?>',
                                data: $("#frm_task").serialize(),
                                success: function(responseData) {
                                    if (responseData == 1) {
                                       
                                         var newEvent = {
                                            title: $("#newTask").val(),
                                            allDay: false,
                                            start: start,
                                            end: end,
                                          };
                            
                                           $('#calendar').fullCalendar('renderEvent', newEvent,true);


                                    }
                                    else {
                                        bootbox.alert("Could not update record");
                                    }
                                },
                                error: function(responseData) {
                                    bootbox.alert('Ajax request not recieved! ');
                                }
                            });
                            
                           
                               
                           
                           
                        }
                });
                   
                } else {
                bootbox.alert("Please selecte date in project range");
                }

                calendar.fullCalendar('unselect');

            }
            ,
            
            
            eventClick: function(calEvent, jsEvent, view) {

                var form = $("<form class='form-inline'><label>Change event name &nbsp;</label></form>");
                form.append("<input autocomplete=off type=text value='" + calEvent.title + "' /> ");
                form.append("<button type='submit' class='btn btn-small btn-success'><i class='icon-ok'></i> Save</button>");

                var div = bootbox.dialog(form,
                        [
                            {
                                "label": "<i class='icon-trash'></i> Hold",
                                "class": "btn-small btn-danger",
                                "callback": function() {
                                    calendar.fullCalendar('removeEvents', function(ev) {
                                        return (ev._id == calEvent._id);
                                    })
                                }
                            }
                            ,
                            {
                                "label": "<i class='icon-remove'></i> Cancele",
                                "class": "btn-small"
                            }
                        ]
                        ,
                        {
                            // prompts need a few extra options
                            "onEscape": function() {
                                div.modal("hide");
                            }
                        }
                );

                form.on('submit', function() {
                    calEvent.title = form.find("input[type=text]").val();
                    calendar.fullCalendar('updateEvent', calEvent);
                    div.modal("hide");
                    return false;
                });


                //console.log(calEvent.id);
                //console.log(jsEvent);
                //console.log(view);

                // change the border color just for fun
                //$(this).css('border-color', 'red');

            }

        });
        
        
        
       


    });
</script>