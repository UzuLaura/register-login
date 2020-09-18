<?php

class Connection
{
    /**
     * Connect to database
     * and catch exceptions if connection fails.
     *
     * @param array $config database connection information
     * @return PDO
     */
    public static function make(array $config)
    {
        try {

            return new PDO(
                $config['connection'].';dbname='.$config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );

        } catch (PDOException $exception) {

            die($exception->getMessage());

        }
    }
}