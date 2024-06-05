<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * 
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id$
 */
class sfWidgetFormSchemaFormatterTable extends sfWidgetFormSchemaFormatter
{
  protected
    $rowFormat       = "<div class=\"sf_admin_form_field_%name% col-12 form-group\" >\n  <div>%label%</div>\n  <div>%error%%field%%help%%hidden_fields%</div>\n</div>\n",
    $errorRowFormat  = "<div><div colspan=\"2\">\n%errors%</div></div>\n",
    $helpFormat      = '<br />%help%',
    $decoratorFormat = "<div >\n  %content%</div>";
}
