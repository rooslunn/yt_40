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

    public function beforeSave($options = array()) {
        $this->data[$this->alias]['modified_at'] = date('Y-m-d H:i:s', strtotime("now"));
        return true;
    }
}