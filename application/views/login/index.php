<html>

    <head>
        <title>COndiVIDo</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">


            <center>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">COndiVIDo</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Agesci</h6>


                        <?php echo form_open('login/log'); ?>

                        <label for="input_username">Username</label>
                        <input type="text" name="input_username" /><br />

                        <label for="input_password">Password</label>
                        <input type="password" name="input_password" /><br />


                        <input type="submit" class="btn btn-primary" name="submit" value="Login" />
                        </form>
                        <?php echo validation_errors(); ?>
                    </div>
                </div>
            </center>

        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>

</html>