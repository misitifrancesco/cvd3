<html>

    <head>
        <title>COndiVIDo</title>
        <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"-->
    </head>

    <body>
        <!-- Image and text -->
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">

                COndiVIDo
            </a>
        </nav>
        <h3><?php echo $title; ?></h3>
        <a href='<?php echo site_url('login/logout') ?>'>disconnetti</a> |
        <a href='<?php echo site_url('persona/admin') ?>'>Persona</a> | 
        <a href='<?php echo site_url('gruppi/admin') ?>'>Gruppi</a> |
        <a href='<?php echo site_url('documenti/admin') ?>'>Documenti</a> |
        <a href='<?php echo site_url('fasciaeta/admin') ?>'>Fasce Età</a> |
        <a href='<?php echo site_url('attivita/admin') ?>'>Attività</a> |





