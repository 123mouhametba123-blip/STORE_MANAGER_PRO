<?php

class ModePaiement
{
    private ?int $id;
    private string $libelle;

    public function __construct(string $libelle, ?int $id = null)
    {
        $this->id = $id;
        $this->libelle = $libelle;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
    }
}