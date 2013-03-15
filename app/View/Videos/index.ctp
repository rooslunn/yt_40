<table class="table">

    <?php foreach ($videos as $video): ?>
    <tr>
        <td><?php echo $video['Video']['link']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($video); ?>

</table>

<!-- Paginator -->
<?php echo $this->Paginator->numbers() ?>

<!-- Add video -->
<?php echo $this->Html->link(__('Add Video'), array('controller' => 'videos', 'action' => 'add')); ?>
