<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>

        <?php endforeach; ?>

        <style type='text/css'>
            body
            {
                font-family: Arial;
                font-size: 14px;
            }
            a {
                color: blue;
                text-decoration: none;
                font-size: 14px;
            }
            a:hover
            {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <!-- Header -->
        <div>
            <a href='<?php echo site_url('persona/admin') ?>'>Persona</a> | 
            <a href='<?php echo site_url('gruppi/admin') ?>'>Gruppi</a> |
            <a href='<?php echo site_url('documenti/admin') ?>'>Documenti</a> |
        </div>
        <!-- End of header-->
        <!-- Main -->
        <div style='height:20px;'></div>  
        <div>
            <?php echo $output; ?>
        </div>
        <!-- End of Main-->
        <!-- Footer -->
        <div><?php echo $mio_parametro?></div>
        <!-- End of Footer -->
    </body>
</html>