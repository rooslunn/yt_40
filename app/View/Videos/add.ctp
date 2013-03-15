<legend>Add Video</legend>
<?php
    echo $this->Form->create('Video');
    echo $this->Form->input('nick', array('class' => 'input span6'));
    echo $this->Form->input('link', array('class' => 'input span6'));
    echo $this->Form->input('descr', array('rows' => '3', 'class' => 'span6'));
    echo $this->Form->submit('Save Video', array('class' => 'btn btn-primary', 'title' => 'Save Video'));
    echo $this->Form->end();
?>