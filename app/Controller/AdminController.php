<?php

class AdminController extends AppController {
    public $helpers = array('Html', 'Form', 'Session', 'Paginator');
    public $components = array('Session', 'Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function index() {
    }

    public function moderate() {
    }

    public function view() {
    }

}