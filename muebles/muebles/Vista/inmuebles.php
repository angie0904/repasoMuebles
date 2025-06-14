
<body>
    <form action="index.php?action=<?php echo (isset($datos))?  "modInmu" : "aniadirInmu" ?>" method="post" enctype="multipart/form-data">
        <?php if(isset($datos)){
            echo "<input type='text' name='id' value='$datos[0]' hidden>"; 
        }
        ?>
        <label for="img">Imagen Inmueble</label>
        <input type="file" name="foto">
        <label for="dire">Dirección</label>
        <input type="text" name="dir" value="<?php if(isset($datos[2])) echo $datos[2] ?>">
        <label for="precio">Precio del Inmueble</label>
        <input type="text" name="precio" value="<?php if(isset($datos[3])) echo $datos[3] ?>">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>