<h1>Add Video</h1>
<?php
    echo $this->Form->create('Video');
    echo $this->Form->input('nick');
    echo $this->Form->input('link');
    echo $this->Form->input('descr', array('rows' => '3'));
    echo $this->Form->end('Save Video');
?>