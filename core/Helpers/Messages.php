<?php

namespace Core\Helpers;


class Messages
{

    /**
     * Messages constructor.
     * @param $key
     * @param $message
     */
    public function __construct($key = null, $message = null)
    {
        if (!is_null($key) && !is_null($message))
            $this->put($key, $message);
    }

    /**
     * @param string $key
     * @param array | string $message
     * @return void
     */
    public function flash($key, $message)
    {
        $this->put($key, $message);

        $_SESSION["messages"][$key]["isFlash"] = true;
    }

    /**
     * @param $key
     * @return null
     */
    public function get($key)
    {
        if (!$this->has($key)) return null;

        $message = $_SESSION["messages"][$key]["content"];

        if ($this->isFlash($key)) $this->remove($key);

        return $message;
    }

    /**
     * @param $key
     * @return bool
     */
    public function isFlash($key)
    {
        return (bool) $_SESSION["messages"][$key]["isFlash"];
    }

    /**
     * @param $key
     */
    public function remove($key)
    {
        unset($_SESSION["messages"][$key]);
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key = null)
    {
        if (is_null($key)) {
            return ! empty($_SESSION["messages"]);
        }

        return array_key_exists($key, $_SESSION["messages"]);
    }

    /**
     * @param $key
     * @param $message
     * @return void
     */
    public function put($key, $message)
    {
        $_SESSION["messages"][$key]["content"] = $message;
    }
}