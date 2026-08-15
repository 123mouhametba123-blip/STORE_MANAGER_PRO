<?php

class Utilisateur
{
    private ?int $id;
    private string $nomComplet;
    private string $email;
    private string $motPasse;
    private ?string $tel;
    private int $roleId;

    public function __construct(
        string $nomComplet,
        string $email,
        string $motPasse,
        int $roleId,
        ?string $tel = null,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->nomComplet = $nomComplet;
        $this->email = $email;
        $this->motPasse = $motPasse;
        $this->roleId = $roleId;
        $this->tel = $tel;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomComplet(): string
    {
        return $this->nomComplet;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getMotPasse(): string
    {
        return $this->motPasse;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function getRoleId(): int
    {
        return $this->roleId;
    }
}