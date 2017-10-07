<?php

class TeamsController extends MvcPublicController {    
    public function edit() {
        if (!isset($this->form))
        {
            $this->load_helper('Form');
        }
        $this->verify_id_param();
        $this->get_post_param_data();
        $this->create_or_save();
        $this->set_object();
    }
    
    public function add() {
        if (!isset($this->form))
        {
            $this->load_helper('Form');
        }
        $this->get_post_param_data();
        $this->create_or_save();
        $this->set_objects();
    }
    
    // TODO: add validation to post data before adding to it.
    public function get_post_param_data()
    {
        if (!empty($_POST))
        {
            // placing the post into param's data
            foreach ($_POST as $key => $value)
            {
                $this->params[$key] = $value;
            }
        }     
    }
    
    public function delete() {
        $this->verify_id_param();
        $this->set_object();
        if (!empty($this->object)) {
            $this->model->delete($this->params['id']);
            $this->flash('notice', __('Successfully deleted!', 'wpmvc'));
        } else {
            $this->flash('warning', 'A '.MvcInflector::humanize($this->model->name).' with ID "'.$this->params['id'].'" couldn\'t be found.');
        }
        $url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'index'));
        $this->redirect($url);
    }
    
    public function verify_id_param() {
        if (empty($this->params['id'])) {
            die('No ID specified');
        }
    }
    
    public function create_or_save() {
        if (!empty($this->params['data'][$this->model->name])) {
            $object = $this->params['data'][$this->model->name];
            if (empty($object['id'])) {
                if($this->model->create($this->params['data'])) {
                    $id = $this->model->insert_id;
                    $url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'index'));
                    //$this->flash('notice', __('Successfully created!', 'wpmvc'));
                    $this->redirect($url);
                } else {
                    $this->flash('error', $this->model->validation_error_html);
                    $this->set_object();
                }
            } else {
                if ($this->model->save($this->params['data'])) {
                    $this->flash('notice', __('Successfully saved!', 'wpvmc'));
                    $this->refresh();
                } else {
                    $this->flash('error', $this->model->validation_error_html);
                }
            }
        }
    }
    
}

?>