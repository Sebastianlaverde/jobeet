<?php

/**
 * language actions.
 *
 * @package    jobeet
 * @subpackage language
 * @author     Your name here
 * @version    SVN: $Id$
 */
class languageActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }

  public function executeChangeLanguage(sfWebRequest $request)
  {
    $form = new sfFormLanguage(
      $this->getUser(),
      array('languages' => array('en', 'fr'))
    );
 
    $form->process($request);
 
    return $this->redirect('localized_homepage');
  }
}
