<?php

class VideosController extends AppController {
    public $helpers = array('Html', 'Form', 'Session', 'Paginator');
    public $components = array('Session', 'Paginator');

    public $paginate = array(
        'limit'      => 8,
        'conditions' => array('Video.active' => 1),
        'order'      => array('Video.id' => 'desc'),
    );

    public function index() {
        // $params = array(
        //     'conditions' => array('Video.active' => 1),
        //     'order'      => array('Video.id' => 'desc'),
        // );
        // $this->set('videos', $this->Video->find('all', $params));
        $videos = $this->paginate('Video');
        $this->set('videos', $videos);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Video->create();
            if ($this->Video->save($this->request->data)) {
                $this->Session->setFlash('Your video has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add your video.');
            }
        }
    }
}