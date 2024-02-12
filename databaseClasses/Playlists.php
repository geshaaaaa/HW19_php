<?php

class Playlists
{
    private string $table = 'playlists';
    private PDO $connector;

    public function __construct(PDO $connector)
    {
        $this->setConnector($connector);
    }


    public function insertPlaylist(string $name, ?string $vibe = null): void
    {
        $connector = $this->getConnector();
        $table = $this->getTable();
        $sql = "INSERT INTO {$table} (name, vibe) VALUES (? , ?)";
        $stmt = $connector->prepare($sql);
        $stmt->execute([
                $name,
                $vibe
            ]
        );
    }

    public function searchPlaylistName(string $name)
    {
        $connector = $this->getConnector();
        $table = $this->getTable();
        $sql = "SELECT * FROM $table WHERE name = ? ";
        $stmt = $connector->prepare($sql);
        $stmt->execute([$name]);
        print_r($stmt->fetch(PDO::FETCH_ASSOC));
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







