<?php

// Formulario

$nombre = $email = $consulta = $telefono = $mensaje = "";
$enviadoConExito = false;
$errores = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar nombre
    if (empty($_POST['name'])) {
        $errores[] = "El campo 'Nombre' es obligatorio.";
    } else {
        $nombre = htmlspecialchars($_POST['name']);
    }

    // Validar email
    if (empty($_POST['email'])) {
        $errores[] = "El campo 'Email' es obligatorio.";
    } else {
        $email = htmlspecialchars($_POST['email']);
    }

    // Validar consulta
    if (empty($_POST['consulta'])) {
        $errores[] = "Debe seleccionar un tipo de consulta.";
    } else {
        $consulta = $_POST['consulta'];
    }

    // teléfono y mensaje (opcionales)
    $telefono = !empty($_POST['phone']) ? htmlspecialchars($_POST['phone']) : 'No proporcionado';
    $mensaje = !empty($_POST['message']) ? htmlspecialchars($_POST['message']) : '-';

    // errores
    if (empty($errores)) {
        $enviadoConExito = true;

        // Convertir consulta a una descripción
        switch ($consulta) {
            case '1':
                $consulta = 'Consulta por productos';
                break;
            case '2':
                $consulta = 'Venta por mayor';
                break;
            case '3':
                $consulta = 'Otros';
                break;
        }
    }
}
?>
<section class="p-2">
    <div class="container">
        <div class="title-container" data-store="page-title">
            <ul class="breadcrumb list-inline m-5">
                <li><a class="breadcrumb-crumb" href="index.php" title="Boba -Pasteleria"> Home </a></li>
                <li><span class="breadcrumb-divider">&gt;</span> <span class="breadcrumb-crumb"><strong> Contacto </strong></span></li>
            </ul>
            <h1 class="title pb-3"> Contacto</h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2 class="h4 pb-3">Te dejamos todas nuestras opciones de contacto</h2>
                <p class="m-bottom pb-3">Te esperamos de Lunes a Sabados de 8 a 20 y Domingos de 8 a 15hs</p>
                <ul class="contact-info list-unstyled pb-3">
                    <li class="m-bottom pb-3"><img class="py-2 " src="img/iconos/telefono.png" alt="telefono"> 117778200 </li>
                    <li class="m-bottom pb-3"><img class="py-2 " src="img/iconos/email.png" alt="email-1610"> <a href="mailto:1610cooperativa@hotmail.com"> 1610cooperativa@hotmail.com</a></li>
                    <li class="m-bottom pb-3"><img class="py-2 " src="img/iconos/alfiler.png" alt="direccion"> C. 1610, B1888 La Capilla, Provincia de Buenos Aires </li>
                </ul>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3272.067992805337!2d-58.26939422424652!3d-34.90474317284791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a2d688508c540f%3A0x6d574dde20536c40!2sAsociaci%C3%B3n%20de%20Productores%20Hort%C3%ADcolas%20de%20la%201610!5e0!3m2!1ses!2sar!4v1743798712952!5m2!1ses!2sar" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>


            <div class="col-md-6 my-5">
                <div class="container">

                    <?php if ($enviadoConExito): ?>
                        <div class="alert alert-success" role="alert">
                            ¡Enviado con éxito!
                        </div>

                        <h2>Resumen de la información enviada</h2>
                        <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
                        <p><strong>Email:</strong> <?php echo $email; ?></p>
                        <p><strong>Consulta:</strong> <?php echo $consulta; ?></p>
                        <p><strong>Teléfono:</strong> <?php echo $telefono; ?></p>
                        <p><strong>Mensaje:</strong> <?php echo $mensaje; ?></p>
                        <form action="" method="get">
                            <button type="submit" class="btn btn-secondary mt-3">Volver a Home</button>
                        </form>

                    <?php else: ?>
                        <?php if (!empty($errores)): ?>
                            <div class="alert alert-danger">
                                <?php foreach ($errores as $error): ?>
                                    <p><?php echo $error; ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <form class="contact-form" method="post" action="#">
                            <div class="form-group pb-3">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
                            </div>
                            <div class="form-group pb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                            </div>
                            <div class="form-group pb-3">
                                <label for="consulta">Consulta:</label>
                                <select id="consulta" name="consulta" class="form-select" aria-label="Default select example">
                                    <option value="" disabled selected>Seleccionar</option>
                                    <option value="1" <?php echo ($consulta == '1') ? 'selected' : ''; ?>>Consulta por productos</option>
                                    <option value="2" <?php echo ($consulta == '2') ? 'selected' : ''; ?>>Venta por mayor</option>
                                    <option value="3" <?php echo ($consulta == '3') ? 'selected' : ''; ?>>Otros</option>
                                </select>
                            </div>
                            <div class="form-group pb-3">
                                <label for="telefono">Teléfono (Opcional):</label>
                                <input type="number" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
                            </div>
                            <div class="form-group pb-3">
                                <label for="mensaje">Mensaje (Opcional):</label>
                                <textarea id="mensaje" name="mensaje" class="form-control" rows="7"><?php echo $mensaje; ?></textarea>
                            </div>
                            <input type="submit" class="btn btn-secondary full-width-xs pull-right" value="Enviar" name="contact">
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</section>