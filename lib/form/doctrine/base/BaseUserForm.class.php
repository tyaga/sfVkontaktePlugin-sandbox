<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    vkontakte_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'first_name'      => new sfWidgetFormTextarea(),
      'last_name'       => new sfWidgetFormTextarea(),
      'nickname'        => new sfWidgetFormTextarea(),
      'sex'             => new sfWidgetFormInputText(),
      'bdate'           => new sfWidgetFormTextarea(),
      'city'            => new sfWidgetFormInputText(),
      'country'         => new sfWidgetFormInputText(),
      'timezone'        => new sfWidgetFormTextarea(),
      'photo'           => new sfWidgetFormTextarea(),
      'photo_medium'    => new sfWidgetFormTextarea(),
      'photo_big'       => new sfWidgetFormTextarea(),
      'has_mobile'      => new sfWidgetFormInputCheckbox(),
      'rate'            => new sfWidgetFormInputText(),
      'home_phone'      => new sfWidgetFormTextarea(),
      'mobile_phone'    => new sfWidgetFormTextarea(),
      'university'      => new sfWidgetFormInputText(),
      'university_name' => new sfWidgetFormTextarea(),
      'faculty'         => new sfWidgetFormInputText(),
      'faculty_name'    => new sfWidgetFormTextarea(),
      'graduation'      => new sfWidgetFormInputText(),
      'settings'        => new sfWidgetFormInputText(),
      'fetched_at'      => new sfWidgetFormInputText(),
      'friends_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'User')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
      'first_name'      => new sfValidatorString(array('required' => false)),
      'last_name'       => new sfValidatorString(array('required' => false)),
      'nickname'        => new sfValidatorString(array('required' => false)),
      'sex'             => new sfValidatorInteger(array('required' => false)),
      'bdate'           => new sfValidatorString(array('required' => false)),
      'city'            => new sfValidatorInteger(array('required' => false)),
      'country'         => new sfValidatorInteger(array('required' => false)),
      'timezone'        => new sfValidatorString(array('required' => false)),
      'photo'           => new sfValidatorString(array('required' => false)),
      'photo_medium'    => new sfValidatorString(array('required' => false)),
      'photo_big'       => new sfValidatorString(array('required' => false)),
      'has_mobile'      => new sfValidatorBoolean(array('required' => false)),
      'rate'            => new sfValidatorNumber(array('required' => false)),
      'home_phone'      => new sfValidatorString(array('required' => false)),
      'mobile_phone'    => new sfValidatorString(array('required' => false)),
      'university'      => new sfValidatorInteger(array('required' => false)),
      'university_name' => new sfValidatorString(array('required' => false)),
      'faculty'         => new sfValidatorInteger(array('required' => false)),
      'faculty_name'    => new sfValidatorString(array('required' => false)),
      'graduation'      => new sfValidatorInteger(array('required' => false)),
      'settings'        => new sfValidatorInteger(array('required' => false)),
      'fetched_at'      => new sfValidatorPass(array('required' => false)),
      'friends_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'User', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['friends_list']))
    {
      $this->setDefault('friends_list', $this->object->Friends->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveFriendsList($con);

    parent::doSave($con);
  }

  public function saveFriendsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['friends_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Friends->getPrimaryKeys();
    $values = $this->getValue('friends_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Friends', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Friends', array_values($link));
    }
  }

}
