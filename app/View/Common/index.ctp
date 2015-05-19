<!-- app/View/Common/index.ctp-->
<div id="column">
    <h3><?php echo $this->fetch('tit_col'); ?></h3>
    <ul>
    <?php echo $this->fetch('column'); ?>
    </ul>
</div>

<div id="view">
    <h1><?php echo $this->fetch('title'); ?></h1>
    <?php echo $this->fetch('content'); ?>
</div>

<div id="paginate">
    <?php echo $this->fetch('paginate'); ?>
</div>



