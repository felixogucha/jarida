<?php 
    
    if ($this->session->userdata('mep') && $this->session->userdata('mep') == 'y') {
        redirect('jarida/firstLogin');
    }
    if ($this->session->userdata('user_id')) {
        $surname = $this->session->userdata('surname');
        $username = $this->session->userdata('username');
        $user_id = $this->session->userdata('user_id');
    } else {
        redirect('jarida/login');
    }
    
?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <link rel="stylesheet" href="<?php echo base_url();?>css/font.css">
        <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">-->
        <link href="<?php echo base_url();?>css/bayanno.css" media="screen" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>css/othercss.css" media="screen" rel="stylesheet" type="text/css">
        <!--[if lt IE 9]>
        <script src="http://joyonto.net/projects/hms/template/js/html5shiv.js" type="text/javascript"></script>
        <script src="http://joyonto.net/projects/hms/template/js/excanvas.js" type="text/javascript"></script>
        <![endif]-->
        <script src="<?php echo base_url();?>js/analytics.js" async></script>
        <script src="<?php echo base_url();?>js/bayanno.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>js/functions.js" type="text/javascript"></script>
        
        
                <title><?=$title?></title>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
</head>
<body>
    <div class="navbar navbar-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container-fluid">
            <a class="brand" href="#">Jarida Information Management System</a>
            <!-- the new toggle buttons -->
            <ul class="nav pull-right">
                <li class="toggle-primary-sidebar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-primary"><button type="button" class="btn btn-navbar"><i class="icon-th-list"></i></button></li>
                <li class="hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-top"><button type="button" class="btn btn-navbar"><i class="icon-align-justify"></i></button></li>
            </ul>
            <div class="nav-collapse nav-collapse-top collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">account <b class="caret"></b></a>
                    <!-- Account Selector -->
                    <ul class="dropdown-menu">
                        <li class="with-image">
                            <span><?php echo $username;?></span>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url();?>index.php/jarida/myProfile">
                                <i class="icon-user"></i><span>profile</span></a></li>
                        <li><a href="<?php echo base_url();?>index.php/jarida/doLogout">
                                <i class="icon-off"></i><span>logout</span></a></li>
                    </ul>
                    <!-- Account Selector -->
                    </li>
                </ul>
                <ul class="nav pull-right">
                    <li class="dropdown">
                    <a href="<?php echo base_url();?>index.php/jarida/dashboard"><i class="icon-user"></i>my panel </a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </div>