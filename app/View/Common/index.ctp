<!-- app/View/Common/index.ctp-->
<div id="column">
    <h3>Opciones:</h3>
    <ul>
    <?php echo $this->fetch('column'); ?>
    </ul>
</div>

<div id="view">
    <h1><?php echo $this->fetch('title'); ?></h1>
    <?php echo $this->fetch('content'); ?>
</div>


