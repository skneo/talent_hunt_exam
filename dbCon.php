<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('zgbiereNlo5HtLcy/examdb');
    }
}
$db = new MyDB();
