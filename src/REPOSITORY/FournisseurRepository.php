<?php
require_once dirname(__DIR__)."/Model/Entity/Fournisseur.php";

class FournisseurRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll(): array
    {
        $sql = "
            SELECT *
            FROM fournisseurs
            ORDER BY id DESC
        ";

        $stmt = $this->pdo->query($sql);

        $fournisseurs = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $fournisseurs[] = new Fournisseur(
                $row['nom'],
                $row['tel'],
                $row['email'],
                $row['adresse'],
                (int) $row['id']
            );
        }

        return $fournisseurs;
    }

    public function findById(int $id): ?Fournisseur
    {
        $sql = "
            SELECT *
            FROM fournisseurs
            WHERE id = :id
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Fournisseur(
            $row['nom'],
            $row['tel'],
            $row['email'],
            $row['adresse'],
            (int) $row['id']
        );
    }

    public function save(Fournisseur $fournisseur): void
    {
        $sql = "
            INSERT INTO fournisseurs (
                nom,
                email,
                tel,
                adresse
            )
            VALUES (
                :nom,
                :email,
                :tel,
                :adresse
            )
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'nom' => $fournisseur->getNom(),
            'email' => $fournisseur->getEmail(),
            'tel' => $fournisseur->getTel(),
            'adresse' => $fournisseur->getAdresse()
        ]);
    }

    public function delete(int $id): void
    {
        $sql = "
            DELETE FROM fournisseurs
            WHERE id = :id
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);
    }
}