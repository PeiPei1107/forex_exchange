<?php

class Order_shop_Controller extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('AdminModel');
        $this->AdminModel->construct(['data' => $this->data, 'file' => __FILE__ ]);
    }

    public function edit()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);
            
        $orderid = $this->input->get('orderid');
        $data['search_receive_email'] = $this->input->get('receive_email');
        $data['search_receive_phone'] = $this->input->get('receive_phone');

        if(!empty($data['User']->uid))
        {
            $url = 'admin/user/order_shop/order_shop/tablelist';
        }
        else
        {
            $url = 'admin/user/order_shop/order_shop/tablelist/?receive_email='.$data['search_receive_email'].'&receive_phone='.$data['search_receive_phone'];
        }

        if( !empty($data['User']->uid) &&
            !empty($orderid)
        )
        {
            $data['OrderShop'] = new OrderShop([
                'db_where_arr' => [
                    'orderid' => $orderid,
                    'uid' => $data['User']->uid
                ]
            ]);
        }
        elseif( empty($data['User']->uid) &&
            !empty($orderid) &&
            !empty($data['search_receive_email']) && 
            !empty($data['search_receive_phone'])
        )
        {
            $data['OrderShop'] = new OrderShop([
                'db_where_arr' => [
                    'orderid' => $orderid,
                    'uid' => 0,
                    'receive_email' => $data['search_receive_email'],
                    'receive_phone' => $data['search_receive_phone'],
                ]
            ]);
        }
        else
        {
            $this->load->model('Message');
            $this->Message->show([
                'message' => '請先選擇欲修改的訂單',
                'url' => $url
            ]);
            return FALSE;
        }

        if(empty($data['OrderShop']->orderid))
        {
            $this->load->model('Message');
            $this->Message->show([
                'message' => '請先選擇欲修改的訂單',
                'url' => $url
            ]);
            return FALSE;
        }

    	if( $data['OrderShop']->pay_name !== 'atm' &&
            $data['OrderShop']->pay_name !== 'cash_on_delivery' &&
            $data['OrderShop']->pay_name !== '' )
        {
        	$pay_name = 'OrderShop'.$data['OrderShop']->pay_name.'Field';
        	
        	$data['OrderShop_field'] = new $pay_name([
    			'db_where_arr' => [
					'shop_order.orderid' => $orderid
    			]
        	]);
        }

        $data['transfer_SettingList'] = new SettingList([
            'db_where_arr' => [
                'modelname' => 'shop_transfer'
            ]
        ]);

        $data['Transport'] = new Transport([
            'db_where_arr' => [
                'name' => $data['OrderShop']->transport_mode
            ]
        ]);

        //輸出模板
        $this->load->view('admin/'.$data['admin_child_url'], $data);
    }

    public function edit_post()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);

        $orderid = $this->input->post('orderid', TRUE);
        $search_receive_email = $this->input->post('search_receive_email', TRUE);
        $search_receive_phone = $this->input->post('search_receive_phone', TRUE);

        $OrderShop = new OrderShop([
            'db_where_arr' => [
                'orderid' => $orderid
            ]
        ]);

        $content = $this->input->post('content', TRUE);

        //基本post欄位
        if(($OrderShop->pay_name == 'atm')&&($OrderShop->pay_status !== '1'))
        {
            $pay_account = $this->input->post('pay_account', TRUE, '轉帳帳號', 'required');
            $pay_account_name = $this->input->post('pay_account_name', TRUE, '轉帳人姓名', 'required');
            $pay_paytime = $this->input->post('pay_paytime', TRUE, '轉帳時間', 'required');
            $pay_remark = $this->input->post('pay_remark', TRUE);
            if( !$this->form_validation->check() ) return FALSE;

            //建構OrderShop物件，並且更新
            $OrderShop = new OrderShop([
                'orderid' => $orderid,
                'pay_account' => $pay_account,
                'pay_account_name' => $pay_account_name,
                'pay_paytime' => $pay_paytime,
                'pay_remark' => $pay_remark,
                'pay_status' => 1
            ]);
            $OrderShop->update([
                'db_update_arr' => [
                    'pay_account',
                    'pay_account_name',
                    'pay_paytime',
                    'pay_remark',
                    'pay_status'
                ]
            ]);
        }

        if( !empty($content) )
        {
            $Comment = new Comment([
                'uid' => $data['User']->uid,
                'typename' => 'order',
                'id' => $orderid,
                'content' => $content
            ]);
            $Comment->update();
        }

        if(!empty($data['User']->uid))
        {
            $url = 'admin/user/order_shop/order_shop/tablelist';
        }
        else
        {
            $url = 'admin/user/order_shop/order_shop/tablelist?receive_email='.$search_receive_email.'&receive_phone='.$search_receive_phone;
        }

        //送出成功訊息
        $this->load->model('Message');
        $this->Message->show([
            'message' => '設定成功',
            'url' => $url
        ]);
    }

    public function tablelist()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);

        $data['search_orderid'] = $this->input->get('orderid');
        $data['search_title'] = $this->input->get('title');
        $data['search_receive_email'] = $this->input->get('receive_email');
        $data['search_receive_phone'] = $this->input->get('receive_phone');
        $data['search_pay_name'] = $this->input->get('pay_name');
        $data['search_paycheck_status'] = $this->input->get('paycheck_status');
        $data['search_product_status'] = $this->input->get('product_status');
        $data['search_order_status'] = $this->input->get('order_status');

        $limitstart = $this->input->get('limitstart');
        $limitcount = $this->input->get('limitcount');
        $limitcount = !empty($limitcount) ? $limitcount : 20;


        $data['OrderShopList'] = new ObjList([
            'db_where_arr' => [
                'uid' => $data['User']->uid,
                'orderid' => $data['search_orderid'],
                'order_status !=' => -1,
                'title like' => $data['search_title']
            ],
            'db_orderby_arr' => [
                'orderid' => 'DESC'
            ],
            'db_where_deletenull_bln' => TRUE,
            'obj_class' => 'OrderShop',
            'limitstart' => $limitstart,
            'limitcount' => $limitcount
        ]);
        $data['page_links'] = $data['OrderShopList']->create_links(['base_url' => 'admin/'.$data['child1_name'].'/'.$data['child2_name'].'/'.$data['child3_name'].'/'.$data['child4_name']]);

        if(!empty($data['User']->uid))
        {
            $data['OrderShopList'] = new ObjList([
                'db_where_arr' => [
                    'uid' => $data['User']->uid,
                    'orderid' => $data['search_orderid'],
                    'pay_name' => $data['search_pay_name'],
                    'paycheck_status' => $data['search_paycheck_status'],
                    'product_status' => $data['search_product_status'],
                    'order_status' => $data['search_order_status'],
                    'order_status !=' => -1,
                    'title like' => $data['search_title'],
                    'receive_email like' => $data['search_receive_email']
                ],
                'db_orderby_arr' => [
                    'orderid' => 'DESC'
                ],
                'db_where_deletenull_bln' => TRUE,
                'obj_class' => 'OrderShop',
                'limitstart' => $limitstart,
                'limitcount' => $limitcount
            ]);

            $data['page_links'] = $data['OrderShopList']->create_links(['base_url' => 'admin/'.$data['child1_name'].'/'.$data['child2_name'].'/'.$data['child3_name'].'/'.$data['child4_name']]);
        }

        if((empty($data['User']->uid))&&(!empty($data['search_receive_email']))&&(!empty($data['search_receive_phone'])))
        {
            $data['OrderShopList'] = new ObjList([
                'db_where_arr' => [
                    'uid' => 0,
                    'orderid' => $data['search_orderid'],
                    'receive_email' => $data['search_receive_email'],
                    'receive_phone' => $data['search_receive_phone'],
                    'pay_name' => $data['search_pay_name'],
                    'paycheck_status' => $data['search_paycheck_status'],
                    'product_status' => $data['search_product_status'],
                    'order_status' => $data['search_order_status'],
                    'order_status !=' => -1,
                    'title like' => $data['search_title']
                ],
                'db_orderby_arr' => [
                    'orderid' => 'DESC'
                ],
                'db_where_deletenull_bln' => TRUE,
                'obj_class' => 'OrderShop',
                'limitstart' => $limitstart,
                'limitcount' => $limitcount
            ]);

            $data['page_links'] = $data['OrderShopList']->create_links(['base_url' => 'admin/'.$data['child1_name'].'/'.$data['child2_name'].'/'.$data['child3_name'].'/'.$data['child4_name']]);
        }


        //view data設定
        $data['admin_sidebox'] = $this->AdminModel->reset_sidebox();

        //輸出模板
        $this->load->view('admin/'.$data['admin_child_url'], $data);

    }

    public function tablelist_post()
    {
        $data = $this->AdminModel->get_data(__FUNCTION__);

        $search_orderid = $this->input->post('search_orderid', TRUE);
        $search_title = $this->input->post('search_title', TRUE);
        $search_receive_email = $this->input->post('search_receive_email', TRUE);
        $search_receive_phone = $this->input->post('search_receive_phone', TRUE);
        $search_pay_name = $this->input->post('search_pay_name', TRUE);
        $search_paycheck_status = $this->input->post('search_paycheck_status', TRUE);
        $search_product_status = $this->input->post('search_product_status', TRUE);
        $search_order_status = $this->input->post('search_order_status', TRUE);

        $url = 'admin/user/order_shop/order_shop/tablelist/?';

        if(!empty($search_orderid))
        {
            $url = $url.'&orderid='.$search_orderid;
        }

        if(!empty($search_title))
        {
            $url = $url.'&title='.$search_title;
        }

        if(!empty($search_receive_email))
        {
            $url = $url.'&receive_email='.$search_receive_email;
        }

        if(!empty($search_pay_name))
        {
            $url = $url.'&pay_name='.$search_pay_name;
        }

        if(!empty($search_receive_phone))
        {
            $url = $url.'&receive_phone='.$search_receive_phone;
        }

        if(!empty($search_paycheck_status))
        {
            $url = $url.'&paycheck_status='.$search_paycheck_status;
        }

        if(!empty($search_product_status))
        {
            $url = $url.'&product_status='.$search_product_status;
        }

        if(!empty($search_order_status))
        {
            $url = $url.'&order_status='.$search_order_status;
        }

        $this->load->model('Message');
        $this->Message->show([
            'message' => '資料存取中...',
            'url' => $url
        ]);
    }
}

?>