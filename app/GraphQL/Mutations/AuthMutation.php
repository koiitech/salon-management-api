<?php

namespace App\GraphQL\Mutations;

use App\Employee;
use App\User;
use Exception;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class AuthMutation
{
    public function login($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        Log::debug($rootValue);
        Log::debug($args);
        $user = User::where('email', $args['email'])->first();
        if ($user && Hash::check($args['password'], $user->password)) {
            $result = $user->createToken('Token Name');
            Log::debug($result);
            return [
                'user' => $user,
                'token' => [
                    'access_token' => $result->accessToken,
                    'created_at' => $result->token->created_at,
                    'expires_at' => $result->token->expires_at
                ]
            ];
        } else {
            throw new Exception("Email hoặc mật khẩu không chính xác");
        }
    }
    
    public function loginEmployee($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = Employee::where('email', $args['email'])->first();
        if ($user && Hash::check($args['password'], $user->password)) {
            $result = $user->createToken('Token Name');
            return [
                'user' => $user,
                'token' => [
                    'access_token' => $result->accessToken,
                    'created_at' => $result->token->created_at,
                    'expires_at' => $result->token->expires_at
                ]
            ];
        } else {
            throw new Exception("Email hoặc mật khẩu không chính xác");
        }
    }
    
    public function register($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        Log::debug($rootValue);
        Log::debug($args);
        $user = User::where('email', $args['email'])->first();
        if ($user && Hash::check($args['password'], $user->password)) {
            $result = $user->createToken('Token Name');
            Log::debug($result);
            return [
                'user' => $user,
                'token' => [
                    'access_token' => $result->accessToken,
                    'created_at' => $result->token->created_at,
                    'expires_at' => $result->token->expires_at
                ]
            ];
        } else {
            throw new Exception("Email hoặc mật khẩu không chính xác");
        }
        // Log::debug($context);
        // Log::debug($resolveInfo);
    }
}
