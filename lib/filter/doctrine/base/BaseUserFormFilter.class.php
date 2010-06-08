<?php

/**
 * User filter form base class.
 *
 * @package    vkontakte_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'first_name'      => new sfWidgetFormFilterInput(),
      'last_name'       => new sfWidgetFormFilterInput(),
      'nickname'        => new sfWidgetFormFilterInput(),
      'sex'             => new sfWidgetFormFilterInput(),
      'bdate'           => new sfWidgetFormFilterInput(),
      'city'            => new sfWidgetFormFilterInput(),
      'country'         => new sfWidgetFormFilterInput(),
      'timezone'        => new sfWidgetFormFilterInput(),
      'photo'           => new sfWidgetFormFilterInput(),
      'photo_medium'    => new sfWidgetFormFilterInput(),
      'photo_big'       => new sfWidgetFormFilterInput(),
      'has_mobile'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'rate'            => new sfWidgetFormFilterInput(),
      'home_phone'      => new sfWidgetFormFilterInput(),
      'mobile_phone'    => new sfWidgetFormFilterInput(),
      'university'      => new sfWidgetFormFilterInput(),
      'university_name' => new sfWidgetFormFilterInput(),
      'faculty'         => new sfWidgetFormFilterInput(),
      'faculty_name'    => new sfWidgetFormFilterInput(),
      'graduation'      => new sfWidgetFormFilterInput(),
      'settings'        => new sfWidgetFormFilterInput(),
      'fetched_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'friends_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'User')),
    ));

    $this->setValidators(array(
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'first_name'      => new sfValidatorPass(array('required' => false)),
      'last_name'       => new sfValidatorPass(array('required' => false)),
      'nickname'        => new sfValidatorPass(array('required' => false)),
      'sex'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'bdate'           => new sfValidatorPass(array('required' => false)),
      'city'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'country'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'timezone'        => new sfValidatorPass(array('required' => false)),
      'photo'           => new sfValidatorPass(array('required' => false)),
      'photo_medium'    => new sfValidatorPass(array('required' => false)),
      'photo_big'       => new sfValidatorPass(array('required' => false)),
      'has_mobile'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'rate'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'home_phone'      => new sfValidatorPass(array('required' => false)),
      'mobile_phone'    => new sfValidatorPass(array('required' => false)),
      'university'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'university_name' => new sfValidatorPass(array('required' => false)),
      'faculty'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'faculty_name'    => new sfValidatorPass(array('required' => false)),
      'graduation'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'settings'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fetched_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'friends_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'User', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addFriendsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.FriendReference FriendReference')
          ->andWhereIn('FriendReference.user_to', $values);
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'first_name'      => 'Text',
      'last_name'       => 'Text',
      'nickname'        => 'Text',
      'sex'             => 'Number',
      'bdate'           => 'Text',
      'city'            => 'Number',
      'country'         => 'Number',
      'timezone'        => 'Text',
      'photo'           => 'Text',
      'photo_medium'    => 'Text',
      'photo_big'       => 'Text',
      'has_mobile'      => 'Boolean',
      'rate'            => 'Number',
      'home_phone'      => 'Text',
      'mobile_phone'    => 'Text',
      'university'      => 'Number',
      'university_name' => 'Text',
      'faculty'         => 'Number',
      'faculty_name'    => 'Text',
      'graduation'      => 'Number',
      'settings'        => 'Number',
      'fetched_at'      => 'Date',
      'friends_list'    => 'ManyKey',
    );
  }
}
