<?php
include "header.html";
?>

<div class="contenedor">
    <h2> Reserva tu pase</h2>
    <form action="procesar.php" method="post" enctype="multipart/form-data">
        <h3> Datos personales </h3>
        <label for="nombre">Nombre y Apellidos:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" min="1" required>
        <h3>Configuración del Pase</h3>

        <label>Tipo de entrada:</label>

        <input type="radio" name="entrada" value="General" required>
        General - 50 €

        <br>

        <input type="radio" name="entrada" value="VIP">
        VIP con acceso a Backstage - 120 €

        <br>

        <input type="radio" name="entrada" value="Super VIP">
        Super VIP + Camping - 180 €


        <label>Días de asistencia:</label>

        <input type="checkbox" name="dias[]" value="Viernes">
        Viernes

        <br>

        <input type="checkbox" name="dias[]" value="Sábado">
        Sábado

        <br>

        <input type="checkbox" name="dias[]" value="Domingo">
        Domingo


        <label for="pago">Método de pago:</label>

        <select name="pago" id="pago" required>
            <option value="">Selecciona una opción</option>
            <option value="Tarjeta de crédito">Tarjeta de crédito</option>
            <option value="Bizum">Bizum</option>
            <option value="PayPal">PayPal</option>
        </select>


        <h3>Acreditación</h3>

        <label for="foto">Foto del asistente:</label>
        <input type="file" id="foto" name="foto" accept="image/*" required>


        <h3>Observaciones</h3>

        <label for="observaciones">Comentarios o peticiones especiales:</label>

        <textarea
            id="observaciones"
            name="observaciones"
            rows="5">
        </textarea>


        <button type="submit" class="boton">
            Reservar pase
        </button>
    </form>
</div>
