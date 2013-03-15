
<table>
    <tr>
        <td>
            <?php
            echo $this->Html->link(__('Moderate Video'), array('controller' => 'admin', 'action' => 'moderate'));
            ?>
        </td>
        <td>
            <?php
            echo $this->Html->link(__('View Video'), array('controller' => 'admin', 'action' => 'view'));
            ?>
        </td>
    </tr>
</table>
