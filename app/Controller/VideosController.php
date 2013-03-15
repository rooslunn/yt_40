<?php

class VideosController extends AppController {
    public $helpers = array('Html', 'Form', 'Session', 'Paginator');
    public $components = array('Session', 'Paginator');

    public function index() {
        $this->paginate = array(
            'limit'      => 16,
            'conditions' => array('Video.active' => 1),
            'order'      => array('Video.modified_at' => 'desc'),
        );
        $videos = $this->paginate('Video');
        $this->set('videos', $videos);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Video->create();
            if ($this->Video->save($this->request->data)) {
                $this->Session->setFlash(__('Thank you!'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Unable to add your video.'));
            }
        }
    }
}