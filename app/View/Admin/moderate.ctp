<table>

    <?php foreach ($videos as $video): ?>
    <tr>
        <td><?php echo $video['Video']['link']; ?></td>
    </tr>
    <tr>
        <td>
            <?php
                echo $this->Html->link(
                    __('Publish'), array('action' => 'publish', $video['Video']['id']), array('class' => 'btn btn-primary')
                );
             ?>
            <span></span>
            <?php
                echo $this->Html->link(
                    __('Reject'), array('action' => 'reject', $video['Video']['id']), array('class' => 'btn btn-danger')
                );
            ?>
        </td>
    </tr>
    <tr><td><hr></td></tr>
    <?php endforeach; ?>
    <?php unset($video); ?>

</table>
