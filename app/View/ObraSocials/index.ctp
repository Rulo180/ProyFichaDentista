<?php $this->extend('/Common/index'); ?>

<?php $this->start('column') ;?>
    <?php $this->assign('tit_col', 'Opciones:'); ?>
    <ul>    
        <li>
        <?php echo $this->Form->create('ObraSocial', array('action'=>'buscar'))  ?>
        <?php echo $this->Form->input("Buscar.campo", array('label' => false));?>
        </li>
        <li>
        <?php echo $this->Form->end('Buscar');?>
        </li>
        <li><?php echo $this->Html->link('Agregar Obra Social', array('controller' => 'ObraSocials', 'action'=>'add', )) ?></li>
        
    </ul> 
<?php $this->end(); ?>

<?php $this->assign('title', 'Lista de Obras Sociales'); ?>

<table>
    <tr>
        <th><?php echo $this->Paginator->sort('id_obra', 'ID');?></th>
        <th><?php echo $this->Paginator->sort('nombre_obra', 'Nombre');?></th>
        <th><?php echo $this->Paginator->sort('codigo_obra', 'Código');?></th>
        <th><?php echo $this->Paginator->sort('telefono_obra', 'Teléfono');?></th>
        <th><?php echo $this->Paginator->sort('direccion_obra', 'Dirección');?></th>
        <th><?php echo $this->Paginator->sort('email_obra', 'Email');?></th>
        <th><?php echo $this->Paginator->sort('CUIT_obra', 'C.U.I.T.');?></th>
        <th>Acciones</th>
    </tr>
    
    <?php foreach($obras as $obra): ?>
        <tr>
            <td><?php echo $obra['ObraSocial']['id_obra']; ?></td>
            <td><?php echo $obra['ObraSocial']['nombre_obra']; ?></td>
            <td><?php echo $obra['ObraSocial']['codigo_obra']; ?></td>
            <td><?php echo $obra['ObraSocial']['telefono_obra']; ?></td>
            <td><?php echo $obra['ObraSocial']['direccion_obra']; ?></td>
            <td><?php echo $obra['ObraSocial']['email_obra']; ?></td>
            <td><?php echo $obra['ObraSocial']['CUIT_obra']; ?></td>
            <td>
                <?php echo $this->Html->link('Editar', array('action'=>'edit',$obra['ObraSocial']['id_obra'])); ?>/
                <?php echo $this->Form->postLink('Borrar', array('action'=>'delete',$obra['ObraSocial']['id_obra']), array('confirm' => 'Esta seguro?')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php unset($obra); ?>
</table>

    <?php $this->start('paginate'); ?>
    <?php  
        // Shows the page numbers
        echo $this->Paginator->numbers(array('first' => 2, 'last' => 2));

        // Shows the next and previous links
        echo $this->Paginator->prev(
        '« Anterior',
        null,
        null,
        array('class' => 'disabled'));
        echo $this->Paginator->next(
        'Siguiente »',
        null,
        null,
        array('class' => 'disabled'));

        // prints X of Y, where X is current page and Y is number of pages
        echo $this->Paginator->counter('{:page} de {:pages}'); 
    ?>

     <?php $this->end(); ?>