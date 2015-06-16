<?php

class user {

    public $UserID;
    public $Role;
    public $UserEmail;
    public $UserPassword;

    function section($userID, $role, $userEmail, $userPassword) {
        $this->UserID = $userID;
        $this->Role = $role;
        $this->UserEmail = $userEmail;
        $this->UserPassword = $userPassword;
    }

}
