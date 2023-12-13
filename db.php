<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB
{
    protected $table;
    protected $pdo;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=bquiz";

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }


    function all($where = '', $other = '')
    {
        $sql = "select * from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count($where = '', $other = '')
    {
        $sql = "select count(*) from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }


    // function math($math, $col, $array = '', $other = '')
    // {
    //     $sql = "select $math(`$col`) from `$this->table` ";
    //     $sql = $this->sql_all($sql, $array, $other);
    //     return $this->pdo->query($sql)->fetchColumn();
    // }

    function math($math, $col, $array = '', $other = '')
    {
        $sql = "select $math(`$col`) from `$this->table` ";
        $sql = $this->sql_all($sql, $array, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }

    // function sum($col, $where = '', $other = '')
    // {
    //     return $this->math('sum', $col, $where, $other);
    // }

    function sum($col, $where = '', $other = '')
    {
        return $this->math('sum', $col, $where, $other);
    }

    function find($id)
    {
        $sql = "select * from `$this->table` ";
        if (is_array($id)) {
            $tmp = $this->array2sql($id);
            $sql .= " where " . join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= " where `id` = '$id'";
        } else {
            echo "錯誤:參數的資料型態必須是數字或陣列";
        }
    }

    function del($id)
    {
        $sql = "delete from `$this->table` where ";

        if (is_array($id)) {
            $tmp = $this->array2sql($id);
            $sql .= join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= "`id` = '$id'";
        } else {
            echo "錯誤:參數的資料型態必須是數字或陣列";
        }

        return $this->pdo->exec($sql);
    }


    private function array2sql($array)
    {
        foreach ($array as $col => $value) {
            $tmp[] = "`$col` = '$value'";
        }

        return $tmp;
    }

    private function sql_all($sql, $array, $other)
    {
        if (isset($this->table) && !empty($this->table)) {
            if (is_array($array)) {
                if (!empty($array)) {
                    $tmp = $this->array2sql($array);
                    $sql .= " where " . join(' && ', $tmp);
                }
            } else {
                $sql .= $array;
            }

            $sql .= $other;
            return $sql;
        } else {
            echo "錯誤:沒有指定的資料表名稱";
        }
    }

    function dd($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}
