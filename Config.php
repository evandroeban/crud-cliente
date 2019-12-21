<?php


class Config
{

    public static function getBanco()
    {
        return new Db('localhost', 'banco', 'root', '');
    }
}