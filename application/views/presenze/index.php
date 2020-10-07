<html>

<head>
    <title>COndiVIDo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: goldenrod;
            color: white;
            text-align: center;
            height: 25px;
        }
    </style>
</head>

<script type="text/javascript">
    var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,',
            template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>',
            base64 = function(s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            },
            format = function(s, c) {
                return s.replace(/{(\w+)}/g, function(m, p) {
                    return c[p];
                })
            }
        return function(table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {
                worksheet: name || 'Worksheet',
                table: table.innerHTML
            }
            window.location.href = uri + base64(format(template, ctx))
        }
    })()
</script>


<body>
    <div style="padding:10px">
        <h2><?php echo $titolo_pagina ?></h2>
    </div>

    <div class="container">
        <?php echo form_open('presenze/insert'); ?>

        <div class="table-responsive-sm">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Gruppo</td>
                        <td><select class="custom-select select_admin" name="select_gruppo" id="select_gruppo">

                                <?php foreach ($array_gruppi as $key => $gruppo) { ?>
                                    <option value="<?php echo $gruppo->id_gruppo; ?>"><?php echo $gruppo->descrizione; ?></option>
                                <?php } ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Unità</td>
                        <td><select class="custom-select select_admin" name="select_fasciaeta" id="select_fasciaeta">

                                <?php foreach ($array_fasciaeta as $key => $fascia) { ?>
                                    <option value="<?php echo $fascia->id_fascia; ?>"><?php echo $fascia->descrizione . ' - ' . $fascia->fascia ?> </option>
                                <?php } ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Attività</td>
                        <td>
                            <div id="div_select_attivita"><select class="custom-select" name="select_attivita" id="select_attivita">

                                    <?php foreach ($array_attivita as $key => $attivita) { ?>
                                        <option value="<?php echo $attivita->id_attivita; ?>" <?php if ($id_attivita == $attivita->id_attivita) echo ' selected="selected" ' ?>><?php echo $attivita->descrizione; ?></option>
                                    <?php } ?>
                                </select></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Partecipante</td>
                        <td><select class="custom-select" multiple name="select_persone[]">
                                <?php foreach ($array_persone as $key => $persona) { ?>
                                    <option value="<?php echo $persona->id_persona; ?>"><?php echo $persona->nome; ?> - <?php echo $persona->cognome; ?></option>
                                <?php } ?>
                            </select></td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Salva" class="btn btn-outline-primary">
        </div>
        </form>
        <div class="div_logger">
            <?php echo $error_log; ?>
        </div>

        <!--div id="div_nome_attivita">
        </div-->

        <div id="div_esporta_excel" style="float:right;padding:20px;">
            <button type="button" class="btn btn-outline-success" onclick="tableToExcel('mine_table', 'W3C Example Table')">
                Esporta in excel <img src="<?php base_url() ?>/cvd3/img/excel_ico.png" style="width:30px"></img>

            </button>

        </div>

        <div class="container">
            <div class="table-responsive-sm">

                <table class="table" id="mine_table">

                    <thead>

                        <tr>
                            <th id="th_nome_attivita" colspan="3"></th>
                        </tr>
                        <tr>
                            <th>Nome</th>
                            <th>Cognome</th>
                            <th>Data di Nascita</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($array_presenze as $key => $presenze) { ?>
                            <tr>
                                <td><?php echo $presenze->nome ?></td>
                                <td><?php echo $presenze->cognome ?></td>
                                <td><?php echo $presenze->data_nasc ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>


    <script src="/cvd3/assets/js/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script>
        /*
        function aggiornaTabellaPresenze(id_attivita) {

            $.ajax({
                type: "GET",
                url: '<?php base_url() ?>/cvd3/index.php/presenze/visualizza_tabella_presenze/' + id_attivita,
                success: function(res) {
                    $('#div_presenze').html(res);
                    console.log(res);
                    //alert(res);

                },
                error: function(resx) {
                    console.log(resx);
                    //alert(resx);
                }
            });

        }
        */
        //loadTable('mine_table', '<?php echo base_url() ?>index.php/presenze/lista_presenze_json/'+id_attivita);

        $('.select_admin').change(function() {
            aggiornaSelectAttivita($('#select_gruppo').val(), $('#select_fasciaeta').val())
        })


        //        $('#select_attivita').change(function() {
        $(document).on('change', '#select_attivita', function() {

            let id_attivita = $(this).val();
            //alert(id_attivita);
            //aggiornaTabellaPresenze(id_attivita);
            loadTable('mine_table', '<?php echo base_url() ?>index.php/presenze/lista_presenze_json/' + id_attivita)
            aggiornanomeattivita(id_attivita);
        })

        function aggiornaSelectAttivita(id_gruppo, id_fasciaeta) {
            $.ajax({
                type: "GET",
                url: '<?php base_url() ?>/cvd3/index.php/presenze/get_select_attivita/' + id_gruppo + '/' + id_fasciaeta,
                success: function(res) {
                    //console.log(res);
                    $('#div_select_attivita').html(res);
                    //alert(res);


                },
                error: function(resx) {
                    console.log(resx);
                    //alert(resx);
                }
            });
        }

        function aggiornanomeattivita(id_attivita) {
            $.ajax({
                type: "GET",
                url: '<?php base_url() ?>/cvd3/index.php/presenze/get_info_attivita/' + id_attivita,
                success: function(res) {
                    let info = JSON.parse(res);
                    let testo = '<h4>' + info.descrizione + ' del ' + info.data_att + '<h4>';
                    $('#th_nome_attivita').html(testo);
                    //console.log(res);
                    //alert(res);

                },
                error: function(resx) {
                    console.log(resx);
                    //alert(resx);
                }
            });
        }
    </script>
</body>

</html>