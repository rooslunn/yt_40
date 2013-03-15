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

    private function _get_videos() {
        $params = array(
            'conditions' => array('Video.active' => 0),
            'order'      => array('Video.id' => 'asc'),
        );
        return $this->Video->find('all', $params);
    }

    public function moderate() {
        $this->set('videos', $this->_get_videos());
    }

    public function viewforedit() {
        $this->set('videos', $this->_get_videos());
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid video'));
        }

        $video = $this->Video->findById($id);
        if (!$video) {
            throw new NotFoundException(__('Invalid video'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Video->id = $id;
            if ($this->Video->save($this->request->data)) {
                $this->Session->setFlash('Your video has been updated.');
                $this->redirect(array('action' => 'viewforedit'));
            } else {
                $this->Session->setFlash('Unable to update your video.');
            }
        }

        if (!$this->request->data) {
            $this->request->data = $video;
        }
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