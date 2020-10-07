<html>

<head>
    <title>COndiVIDo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <!--link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/cvd_theme.css"-->
</head>
<?php $session = $this->session->userdata('cvd_logged_in'); ?>
<?php //print_r($session); 
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo site_url('login/log') ?>">COndiVIDo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('persona/admin') ?>">Anagrafica</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('documenti/admin') ?>">Documenti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('attivita/admin') ?>">Attività</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('presenze/index') ?>">Presenze</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('organigramma/index') ?>">Organigramma</a>
                </li>

                <?php if ($session['livello'] == '100') { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('gruppi/admin') ?>">Gruppi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('fasciaeta/admin') ?>">Unità</a>
                    </li>
                <?php } ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('login/logout') ?>">Disconnetti</a>
                </li>

            </ul>
            <!--form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form-->
        </div>
    </nav>
    <!-- Image and text -->