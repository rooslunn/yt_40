<?php

class AdminController extends AppController {
    public $helpers = array('Html', 'Form', 'Session', 'Paginator');
    public $components = array('Session', 'Paginator');
    public $uses = array('Video');

    // public function beforeFilter() {
    //     parent::beforeFilter();
    //     $this->Auth->allow('add');
    // }

    // public function add() {
    //     if ($this->request->is('post')) {
    //         $this->User->create();
    //         if ($this->User->save($this->request->data)) {
    //             $this->Session->setFlash(__('The user has been saved'));
    //             $this->redirect(array('action' => 'index'));
    //         } else {
    //             $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
    //         }
    //     }
    // }

    public function actions() {
    }

    public function moderate() {
        $params = array(
            'conditions' => array('Video.active' => 0),
            'order'      => array('Video.id' => 'asc'),
        );
        $this->set('videos', $this->Video->find('all', $params));
    }

    public function reject($id = null) {
        if (!isset($id)) {
            throw new NotFoundException(__('Invalid id'));
        }
        // todo:
        // if (!$this->request->is('post')) {
        //     throw new MethodNotAllowedException();
        // }
        if ($this->Video->exists($id) && $this->Video->delete($id)) {
            $this->Session->setFlash(__('Video rejected'));
        } else {
            $this->Session->setFlash(__('Video was not rejected'));
        }
        $this->redirect(array('action' => 'moderate'));
    }

    public function publish($id = null) {
        if (!isset($id)) {
            throw new NotFoundException(__('Invalid id'));
        }
        // todo:
        // if (!$this->request->is('post')) {
        //     throw new MethodNotAllowedException();
        // }
        if ($this->Video->exists($id)) {
            $this->Video->id = $id;
            $this->Video->set('active', 1);
            if ($this->Video->save()) {
                $this->Session->setFlash(__('Video was published'));
            } else {
                $this->Session->setFlash(__('Video was not published'));
            }
        } else {
            $this->Session->setFlash(__('Video was not found'));
        }
        $this->redirect(array('action' => 'moderate'));
    }

    public function view() {
    }

}