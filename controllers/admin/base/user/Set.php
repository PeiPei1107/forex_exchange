<?php

class Set_Controller extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('AdminModel');
        $this->AdminModel->construct(['data' => $this->data, 'file' => __FILE__ ]);
    }

    public function set()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);

        //輸出模板
        $this->load->view('admin/'.$data['admin_child_url'], $data);
    }

    public function set_destroy_post()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);

        $UserList = new ObjList([
            'db_where_arr' => [
                'status' => -1
            ],
            'db_where_deletenull_bln' => TRUE,
            'obj_class' => 'User',
            'limitstart' => 0,
            'limitcount' => 100
        ]);
        foreach ($UserList->obj_arr as $key => $value_user)
        {
            $User = new User([
                'uid' => $value_user->uid
            ]);
            $User->destroy();
        }

        if(!empty($UserList->obj_arr))
        {
            $this->load->model('Message');
            $this->Message->show([
                'message' => '銷毀成功',
                'url' => 'admin/base/user/set/set'
            ]);
        }
        else
        {
            $this->load->model('Message');
            $this->Message->show([
                'message' => '已無可銷毀的項目',
                'url' => 'admin/base/user/set/set'
            ]);
        }
    }

    public function set_recovery_post()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);
        
        $UserList = new ObjList([
            'db_where_arr' => [
                'status' => -1
            ],
            'db_where_deletenull_bln' => TRUE,
            'obj_class' => 'User',
            'limitstart' => 0,
            'limitcount' => 100
        ]);
        foreach ($UserList->obj_arr as $key => $value_user)
        {
            $User = new User([
                'uid' => $value_user->uid
            ]);
            $User->recovery();
        }

        if(!empty($UserList->obj_arr))
        {
            $this->load->model('Message');
            $this->Message->show([
                'message' => '復原成功',
                'url' => 'admin/base/user/set/set'
            ]);
        }
        else
        {
            $this->load->model('Message');
            $this->Message->show([
                'message' => '已無可復原的項目',
                'url' => 'admin/base/user/set/set'
            ]);
        }
    }
}

?>