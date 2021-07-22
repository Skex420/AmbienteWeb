<form action="" method="post">
    <div class="container">
        <div class="col d-flexbox justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">                            
                        <h5 class="card-title">Le Tech</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Inicio de sesión</h6>
                        <label for="txtUser">Usuario</label>
                        <input type="text" class="form-control" name="txtUser" id="txtUser" required oninvalid="this.setCustomValidity('El usuario es requerido')" oninput="setCustomValidity('')"/>
                        <label for="txtPassword">Contraseña</label>
                        <input type="password" class="form-control" name="txtPassword" id="txtPassword" required oninvalid="this.setCustomValidity('La contraseña es requerida')" oninput="setCustomValidity('')"/>
                    </div>
                    <div class="form-group">                            
                        <input type="submit" class="btn btn-dark" name="btnLogin" value="Iniciar sesión"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>