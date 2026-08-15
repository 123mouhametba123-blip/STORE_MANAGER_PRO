<?php

class PaiementDette
{
    private ?int $id;
    private float $montant;
    private int $detteId;
    private int $modePaiementId;
    private int $utilisateurId;

    public function __construct(
        float $montant,
        int $detteId,
        int $modePaiementId,
        int $utilisateurId,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->montant = $montant;
        $this->detteId = $detteId;
        $this->modePaiementId = $modePaiementId;
        $this->utilisateurId = $utilisateurId;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): float
    {
        return $this->montant;
    }

    public function getDetteId(): int
    {
        return $this->detteId;
    }

    public function getModePaiementId(): int
    {
        return $this->modePaiementId;
    }

    public function getUtilisateurId(): int
    {
        return $this->utilisateurId;
    }
}