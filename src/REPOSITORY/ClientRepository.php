<?php

require_once dirname(__DIR__)."/Model/Entity/Client.php";

class ClientRepository
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
            FROM clients
            ORDER BY id DESC
        ";

        $stmt = $this->pdo->query($sql);

        $clients = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $clients[] = new Client(
                $row['nom'],
                $row['prenom'],
                $row['tel'],
                $row['email'],
                (float) $row['limite_credit'],
                (int) $row['id']
            );
        }

        return $clients;
    }

    public function findById(int $id): ?Client
    {
        $sql = "
            SELECT *
            FROM clients
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

        return new Client(
            $row['nom'],
            $row['prenom'],
            $row['tel'],
            $row['email'],
            (float) $row['limite_credit'],
            (int) $row['id']
        );
    }

    public function save(Client $client): void
    {
        $sql = "
            INSERT INTO clients (
                nom,
                prenom,
                email,
                tel,
                limite_credit
            )
            VALUES (
                :nom,
                :prenom,
                :email,
                :tel,
                :limite_credit
            )
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'nom' => $client->getNom(),
            'prenom' => $client->getPrenom(),
            'email' => $client->getEmail(),
            'tel' => $client->getTel(),
            'limite_credit' => $client->getLimiteCredit()
        ]);
    }

    public function delete(int $id): void
    {
        $sql = "
            DELETE FROM clients
            WHERE id = :id
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);
    }
}