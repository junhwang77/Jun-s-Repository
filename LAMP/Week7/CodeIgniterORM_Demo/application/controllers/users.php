<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Controller {

    function Users()
    {
        parent::Controller();
    }

    function index()
    {
        $this->load->view('index');
        // Let's create a user
        // $u = new User();
        // $u->username = 'Fred Smith';
        // $u->password = 'apples';
        // $u->email = 'fred@smith.com';

        // And save them to the database (validation rules will run)
        // if ($u->save())
        // {
        //     // User object now has an ID
        //     echo 'ID: ' . $u->id . '<br />';
        //     echo 'Username: ' . $u->username . '<br />';
        //     echo 'Email: ' . $u->email . '<br />';
        //
        //     // Not that we'd normally show the password, but when we do, you'll see it has been automatically encrypted
        //     // since the User model is setup with an encrypt rule in the $validation array for the password field
        //     echo 'Password: ' . $u->password . '<br />';
        // }
        // else
        // {
        //     // If validation fails, we can show the error for each property
        //     echo $u->error->username;
        //     echo $u->error->password;
        //     echo $u->error->email;
        //
        //     // or we can loop through the error's all list
        // foreach ($u->error->all as $error)
        // {
        //     echo $error;
        // }
        //
        //     // or we can just show all errors in one string!
        //     echo $u->error->string;
        //
        //     // Each individual error is automatically wrapped with an error_prefix and error_suffix, which you can change (default: <p>error message</p>)
        }
    }

    function register()
    {
        // Create user object
        $u = new User();

        // Put user supplied data into user object
        // (no need to validate the post variables in the controller,
        // if you've set your DataMapper models up with validation rules)
        $u->username = $this->input->post('username');
        $u->password = $this->input->post('password');
        $u->confirm_password = $this->input->post('confirm_password');
        $u->email = $this->input->post('email');

        // Attempt to save the user into the database
        if ($u->save())
        {
            $this->session->set_flashdata('message', '<p>You have successfully registered</p>');
            redirect(base_url());
        }
        else
        {
             $this->session->set_flashdata('message', $u->error->string);
             redirect(base_url());
        }
    }

    function login()
    {
        // Create user object
        $u = new User();

        // Put user supplied data into user object
        // (no need to validate the post variables in the controller,
        // if you've set your DataMapper models up with validation rules)
        $u->username = $this->input->post('username');
        $u->password = $this->input->post('password');

        // Attempt to log user in with the data they supplied, using the login function setup in the User model
        // You might want to have a quick look at that login function up the top of this page to see how it authenticates the user
        if ($u->login())
        {
            $this->session->set_userdata('user', $u);
            $user=$this->session->userdata('user');
            $this->load->view('success', $user);
            // echo '<p>Welcome ' . $u->username . '!</p>';
            // echo '<p>You have successfully logged in so now we know that your email is ' . $u->email . '.</p>';
        }
        else
        {
            // Show the custom login error message
            echo '<p>' . $u->error->login . '</p>';
        }
    }
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */
