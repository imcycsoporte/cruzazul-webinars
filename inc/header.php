<?php
session_start();
$email = $_SESSION['email'];
//echo $_SERVER['DOCUMENT_ROOT'];
require $_SERVER['DOCUMENT_ROOT'].'/api/usuario.php'; 
?>
<!-- Header -->
<header class="page-header variant-2 sticky smart" style="width: 100%;
    padding: 0;
    margin: 0;
    left: 0;
    margin-left: 0;">
    <div class="navbar">
        <div class="container-fluid">
            <!-- Menu Toggle -->
            <div class="menu-toggle"><a href="#" class="mobilemenu-toggle"><i class="icon icon-menu"></i></a></div>

            <!-- /Menu Toggle -->
            <!-- Header Cart -->

            <!-- /Header Cart -->
            <!-- Header Links -->
            <div class="header-links">
                <!-- Header Account -->
                <div class="header-link dropdown-link header-account">
                    <a href="#"><span class="lnr lnr-user"></span></a>
                    <div class="dropdown-container right">
                        <?php
                            if(!$email){
                        ?>
                        <div class="title">Usuarios Registrados</div>
                        <div class="top-text">Si ya cuenta con un usuario ingrese sus datos.</div>
                        <a href="index.php" class="btn" style="width: 100%;margin-bottom: 5px;">Ingresar</a>
                        <!-- <a href="registro.php" class="btn" style="width: 100%;">Nueva Cuenta</a>-->
                        <!-- form -->
                        <!--
                        <form action="#">
                            <input type="text" class="form-control" placeholder="E-mail*">
                            <input type="text" class="form-control" placeholder="Contraseña*">
                            <button type="submit" class="btn">Ingresar</button>
                        </form>
                        <!-- /form
                        <div class="title">O</div>
                        <div class="bottom-text">Crear <a href="registro.php">Nueva Cuenta</a></div>
                        -->
                        <?php
                            }else{
                                echo '<div class="title">Usuario Registrado</div>';
                                echo '<p style="text-align:center;">'.$email.'</p>';
                                echo '<a href="logout.php" class="btn" style="width:100%;">SALIR</a>';
                        ?>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <!-- /Header Account -->
            </div>
            <!-- /Header Links -->
            <!-- Header Search -->
            <?php
                if($email){
            ?>
            <div class="header-link header-search header-search">
                <div class="exp-search">
                    <form>
                        <input class="exp-search-input " placeholder="Buscar aquí..." type="text" value="">
                        <input class="exp-search-submit" type="submit" value="">
                        <span class="exp-icon-search"><span class="lnr lnr-magnifier"></span></span>
                        <span class="exp-search-close"><span class="lnr lnr-cross"></span></span>
                    </form>
                </div>
            </div>
            <?php
                }else{
            ?>
            <?php
                }
            ?>
            
            <!-- /Header Search -->
            <!-- Logo -->
            <div class="header-logo">
                <?php
                if($_SESSION['email']){
                ?>
                    <a href="https://cruzazul.webinarsenconcreto.com/categoria.php" title="WEBINARS EN CONCRET0" class="retorno">
                        <img src="https://cruzazul.webinarsenconcreto.com/images/logo.svg" alt="Instituto Mexicano del Cemento y del Concreto A.C." style="width: 150px;margin-left: -10px;" />
                    </a>
                <?php
                }else{
                ?>
                    <a href="https://cruzazul.webinarsenconcreto.com/" title="WEBINARS EN CONCRET0">
                        <img src="https://cruzazul.webinarsenconcreto.com/images/logo.svg" alt="Instituto Mexicano del Cemento y del Concreto A.C." style="width: 150px;padding: 10px;" />
                    </a>
                <?php
                }
                ?>
            </div>
            <!-- /Logo -->
            
            
        </div>
        
        
    </div>

</header>
<!-- /Header -->

