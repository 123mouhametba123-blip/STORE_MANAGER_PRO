<?php

class Produit
{
    private ?int $id;
    private string $libelle;
    private float $prixVente;
    private int $stockActuel;
    private int $seuilAlerte;

    public function __construct(
        string $libelle,
        float $prixVente,
        int $stockActuel = 0,
        int $seuilAlerte = 5,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->prixVente = $prixVente;
        $this->stockActuel = $stockActuel;
        $this->seuilAlerte = $seuilAlerte;
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

    public function getPrixVente(): float
    {
        return $this->prixVente;
    }

    public function setPrixVente(float $prixVente): void
    {
        $this->prixVente = $prixVente;
    }

    public function getStockActuel(): int
    {
        return $this->stockActuel;
    }

    public function getSeuilAlerte(): int
    {
        return $this->seuilAlerte;
    }

    public function ajouterStock(int $quantite): void
    {
        $this->stockActuel += $quantite;
    }

    public function retirerStock(int $quantite): void
    {
        if ($quantite > $this->stockActuel) {
            throw new Exception("Stock insuffisant");
        }

        $this->stockActuel -= $quantite;
    }

    public function estEnAlerte(): bool
    {
        return $this->stockActuel <= $this->seuilAlerte;
    }
}