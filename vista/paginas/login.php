<body class="fixed-left">

    <!-- Loader -->


    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="home-btn d-none d-sm-block">

    </div>
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">

                <div class="p-3">

                    <a href="index.html" class="logo-admin"><img src="<?php echo $url ?>vista/assets/images/dupont-logo.png" height="50" alt="logo"></a>
                    <div class="float-right text-right">
                        <h4 class="font-18 mt-3 m-b-5">Bienvenido</h4>
                        <p class="text-muted">Inicia sesión para entrar al sistema.</p>
                    </div>
                </div>

                <div class="p-3">

                    <form class="form-horizontal m-t-10" method="POST">

                        <div class="form-group">
                            <label for="usr_id">Usuario</label>
                            <input type="text" class="form-control" id="usr_id" placeholder="Identificador" name="usr_id">
                        </div>

                        <div class="form-group">
                            <label for="usr_clave">Contraseña</label>
                            <input type="password" class="form-control" id="usr_clave" placeholder="Contraseña" name="usr_clave">
                        </div>



                        <div>
                            <button class="btn btn-primary w-md waves-effect waves-light float-right" type="submit" name="btnAccederSistema">Iniciar sesión</button>
                        </div>



                        


                        <?php

                        $acceder = new UsuariosControlador();
                        $acceder->ctrAccederSistema();

                        ?>
                    </form>
                </div>

            </div>
        </div>



    </div>


</body>