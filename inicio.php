<?php  require_once("parte_superior.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php


if (!isset($_SESSION['username'])) {

?>
    <script>
        alert("usuario no autorizado")
        location.href = "index.php"
    </script>

<?php

} else {



   

?>
    <h1 style="margin: 5% 5%; color: var(--dark);">Sistema de Registro de Inspecciones de Chasis y Carrocerias </h1>

    <div style="display: 
    flex; justify-content: center; align-items: center;" class="gif">
        <img src="/Inspecciones/img/autobus.png" alt="">



    </div>






<?php
    require_once("parte_inferior.php");
}
?>