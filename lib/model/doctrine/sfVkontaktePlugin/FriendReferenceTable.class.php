<?php


class FriendReferenceTable extends PluginFriendReferenceTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('FriendReference');
    }
}