<?php

require '../recursos/bd.php';

$message = '';

if (!empty($_POST['nombre']) && !empty($_POST['apellidop']) && !empty($_POST['apellidom']) && !empty($_POST['edad']) && !empty($_POST['correo']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO usuarios (nombre, apellidop, apellidom, edad, correo, password) VALUES (:nombre, :apellidop, :apellidom, :edad, :correo, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':apellidop', $_POST['apellidop']);
    $stmt->bindParam(':apellidom', $_POST['apellidom']);
    $stmt->bindParam(':edad', $_POST['edad']);
    $stmt->bindParam(':correo', $_POST['correo']);
    $stmt->bindParam(':password', $_POST['password']);

    if ($stmt->execute()) {
        $message = 'Usario nuevo creado correctamente';
    } else {
        $message = 'Lo sentimos, ocurrio un problema al crear tu cuenta.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Registro</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>



    <main>

        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <?php if (!empty($message)) : ?>
                                            <p> <?= $message ?></p>
                                        <?php endif; ?>
                                        <h5 class="card-title text-center pb-0 fs-4">Registro de cuenta </h5>
                                        <p class="text-center small">Ingrese su información personal</p>
                                    </div>

                                    <form action="registro.php" method="POST" class="row g-3 needs-validation">
                                        <div class="col-12">
                                            <label class="form-label">Nombres: </label>
                                            <input type="text" name="nombre" class="form-control" placeholder="Ingresa tu Nombre">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Apellido Paterno: </label>
                                            <input type="text" name="apellidop" class="form-control" placeholder="Ingresa tu Apellido">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Apellido Materno: </label>
                                            <input type="text" name="apellidom" class="form-control" placeholder="Ingresa tu Apellido">
                                        </div>


                                        <div class="col-12">
                                            <label class="col-sm-12 col-form-label">Edad: </label>
                                            <input type="text" name="edad" class="form-control" placeholder="Ingresa tu Edad">
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Correo: </label>
                                            <input type="text" name="correo" class="form-control" placeholder="Ingresa tu Correo">
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Contraseña</label>
                                            <input name="password" type="password" class="form-control" placeholder="Ingresa tu Contraseña">
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">Acepto los <a href="#">terminos y condiciones</a></label>
                                                <div class="invalid-feedback">Debes aceptar los terminos y condiciones.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Registrarse</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">¿Ya tienes una cuenta? <a href="../paginas/login.php">Inicia Sesion</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>


</body>

</html>
