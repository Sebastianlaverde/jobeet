<?php

/**
 * affiliate module configuration.
 *
 * @package    jobeet
 * @subpackage affiliate
 * @author     Your name here
 * @version    SVN: $Id$
 */
class affiliateGeneratorConfiguration extends BaseAffiliateGeneratorConfiguration
{
    public function getFilterDefaults()
  {
    return array('is_active' => '0');
  }
}
