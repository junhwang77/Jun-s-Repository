<?php

class User extends DataMapper {

    var $has_many = array('book');
    var $has_one = array('country');

    var $validation = array(
        'username' => array(
            'label' => 'Username',
            'rules' => array('required', 'trim', 'unique', 'alpha_dash', 'min_length' => 3, 'max_length' => 20),
        ),
        'password' => array(
            'label' => 'Password',
            'rules' => array('required', 'min_length' => 6, 'encrypt'),
        ),
        'confirm_password' => array(
            'label' => 'Confirm Password',
            'rules' => array('required', 'encrypt', 'matches' => 'password'),
        ),
        'email' => array(
            'label' => 'Email Address',
            'rules' => array('required', 'trim', 'valid_email')
        )
    );

    function login()
    {
        $u = new User();
        $u->where('username', $this->username)->get();
        $this->salt = $u->salt;
        $this->validate()->get();
        if (empty($this->id))
        {
            $this->error_message('login', 'Username or password invalid');

            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    function _encrypt($field)
    {
        if (!empty($this->{$field}))
        {
            if (empty($this->salt))
            {
                $this->salt = md5(uniqid(rand(), true));
            }

            $this->{$field} = sha1($this->salt . $this->{$field});
        }
    }
}

/* End of file user.php */
/* Location: ./application/models/user.php */
