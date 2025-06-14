
<body>
    <form action="index.php?action=<?php echo (isset($datos))?  "modCli" : "aniadirCli" ?>" method="post">
        <?php if(isset($datos)){
            echo "<input type='text' name='id' value='$datos[0]' hidden>"; 
        }
        ?>
        <label for="nomcliente">Nombre del cliente</label>
        <input type="text" name="nom" value="<?php echo (isset($datos[1])) ? $datos[1] : "" ?>">
        <label for="apllcliente">Apellido del cliente</label>
        <input type="text" name="ape" value="<?php if(isset($datos[2])) echo $datos[2] ?>">
        <label for="direcliente">Dirección del cliente</label>
        <input type="text" name="dir" value="<?php if(isset($datos[3])) echo $datos[3] ?>">
        <label for="tlfcliente">Telefono del cliente</label>
        <input type="text" name="tlf" value="<?php if(isset($datos[4])) echo $datos[4] ?>">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>