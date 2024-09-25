<form method="post" action="loginpaciente.php" id="loginForm">
   <img src="img/avatar.svg">
   <h2 class="title">BIENVENIDO</h2>
   <div class="input-div one">
      <div class="i">
         <i class="fas fa-user"></i>
      </div>
      <div class="div">
         <h5>Tipo de Identificación</h5>
         <select id="tipo_identificacion" name="tipo" required class="input">
            <option value="" disabled selected>Seleccionar tipo</option>
            <option value="registro_civil">Registro civil</option>
            <option value="tarjeta_identidad">Tarjeta de identidad</option>
            <option value="pasaporte">Pasaporte</option>
            <option value="nit">Nit</option>
            <option value="carnet_diplomatico">Carnet diplomático</option>
            <option value="cedula_ciudadania">Cédula de ciudadanía</option>
            <option value="cedula_extranjeria">Cédula de extranjería</option>
            <option value="adulto_sin_identificacion">Adulto sin identificación</option>
            <option value="menor_sin_identificacion">Menor sin identificación</option>
            <option value="certificado_nacido_vivo">Certificado de nacido vivo</option>
            <option value="salvoconducto">Salvoconducto</option>
            <option value="numero_unico_identificacion">Número único de identificación</option>
            <option value="permiso_especial_permanencia">Permiso especial de permanencia</option>
            <option value="residente_especial_paz">Residente especial para la paz</option>
            <option value="permiso_proteccion_temporal">Permiso por protección temporal</option>
            <option value="documento_extranjero">Documento extranjero</option>
         </select>
      </div>
   </div>
   <div class="input-div one">
      <div class="i">
         <i class="fas fa-user"></i>
      </div>
      <div class="div">
         <h5>Número de Identificación</h5>
         <input id="identificacion" type="number" class="input" name="identificacion" required>
      </div>
   </div>
   <div class="input-div pass">
      <div class="i">
         <i class="fas fa-lock"></i>
      </div>
      <div class="div">
         <h5>Fecha de Nacimiento</h5>
         <input type="date" id="fecha_nacimiento" class="input" name="fecha_nacimiento" required>
      </div>
   </div>
   <input name="btningresar" class="btn" type="submit" value="INICIAR SESION">
   <script src="js/validation.js"></script>

</form>