<?php
class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    protected function selectWhere($table, $where)
    {
        $query = "SELECT * FROM $table";

        $conditions = array_map(function ($key, $value) {
            return "$key = '$value'";
        }, array_keys($where), $where);

        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        $this->db->query($query);

        foreach ($where as $key => $value) {
            $this->db->bind(":$key", $value);
        }

        $result = $this->db->single();

        if (!$result) {
            return false;
        }

        return $result;
    }

    protected function create($table, $input)
    {
        $columns = array_keys($input);
        $values = array_values($input);

        $query = "INSERT INTO $table (" . implode(",", $columns) . ") VALUES (:" . implode(",:", $columns) . ")";

        $this->db->query($query);

        foreach ($input as $key => $value) {
            $this->db->bind(":$key", $value);
        }

        $this->db->execute();

        return $this->db->lastInsertId();
    }

    protected function update($table, $data, $where)
    {
        $query = "UPDATE $table SET ";
        $set = [];

        foreach ($data as $key => $value) {
            $set[] = "$key=:$key";
        }

        $conditions = array_map(
            function ($key, $value) {
                return "$key = '$value'";
            },
            array_keys($where),
            $where
        );

        $query .= implode(",", $set);
        $query .= " WHERE " . implode(" AND ", $conditions);

        $this->db->query($query);

        foreach ($data as $key => $value) {
            $this->db->bind(":$key", $value);
        }

        foreach ($where as $key => $value) {
            $this->db->bind(":$key", $value);
        }

        return $this->db->execute();
    }
}
