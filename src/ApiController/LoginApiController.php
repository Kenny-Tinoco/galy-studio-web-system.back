<?php

namespace App\ApiController;

use App\BusinnesController\Common\LoginController;
use App\Dto\Input\UserInputDto;
use App\Http\Response\ApiResponse;

class LoginApiController extends BaseApiController
{
    private LoginController $loginController;
    
    public function __construct(LoginController $loginController)
    {
        $this->loginController = $loginController;
    }
    
    public function login(UserInputDto $userDto) : ApiResponse
    {
        $userOutputDto = $this->loginController->login($userDto->userName);
        
        return $this->createResponse($userOutputDto, ApiResponse::HTTP_ACCEPTED);
    }
    
    public function createAccount(UserInputDto $userDto) : ApiResponse
    {
        $userOutputDto = $this->loginController->createAccount($userDto);
        
        return $this->createResponse($userOutputDto, ApiResponse::HTTP_CREATED);
    }
}
