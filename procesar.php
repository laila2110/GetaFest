<?php
include 'header.html';
if (!isset($_POST["nombre"])) {

    echo "<div class='contenedor'>";
    echo "<h2>Acceso no permitido</h2>";
    echo "<p>Debes entrar desde el formulario.</p>";
    echo "</div>";

    exit;
}
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$edad = $_POST["edad"];
$entrada = $_POST["entrada"];

if (isset($_POST["dias"])) {
    $dias = $_POST["dias"];
} else {
    $dias = array();
}

$pago = $_POST["pago"];
$observaciones = $_POST["observaciones"];

if ($edad < 18) {

    echo '<div class="contenedor">';

    echo '<div class="error">';
    echo '<h2>Acceso denegado</h2>';
    echo '<p>Lo sentimos, getafeFest es un evento exclusivo para mayores de 18 años.</p>';
    echo '</div>';

    echo '</div>';

    exit;
}

if ($entrada == "General") {

    $precioBase = 50;

} elseif ($entrada == "VIP") {

    $precioBase = 120;

} elseif ($entrada == "Super VIP") {

    $precioBase = 180;
}

$suplementoDias = count($dias) * 10;

$precioTotal = $precioBase + $suplementoDias;

if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {

    $nombreFoto = $_FILES["foto"]["name"];

    $temporal = $_FILES["foto"]["tmp_name"];

    $ruta = "imagen/" . $nombreFoto;

    move_uploaded_file($temporal, $ruta);
} else {
    echo '<div class="contenedor">';

    echo '<div class="error">';
    echo 'Ha ocurrido un error al subir la fotografía.';
    echo '</div>';

    echo '</div>';

    exit;
}
?>

<div class="contenedor">

    <div class="ticket">

        <h2>🎵 getafeFest 🎵</h2>

        <h3>ACREDITACIÓN DIGITAL</h3>

        <img src="<?php echo $ruta; ?>" alt="Foto del asistente">
        <h3>Datos del asistente</h3>

        <p>
            <strong>Nombre:</strong>
            <?php echo $nombre; ?>
        </p>

        <p>
            <strong>Email:</strong>
            <?php echo $email; ?>
        </p>

        <p>
            <strong>Edad:</strong>
            <?php echo $edad; ?>
        </p>
    <h3>Información del pase</h3>

    <p>
        <strong>Tipo de entrada:</strong>
        <?php echo $entrada; ?>
    </p>

    <p>
        <strong>Días de asistencia:</strong>

<?php
    if (count($dias) > 0) {
        echo implode(", ", $dias);
    } else {
        echo "Ningún día seleccionado";
    }
?>
    </p>

        <p>
            <strong>Método de pago:</strong>
            <?php echo $pago; ?>
        </p>


        <h3>Desglose del precio</h3>

        <p>
            Precio base:
            <?php echo $precioBase; ?> €
        </p>

        <p>
            Suplemento por días:
            <?php echo $suplementoDias; ?> €
        </p>

        <hr>

        <h2>
            TOTAL:
            <?php echo $precioTotal; ?> €
        </h2>


        <h3>Observaciones</h3>

        <p>
            <?php echo $observaciones; ?>
        </p>

    </div>

</div>

</body>
</html>
