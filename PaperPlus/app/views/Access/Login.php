    <link rel="stylesheet" href="app/CSS/styles.css">
    <div class="content-inicio">
        <h4>Iniciar Sesión</h4>
        <div class="Usuario-img">
            <img src="app/img/6073873.png" alt="#">
        </div>
        <form action="/PaperPlus/?C=User_Controller&M=Login" method="post">
            <input class="control" type="text" name="User" id="UserN" placeholder="Usuario" required maxlength="12">
            <input class="control" type="password" placeholder="Contraseña" name="psswd" id="psswd1" required>
            <input class="inicio-login" type="submit" value="Iniciar">
            <p><a href="/PaperPlus/?C=User_Controller&M=RegCliview">¿No tienes una cuenta? Regístrate</a></p>
        </form>
    </div>

