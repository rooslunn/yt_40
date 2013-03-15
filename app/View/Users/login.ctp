<div class="users form">

<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->submit(__('Login'), array('class' => 'btn btn-primary'));
    ?>
    </fieldset>
<?php echo $this->Form->end(); ?>

</div>