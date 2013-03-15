<table class="table well">
    <thead>
        <th>Nick</th>
        <th>Link</th>
        <th>Description</th>
    </thead>
    <tbody>
        <?php foreach($videos as $video): ?>
        <tr>
            <td><?php echo $this->Html->link($video['Video']['nick'], array('action' => 'edit', $video['Video']['id']));?></td>
            <td><?php echo $video['Video']['link'];?></td>
            <td><?php echo $video['Video']['descr'];?></td>
        </tr>
        <?php endforeach; ?>
        <?php unset($video); ?>
    </tbody>
</table>
