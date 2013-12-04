<div class="sidebar" id="sidebar">
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-small btn-success">
                <i class="icon-signal"></i>
            </button>

            <button class="btn btn-small btn-info">
                <i class="icon-pencil"></i>
            </button>

            <button class="btn btn-small btn-warning">
                <i class="icon-group"></i>
            </button>

            <button class="btn btn-small btn-danger">
                <i class="icon-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!--#sidebar-shortcuts-->

    <?php
    $topmenu = "";
    $submenu = "";
    foreach ($menu as $m) {
        if (count($m["submenu"]) == 0) {
            $active = ($m["title"] == "Dashboard") ? "class= 'active'" : "";

            //$topmenu[] = anchor(base_url($m["component"]),'<i class="'.$m["icon"].'"></i><span class="menu-text">'.$m["title"].'</span>');

            $topmenu .= '<li ' . $active . '>';
            $topmenu .= '<a href="' . base_url() . $m["component"] . '">';
            $topmenu .= '<i class="' . $m["icon"] . '"></i><span class="menu-text">' . $m["title"] . '</span>';
            $topmenu .= '</a>';
            $topmenu .= '</li>';
        } else {
            //$topmenu[] = anchor(base_url('#'),'<i class="'.$m["icon"].'"></i><span class="menu-text">'.$m["title"].'</span><b class="arrow icon-angle-down"></b>', array('class'=>"dropdown-toggle"));



            $topmenu .= '<li>';
            $topmenu .= '<a href="#" class="dropdown-toggle">';
            $topmenu .= '<i class="' . $m["icon"] . '"></i><span class="menu-text">' . $m["title"] . '</span>';
            $topmenu .= '<b class="arrow icon-angle-down"></b>';
            $topmenu .= '</a>';
            $topmenu .= '<ul class="submenu">';
            $sub = array();
            foreach ($m["submenu"] as $sm) {
                //$sub[] = anchor(base_url($sm["component"]),'<i class="icon-double-angle-right"></i>'.$sm["title"]);  

                $topmenu .= '<li>';
                $topmenu .= '<a href="' . base_url() . $sm["component"] . '"><i class="icon-double-angle-right"></i>' . $sm["title"] . '</a>';
                $topmenu .= '</li>';
            }
            //$topmenu[anchor(base_url('#'),'<i class="'.$m["icon"].'"></i><span class="menu-text">'.$m["title"].'</span><b class="arrow icon-angle-down"></b>')] = $sub;
            $topmenu .= '</ul>';
            $topmenu .= '</li>';
        }
    }

//echo ul($topmenu,array('class'=>"nav nav-list", "id"=>"lmenu"));
    ?>

    <ul class="nav nav-list">
<?php echo $topmenu; ?>
    </ul><!--/.nav-list-->

    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left"></i>
    </div>
</div>

