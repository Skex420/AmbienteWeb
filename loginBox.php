<form action="" method="post">
    <div class="container">
        <div class="col d-flexbox justify-content-center">
            <div class="card" style="margin-top: 250px;">
                <div class="card-body">
                    <div class="form-group">                            
                        <h5 class="card-title">Le Tech</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Inicio de sesión</h6>
                        <label for="txtUser">Usuario</label>
                        <input type="text" class="form-control" name="txtUser" id="txtUser" required oninvalid="this.setCustomValidity('El usuario es requerido')" oninput="setCustomValidity('')"/>
                        <label for="txtPassword">Contraseña</label>
                        <input type="password" class="form-control" name="txtPassword" id="txtPassword" required oninvalid="this.setCustomValidity('La contraseña es requerida')" oninput="setCustomValidity('')"/>
                    </div>
                    <div class="form-group justify-content-center">                            
                        <div class="row">
                            <div class="col">
                                <input type="submit" class="btn btn-dark" name="btnLogin" value="Iniciar sesión"/>
                                <a href="invitado.php" class="btn btn-info" name="btnInvitado" >Ingresar como invitado</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="Registration.php" name="RegistrationLink" >¿No tienes cuenta? Haz click aquí para registrarte.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>