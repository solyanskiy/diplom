<?php


namespace Engine\Core\Database;

use \PDO;
use Engine\Core\Config\Config;

/**
 * Class Connection
 * @package Engine\Core\Database
 */
class Connection
{
    /**
     * @var
     */
    private $link;

    /**
     * Connection constructor.
     */
    public function __construct()
    {
        $this -> connect();
    }


    private function connect()
    {
        $config = Config ::file('database');

        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['database'] . ';charset=' . $config['charset'];

        $this -> link = new PDO($dsn, $config['username'], $config['password']);

        return $this;
    }

    /**
     * @param $sql
     * @return mixed
     */
    public function execute($sql)
    {
        $sth = $this -> link -> prepare($sql);

        return $sth -> execute();
    }

    /**
     * @param $sql
     * @param array $values
     * @param $statement
     * @return array
     */
    public function query($sql, $values = [], $statement = PDO::FETCH_OBJ)
    {
        $sth = $this -> link -> prepare($sql);

        $sth -> execute($values);

        $result = $sth -> fetchALL(PDO::FETCH_ASSOC);

        if ($result === false) {
            return [];
        }

        return $result;
    }

    /**
     * @return mixed
     */
    public function lastInsertId()
    {
        return $this -> link -> lastInsertId();
    }
}
