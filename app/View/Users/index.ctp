<table>
    <tr>
        <td>
            <?php
            echo $this->Html->link('Модерация видео', array('controller' => 'users', 'action' => 'moderate'));
            ?>
        </td>
        <td>
            <?php
            echo $this->Html->link('Cписок видеозаписей', array('controller' => 'users', 'action' => 'list'));
            ?>
        </td>
    </tr>
</table>

