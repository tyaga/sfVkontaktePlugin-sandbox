<?php


class sfVkontakteUserTable extends PluginsfVkontakteUserTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfVkontakteUser');
    }
}