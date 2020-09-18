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
     * @param string $table - name of DB table
     * @param array $parameters to insert into DB
     */
    public function insert(string $table, array $parameters)
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

    /**
     * Update DB table.
     *
     * @param string $table - name of DB table
     * @param array $update - table column name (array index) and new value (array value)
     * @param string $condition - where condition
     */
    public function update(string $table, array $update, string $condition)
    {
        $separator = ', ';
        $updateString = '';

        foreach ($update as $updatable => $newValue) {

            if ($updatable === array_key_last($update)) {
                $separator = '';
            }

            $updateString .= "$updatable = '$newValue'" . $separator;
        }

        // Sql query
        $sql = "update $table set $updateString where $condition";

        try {

            $statement = $this->pdo->prepare($sql);
            $statement->execute();

        } catch (Exception $e) {

            die($e->getMessage());

        }
    }

    /**
     * Get data from DB.
     *
     * @param string $table - name of DB table
     * @param string $condition - 'where' condition
     * @return array
     */
    public function get(string $table, string $condition): array
    {
        // Sql query
        $sql = "select * from $table where $condition";

        try {

            $statement = $this->pdo->prepare($sql);
            $statement->execute();

        } catch (Exception $e) {

            die($e->getMessage());

        }

        // Return fetched data as object
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Create new database table.
     *
     * @param string $name of newly created table
     * @param array $parameters
     */
    public function createTable(string $name, array $parameters)
    {
        $string = '';
        $separator = ', ';

        foreach ($parameters as $column => $parameter) {

            if ($column === array_key_last($parameters)) {
                $separator = '';
            }

            $string .= $column . ' ' . strtoupper($parameter) . $separator;
        }

        // Sql query
        $sql = "create table $name ($string)";

        try {

            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            echo "Table '$name' successfully created";

        } catch (Exception $e) {

            echo $e->getMessage();

        }

    }

}