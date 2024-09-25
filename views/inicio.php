<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0 md:max-w-4xl">
            <div class="flex flex-col justify-center p-8 md:p-14">
                <div class="flex items-center justify-center">
                    <img src="./assets/images/logo.png" alt="" width="150px">
                </div>
                <span class="mb-3 text-4xl font-bold text-center">Bienvenido a XLab</span>
                <span class="font-light text-gray-400 mb-8 text-center">
                    Inicia sesión para ver los resultados de tus órdenes
                </span>
                <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="../controller/ControladorLogin.php" method="POST">
                        <?php
                        include("../controller/ControladorLogin.php");
                        include("../modelo/conexion.php");
                        ?>
                        <div>
                            <label for="tipo_identificacion" class="block text-sm font-medium leading-6 text-gray-900">Tipo de Identificación</label>
                            <select id="tipo_identificacion" name="tipo" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-3">
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
                        <div>
                            <label for="identificacion" class="block text-sm font-medium leading-6 text-gray-900">Número de Identificación</label>
                            <input type="text" name="identificacion" id="identificacion" placeholder="Número de Identificación" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-3">
                        </div>
                        <div>
                            <label for="fecha_nacimiento" class="block text-sm font-medium leading-6 text-gray-900">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-3">
                        </div>
                        <div>
                            <button class="w-full border bg-black text-white p-2 rounded-lg mb-6 hover:bg-white hover:text-black hover:border hover:border-gray-300" name="btningresar" type="submit">
                                Ingresar
                            </button>
                        </div>
                    </form>
            </div>
        </div>
        <div class="relative">
            <img src="../img/3180660.jpg" alt="img" class="w-full h-full object-cover rounded-r-2xl md:block">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>