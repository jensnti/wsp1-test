<?php

class BlogPost
{
    private $body;
    private $author;

    public function __construct($author = '', $body = '')
    {
        $this->author = $author;
        $this->body = $body;
    }

    public function getPost()
    {
        return [
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

}