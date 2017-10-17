<html>

    <head>

        <title>Seguconsul</title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

        <link href='css/contact.css' rel='stylesheet' type='text/css'>

    </head>

    <body>



        <div class="container">



            <div class="row">



                <div class="col-lg-8 col-lg-offset-2">



                    <h1>Vida</h1>



                    <p class="lead">Un Seguro que ampara la Educación, Manutención de los seres queridos, Deudas, Impuestos, entre otros gastos… Al mejor Costo-Beneficio.</p>

						

						<p>¿Qué es un Seguro de Vida?</p> 

                        <?php
                        if(isset($_GET['msg']) and $_GET['msg']=='success') {
                        ?>
                        <div class="col-lg-12 col-sm-12 col-md-12">
                            <div class="alert alert-success">
                                <strong>Su datos fueron enviados correctamente, gracias por su tiempo, le estaremos contactando.</strong>
                            </div>
                        </div>
                        <?php
                        }
                        ?>

						<iframe width="854" height="480" src="https://www.youtube.com/embed/8iQG0_kp3HQ?autoplay=1" frameborder="0" allowfullscreen></iframe>

						

                        <form id="contact-form" method="post" action="contact.php" role="form">



                        <div class="messages"></div>



                        <div class="controls">



                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="form_name">Nombre *</label>

                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Ingrese su nombre *" required="required" data-error="Firstname is required.">

                                        <div class="help-block with-errors"></div>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="form_lastname">Apellido *</label>

                                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Ingrese su apellido *" required="required" data-error="Lastname is required.">

                                        <div class="help-block with-errors"></div>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="form_email">Email *</label>

                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Ingrese su email *" required="required" data-error="Valid email is required.">

                                        <div class="help-block with-errors"></div>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="form_phone">Teléfono</label>

                                        <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Ingrese su número telefónico">

                                        <div class="help-block with-errors"></div>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="form_message">Mensaje *</label>

                                        <textarea id="form_message" name="message" class="form-control" placeholder="Mensaje *" rows="4" required="required" data-error="Please,leave us a message."></textarea>

                                        <div class="help-block with-errors"></div>

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <input type="submit" class="btn btn-success btn-send" value="Enviar mensaje">

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <p class="text-muted"><strong>*</strong>Estos campos son requeridos</p>

                                </div>

                            </div>

                        </div>



                    </form>



                </div><!-- /.8 -->



            </div> <!-- /.row-->



        </div> <!-- /.container-->



        <script src="js/jquery.js"></script>

        <script src="js/bootstrap.min.js"></script>

        <script src="js/validator.js"></script>

        <script src="js/contact.js"></script>

    </body>

</html>

