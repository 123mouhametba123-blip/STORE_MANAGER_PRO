<?php

class LigneCommande
{
    private ?int $id;
    private int $quantite;
    private float $prixUnitaire;
    private int $commandeId;
    private int $produitId;

    public function __construct(
        int $quantite,
        float $prixUnitaire,
        int $commandeId,
        int $produitId,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->quantite = $quantite;
        $this->prixUnitaire = $prixUnitaire;
        $this->commandeId = $commandeId;
        $this->produitId = $produitId;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): int
    {
        return $this->quantite;
    }

    public function getPrixUnitaire(): float
    {
        return $this->prixUnitaire;
    }

    public function getCommandeId(): int
    {
        return $this->commandeId;
    }

    public function getProduitId(): int
    {
        return $this->produitId;
    }

    public function getSousTotal(): float
    {
        return $this->quantite * $this->prixUnitaire;
    }
}