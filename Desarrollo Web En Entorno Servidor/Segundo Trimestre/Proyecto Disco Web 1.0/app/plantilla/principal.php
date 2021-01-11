<!DOCTYPE html>
<html>
    
<head>
    <meta charset="UTF-8">
    <title>DISCO WEB</title>
    <link rel="icon" href="web/img/reddisk.png" type="image/x-icon"/>
    <link href="web/css/default.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="top-bar">
        <img src="web/img/reddisk.png" alt="Disco Web" class="logo-image">
        <div class="button-index">
            <input type="button" value="Iniciar Sesión" onClick='login();' class="button-class" id="login-account">
            <a href="index.php?orden=AltaUser"><input type="submit" value="Crear Cuenta" name="orden" class="button-class" id="create-account"></a>
        </div>
    </div>
    
    <?= $contenido ?>

    <script type="text/javascript" src="web/js/funciones.js"></script>
    <script type="text/javascript">
        // LOCAL FUNCTION, DON´T DELETE OR MOVE
        function volverInicio() {
            document.location.href = "index.php?orden=Inicio";
        }
    </script>

</body>

</html>