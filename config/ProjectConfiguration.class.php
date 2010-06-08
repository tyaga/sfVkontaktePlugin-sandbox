<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin', 'sfVkontaktePlugin');
  }
	public function configureDoctrine(Doctrine_Manager $manager) {
		$manager->setCollate('utf8_unicode_ci');
		$manager->setCharset('utf8');
		//$manager->setAttribute(Doctrine::ATTR_QUERY_CACHE, new Doctrine_Cache_Apc());
	}
}
