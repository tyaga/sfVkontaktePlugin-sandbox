<?php


class sfVkontakteFriendshipTable extends PluginsfVkontakteFriendshipTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfVkontakteFriendship');
    }
}