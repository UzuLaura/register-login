<?php

class QueryBuilder
{
    /**
     * @var PDO
     */
    protected $pdo;

    /**
     * QueryBuilder constructor.
     *
     * @param PDO $pdo DB connection
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Handle DB inserts.
     *
     * @param string $table - name of db table
     * @param array $parameters to insert into db
     */
    public function insert($table, $parameters)
    {
        // Sql query
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {

            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);

        } catch (Exception $e) {

            die($e->getMessage());

        }
    }

    public function get($table, $condition)
    {
        // Sql query
        $sql = sprintf(
            'select * from %s where %s',
            $table,
            $condition
        );

        try {

            $statement = $this->pdo->prepare($sql);
            $statement->execute();

        } catch (Exception $e) {

            die($e->getMessage());
        }

        // Return fetched data as object
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

}