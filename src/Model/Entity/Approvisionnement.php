<?php

class Approvisionnement
{
    private ?int $id;
    private string $refBl;
    private float $montantTotal;
    private int $fournisseurId;
    private int $statutApproId;
    private int $utilisateurId;

    public function __construct(
        string $refBl,
        float $montantTotal,
        int $fournisseurId,
        int $statutApproId,
        int $utilisateurId,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->refBl = $refBl;
        $this->montantTotal = $montantTotal;
        $this->fournisseurId = $fournisseurId;
        $this->statutApproId = $statutApproId;
        $this->utilisateurId = $utilisateurId;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefBl(): string
    {
        return $this->refBl;
    }

    public function getMontantTotal(): float
    {
        return $this->montantTotal;
    }

    public function getFournisseurId(): int
    {
        return $this->fournisseurId;
    }

    public function getStatutApproId(): int
    {
        return $this->statutApproId;
    }

    public function getUtilisateurId(): int
    {
        return $this->utilisateurId;
    }
}