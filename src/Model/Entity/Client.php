<?php

class Client
{
    private ?int $id;
    private string $nom;
    private string $prenom;
    private ?string $email;
    private string $tel;
    private float $limiteCredit;

    public function __construct(
        string $nom,
        string $prenom,
        string $tel,
        ?string $email = null,
        float $limiteCredit = 0.0,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->tel = $tel;
        $this->email = $email;
        $this->limiteCredit = $limiteCredit;
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

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getTel(): string
    {
        return $this->tel;
    }

    public function getLimiteCredit(): float
    {
        return $this->limiteCredit;
    }

    public function peutPrendreCredit(float $montant): bool
    {
        return $montant <= $this->limiteCredit;
    }
}