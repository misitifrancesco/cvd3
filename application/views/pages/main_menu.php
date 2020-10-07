<div>
    <?php

    //print_r($this->session->userdata('cvd_logged_in'));


    ?>
    <div id="div_benvenuto" style="font-size: 18px;padding:10px;">
        Benvenuto: <b><?php echo strtoupper($this->session->userdata('cvd_logged_in')['username']) ?></b>
    </div>

    <div id="div_container" class="container">
        <center><img src="<?php echo base_url() ?>/img/unita_<?php echo $this->session->userdata('cvd_logged_in')['id_fascia'] ?>.png"></center>

        <div id="div_riga1" class="row">
            <div class="col-3">
                <div class="col-3">
                    <button id="btn_documenti" type="button" class="btn btn-info" style="width: 200px;height:100px">
                        Documenti
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-file-richtext-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM7 4.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm-.861 1.542l1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V7.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V7s1.54-1.274 1.639-1.208zM5 9a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="col-3">
                <button id="btn_persone" type="button" class="btn btn-primary" style="width: 200px;height:100px" href="www.google.it">
                    Anagrafica
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-lines-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </button>

            </div>
            <div class="col-3">
                <div class="col-3">
                    <button id="btn_attivita" type="button" class="btn btn-warning" style="width: 200px;height:100px">
                        Attività
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-calendar-week" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="col-3">
                <div class="col-3">
                    <button id="btn_presenze" type="button" class="btn btn-info" style="width: 200px;height:100px">
                        Presenze
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-book" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1 2.828v9.923c.918-.35 2.107-.692 3.287-.81 1.094-.111 2.278-.039 3.213.492V2.687c-.654-.689-1.782-.886-3.112-.752-1.234.124-2.503.523-3.388.893zm7.5-.141v9.746c.935-.53 2.12-.603 3.213-.493 1.18.12 2.37.461 3.287.811V2.828c-.885-.37-2.154-.769-3.388-.893-1.33-.134-2.458.063-3.112.752zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                        </svg>
                    </button>
                </div>
            </div>


        </div>





    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $('#btn_persone').click(function() {
        window.location.href = '<?php echo site_url('persona/admin') ?>';
    })
    $('#btn_attivita').click(function() {
        window.location.href = '<?php echo site_url('attivita/admin') ?>';
    })
    $('#btn_presenze').click(function() {
        window.location.href = '<?php echo site_url('presenze/index') ?>';
    })
</script>