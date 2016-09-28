<?php
include("includes/tabla.class.php");
referer();
$tabla = new Tabla();
$resultado = $tabla->get("1=1");
?>

<table id="tabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
    </tr>
</tfoot>
<tbody>
    <?php
        foreach ($resultado as $info){
            echo'
            <tr>
                <td>'. $info['ID'].'</td>
                <td>'. $info['nombre'].'</td>
                <td>'. $info['email'].'</td>
            </tr>';
        }
    ?>     
</table>
<script>jQuery('#tabla').DataTable({"order": [[ 0, "desc" ]] });</script>