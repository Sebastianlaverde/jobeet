<?php

/**
 * job actions.
 *
 * @package    jobeet
 * @subpackage job
 * @author     Your name here
 * @version    SVN: $Id$
 */
class jobActions extends sfActions
{
  public function executeSearch(sfWebRequest $request)
  {
    $this->forwardUnless($query = $request->getParameter('query'), 'job', 'index');
 
    $this->jobs = Doctrine_Core::getTable('JobeetJob')->getForLuceneQuery($query);
   
    if ($request->isXmlHttpRequest())
    {
      if ('*' == $query || !$this->jobs)
      {
        return $this->renderText('No results.');
      }
   
      return $this->renderPartial('job/list', array('jobs' => $this->jobs));
    }
  }
  public function executeIndex(sfWebRequest $request)
  {
    if (!$request->getParameter('sf_culture'))
    {
      if ($this->getUser()->isFirstRequest())
      {
        $culture = $request->getPreferredCulture(array('en', 'fr'));
        $this->getUser()->setCulture($culture);
        $this->getUser()->isFirstRequest(false);
      }
      else
      {
        $culture = $this->getUser()->getCulture();
      }
  
      $this->redirect('localized_homepage');
    }
  
    $this->categories = Doctrine_Core::getTable('JobeetCategory')->getWithJobs();
  }

  public function executeFooBar(sfWebRequest $request)
{
  $this->foo = 'bar';
  $this->bar = array('bar', 'baz');
}


  public function executeShow(sfWebRequest $request)
  {
    $this->jobeet_job = $this->getRoute()->getObject();
 
    $this->getUser()->addJobToHistory($this->jobeet_job);
  }

  public function executeNew(sfWebRequest $request)
{
  $jobeet_job = new JobeetJob();
  $jobeet_job->setType('full-time');
 
  $this->form = new JobeetJobForm($jobeet_job);
}
 
public function executeCreate(sfWebRequest $request)
{
  $this->form = new JobeetJobForm();
  $this->processForm($request, $this->form);
  $this->setTemplate('new');
}
 
public function executeEdit(sfWebRequest $request)
{
  $jobeet_job = $this->getRoute()->getObject();
  $this->forward404If($jobeet_job->getIsActivated());
 
  $this->form = new JobeetJobForm($jobeet_job);
}
 
public function executeUpdate(sfWebRequest $request)
{
  $this->form = new JobeetJobForm($this->getRoute()->getObject());
  $this->processForm($request, $this->form);
  $this->setTemplate('edit');
}
 
public function executeDelete(sfWebRequest $request)
{
  $request->checkCSRFProtection();
 
  $jobeet_job = $this->getRoute()->getObject();
  $jobeet_job->delete();
 
  $this->redirect('job/index');
}

public function executeExtend(sfWebRequest $request)
{
  $request->checkCSRFProtection();
 
  $jobeet_job = $this->getRoute()->getObject();
  $this->forward404Unless($jobeet_job->extend());
 
  $this->getUser()->setFlash('notice', sprintf('Your job validity has been extended until %s.', $jobeet_job->getDateTimeObject('expires_at')->format('m/d/Y')));
 
  $this->redirect($this->generateUrl('job_show_user', $jobeet_job));
}
 
protected function processForm(sfWebRequest $request, sfForm $form)
{
  $form->bind(
    $request->getParameter($form->getName()),
    $request->getFiles($form->getName())
  );
 
  if ($form->isValid())
  {
    $jobeet_job = $form->save();
 
    $this->redirect($this->generateUrl('job_show', $jobeet_job));
  }
}

  public function executePublish(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
  
    $job = $this->getRoute()->getObject();
    $job->publish();
 
    if ($cache = $this->getContext()->getViewCacheManager())
    {
      $cache->remove('sfJobeetJob/index?sf_culture=*');
      $cache->remove('sfJobeetCategory/show?id='.$job->getJobeetCategory()->getId());
    }
  
    $this->getUser()->setFlash('notice', sprintf('Your job is now online for %s days.', sfConfig::get('app_active_days')));
  
    $this->redirect($this->generateUrl('job_show_user', $job));
  }
}
