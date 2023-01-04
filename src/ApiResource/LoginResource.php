<?php

namespace App\ApiResource;

use App\Controller\Common\LoginController;
use App\Dto\UserDto;
use App\HTTP\Response\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class LoginResource extends BaseResource
{
    private LoginController $loginController;
    
    public function __construct(LoginController $loginController)
    {
        $this->loginController = $loginController;
    }
    
    public function login(Request $request) : JsonResponse
    {
        $data = \json_decode($request->getContent(), true);
    
        $result = $this->loginController->login($data['userName']);
        
        return $this->createResponse( ['result' => $result], ApiResponse::HTTP_OK);
    }
    
    public function createAccount(Request $request) : JsonResponse
    {
        $data = \json_decode($request->getContent(), true);
        
        return $this->createResponse( ['result ' => true], ApiResponse::HTTP_OK);
    }
    
    
    public function changePassword(Request $request) : JsonResponse
    {
        return new JsonResponse
        (
            ['result' => 'Todo ok']
        );
    }
}