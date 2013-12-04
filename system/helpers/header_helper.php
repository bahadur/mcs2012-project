<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('wellcome_box'))
{
	function wellcome_box()
	{
		$list_wellcome = array( 
						anchor(base_url('account/settings'),'<i class="icon-cog"></i>	Settings'),
						anchor(base_url('account/profile'),'<i class="icon-user"></i>	Profile'),
						anchor(base_url('account/logout'),'<i class="icon-off"></i>	Logout')
						);
		$list_att = array('class'=> "user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer");
		return ul($list_wellcome,$list_att);
		
		
		
		
	}
}




if( ! function_exists('notification_all')){
	
	function notification_all(){
		
		$list = array();
		
		
	}
}

if(! function_exists('getTimeSummary')){

    function getTimeSummary ($time, $timeBase = false) {
          
    if (!$timeBase) {
        $timeBase = time();
    }
   
    if ($time <= time()) {
        
        $dif = $timeBase - $time;

        if ($dif < 60) {
            if ($dif < 2) {
                return "1 second ago";
            }

            return $dif." seconds ago";
        }

        if ($dif < 3600) {
            if (floor($dif / 60) < 2) {
                return "A minute ago";
            }

            return floor($dif / 60)." minutes ago";
        }

        if (date("d n Y", $timeBase) == date("d n Y", $time)) {
            return "Today, ".date("g:i A", $time);
        }

        if (date("n Y", $timeBase) == date("n Y", $time) && date("d", $timeBase) - date("d", $time) == 1) {
            return "Yesterday, ".date("g:i A", $time);
        }

        if (date("Y", $time) == date("Y", time())) {
            return date("F, jS g:i A", $time);
        }
    } else {
      
        $dif = $time - $timeBase;
        
        
        
        if ($dif < 60) {
            
            if ($dif < 2) {
                return "1 second";
            }

            return $dif." seconds";
        }

        if ($dif < 3600) {
            
            if (floor($dif / 60) < 2) {
                return "Less than a minute";
            }

            return floor($dif / 60)." minutes";
        }

        if (date("d n Y", ($timeBase + 86400)) == date("d n Y", ($time))) {
             
            return "Tomorrow, at ".date("g:i A", $time);
        }
    }

    return date("F, jS g:i A Y", $time);
}
}

?>