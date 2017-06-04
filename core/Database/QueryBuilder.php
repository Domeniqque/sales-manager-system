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
     * @throws \Exception
     */
    public function __get($prop)
    {
        if (array_key_exists($prop, $this->data)) {
            return $this->data[$prop];
        }

        if (method_exists($this, $prop)) {
            return $this->$prop();
        }

        throw new \Exception("Property or method does not exists!");
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

        return $statement->fetchObject(get_class($this));
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
     * @return mixed
     * @throws \Exception
     */
    public function save($parameters = null)
    {
        $this->data = $parameters;

        try {
            $statement = Transaction::get()->prepare($this->generateSqlInsert());

            $bind = array();

            foreach ($parameters as $key => $value) {
                $bind[":{$key}"] = $value;
            }

            $statement->execute($bind);

            $id = Transaction::get()->lastInsertId();

            Transaction::close();

            return $this->find($id);
        } catch (\Exception $e) {
            Transaction::rollback();
        }

        throw new \Exception($e->getMessage());
    }


    /**
     * @param $id
     * @param null $parameters
     * @return bool
     * @throws \Exception
     */
    public function update($id, $parameters = null)
    {
        if (is_array($parameters))
            $this->data = $parameters;

        try {
            $statement = Transaction::get()->prepare($this->generateSqlUpdate($id));

            $bind = array();

            foreach ($parameters as $key => $value) {
                $bind[":{$key}"] = $value;
            }

            $statement->execute($bind);

            Transaction::close();

            return true;
        } catch (\Exception $e) {
            Transaction::rollback();
        }

        throw new \Exception($e->getMessage());
    }

    /**
     * @param $id
     * @return object
     * @throws \Exception
     */
    public function delete($id = null)
    {
        if (is_null($id)) $id = $this->id;

        try {
            $object = $this->find($id);

            $sql = "DELETE FROM {$this->getTable()} WHERE id = :id";
            $statement = Transaction::get()->prepare($sql);

            $statement->execute([":id" => $id]);

            Transaction::close();

            return $object;
        } catch (\Exception $e) {
            Transaction::rollback();
        }

        throw new \Exception($e->getMessage());
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
     * @param $id
     * @return string
     */
    private function generateSqlUpdate($id) {
        $sql = "UPDATE {$this->getTable()} SET";

        foreach ($this->data as $key => $value)
            $sql .= " {$key}=:{$key},";

        return rtrim($sql, ',') . " WHERE id = $id;";
    }

    /**
     * @param $sql
     * @return $this
     * @throws \Exception
     */
    public function query($sql)
    {
        try {
            $this->statement = Transaction::get()->prepare($sql);

            return $this;
        } catch (\Exception $e) {
            Transaction::rollback();
        }

        throw new \Exception($e->getMessage());
    }

}