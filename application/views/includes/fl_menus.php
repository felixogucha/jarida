		<!-- dashboard --> 
        <?php
        $baseurl = base_url();
    	echo '<li class="">
	            <span class="glow"></span>
	                <a href="'.$baseurl.'index.php/jarida/dashboard" rel="tooltip" data-placement="right" data-original-title="Dashboard Help">
	                    <i class="icon-desktop icon-2x"></i>
	                    <span>dashboard</span>
	                </a>
	        </li>';
        
        ?>

        <?php
        $baseurl = base_url();
    	echo '<li class="">
	            <span class="glow"></span>
	                <a href="'.$baseurl.'index.php/jarida/publishers" rel="tooltip" data-placement="right" data-original-title="publishers">
	                    <i class="icon-cogs icon-2x"></i>
	                    <span>publishers</span>
	                </a>
	        </li>';
        
        ?>

        <!-- magazines -->
        <li class="dark-nav">
        <span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="collapse" href="<?php echo base_url();?>jarida/settings#magazines_submenu" rel="tooltip" data-placement="right" data-original-title="magazines info.">
                <i class="icon-book icon-2x"></i>
                <span>magazines<i class="icon-caret-down"></i></span>
            </a>
            <?php
    		echo '<ul id="magazines_submenu" class="collapse">
	                <li class="">
	                  <a href="'.$baseurl.'index.php/jarida/magazines">
	                      <i class="icon-book"></i>magazines</a>
	                </li>
	                <li class=""><a href="'.$baseurl.'index.php/jarida/issues">
	                  <i class="icon-comments"></i>issues</a>
	                </li>
	            </ul>';
            	
            ?>
        </li>    

        <!-- settings -->
        <li class="dark-nav">
        <span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="collapse" href="<?php echo base_url();?>soma/settings#settings_submenu" rel="tooltip" data-placement="right" data-original-title="system settings">
                <i class="icon-wrench icon-2x"></i>
                <span>settings<i class="icon-caret-down"></i></span>
            </a>
            
            <?php
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
		                  <a href="'.$baseurl.'index.php/jarida/users">
		                      <i class="icon-group"></i>users</a>
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
		            </ul>';
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
            	
            ?>

        </li>