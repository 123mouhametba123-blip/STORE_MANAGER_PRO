<?php

class Fournisseur
{
    private ?int $id;
    private string $nom;
    private ?string $email;
    private string $tel;
    private ?string $adresse;

    public function __construct(
        string $nom,
        string $tel,
        ?string $email = null,
        ?string $adresse = null,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->tel = $tel;
        $this->email = $email;
        $this->adresse = $adresse;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getTel(): string
    {
        return $this->tel;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }
}