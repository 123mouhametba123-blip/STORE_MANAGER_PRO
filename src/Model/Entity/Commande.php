<?php

class Commande
{
    private ?int $id;
    private float $montantTotal;
    private float $montantPaye;
    private bool $estCredit;
    private int $clientId;
    private int $modePaiementId;
    private int $utilisateurId;

    public function __construct(
        float $montantTotal,
        int $clientId,
        int $modePaiementId,
        int $utilisateurId,
        float $montantPaye = 0.0,
        bool $estCredit = false,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->montantTotal = $montantTotal;
        $this->montantPaye = $montantPaye;
        $this->estCredit = $estCredit;
        $this->clientId = $clientId;
        $this->modePaiementId = $modePaiementId;
        $this->utilisateurId = $utilisateurId;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantTotal(): float
    {
        return $this->montantTotal;
    }

    public function getMontantPaye(): float
    {
        return $this->montantPaye;
    }

    public function getMontantRestant(): float
    {
        return $this->montantTotal - $this->montantPaye;
    }

    public function estCredit(): bool
    {
        return $this->estCredit;
    }

    public function getClientId(): int
    {
        return $this->clientId;
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