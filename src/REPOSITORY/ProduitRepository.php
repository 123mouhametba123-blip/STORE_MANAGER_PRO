<?php

require_once dirname(__DIR__)."/Model/Entity/Produit.php";

class ProduitRepository
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
            FROM produits
            ORDER BY id DESC
        ";

        $stmt = $this->pdo->query($sql);

        $produits = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $produits[] = new Produit(
                $row['libelle'],
                (float) $row['prix_vente'],
                (int) $row['stock_actuel'],
                (int) $row['seuil_alerte'],
                (int) $row['id']
            );
        }

        return $produits;
    }

    public function findById(int $id): ?Produit
    {
        $sql = "
            SELECT *
            FROM produits
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

        return new Produit(
            $row['libelle'],
            (float) $row['prix_vente'],
            (int) $row['stock_actuel'],
            (int) $row['seuil_alerte'],
            (int) $row['id']
        );
    }

    public function save(Produit $produit): void
    {
        $sql = "
            INSERT INTO produits (
                libelle,
                prix_vente,
                stock_actuel,
                seuil_alerte
            )
            VALUES (
                :libelle,
                :prix_vente,
                :stock_actuel,
                :seuil_alerte
            )
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'libelle' => $produit->getLibelle(),
            'prix_vente' => $produit->getPrixVente(),
            'stock_actuel' => $produit->getStockActuel(),
            'seuil_alerte' => $produit->getSeuilAlerte()
        ]);
    }

    public function delete(int $id): void
    {
        $sql = "
            DELETE FROM produits
            WHERE id = :id
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);
    }
}