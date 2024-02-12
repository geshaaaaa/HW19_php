<?php


class Songs
{
    private string $table = 'songs';
    private PDO $connector;

    public function __construct(PDO $connector)
    {
        $this->setConnector($connector);
    }

    public function insertSong(string $name, ?string $type = null, ?int $year = null, ?int $singerId = null)
    {
        $connector = $this->getConnector();
        $table = $this->getTable();
        $sql = "INSERT INTO $table (song_name,song_type,song_year,singer_id) VALUES (?, ?, ?,?)";
        $stmt = $connector->prepare($sql);
        $stmt->execute(
            [
                $name,
                $type,
                $year,
                $singerId
            ]);

    }

    public function searchOrderYearSongs()
    {
        $connector = $this->getConnector();
        $table = $this->getTable();
        $sql = "SELECT * FROM $table ORDER BY song_year";
        $stmt = $connector->prepare($sql);
        $stmt->execute();
        print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
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