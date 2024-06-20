<?php

class JobeetCategoryForm extends BaseJobeetCategoryForm
{
  public function configure()
  {
    unset(
      $this['jobeet_affiliates_list'],
      $this['created_at'], $this['updated_at']
    );
 
    $this->embedI18n(array('en', 'fr'));
    $this->widgetSchema->setLabel('en', 'English');
    $this->widgetSchema->setLabel('fr', 'French');
  }
}