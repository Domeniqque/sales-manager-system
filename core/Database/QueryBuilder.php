<?php
namespace Core\Database;

abstract class QueryBuilder
{
    /**
     * @var \PDOStatement
     */
    private $statement = null;

    /**
     * @var string
     */
    protected $table = '';

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @return \PDO
     */
    protected function openConnection()
    {
        return Transaction::get();
    }

    /**
     * @return string
     */
    public function getTable() {
        return $this->table;
    }

    /**
     * @param $prop
     * @param $value
     */
    public function __set($prop, $value)
    {
        $this->data[$prop] = $value;
    }

    /**
     * @param $prop
     * @return mixed
     */
    public function __get($prop)
    {
        return $this->data[$prop];
    }

    /**
     * @param array $parameters
     * @return $this
     */
    public function select(array $parameters = ['*'])
    {
        $parameters = ($parameters != ['*']) ? implode(', ', $parameters) : '*';

        $sql = "SELECT {$parameters} FROM {$this->getTable()}";

        $this->statement = $this->openConnection()->prepare($sql);

        return $this;
    }

    /**
     * @param $id
     * @return object
     */
    public function find($id)
    {
        $sql = "SELECT * FROM {$this->getTable()} WHERE id = $id";

        $statement = $this->openConnection()
                            ->prepare($sql);
        $statement->execute();

        return $statement->fetchObject(__CLASS__);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        if (is_null($this->statement)) {
            throw new \Exception('The get method can not be called as a final method!');
        }

        $this->statement->execute();

        return $this->statement->fetchAll(\PDO::FETCH_CLASS);
    }

    /**
     * @param null $parameters
     * @return boolean
     */
    public function save($parameters = null)
    {
        if (is_array($parameters)) {
            $this->data = $parameters;
        }

        try {
            $statement = Transaction::get()->prepare($this->generateSqlInsert());

            foreach ($this->data as $key => $value) {
                $statement->bindParam(":{$key}", $value);
            }

            $statement->execute();

            Transaction::close();

            return true;
        } catch (\Exception $e) {
            Transaction::rollback();
        }
    }

    /**
     * @param null $parameters
     * @return boolean
     */
    public function update($parameters = null)
    {
        if (is_array($parameters)) {
            $this->data = $parameters;
        }

        try {
            $statement = Transaction::get()->prepare($this->generateSqlUpdate());

            foreach ($this->data as $key => $value) {
                $statement->bindParam(":{$key}", $value);
            }

            $statement->execute();

            Transaction::close();

            return true;
        } catch (\Exception $e) {
            Transaction::rollback();
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM {$this->getTable()} WHERE id = :id";
            $statement = Transaction::get()->prepare($sql);

            $statement->execute([":id" => $id]);

            Transaction::close();

            return true;
        } catch (\Exception $e) {
            Transaction::rollback();
        }
    }

    /**
     * @return string
     */
    private function generateSqlInsert() {
        return sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $this->getTable(),
            implode(', ', array_keys($this->data)),
            ':' . implode(', :', array_keys($this->data))
        );
    }

    /**
     * @return string
     */
    private function generateSqlUpdate() {
        $sql = "UPDATE {$this->getTable()} SET";

        foreach ($this->data as $key => $value) {
            $sql .= " {$key}=:{$key},";
        }

        return $sql;
    }


}