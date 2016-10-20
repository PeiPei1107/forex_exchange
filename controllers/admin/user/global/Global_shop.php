<?php

class Global_shop_Controller extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('AdminModel');
        $this->AdminModel->construct(['data' => $this->data, 'file' => __FILE__ ]);
    }

    public function user()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);

        $data['user_UserFieldShop'] = new UserFieldShop([
            'db_where_arr' => [
                'user.uid' => $data['User']->uid
            ]
        ]);

        $data['UserGroupList'] = new ObjList([
            'db_where_deletenull_bln' => TRUE,
            'obj_class' => 'UserGroup',
            'limitstart' => 0,
            'limitcount' => 100
        ]);

        //輸出模板
        $this->load->view('admin/'.$data['admin_child_url'], $data);
    }

    public function user_post()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);

        //基本post欄位
        $uid = $this->input->post('uid', TRUE);
        $username = $this->input->post('username', TRUE, '會員名稱', 'required');
        if ($this->form_validation->check() == FALSE) return FALSE;

        //建構User物件，並且更新
        $UserFieldShop = new UserFieldShop([
            'uid' => $uid,
            'username' => $username
        ]);
        $UserFieldShop->update([
            'db_update_arr' => [
                'user.username', 'user.updatetime'
            ]
        ]);

        //送出成功訊息
        $this->load->model('Message');
        $this->Message->show([
            'message' => '設定成功',
            'url' => 'admin/user/global/global_shop/user'
        ]);
    }

    public function user_userfieldshop_post()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);

        //基本post欄位
        $uid = $this->input->post('uid', TRUE);
        $receive_name = $this->input->post('receive_name', TRUE, '常用收件人姓名', 'required');
        $receive_phone = $this->input->post('receive_phone', TRUE, '常用收件人電話', 'required');
        $receive_address = $this->input->post('receive_address', TRUE, '常用收件人地址', 'required');
        if ($this->form_validation->check() == FALSE) return FALSE;

        //建構User物件，並且更新
        $UserFieldShop = new UserFieldShop([
            'uid' => $uid,
            'receive_name' => $receive_name,
            'receive_phone' => $receive_phone,
            'receive_address' => $receive_address
        ]);
        $UserFieldShop->update([
            'db_update_arr' => [
                'user_field_shop.receive_name',
                'user_field_shop.receive_phone',
                'user_field_shop.receive_address'
            ]
        ]);

        //送出成功訊息
        $this->load->model('Message');
        $this->Message->show([
            'message' => '設定成功',
            'url' => 'admin/user/global/global_shop/user'
        ]);
    }

    public function user_changepassword_post()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);

        //基本post欄位
        $uid = $this->input->post('uid', TRUE);
        $password = $this->input->post('password', TRUE, '會員密碼', 'required');
        $password2 = $this->input->post('password2', TRUE, '會員密碼', 'required');
        if ($this->form_validation->check() == FALSE) return FALSE;

        //建構User物件，並且更新
        $User = new User([
            'uid' => $uid
        ]);
        $change_status_bln = $User->change_password([
            'password' => $password,
            'password2' => $password2
        ]);

        if($change_status_bln === TRUE)
        {
            //送出成功訊息
            $this->load->model('Message');
            $this->Message->show([
                'message' => '密碼變更成功',
                'url' => 'admin/user/global/global_shop/user'
            ]);
        }
        else
        {
            //送出成功訊息
            $this->load->model('Message');
            $this->Message->show([
                'message' => $change_status_bln,
                'url' => 'admin/user/global/global_shop/user'
            ]);
        }
    }
}

?>