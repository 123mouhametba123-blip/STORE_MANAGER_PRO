<?php

class LigneApprovisionnement
{
    private ?int $id;
    private int $qteCommandee;
    private int $qteRecue;
    private float $prixAchatUnitaire;
    private int $approvisionnementId;
    private int $produitId;

    public function __construct(
        int $qteCommandee,
        float $prixAchatUnitaire,
        int $approvisionnementId,
        int $produitId,
        int $qteRecue = 0,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->qteCommandee = $qteCommandee;
        $this->qteRecue = $qteRecue;
        $this->prixAchatUnitaire = $prixAchatUnitaire;
        $this->approvisionnementId = $approvisionnementId;
        $this->produitId = $produitId;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQteCommandee(): int
    {
        return $this->qteCommandee;
    }

    public function getQteRecue(): int
    {
        return $this->qteRecue;
    }

    public function getPrixAchatUnitaire(): float
    {
        return $this->prixAchatUnitaire;
    }

    public function getApprovisionnementId(): int
    {
        return $this->approvisionnementId;
    }

    public function getProduitId(): int
    {
        return $this->produitId;
    }

    public function getSousTotal(): float
    {
        return $this->qteCommandee * $this->prixAchatUnitaire;
    }

    public function enregistrerReception(int $quantite): void
    {
        if ($quantite > $this->qteCommandee) {
            throw new Exception("La quantité reçue dépasse la quantité commandée");
        }

        $this->qteRecue = $quantite;
    }
}