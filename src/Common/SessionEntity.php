<?php

namespace App\Common;

use App\Entity\UserEntity;

class SessionEntity
{
	private ?UserEntity $user;
 
	public function __construct(UserEntity $user = null)
    {
        $this->user = $user;
	}

	public function getUser() : UserEntity
    {
        return $this->user;
	}

	public function setUser(UserEntity $user) : void
    {
        $this->user = $user;
	}
    
    public function isLoggedOut() : bool
    {
        return (bool)$this -> user;
    }
}
