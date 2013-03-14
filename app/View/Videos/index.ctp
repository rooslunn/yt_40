<table>

    <?php foreach ($videos as $video): ?>
    <tr>
        <td><?php echo $video['Video']['link']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($video); ?>

</table>

<?php echo $this->Paginator->numbers(); ?>

<?php echo $this->Html->link('Добавить видео', array('controller' => 'videos', 'action' => 'add')); ?>
