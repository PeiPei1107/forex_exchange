<?php

class User_Controller extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('AdminModel');
        $this->AdminModel->construct(['data' => $this->data, 'file' => __FILE__ ]);
    }

    public function edit()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);
            
        $uid = $this->input->get('uid');

        $data['user_UserFieldShop'] = new UserFieldShop([
            'db_where_arr' => [
                'user.uid' => $uid
            ]
        ]);

        if(
            !empty( $data['user_UserFieldShop']->group_UserGroupList->uniqueids_arr ) &&
            in_array( 1, $data['user_UserFieldShop']->group_UserGroupList->uniqueids_arr) &&
            !in_array( 1, $data['User']->group_UserGroupList->uniqueids_arr) ||
            !empty( $data['user_UserFieldShop']->group_UserGroupList->uniqueids_arr ) &&
            in_array( 2, $data['user_UserFieldShop']->group_UserGroupList->uniqueids_arr) &&
            !in_array( 2, $data['User']->group_UserGroupList->uniqueids_arr) &&
            !in_array( 1, $data['User']->group_UserGroupList->uniqueids_arr) ||
            !empty( $data['user_UserFieldShop']->group_UserGroupList->uniqueids_arr ) &&
            in_array( 3, $data['user_UserFieldShop']->group_UserGroupList->uniqueids_arr) &&
            !in_array( 2, $data['User']->group_UserGroupList->uniqueids_arr) &&
            !in_array( 1, $data['User']->group_UserGroupList->uniqueids_arr)
        )
        {
            $this->load->model('Message');
            $this->Message->show([
                'message' => '不可以編輯權限更高的管理員',
                'url' => 'admin/base/user/user/tablelist'
            ]);
            return FALSE;
        }
        
        //權限判斷
        if(
            in_array( 1, $data['User']->group_UserGroupList->uniqueids_arr)
        )
        {
        }
        else if(
            in_array( 2, $data['User']->group_UserGroupList->uniqueids_arr)
        )
        {
            $groupids_1_purview = 1;
        }
        else if(
            in_array( 3, $data['User']->group_UserGroupList->uniqueids_arr)
        )
        {
            $groupids_1_purview = 1;
            $groupids_2_purview = 2;
            $groupids_3_purview = 3;
        }

        $data['UserGroupList'] = new ObjList([
            'db_where_arr' => [
                'groupid !=' => $groupids_1_purview,
                'groupid != ' => $groupids_2_purview,
                'groupid !=  ' => $groupids_3_purview
            ],
            'db_where_deletenull_bln' => TRUE,
            'obj_class' => 'UserGroup',
            'limitstart' => 0,
            'limitcount' => 100
        ]);

        //輸出模板
        $this->load->view('admin/'.$data['admin_child_url'], $data);
    }

    public function edit_post()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);

        //基本post欄位
        $uid = $this->input->post('uid', TRUE);
        $groupids_arr = $this->input->post('groupids_arr', TRUE);
        $username = $this->input->post('username', TRUE, '會員名稱', 'required');
        if ($this->form_validation->check() == FALSE) return FALSE;

        $data['user_UserFieldShop'] = new UserFieldShop([
            'db_where_arr' => [
                'user.uid' => $uid
            ]
        ]);

        //權限判斷
        if( 
            in_array( 1, $data['user_UserFieldShop']->group_UserGroupList->uniqueids_arr) &&
            !in_array( 1, $data['User']->group_UserGroupList->uniqueids_arr) ||
            in_array( 2, $data['user_UserFieldShop']->group_UserGroupList->uniqueids_arr) &&
            !in_array( 2, $data['User']->group_UserGroupList->uniqueids_arr) &&
            !in_array( 1, $data['User']->group_UserGroupList->uniqueids_arr) ||
            in_array( 3, $data['user_UserFieldShop']->group_UserGroupList->uniqueids_arr) &&
            !in_array( 2, $data['User']->group_UserGroupList->uniqueids_arr) &&
            !in_array( 1, $data['User']->group_UserGroupList->uniqueids_arr)
        )
        {
            $this->load->model('Message');
            $this->Message->show([
                'message' => '不可以編輯權限更高的管理員',
                'url' => 'admin/base/user/user/tablelist'
            ]);
            return FALSE;
        }

        //建構User物件，並且更新
        $UserFieldShop = new UserFieldShop([
            'uid' => $uid,
            'username' => $username
        ]);
        
        //建立UserGroupList物件
        check_comma_array($groupids, $groupids_arr);
        $UserFieldShop->group_UserGroupList = new ObjList([
            'db_where_arr' => [
                'groupid in' => $groupids_arr
            ],
            'obj_class' => 'UserGroup',
            'limitstart' => 0,
            'limitcount' => 100
        ]);

        $UserFieldShop->update([
            'db_update_arr' => [
                'user.username', 'user.updatetime', 'user.groupids'
            ]
        ]);

        //送出成功訊息
        $this->load->model('Message');
        $this->Message->show([
            'message' => '設定成功',
            'url' => 'admin/base/user/user/edit/?uid='.$uid
        ]);
    }

    public function edit_adduser_post()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);
        
        //基本post欄位
        $email = $this->input->post('email', TRUE, 'email', 'required');
        $password = $this->input->post('password', TRUE, '密碼', 'required');
        $password2 = $this->input->post('password2', TRUE, '確認密碼', 'required');
        if ($this->form_validation->check() == FALSE) return FALSE;

        $User = new User();
        $register_status = $User->add([
            'email' => $email,
            'password' => $password,
            'password2' => $password2
        ]);

        if($register_status === TRUE)
        {
            $url = 'admin/base/user/user/tablelist';
            $message = "註冊成功";
            
            $this->load->model('Message');
            $this->Message->show([
                'message' => $message,
                'url' => $url
            ]);
        }
        else
        {
            $url = 'admin/base/user/user/edit';
            $message = $register_status;
            
            $this->load->model('Message');
            $this->Message->show([
                'message' => $message,
                'url' => $url
            ]);
        }
    }

    public function edit_changepassword_post()
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
                'url' => 'admin/base/user/user/edit/?uid='.$uid
            ]);
        }
        else
        {
            //送出成功訊息
            $this->load->model('Message');
            $this->Message->show([
                'message' => $change_status_bln,
                'url' => 'admin/base/user/user/edit/?uid='.$uid
            ]);
        }
    }

    public function tablelist()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);

        $data['search_uid'] = $this->input->get('uid');
        $data['search_username'] = $this->input->get('username');
        $data['search_email'] = $this->input->get('email');
        $data['search_group_groupid'] = $this->input->get('group_groupid');

        $limitstart = $this->input->get('limitstart');
        $limitcount = $this->input->get('limitcount');
        $limitcount = !empty($limitcount) ? $limitcount : 20;

        $UserGroup = new UserGroup([
            'db_where_arr' => [
                'groupid' => $data['search_group_groupid']
            ]
        ]);
        
        //權限判斷
        if(
            in_array( 1, $data['User']->group_UserGroupList->uniqueids_arr)
        )
        {
        }
        else if(
            in_array( 2, $data['User']->group_UserGroupList->uniqueids_arr)
        )
        {
            $groupids_1_purview = 1;
        }
        else if(
            in_array( 3, $data['User']->group_UserGroupList->uniqueids_arr)
        )
        {
            $groupids_1_purview = 1;
            $groupids_2_purview = 2;
            $groupids_3_purview = 3;
        }

        $data['user_UserList'] = new ObjList([
            'db_where_arr' => [
                'uid' => $data['search_uid'],
                'groupids not in' => [$groupids_1_purview, $groupids_2_purview, $groupids_3_purview],
                'username like' => $data['search_username'],
                'email like' => $data['search_email'],
                'groupids in' => [$UserGroup->groupid]
            ],
            'db_orderby_arr' => [
                'updatetime' => 'DESC',
                'uid' => 'DESC'
            ],
            'db_where_deletenull_bln' => TRUE,
            'obj_class' => 'User',
            'limitstart' => $limitstart,
            'limitcount' => $limitcount
        ]);
        $data['page_links'] = $data['user_UserList']->create_links(['base_url' => 'admin/'.$data['child1_name'].'/'.$data['child2_name'].'/'.$data['child3_name'].'/'.$data['child4_name']]);

        $data['UserGroupList'] = new ObjList([
            'db_where_arr' => [
                'groupid !=' => $groupids_1_purview,
                'groupid != ' => $groupids_2_purview,
                'groupid !=  ' => $groupids_3_purview
            ],
            'db_where_deletenull_bln' => TRUE,
            'obj_class' => 'UserGroup',
            'limitstart' => 0,
            'limitcount' => 100
        ]);

        //輸出模板
        $this->load->view('admin/'.$data['admin_child_url'], $data);

    }

    public function tablelist_post()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);

        $search_uid = $this->input->post('search_uid', TRUE);
        $search_username = $this->input->post('search_username', TRUE);
        $search_email = $this->input->post('search_email', TRUE);
        $search_group_groupid = $this->input->post('search_group_groupid', TRUE);

        $url = 'admin/base/user/user/tablelist/?';

        if(!empty($search_uid))
        {
            $url = $url.'&uid='.$search_uid;
        }

        if(!empty($search_username))
        {
            $url = $url.'&username='.$search_username;
        }

        if(!empty($search_email))
        {
            $url = $url.'&email='.$search_email;
        }

        if(!empty($search_group_groupid))
        {
            $url = $url.'&group_groupid='.$search_group_groupid;
        }

        //送出成功訊息
        $this->load->model('Message');
        $this->Message->show([
            'message' => '設定成功',
            'url' => $url
        ]);
    }

    public function delete()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);

        //CSRF過濾
        if( $this->input->get('hash') == $this->security->get_csrf_hash() )
        {
            $User = new UserFieldShop([
                'uid' => $this->input->get('uid')
            ]);
            $User->delete();

            $this->load->model('Message');
            $this->Message->show([
                'message' => '刪除成功',
                'url' => 'admin/base/user/user/tablelist'
            ]);
        }
        else
        {
            $this->load->model('Message');
            $this->Message->show([
                'message' => 'hash驗證失敗，請使用標準瀏覽器進行刪除動作',
                'url' => 'admin/base/user/user/tablelist'
            ]);
        }
    }

    public function delete_batch_post()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);
        
        $uid_arr = $this->input->post('uid_arr[]');

        //CSRF過濾
        if( $this->input->get('hash') == $this->security->get_csrf_hash() )
        {
            if(!empty($uid_arr))
            {
                foreach($uid_arr as $key => $uid)
                {
                    $User = new UserFieldShop([
                        'uid' => $uid
                    ]);
                    $User->delete();
                }
            }
            else
            {
                $this->load->model('Message');
                $this->Message->show([
                    'message' => '未選擇要刪除的會員'
                ]);
                return TRUE;
            }

            $this->load->model('Message');
            $this->Message->show([
                'message' => '刪除成功',
                'url' => 'admin/base/user/user/tablelist'
            ]);
            return TRUE;
        }
        else
        {
            $this->load->model('Message');
            $this->Message->show([
                'message' => 'hash驗證失敗，請使用標準瀏覽器進行刪除動作',
                'url' => 'admin/base/user/user/tablelist'
            ]);
            return TRUE;
        }
    }
}

?>