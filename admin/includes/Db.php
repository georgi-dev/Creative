<?php

/**
 * Example usage:
 * $db = new Db('SELECT * FROM users WHERE users_id=:userid');
 * print_r($db->fetch(array(":userid" => 2)));
 *
 */
class Db
{
    private $_pdo;
    private $_query;
    private $_rst;
    private $_result;
    private $_debug = false;

    public function __construct($query, $debug = false)
    {
        $this->_query = $query;
        $this->_debug = $debug;
        $this->_pdo = new PDO(DB_CONN_STRING, DB_USER, DB_PASSWORD);
        $this->_rst = $this->_pdo->prepare($this->_query);
    }

    public function fetch($binds = null)
    {
        if ($this->_debug === true) {
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->_sql_debug($this->_rst->queryString, $binds);
            try {
                $this->_rst->execute($binds);
                $this->_result = $this->_rst->fetch(PDO::FETCH_ASSOC);

                return $this->_result;
            } catch (PDOException $e) {
                Debug::var_debug("SQL ERROR: " . print_r($e->errorInfo, true));

                return false;
            }
        } else {
            $this->_rst->execute($binds);
            $this->_result = $this->_rst->fetch(PDO::FETCH_ASSOC);

            return $this->_result;
        }
    }

    public function fetchAll($binds = null)
    {
        if ($this->_debug === true) {
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->_sql_debug($this->_rst->queryString, $binds);
            try {
                $this->_rst->execute($binds);
                $this->_result = $this->_rst->fetchAll(PDO::FETCH_ASSOC);

                return $this->_result;
            } catch (PDOException $e) {
                Debug::var_debug("SQL ERROR: " . print_r($e->errorInfo, true));

                return false;
            }
        } else {
            $this->_rst->execute($binds);
            $this->_result = $this->_rst->fetchAll(PDO::FETCH_ASSOC);

            return $this->_result;
        }
    }

    public function query($binds = null)
    {
        if ($this->_debug === true) {
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->_sql_debug($this->_rst->queryString, $binds);
            try {
                $this->_rst->execute($binds);
                
                return $this->_pdo->lastInsertId();
            } catch (PDOException $e) {
                Debug::var_debug("SQL ERROR: " . print_r($e->errorInfo, true));
            }
        } else {
            $this->_rst->execute($binds);

            return $this->_pdo->lastInsertId();
        }
    }

    private function _sql_debug($_query, $binds = null)
    {
        if ($binds !== null) {
            foreach ($binds as $key => $value)
            {
                $_query = str_replace($key, "'" . $value . "'", $_query);
            }   
        }
        Debug::var_debug($_query);
    }

}
