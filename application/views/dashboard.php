<div class="sidebar-background">
    <div class="primary-sidebar-background">
    </div>
</div>
<div class="primary-sidebar">
    <!-- Main nav -->
    <br>
    <div style="text-align:center;">
        <a href="#">
            <img src="<?php echo base_url();?>images/logo2.png" style="max-height:100px; max-width:100px;">
        </a>
    </div>
    <br>
    <ul class="nav nav-collapse collapse nav-collapse-primary">

        <?php $this->load->view('includes/menus');?>
        
    </ul>
    
</div>    <div class="main-content">
                <div class="container-fluid">
            <?php $this->load->view('includes/flash_message')?>
        </div>
        
        <!-- FLASH MESSAGES -->
        
        <!-- -->
        
        
                        <div class="container-fluid padded">
            <div class="container-fluid padded">
    <div class="row-fluid">
        <div class="span30">
            <!-- find me in partials/action_nav_normal -->
            <!--big normal buttons-->
            <div class="action-nav-normal">
                <div class="row-fluid">
                    <div class="span2 action-nav-button">
                        <a href="<?php echo base_url();?>index.php/jarida/publishers">
                        <i class="icon-cogs"></i>
                        <span>publishers</span>
                        </a>
                    </div>
                    <div class="span2 action-nav-button">
                        <a href="<?php echo base_url();?>index.php/jarida/magazines">
                        <i class="icon-book"></i>
                        <span>magazines</span>
                        </a>
                    </div>
                    <div class="span2 action-nav-button">
                        <a href="<?php echo base_url();?>index.php/jarida/issues">
                        <i class="icon-comments"></i>
                        <span>issues</span>
                        </a>
                    </div>
                    <div class="span2 action-nav-button">
                        <a href="<?php echo base_url();?>index.php/jarida/permissions">
                        <i class="icon-key"></i>
                        <span>permissions</span>
                        </a>
                    </div>
                    <div class="span2 action-nav-button">
                        <a href="<?php echo base_url();?>index.php/jarida/roles">
                        <i class="icon-check"></i>
                        <span>roles</span>
                        </a>
                    </div>
                    <div class="span2 action-nav-button">
                        <a href="<?php echo base_url();?>index.php/jarida/userGroups">
                        <i class="icon-group"></i>
                        <span>user groups</span>
                        </a>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span2 action-nav-button">
                        <a href="<?php echo base_url();?>index.php/jarida/users">
                        <i class="icon-group"></i>
                        <span>users</span>
                        </a>
                    </div>
                    <div class="span2 action-nav-button">
                        <a href="<?php echo base_url();?>index.php/jarida/backup">
                        <i class="icon-download-alt"></i>
                        <span>system backup</span>
                        </a>
                    </div>
                    <div class="span2 action-nav-button">
                        <a href="<?php echo base_url();?>index.php/jarida/noticeboard">
                        <i class="icon-pushpin"></i>
                        <span>noticeboard</span>
                        </a>
                    </div>
                    <div class="span2 action-nav-button">
                        <a href="<?php echo base_url();?>index.php/jarida/publishersReport">
                        <i class="icon-cogs"></i>
                        <span>publishers report</span>
                        </a>
                    </div>
                    <div class="span2 action-nav-button">
                        <a href="<?php echo base_url();?>index.php/jarida/usersReport">
                        <i class="icon-user"></i>
                        <span>users report</span>
                        </a>
                    </div>
                    <div class="span2 action-nav-button">
                        <a href="<?php echo base_url();?>index.php/jarida/magReports">
                        <i class="icon-book"></i>
                        <span>magazines report</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!---DASHBOARD MENU BAR ENDS HERE-->
    </div>
    <hr>
    <div class="row-fluid">
    
        <!--CALENDAR SCHEDULE STARTS-->
        <div class="span6">
            <div class="box">
                <div class="box-header">
                    <div class="title">
                        <i class="icon-calendar"></i>calendar schedule</div>
                </div>
                <div class="box-content">
                    <div id="schedule_calendar" class="fc">
                    </div>
                </div>
            </div>
        </div>
        <!-- CALENDAR SCHEDULE ENDS -->
        
        <!-- NOTICEBOARD LIST STARTS -->


       <div class="span6">
            <div class="box">
                <div class="box-header">
                    <span class="title">
                        <i class="icon-reorder"></i>noticeboard</span>
                </div>
                <div class="box-content scrollable" style="max-height: 500px; overflow-y: auto">

                    <?php
                        if(!is_null($all_notices)) {
                          foreach ($all_notices as $al_notices) {
                            $dbdate = $al_notices->due_date;
                            if($dbdate > date('Y-m-d')) {
                                ?>

                                <div class="box-section news with-icons">
                                    <div class="avatar blue">
                                        <i class="icon-tag icon-2x"></i>
                                    </div>
                                    <div class="news-time">
                                        <?php

                                        $dt = explode("-", $dbdate);
                                        $mth = $dt[1];
                                        $da = $dt[2];
                                        if ($mth == 01) {
                                            echo '<span>'.$da.'</span>Jan';
                                        } else if ($mth == 02) {
                                            echo '<span>'.$da.'</span>Feb';
                                        } else if ($mth == 03) {
                                            echo '<span>'.$da.'</span>Mar';
                                        } else if ($mth == 04) {
                                            echo '<span>'.$da.'</span>Apr';
                                        } else if ($mth == 05) {
                                            echo '<span>'.$da.'</span>May';
                                        } else if ($mth == 06) {
                                            echo '<span>'.$da.'</span>Jun';
                                        } else if ($mth == 07) {
                                            echo '<span>'.$da.'</span>Jul';
                                        } else if ($mth == 08) {
                                            echo '<span>'.$da.'</span>Aug';
                                        } else if ($mth == 09) {
                                            echo '<span>'.$da.'</span>Sep';
                                        } else if ($mth == 10) {
                                            echo '<span>'.$da.'</span>Oct';
                                        } else if ($mth == 11) {
                                            echo '<span>'.$da.'</span>Nov';
                                        } else {
                                            echo '<span>'.$da.'</span>Dec';
                                        }

                                        ?>
                                    </div>
                                    <div class="news-content">
                                        <div class="news-title">
                                            <?php echo $al_notices->notice_title; ?>
                                        </div>
                                        <div class="news-text">
                                            <?php echo $al_notices->notice_details; ?>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        }
                    }
                        ?>

                    
                                        
                    
                                        
                </div>
            </div>
        </div>




        <!-- NOTICEBOARD LIST ENDS -->
    </div>
</div>

  
  
  <script>
  $(document).ready(function() {

    // initialize the calendar...

    $("#schedule_calendar").fullCalendar({
            header: {
                left: "prev,next",
                center: "title",
                right: "month,agendaWeek,agendaDay"
            },
            editable: 0,
            droppable: 0,
            events: [
                                        {
                        title: "Health Clinic at Cox’s bazar",
                        start: new Date(2013, 9, 02),
                        end:    new Date(2013, 9, 02)  
                    },
                                        {
                        title: "Workshop on first aid",
                        start: new Date(2013, 9, 23),
                        end:    new Date(2013, 9, 23)  
                    },
                                        {
                        title: "Health Clinic at Chittagong",
                        start: new Date(2013, 9, 15),
                        end:    new Date(2013, 9, 15)  
                    },
                                        {
                        title: "Health Care Awareness Program at Uninor",
                        start: new Date(2013, 9, 30),
                        end:    new Date(2013, 9, 30)  
                    },
                                        {
                        title: " Corporate Out-reach Program",
                        start: new Date(2013, 9, 31),
                        end:    new Date(2013, 9, 31)  
                    },
                                        ]
        })

});
  </script>        </div>
                <?php $this->load->view('includes/footer')?> 
                <?php
                    if ($this->session->userdata('fl')) {
                      if ($this->session->userdata('fl') == 'y') {
                        $msg = 'success! your password has been changed.';
                        echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                      } else if($this->session->userdata('fl') == 't'){
                        $msg = 'sorry! incorrect details.';
                        echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                      } else {
                        $msg = 'sorry! could not change your password. please try again later';
                        echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                      }
                      $this->session->unset_userdata('fl');
                    }
                      ?>      
            </div>
    

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46775677-1', 'joyonto.net');
  ga('send', 'pageview');

</script>
<div class="ex-tooltip"></div>
<div id="galleryOverlay" style="display: none;">
    <div id="gallerySlider">
    </div><a id="prevArrow">
    <i class="icon-angle-left icon-4x"></i>
</a>
<a id="nextArrow"><i class="icon-angle-right icon-4x"></i></a>
</div>
</body>
</html>