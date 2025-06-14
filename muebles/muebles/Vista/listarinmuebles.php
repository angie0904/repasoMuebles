<body>
     <form action='index.php?action=buscarInmueble' method='post'>
        <label for="">Dirección/precio</label>
        <input type="text" name="buscarInmueble" id="">
        <input type="submit" value="Buscar">
    </form>
   <table border="1">
        <th>
            <td>imagen</td><td>dirrección</td><td>precio</td>
        </th>
        <?php
        foreach($inmuebles as $key=>$atrib){
            echo "<tr><td></td></td></tdt><td><img src='".$atrib['img']."' /></td><td>".$atrib['dir']."</td><td>".$atrib['precio']."</td>
            <td>
            <form action='index.php?action=modFormCli' method='post'><input type='text' name='id' value=$key hidden><input type='submit' value='Modificar'></form>
            </td>
            <td><form action='index.php?action=borrarInmueble' method='post'><input type='text' name='id' value=$key hidden><input type='submit' value='Borrar'></form></td></tr>";
        }
        
        ?>
    </table>
</body>