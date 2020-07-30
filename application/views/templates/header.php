<html>

<head>
    <title>COndiVIDo</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/cvd_theme.css">
</head>

<body>
    <!-- Image and text -->
    <div class="navbar navbar-light bg-light">
        <div class="navbar-logo" href="#">
            COndiVIDo
        </div>
        
        <div class="navbar-item">
            <a href='<?php echo site_url('persona/admin') ?>'>Persona</a>
        </div>
        <div class="navbar-item">
            <a href='<?php echo site_url('gruppi/admin') ?>'>Gruppi</a>
        </div>
        <div class="navbar-item">
            <a href='<?php echo site_url('fasciaeta/admin') ?>'>Fasce Età</a>
        </div>
        <div class="navbar-item">
        <a href='<?php echo site_url('attivita/admin') ?>'>Attività</a> 
        </div>
        <div style="float:right">
            <a href='<?php echo site_url('login/logout') ?>'>disconnetti</a> 
        </div>
        <div style="clear:both"></div>
    </div>
    
    <h3><?php echo $title; ?></h3>
    
     
    
     