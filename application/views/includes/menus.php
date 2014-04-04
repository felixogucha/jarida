		<!-- dashboard --> 
        <?php
        $baseurl = base_url();
        if ($main_content == "dashboard") {
        	echo '<li class="dark-nav active">
		            <span class="glow"></span>
		                <a href="#">
		                    <i class="icon-desktop icon-2x"></i>
		                    <span>dashboard</span>
		                </a>
		        </li>';
        } else {
        	echo '<li class="">
		            <span class="glow"></span>
		                <a href="'.$baseurl.'index.php/jarida/dashboard" rel="tooltip" data-placement="right" data-original-title="Dashboard Help">
		                    <i class="icon-desktop icon-2x"></i>
		                    <span>dashboard</span>
		                </a>
		        </li>';
        }
        
        ?>

        <!-- publishers -->
        <?php
        $baseurl = base_url();
        if ($main_content == "publishers" || $main_content == "edit/publishers") {
        	echo '<li class="dark-nav active">
		            <span class="glow"></span>
		                <a href="#" data-original-title="publishers">
		                    <i class="icon-cogs icon-2x"></i>
		                    <span>publishers</span>
		                </a>
		        </li>';
        } else {
        	echo '<li class="">
		            <span class="glow"></span>
		                <a href="'.$baseurl.'index.php/jarida/publishers" rel="tooltip" data-placement="right" data-original-title="publishers">
		                    <i class="icon-cogs icon-2x"></i>
		                    <span>publishers</span>
		                </a>
		        </li>';
        }
        
        ?>

        <!-- magazines -->
        <?php
        if ($this->session->userdata('publisher_id')) {
        	?>
        	<li class="dark-nav">
        <span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="collapse" href="<?php echo base_url();?>jarida/settings#magazines_submenu" rel="tooltip" data-placement="right" data-original-title="magazines info.">
                <i class="icon-book icon-2x"></i>
                <span>magazines<i class="icon-caret-down"></i></span>
            </a>
            
            <?php
            	if ($main_content == "magazines" || $main_content == "edit/magazines") {
            		echo '<ul id="magazines_submenu" class="collapse in">
			                <li class="active">
			                  <a href="#">
			                      <i class="icon-book"></i>magazines</a>
			                </li>
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/issues">
			                      <i class="icon-comments"></i>issues</a>
			                </li>
			            </ul>';
            	} else if($main_content == "issues" || $main_content == 'edit/issues'){
            		echo '<ul id="magazines_submenu" class="collapse in">
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/magazines">
			                      <i class="icon-book"></i>magazines</a>
			                </li>
			                <li class="active">
			                  <a href="">
			                      <i class="icon-comments"></i>issues</a>
			                </li>
			            </ul>';
            	} else {
            		echo '<ul id="magazines_submenu" class="collapse">
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/magazines">
			                      <i class="icon-book"></i>magazines</a>
			                </li>
			                <li class=""><a href="'.$baseurl.'index.php/jarida/issues">
			                  <i class="icon-comments"></i>issues</a>
			                </li>
			            </ul>';
            	}
            	
            ?>
        </li>
        	<?php
        }
        ?>

        <!-- users -->
        <?php
        $baseurl = base_url();
        if ($main_content == "users" || $main_content == "edit/users") {
        	echo '<li class="dark-nav active">
		            <span class="glow"></span>
		                <a href="#" data-original-title="users">
		                    <i class="icon-user icon-2x"></i>
		                    <span>users</span>
		                </a>
		        </li>';
        } else {
        	echo '<li class="">
		            <span class="glow"></span>
		                <a href="'.$baseurl.'index.php/jarida/users" rel="tooltip" data-placement="right" data-original-title="users">
		                    <i class="icon-user icon-2x"></i>
		                    <span>users</span>
		                </a>
		        </li>';
        }
        
        ?>   

        <!-- settings -->
        <li class="dark-nav">
        <span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="collapse" href="<?php echo base_url();?>soma/settings#settings_submenu" rel="tooltip" data-placement="right" data-original-title="system settings">
                <i class="icon-wrench icon-2x"></i>
                <span>settings<i class="icon-caret-down"></i></span>
            </a>
            
            <?php
            if ($main_content == "my_profile") {
            	echo '<ul id="settings_submenu" class="collapse in">
		                <li class="active">
		                  <a href="">
		                      <i class="icon-user"></i>my profile</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/permissions">
		                      <i class="icon-key"></i>permissions</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/roles">
		                      <i class="icon-check"></i>roles</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/userGroups">
		                      <i class="icon-group"></i>user groups</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/backup">
		                      <i class="icon-download-alt"></i>system backup</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/noticeboard">
		                      <i class="icon-pushpin"></i>notice board</a>
		                </li>

		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/salutation">
		                      <i class="icon-adjust"></i>salutation</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magCategory">
		                      <i class="icon-adjust"></i>magazine category</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magTag">
		                      <i class="icon-bolt"></i>magazine tags</a>
		                </li>
		            </ul>';
            } else if($main_content == "permissons" || $main_content == "edit/permissons"){
            	echo '<ul id="settings_submenu" class="collapse in">
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/myProfile">
		                      <i class="icon-user"></i>my profile</a>
		                </li>
		                <li class="active">
		                  <a href="">
		                      <i class="icon-key"></i>permissons</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/roles">
		                      <i class="icon-check"></i>roles</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/userGroups">
		                      <i class="icon-group"></i>user groups</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/backup">
		                      <i class="icon-download-alt"></i>system backup</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/noticeboard">
		                      <i class="icon-pushpin"></i>notice board</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/salutation">
		                      <i class="icon-adjust"></i>salutation</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magCategory">
		                      <i class="icon-adjust"></i>magazine category</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magTag">
		                      <i class="icon-bolt"></i>magazine tags</a>
		                </li>
		            </ul>';
            }  else if($main_content == "roles" || $main_content == "edit/roles"){
            	echo '<ul id="settings_submenu" class="collaps in">
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/myProfile">
		                      <i class="icon-user"></i>my profile</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/permissions">
		                      <i class="icon-key"></i>permissions</a>
		                </li>
		                <li class="active">
		                  <a href="">
		                      <i class="icon-check"></i>roles</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/userGroups">
		                      <i class="icon-group"></i>user groups</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/backup">
		                      <i class="icon-download-alt"></i>system backup</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/noticeboard">
		                      <i class="icon-pushpin"></i>notice board</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/salutation">
		                      <i class="icon-adjust"></i>salutation</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magCategory">
		                      <i class="icon-adjust"></i>magazine category</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magTag">
		                      <i class="icon-bolt"></i>magazine tags</a>
		                </li>
		            </ul>';
            }  else if($main_content == "user_groups" || $main_content == "edit/user_groups"){
            	echo '<ul id="settings_submenu" class="collapse in">
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/myProfile">
		                      <i class="icon-user"></i>my profile</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/permissions">
		                      <i class="icon-key"></i>permissions</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/roles">
		                      <i class="icon-check"></i>roles</a>
		                </li>
		                <li class="active">
		                  <a href="">
		                      <i class="icon-group"></i>user groups</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/backup">
		                      <i class="icon-download-alt"></i>system backup</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/noticeboard">
		                      <i class="icon-pushpin"></i>notice board</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/salutation">
		                      <i class="icon-adjust"></i>salutation</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magCategory">
		                      <i class="icon-adjust"></i>magazine category</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magTag">
		                      <i class="icon-bolt"></i>magazine tags</a>
		                </li>
		            </ul>';
            } else if($main_content == "backup"){
            	echo '<ul id="settings_submenu" class="collapse in">
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/myProfile">
		                      <i class="icon-user"></i>my profile</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/permissions">
		                      <i class="icon-key"></i>permissions</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/roles">
		                      <i class="icon-check"></i>roles</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/userGroups">
		                      <i class="icon-group"></i>user groups</a>
		                </li>
		                <li class="active">
		                  <a href="">
		                      <i class="icon-download-alt"></i>system backup</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/noticeboard">
		                      <i class="icon-pushpin"></i>notice board</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/salutation">
		                      <i class="icon-adjust"></i>salutation</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magCategory">
		                      <i class="icon-adjust"></i>magazine category</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magTag">
		                      <i class="icon-bolt"></i>magazine tags</a>
		                </li>
		            </ul>';
            }  else if($main_content == "notice_board" || $main_content == "edit/notice_board"){
            	echo '<ul id="settings_submenu" class="collapse in">
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/myProfile">
		                      <i class="icon-user"></i>my profile</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/permissions">
		                      <i class="icon-key"></i>permissions</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/roles">
		                      <i class="icon-check"></i>roles</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/userGroups">
		                      <i class="icon-group"></i>user groups</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/backup">
		                      <i class="icon-download-alt"></i>system backup</a>
		                </li>
		                <li class="active">
		                  <a href="">
		                      <i class="icon-h-sign"></i>notice board</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/salutation">
		                      <i class="icon-adjust"></i>salutation</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magCategory">
		                      <i class="icon-adjust"></i>magazine category</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magTag">
		                      <i class="icon-bolt"></i>magazine tags</a>
		                </li>
		            </ul>';
            } else if($main_content == "salutation" || $main_content == "edit/salutation"){
            	echo '<ul id="settings_submenu" class="collapse in">
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/myProfile">
		                      <i class="icon-user"></i>my profile</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/permissions">
		                      <i class="icon-key"></i>permissions</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/roles">
		                      <i class="icon-check"></i>roles</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/userGroups">
		                      <i class="icon-group"></i>user groups</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/backup">
		                      <i class="icon-download-alt"></i>system backup</a>
		                </li>
		                <li class="">
		                  <a href="">
		                      <i class="icon-h-sign"></i>notice board</a>
		                </li>
		                <li class="active">
		                  <a href="'.$baseurl.'index.php/jarida/salutation">
		                      <i class="icon-adjust"></i>salutation</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magCategory">
		                      <i class="icon-adjust"></i>magazine category</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magTag">
		                      <i class="icon-bolt"></i>magazine tags</a>
		                </li>
		            </ul>';
            } else if($main_content == "mag_category" || $main_content == "edit/mag_category"){
            	echo '<ul id="settings_submenu" class="collapse in">
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/myProfile">
		                      <i class="icon-user"></i>my profile</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/permissions">
		                      <i class="icon-key"></i>permissions</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/roles">
		                      <i class="icon-check"></i>roles</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/userGroups">
		                      <i class="icon-group"></i>user groups</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/backup">
		                      <i class="icon-download-alt"></i>system backup</a>
		                </li>
		                <li class="">
		                  <a href="">
		                      <i class="icon-h-sign"></i>notice board</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/salutation">
		                      <i class="icon-adjust"></i>salutation</a>
		                </li>
		                <li class="active">
		                  <a href="'.$baseurl.'index.php/jarida/magCategory">
		                      <i class="icon-adjust"></i>magazine category</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magTag">
		                      <i class="icon-bolt"></i>magazine tags</a>
		                </li>
		            </ul>';
            }  else if($main_content == "mag_tag" || $main_content == "edit/mag_tag"){
            	echo '<ul id="settings_submenu" class="collapse in">
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/myProfile">
		                      <i class="icon-user"></i>my profile</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/permissions">
		                      <i class="icon-key"></i>permissions</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/roles">
		                      <i class="icon-check"></i>roles</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/userGroups">
		                      <i class="icon-group"></i>user groups</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/backup">
		                      <i class="icon-download-alt"></i>system backup</a>
		                </li>
		                <li class="">
		                  <a href="">
		                      <i class="icon-h-sign"></i>notice board</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/salutation">
		                      <i class="icon-adjust"></i>salutation</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magCategory">
		                      <i class="icon-adjust"></i>magazine category</a>
		                </li>
		                <li class="active">
		                  <a href="'.$baseurl.'index.php/jarida/magTag">
		                      <i class="icon-bolt"></i>magazine tags</a>
		                </li>
		            </ul>';
            } else {
            	echo '<ul id="settings_submenu" class="collapse">
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/myProfile">
		                      <i class="icon-user"></i>my profile</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/permissions">
		                      <i class="icon-key"></i>permissions</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/roles">
		                      <i class="icon-check"></i>roles</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/userGroups">
		                      <i class="icon-group"></i>user groups</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/backup">
		                      <i class="icon-download-alt"></i>system backup</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/noticeboard">
		                      <i class="icon-pushpin"></i>notice board</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/salutation">
		                      <i class="icon-adjust"></i>salutation</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magCategory">
		                      <i class="icon-adjust"></i>magazine category</a>
		                </li>
		                <li class="">
		                  <a href="'.$baseurl.'index.php/jarida/magTag">
		                      <i class="icon-bolt"></i>magazine tags</a>
		                </li>
		            </ul>';
            }
            
            ?>

        </li>

        <!-- reports -->
        <li class="dark-nav">
        <span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="collapse" href="<?php echo base_url();?>soma/settings#reports_submenu" rel="tooltip" data-placement="right" data-original-title="generate reports">
                <i class="icon-briefcase icon-2x"></i>
                <span>reports<i class="icon-caret-down"></i></span>
            </a>
            
            <?php
            	if ($main_content == "publishers_report") {
            		echo '<ul id="reports_submenu" class="collapse in">
			                <li class="active">
			                  <a href="">
			                      <i class="icon-cogs"></i>publishers report</a>
			                </li>
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/usersReport">
			                      <i class="icon-group"></i>users report</a>
			                </li>
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/magReports">
			                      <i class="icon-book"></i>magazines report</a>
			                </li>
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/issuesReport">
			                      <i class="icon-comments"></i>issues report</a>
			                </li>
			            </ul>';
            	}else if($main_content == "users_report") {
            		echo '<ul id="reports_submenu" class="collapse in">
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/publishersReport">
			                      <i class="icon-cogs"></i>publishers report</a>
			                </li>
			                <li class="active">
			                  <a href="">
			                      <i class="icon-group"></i>users report</a>
			                </li>
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/magReports">
			                      <i class="icon-book"></i>magazines report</a>
			                </li>
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/issuesReport">
			                      <i class="icon-comments"></i>issues report</a>
			                </li>
			            </ul>';
            	} else if ($main_content == "mag_reports"){
            		echo '<ul id="reports_submenu" class="collapse in">
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/publishersReport">
			                      <i class="icon-cogs"></i>publishers report</a>
			                </li>
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/usersReport">
			                      <i class="icon-group"></i>users report</a>
			                </li>
			                <li class="active">
			                  <a href="">
			                      <i class="icon-book"></i>magazines report</a>
			                </li>
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/issuesReport">
			                      <i class="icon-comments"></i>issues report</a>
			                </li>
			            </ul>';

            	}  else if ($main_content == "issues_report"){
            		echo '<ul id="reports_submenu" class="collapse in">
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/publishersReport">
			                      <i class="icon-cogs"></i>publishers report</a>
			                </li>
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/usersReport">
			                      <i class="icon-group"></i>users report</a>
			                </li>
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/magReports">
			                      <i class="icon-book"></i>magazines report</a>
			                </li>
			                <li class="active">
			                  <a href="">
			                      <i class="icon-comments"></i>issues report</a>
			                </li>
			            </ul>';
            	} else {
            		echo '<ul id="reports_submenu" class="collapse">
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/publishersReport">
			                      <i class="icon-cogs"></i>publishers report</a>
			                </li>
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/usersReport">
			                      <i class="icon-group"></i>users report</a>
			                </li>
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/magReports">
			                      <i class="icon-book"></i>magazines report</a>
			                </li>
			                <li class="">
			                  <a href="'.$baseurl.'index.php/jarida/issuesReport">
			                      <i class="icon-comments"></i>issues report</a>
			                </li>
			            </ul>';
            	}
            	
            ?>

        </li>