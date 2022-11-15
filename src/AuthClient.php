<?php

namespace App;
use GuzzleHttp\Client;
define('STRAPI_API_BASE_URL', 'http://localhost:1337/api/');

class AuthClient
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => STRAPI_API_BASE_URL,
            'headers' => [
                'Accept' => 'applications/json',
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    public function register ($username, $email, $password)
    {
        $registration_heading = 'http://localhost:1337/api/auth/local/register';
        return $this->client->post($registration_heading, [
            'json' => [
                'username' => $username,
                'email' => $email,
                'password' => $password
            ]
        ]);
    }

    public function login ($identifier, $password)
    {
        $login_heading = 'http://localhost:1337/api/auth/local';
        return $this->client->post($login_heading, [
            'json' => [
                'identifier' => $identifier,
                'password' => $password
            ]
        ]);
    }
}