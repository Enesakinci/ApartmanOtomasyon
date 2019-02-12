<?php
/**
 * Created by PhpStorm.
 * User: AHMETGÜRKANYÜKSEK
 * Date: 27.10.2018
 * Time: 16:10
 */

class dbConfig
{
    protected $dbConfig = array();
    protected function createConfig() {
        $this->dbConfig['host'] = 'localhost';
        $this->dbConfig['username'] = 'root';
        $this->dbConfig['password'] = '';
        $this->dbConfig['dbname'] = 'apartman';
    }
}