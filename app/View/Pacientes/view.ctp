
<h1> <?php echo $paciente['Paciente']['Nombre_Completo'] ?> </h1>

<table>
        <tr>    
            <td>ID: <?php echo $paciente['Paciente']['id_paciente']; ?></td>
            <td>Nro. Afiliado: <?php echo $paciente['Paciente']['nro_afiliado']; ?></td>
        </tr>
        <tr>
            <td>Fecha de Nac: <?php echo $paciente['Paciente']['fecha_nac']; ?></td>
            <td>D.N.I.: <?php echo $paciente['Paciente']['dni_paciente']; ?></td>
        </tr>
            <td>Profesión: <?php echo $paciente['Paciente']['profesion']; ?></td>
            <td>Teléfono: <?php echo $paciente['Paciente']['telefono']; ?></td>
        </tr>
        <tr>
            <td>Domicilio: <?php echo $paciente['Paciente']['domicilio']; ?></td>
            <td>Localidad: <?php echo $paciente['Paciente']['localidad']; ?></td>
        </tr>
        <tr>
            <td>Obra Social: <?php echo $paciente['ObraSocial']['nombre_obra']; ?></td>
        </tr>
</table>
