<!DOCTYPE html>
<html lang="en">
<head>

	<link rel="stylesheet" href="<?php echo base_url() ?>css/normalize.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/jquery-ui.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>css/main.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/colorbox.css" type="text/css"/>
    <script src="<?php echo base_url() ?>js/libs/modernizr-2.6.1-respond-1.1.0.min.js"></script>
	<meta charset="utf-8">
	<title>Welcome to booking system</title>
</head>
<body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
        <div id="wrapper">
            <!-- Start Header -->
            <header>
                <a href="#" class="logo">Bosz<span>Book</span></a>
                <form>
                    <input type="text"/>
                    <button class="cta">Search</button>
                </form>
                <a href="#" id="createProject" class="cta">Create a project</a>
                <ul class="nav">
                    <li><a href="<?php echo base_url() ?>" class="active">Dashboard</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="<?php echo base_url() ?>reservation/all">My Reservations</a></li>
                    <li><a href="<?php echo base_url()?>auth/logout">Logout</a></li>
                </ul>
            </header>