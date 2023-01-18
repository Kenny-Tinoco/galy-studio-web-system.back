<?php

namespace App\BusinnesController\Common;

use App\Common\SessionEntity;
use App\Dao\Repository\UserRepository;
use App\Dto\Input\UserInputDto;
use App\Dto\Input\UserLoginDto;
use App\Dto\Output\UserOutputDto;
use App\Entity\UserEntity;
use App\Utils\Contract;
use App\Utils\Utils;

class LoginController
{
    private SessionEntity $sessionEntity;
    private UserRepository $userRepository;
    
    public function __construct(UserRepository $userRepository, SessionEntity $sessionEntity)
    {
        $this->userRepository = $userRepository;
        $this->sessionEntity = $sessionEntity;
    }

	public function login(UserLoginDto $userLoginDto) : UserOutputDto
    {
        $user = $this->userRepository->findByUsername($userLoginDto->userName);
        
        if($user->verifyPassword($userLoginDto->password))
        {
            $this->sessionEntity->setUser($user);
        }
        
        return new UserOutputDto($user);
	}
 
	public function createAccount(UserInputDto $userDto) : UserOutputDto
	{
        $user = new UserEntity($userDto->userName, $userDto->password);
        
        $this->userRepository->create($user);
        
        return new UserOutputDto($user);
	}
 }