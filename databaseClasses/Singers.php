<?php

class Singers
{
    private string $table = "singers";
    private PDO $connector;


    public function __construct(PDO $connector)
    {
        $this->setConnector($connector);
    }

    public function insertSinger(string $name, string $gender, ?int $old = null): void
    {
        $table = $this->getTable();
        $connector = $this->getConnector();
        $sql = "INSERT INTO $table (name, old, gender) VALUES (?,?,?)";
        $stmt = $connector->prepare($sql);
        $stmt->execute(
            [
                $name,
                $old,
                $gender
            ]
        );
    }

    public function searchGenderSinger(string $gender): void
    {
        $table = $this->getTable();
        $connector = $this->getConnector();
        $sql = "SELECT * FROM $table WHERE gender = ?";
        $stmt = $connector->prepare($sql);
        $stmt->execute([$gender]);
        print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function deleteSinger(string $name): void
    {
        $table = $this->getTable();
        $connector = $this->getConnector();
        $sql = "DELETE FROM $table WHERE name = ?";
        $stmt = $connector->prepare($sql);
        $stmt->execute([$name]);
    }

    public function changeName($name, $nameToChange)
    {
        $table = $this->getTable();
        $connector = $this->getConnector();
        $sql = "UPDATE $table SET name = ? WHERE name = ?";
        $stmt = $connector->prepare($sql);
        $stmt->execute([
            $nameToChange,
            $name
        ]);
    }

    /**
     * @return PDO
     */
    public function getConnector(): PDO
    {
        if (!isset($this->connector)) {
            throw new Exception("Connector does not set");
        }
        return $this->connector;
    }

    /**
     * @param PDO $connector
     */
    public function setConnector(PDO $connector): void
    {
        $this->connector = $connector;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }
}