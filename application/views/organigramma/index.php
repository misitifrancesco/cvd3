<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <style type='text/css'>
        body {
            font-family: Arial;
            font-size: 14px;
        }

        a {
            color: blue;
            text-decoration: none;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }

        #table_organigramma td{
            padding: 5px;
        }
    </style>
</head>

<body>
    <h1><?php echo $titolo_pagina ?></h1>
    <!-- Header -->
    <div>

    </div>
    <!-- End of header-->
    <!-- Main -->
    <div style='height:20px;'></div>
    <div>
        <?php echo $output; ?>
    </div>
    <!-- End of Main-->

</body>

</html>