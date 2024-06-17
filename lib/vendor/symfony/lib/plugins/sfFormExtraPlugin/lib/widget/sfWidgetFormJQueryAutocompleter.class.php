<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfWidgetFormJQueryAutocompleter represents an autocompleter input widget rendered by JQuery.
 *
 * This widget needs JQuery to work.
 *
 * You also need to include the JavaScripts and stylesheets files returned by the getJavaScripts()
 * and getStylesheets() methods.
 *
 * If you use symfony 1.2, it can be done automatically for you.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormJQueryAutocompleter.class.php 15839 2009-02-27 05:40:57Z fabien $
 */
class sfWidgetFormJQueryAutocompleter extends sfWidgetFormInput
{
  /**
   * Configures the current widget.
   *
   * Available options:
   *
   *  * url:            The URL to call to get the choices to use (required)
   *  * config:         A JavaScript array that configures the JQuery autocompleter widget
   *  * value_callback: A callback that converts the value before it is displayed
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {
    $this->addRequiredOption('url');
    $this->addOption('value_callback');
    $this->addOption('config', '{ }');
    $this->addOption('minLength', 2);
    $this->addOption('extraParameters', "");

    // this is required as it can be used as a renderer class for sfWidgetFormChoice
    $this->addOption('choices');

    parent::configure($options, $attributes);
  }

  /**
   * @param  string $name        The element name
   * @param  string $value       The date displayed in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $visibleValue = $this->getOption('value_callback') ? call_user_func($this->getOption('value_callback'), $value) : $value;
	if(isset($attributes["readonly"]) and $attributes["readonly"]){ 
		
	$delete = "";	
	}else{
	
	$delete = sprintf(<<<EOF
<a data-prop-id="%s" class="input-group-addon" href="#" onclick="$('#%s').val('');$('#%s').val(''); return false;"> X </a>
EOF
		,
      $this->generateId($name),
      $this->generateId($name), 
      $this->generateId('autocomplete_'.$name));
	}

    return '<div class="input-group">'.$this->renderTag('input', array('type' => 'hidden', 'name' => $name, 'value' => $value)).
           parent::render('autocomplete_'.$name, $visibleValue, $attributes, $errors).
           sprintf(<<<EOF
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery("#%s")
    .autocomplete( jQuery.extend({}, {
     
	  dataType: 'json',
	  source: function(request, response) {
		  $.ajax({
			 url: "%s",
			 dataType: "json",
			 data: {
				q: request.term,
				limit: 60,
				%s
			 },
			 success: function(data) {
				data_parse = $.map(data, function(item, i) {
				  return {
					 value: item,  //set the value property with id integer
					 label: item,  //set the label property with "value" string 
					 id: i
				   }
				});
			
				response(data_parse);
			 },
			
		  });
		},
	  minLength: %s,
	  autoFocus: true,
      select: function( event, ui ) {
		var element = jQuery("#%s");  
        element.val(ui.item.id);
		element.change();
      },	
	  
    })).on('focus', function() { $(this).keydown(); });
  });
</script>
%s
</div>
EOF
      ,
      $this->generateId('autocomplete_'.$name),
      $this->getOption('url'),
      $this->getOption('extraParameters'),
	  $this->getOption('minLength'),
      $this->generateId($name),
	  $delete
    );
  }

  /**
   * Gets the stylesheet paths associated with the widget.
   *
   * @return array An array of stylesheet paths
   */
  public function getStylesheets()
  {
    return array('/sfFormExtraPlugin/css/jquery.autocompleter.css' => 'all');
  }

  /**
   * Gets the JavaScript paths associated with the widget.
   *
   * @return array An array of JavaScript paths
   */
  public function getJavascripts()
  {
    return array('/sfFormExtraPlugin/js/jquery.autocompleter.js');
  }
}
