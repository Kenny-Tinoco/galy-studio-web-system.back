<?php

namespace App\Dto\Input;

use App\Http\Request\RequestDto;
use Symfony\Component\HttpFoundation\Request;

class UserInputDto implements RequestDto
{
    public readonly string $userName;
    
    public readonly string $password;
    
    public readonly string $roles;
    
    public function __construct(Request $request)
    {
        $this->userName = $request->request->get("userName");
        $this->password = $request->request->get("password");
        $this->roles = $request->request->get("roles");
    }
}