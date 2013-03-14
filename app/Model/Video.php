<?php

class Video extends AppModel {
    public $validate = array(
        'nick' => array(
            'rule' => 'notEmpty'
        ),
        'link' => array(
            'rule' => 'notEmpty'
        )
    );
}