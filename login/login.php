<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login y Resistro</title>
    <link rel="stylesheet" href="estilos.css">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/logo.png">
</head>
//comooooo esta el ingeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
//dale barronski como andas ehhhhhhhhhhhhhhhhhhhhhhhh
//no se me agüiteeeeeeeeeeeeeeeeee

<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Estás Registrado?</h3>
                    <p>Ingresa al Sistema</p>
                    <button id="btn__iniciar-sesion">Ingresar</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no estás Registrado?</h3>
                    <p>Regístrate en el Sistema</p>
                    <button id="btn__registrarse">Registrar</button>
                </div>
            </div>

            <div class="contenedor__login-register">
                <form action="php/login_usuario_be.php" method="POST" class="formulario__login">
                    <h2>Ingresar</h2>
                    <input type="text" placeholder="Usuario" name="user">
                    <input type="password" placeholder="Contraseña" name="contra">
                    <button>Ingresar</button>
                </form>

                <form action="php\registro_usuarios_be.php" method="POST" class="formulario__register">
                    <h2>Registro</h2>
                    <input type="text" placeholder="Usuario" name="user">
                    <input type="password" placeholder="Crea una Contraseña" name="contra">
                    <label for="rol">Rol:</label>
                    <select id="rol" name="rol">
                        <option value="abogado">Abogado</option>
                        <option value="secretario">Secretario</option>
                    </select>

                    <br><br>
                    <button>Registrar</button>
                </form>

            </div>
        </div>
    </main>


    <script src="script.js" async defer></script>
</body>

</html>