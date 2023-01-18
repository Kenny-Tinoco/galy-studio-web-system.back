<?php

namespace App\Dto\Output;

use App\Entity\UserEntity;

class UserOutputDto
{
    public readonly string $userId;
    
    public readonly string $userName;
    
    public function __construct(UserEntity $userEntity)
    {
        $this->userId = $userEntity->getUserId();
        $this->userName = $userEntity->getUserName();
    }
}