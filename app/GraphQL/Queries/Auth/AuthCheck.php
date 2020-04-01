<?php

namespace App\GraphQL\Queries\Auth;

use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Laravel\Passport\Passport;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Rsa\Sha256;
use Lcobucci\JWT\ValidationData;

class AuthCheck
{
    public function resolve($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        if($context->request()->hasHeader('authorization') || $context->request()->hasHeader('Authorization')){

            $token = $context->request()->hasHeader('authorization') ?
                $context->request()->header('authorization') : $context->request()->header('Authorization');

            // Removes white spaces from the token and then remove the 'bearer' word which is 6 chars in length
            $token = substr(preg_replace('/\s/', '', $token), 6);
            $user = $this->validateToken($token);

            return $user ? true : false;

        }
    }

    private function isAccessTokenRevoked($tokenId) {
        return DB::table('oauth_access_tokens')
            ->where('id', $tokenId)->where('revoked', 1)->exists();
    }

    private function validateToken($jwt) {

        try {
            $token = (new Parser())->parse($jwt);
        }catch (\Exception $exception){
            Log::notice('Failed to parse token: '.$jwt, [
                'refer to' => 'https://github.com/lexik/LexikJWTAuthenticationBundle/blob/master/Resources/doc/index.md#important-note-for-apache-users',
                'trace' => $exception->getTraceAsString()
            ]);
            return false;
        }

        if ($token->verify(new Sha256(), file_get_contents(Passport::keyPath('oauth-public.key'))) === false) {
            // throw OAuthServerException::accessDenied('Access token could not be verified');
            return false;
        }

        // Ensure access token hasn't expired
        $data = new ValidationData();
        $data->setCurrentTime(time());

        if ($token->validate($data) === false) {
            // throw OAuthServerException::accessDenied('Access token is invalid');
            return false;
        }

        // Check if token has been revoked
        if ($this->isAccessTokenRevoked($token->getClaim('jti'))) {
            // throw OAuthServerException::accessDenied('Access token has been revoked');
            return false;
        }

        return [
            'user_id' => $token->getClaim('sub')
        ];
    }
}
