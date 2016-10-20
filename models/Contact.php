<?php

class Contact extends ObjDbBase
{
    public $updatetime_DateTime;
    public $db_name_arr = ['contact'];//填寫物件聯繫資料庫之名稱
    public $db_uniqueid = 'contactid';//填寫物件聯繫資料庫之唯一ID
    public $db_field_arr = [//填寫資料庫欄位與本物件屬性之關係，前者為資料庫欄位，後者為屬性
        'contactid' => 'contactid',
        'username' => 'username',
        'gender' => 'gender',
        'email' => 'email',
        'phone' => 'phone',
        'line' => 'line',
        'hospital' => 'hospital',
        'vipcode' => 'vipcode',
        'content' => 'content',
        'classtype' => 'classtype',
        'status_process' => 'status_process',
        'contact_time' => 'contact_time',
        'updatetime' => ['updatetime_DateTime', 'datetime'],
        'locale' => 'locale',
        'status' => 'status'
    ];
	
	public function construct($arg = [])
	{
        //將引數設為物件屬性，或將引數作為物件型屬性的建構值
        $this->set('contactid', $arg['contactid']);
        $this->set('username', $arg['username']);
        $this->set('gender', $arg['gender']);
        $this->set('email', $arg['email']);
        $this->set('phone', $arg['phone']);
        $this->set('line', $arg['line']);
        $this->set('hospital', $arg['hospital']);
        $this->set('vipcode', $arg['vipcode']);
        $this->set('content', $arg['content']);
        $this->set('classtype', $arg['classtype']);
        $this->set('status_process', $arg['status_process']);
        $this->set('contact_time', $arg['contact_time']);
        $this->set('updatetime_DateTime', [
            'datetime' => $arg['updatetime'],
            'inputtime_date' => $arg['start_inputtime_date'],
            'inputtime_time' => $arg['start_inputtime_time']
        ], 'DateTimeObj');
        $this->set__locale(['locale' => $arg['locale']]);
        $this->set__status(['status' => $arg['status']]);

        return TRUE;
    }
    
}