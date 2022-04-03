<?php

namespace appli\repository;

use appli\entity\User;
use appli\framework\PDOConnection;

class UserSession
{
    const USER_KEY ='user';
    
    // Enregistre les données de l'utilisateur en session
    public function register(int $id, string $firstname, string $name, string $login, string $email, string $role)
    {
        // Enregistrement des données en session
        $_SESSION[self::USER_KEY] = [
            'id' => $id,
            'firstname' => $firstname,
            'name' => $name,
            'login' => $login,
            'email' => $email,
            'role' => $role,
            'token' => [] 
        ];
    }

    // Est-ce que l'utilisateur est connecté ?
    public function isConnected(): bool 
    {
        return array_key_exists(self::USER_KEY, $_SESSION) && isset($_SESSION[self::USER_KEY]);
    }

    // Déconnexion de l'utilisateur
    public function logout()
    {
        // 1. On efface les données enregistrées en session
        $_SESSION[self::USER_KEY] = null;

        // 2. On détruit la session
        session_destroy();
    }

    public function getId(): ?int
    {
        if (!$this->isConnected()) {
            return null;
        }

        return $_SESSION[self::USER_KEY]['id'];
    }

    public function getFirstname(): ?string
    {
        if (!$this->isConnected()) {
            return null;
        }

        return $_SESSION[self::USER_KEY]['firstname'];
    }

    public function getName(): ?string
    {
        if (!$this->isConnected()) {
            return null;
        }

        return $_SESSION[self::USER_KEY]['name'];
    }

    public function getEmail(): ?string
    {
        if (!$this->isConnected()) {
            return null;
        }

        return $_SESSION[self::USER_KEY]['email'];
    }

    public function getRole(): ?string
    {
        if (!$this->isConnected()) {
            return null;
        }

        return $_SESSION[self::USER_KEY]['role'];
    }

    public function getToken(string $target): ?string
    {
        if (!$this->isConnected()) {
            return null;
        }

        return $_SESSION[self::USER_KEY]['token'] [$target];
    }

    public function setToken(string $target, string $token): void
    {
        if (!$this->isConnected()) {
            return;
        }

       $_SESSION[self::USER_KEY]['token'] [$target] = $token;
    }
}

