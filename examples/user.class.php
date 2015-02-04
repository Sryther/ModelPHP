<?php
/**
* User
*/
class User extends Model
{
    protected static function attributes() {
        return ['fullName', 'password', 'email', 'isAdmin', 'rememberToken'];
    }

    protected static function primary() {
        return 'username';
    }

    protected static function defaults() {
        return ['isAdmin' => false, 'rememberToken' => ''];
    }

    public function name() {
        return $this->_username;
    }

    function __construct($arguments = [])
    {
        // TODO $arguments
        parent::__construct();
    }
}

?>
