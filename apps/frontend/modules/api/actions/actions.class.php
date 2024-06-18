<?php

/**
 * api actions.
 *
 * @package    jobeet
 * @subpackage api
 * @author     Your name here
 * @version    SVN: $Id$
 */
class Actions extends sfActions
{
  public function executeList(sfWebRequest $request)
{
  $this->jobs = array();
  foreach ($this->getRoute()->getObjects() as $job)
  {
    $this->jobs[$this->generateUrl('job_show_user', $job, true)] = $job->asArray($request->getHost());
  }
}
}
