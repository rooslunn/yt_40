<table id="video_list" class="table well">

    <?php foreach ($videos as $video): ?>
    <tr class="row-fluid">
        <?php if($video['Video']['id'] == $next_video['Video']['id']) continue; ?>
        <td><?php echo $video['Video']['link']; $next_video = next($videos); ?></td>
        <?php if($next_video) {?>
            <td><?php echo $next_video['Video']['link']; ?></td>
        <?php }?>
    </tr>
    <?php endforeach; ?>
    <?php unset($video); ?>

</table>

<!-- Paginator -->
<?php echo $this->Paginator->numbers() ?>

<!-- Add video -->
<?php echo $this->Html->link(__('Add Video'), array('controller' => 'videos', 'action' => 'add')); ?>
