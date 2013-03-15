
<div class="btn-group">
  <button class="btn">
    <?php
    echo $this->Html->link(__('Moderate Video'), array('controller' => 'admin', 'action' => 'moderate'));
    ?>
  </button>
  <button class="btn">
    <?php
    echo $this->Html->link(__('View Video'), array('controller' => 'admin', 'action' => 'viewforedit'));
    ?>
  </button>
</div>
