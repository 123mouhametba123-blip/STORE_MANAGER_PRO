<?php

class Dette
{
    private ?int $id;
    private float $montantInitial;
    private float $montantRestant;
    private string $statut;
    private ?string $dateEcheance;
    private int $commandeId;

    public function __construct(
        float $montantInitial,
        int $commandeId,
        float $montantRestant,
        string $statut = 'EN_COURS',
        ?string $dateEcheance = null,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->montantInitial = $montantInitial;
        $this->montantRestant = $montantRestant;
        $this->statut = $statut;
        $this->dateEcheance = $dateEcheance;
        $this->commandeId = $commandeId;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantInitial(): float
    {
        return $this->montantInitial;
    }

    public function getMontantRestant(): float
    {
        return $this->montantRestant;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function getDateEcheance(): ?string
    {
        return $this->dateEcheance;
    }

    public function getCommandeId(): int
    {
        return $this->commandeId;
    }

    public function enregistrerPaiement(float $montant): void
    {
        if ($montant > $this->montantRestant) {
            throw new Exception("Le paiement dépasse la dette");
        }

        $this->montantRestant -= $montant;

        if ($this->montantRestant == 0) {
            $this->statut = 'SOLDEE';
        }
    }
}