
<html>

<head>
    <title>COndiVIDo</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/cvd_theme.css">
</head>

<body>
    <!-- Image and text -->
    <?php $session = $this->session->userdata('cvd_logged_in'); ?>
    <div class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #f8f9fa!important">
        <div class="navbar-logo">
            <a style="font-size:18px;color:black!important;" href="<?php echo site_url('login/log') ?>"> COndiVIDo </a>
        </div>

        <div class="navbar-item btn_menu">
            <a href='<?php echo site_url('persona/admin') ?>'>Anagrafica</a>
        </div>

        <div class="navbar-item btn_menu">
            <a href='<?php echo site_url('documenti/admin') ?>'>Documenti</a>
        </div>
        <div class="navbar-item btn_menu">
            <a href='<?php echo site_url('attivita/admin') ?>'>Attività</a>
        </div>
        <div class="navbar-item btn_menu">
            <a href='<?php echo site_url('presenze/index') ?>'>Presenze</a>
        </div>
        <div class="navbar-item btn_menu">
            <a href='<?php echo site_url('organigramma/index') ?>'>Organigramma</a>
        </div>
        <?php if ($session['livello'] == '100') { ?>
            <div class="navbar-item btn_menu">
                <a href='<?php echo site_url('gruppi/admin') ?>'>Gruppi</a>
            </div>
            <div class="navbar-item btn_menu">
                <a href='<?php echo site_url('fasciaeta/admin') ?>'>Unità</a>
            </div>
        <?php } ?>
        <div class="btn_menu" style="float:right">
            <a href='<?php echo site_url('login/logout') ?>'>Disconnetti</a>
        </div>
        <div style="clear:both"></div>
    </div>

    <h3><?php echo $title; ?></h3>