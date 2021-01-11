<?php 
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();
?>

<div class="log-in" id="log-in-id">
    <form name='ACCESO' method="POST" action="index.php" id="log-in-form">
        <div class="log-in-text">
            Usuario
        </div>
        <input type="text" name="user" value="<?= $user ?>">
        <div class="log-in-text">
            Contraseña
        </div>
        <input type="password" name="clave" value="<?= $clave ?>">
        <div id="aviso">
	        <b><?= (isset($msg))?$msg:""; ?></b>
        </div>
        <div>
            <a href="index.php" class="forgotten-psw">¿Has olvidado tu contraseña?</a>
        </div>
        <input type="submit" name="orden" value="Iniciar Sesión" id="login-session">
    </form>
</div>

<div class="welcome-app">
    <div class="disco-web">DISCO WEB</div>
    <div class="intro-mid-text">
        El almacenamiento web definitivo con planes adaptados a tus necesidades </br>
        Crea una cuenta <b>GRATIS</b>* ahora </br>
        <a href="index.php?orden=AltaUser"><input type="submit" name="orden" value="CREAR CUENTA GRATIS" class="button-register-mid"></a>
    </div>
    <div class="welcome-app-grid">
        <div class="welcome-app-grid-content">El almacenamiento <b>GRATUITO</b>* definitivo</div>
        <div class="welcome-app-grid-content"><img src="web/img/server.png" alt="Welcome Image" class="welcome-image-grid"></div>
        <div class="welcome-app-grid-content"><img src="web/img/shield.png" alt="Welcome Image" class="welcome-image-grid"></div>
        <div class="welcome-app-grid-content">Tus archivos estarán <b>SEGUROS</b></div>
        <div class="welcome-app-grid-content"><b>COMPARTE</b> tus archivos con quien quieras</div>
        <div class="welcome-app-grid-content"><img src="web/img/share.png" alt="Welcome Image" class="welcome-image-grid"></div>
        <div class="welcome-app-grid-content"><img src="web/img/hosting.png" alt="Welcome Image" class="welcome-image-grid"></div>
        <div class="welcome-app-grid-content"><b>ACCESIBLE</b> desde cualquier sitio</div>
        <div class="welcome-app-grid-content"><b>TRANSFIERE</b>** datos en cualquier momento</div>
        <div class="welcome-app-grid-content"><img src="web/img/bluesave.png" alt="Welcome Image" class="welcome-image-grid"></div>
    </div>
</div>

<div class="welcome-app-footer">
    <div class="welcome-app-footer-grid">
        <div><img src="web/img/reddisk.png" alt="Disco Web" style="max-width: 200px;">
            <div style="font-size: 40px; font-weight: 700; margin-top: 20px;">DISCO WEB</div>
            <div style="font-size: 15px; font-weight: 500; margin-bottom: 20px;">ALMACENAMIENTO EN LA NUBE</div>
            <div style="font-size: 15px;">&copy DISCO WEB TODOS LOS DERECHOS RESERVADOS</div>
        </div>
    </div>
    <div class="welcome-app-footer-references">
        * PLAN BÁSICO GRATUITO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ** REQUIERE CONEXIÓN A INTERNET Y UN NAVEGADOR
        </br>
    </div>
</div>

<?php 
    // Vacio el bufer y lo copio a contenido
    // Para que se muestre en div de contenido
    $contenido = ob_get_clean();
    include_once "principal.php";
?>