<?php

class BlogPost
{
    private $body;
    private $author;
    private $id;

    public function __construct($author = '', $body = '', $id = 0)
    {
        $this->id = $id;
        $this->author = $author;
        $this->body = $body;
    }

    public function getPost()
    {
        return [
            $this->id,
            $this->author,
            $this->body
        ];
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function user()
    {
        $dbh = new DB();
        $result = $dbh->query(
            'SELECT * FROM users WHERE id = ?',
            [$this->id]
        );

        return $result;
    }

}