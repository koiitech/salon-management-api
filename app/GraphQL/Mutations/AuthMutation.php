<?php

namespace App\GraphQL\Mutations;

use App\User;
use Exception;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class AuthMutation
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    // public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    // {
    //     // TODO implement the resolver
    // }

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

    public function createPage($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        Log::debug($rootValue);
        Log::debug($args);
       
    }
}
