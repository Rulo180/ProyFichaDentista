<!-- app/View/Common/index.ctp-->


<h1><?php echo $this->fetch('title'); ?></h1>

<div id="breadcrumbs">
    <?php echo $this->Breadcrumb->render(); ?> 
</div>

<?php echo $this->fetch('content'); ?>

<div id="paginate">
    <?php echo $this->fetch('paginate'); ?>
</div>

