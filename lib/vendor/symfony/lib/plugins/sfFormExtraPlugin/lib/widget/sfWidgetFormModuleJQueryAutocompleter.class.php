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
class sfWidgetFormModuleJQueryAutocompleter extends sfWidgetFormDoctrineJQueryAutocompleter
{
  public function configure($options = array(), $attributes = array())
  {
    $this->addOption('module');
    $this->addOption('parameter');
    $this->addOption('parameter_id');

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
 /* public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $visibleValue = $this->getOption('value_callback') ? call_user_func($this->getOption('value_callback'), $value) : $value;

    return parent::render($name, $visibleValue, $attributes, $errors).
           sprintf(<<<EOF
<button class="sf_admin_action_new"  onclick="crearElemento_%s(getElementById('%s')); return false;" >...</button>
<script>
function crearElemento_%s(element){
	
	var selected_value = window.showModalDialog("/%s/new?%s="+element.value,this,"dialogWidth:760px;dialogHeight:480px;center:1;status:off");
	
	if(selected_value!=null){
		$('#%s').val(selected_value[0]);
		$('#%s').val(selected_value[1]);
	}
}
</script>
EOF
      ,$this->generateId($name),
	  $this->generateId('autocomplete_'.$name),
	  $this->generateId($name),
	  $this->getOption('module'),
	  $this->getOption('parameter'),
	  $this->generateId($name),
	  $this->generateId('autocomplete_'.$name)
    );
  }*/

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    //$visibleValue = $this->getOption('value_callback') ? call_user_func($this->getOption('value_callback'), $value) : $value;

    return parent::render($name, $value, $attributes, $errors).
           sprintf(<<<EOF
<button   type="button" class="sf_admin_action_new"  onclick="crearElemento_%s($('#%s'));" >...</button>


<script>

function crearElemento_%s(element){//5
	var id = "%s"; //6
	var modulo = "%s";//7
	
	var element = $('#'+id);
	var autocomplete_element = $('#autocomplete_'+id);
		
	if(element.val()=="" || element.val()==1){
		w = window.open("/index.php/"+modulo+"/new?%s="+autocomplete_element.val()+"&referencia_campo="+id,"_blank" ,"toolbar=yes,scrollbars=yes,resizable=yes,top=0,left=0,width=768,height=600");//8
	}else{
		w = window.open("/index.php/"+modulo+"/"+element.val()+"/edit?&referencia_campo="+id,"_blank" ,"toolbar=yes,scrollbars=yes,resizable=yes,top=0,left=0,width=768,height=600");
	}
}
function cambiarValor_%s(id,autocomplete){//9
	
	$('#%s').val(id);//10
	$('#%s').val(autocomplete);//111
}


</script>


EOF
      ,$this->generateId($name),//1
	  $this->generateId('autocomplete_'.$name),//2
	 // $this->generateId($name),//3
	 // $this->generateId('autocomplete_'.$name),//4
	  $this->generateId($name),//5
	  $this->generateId($name),//6
	  $this->getOption("module"),//7
	  $this->getOption("parameter"),//8,
	  $this->getOption("parameter_id"),//9
	  $this->generateId($name),//10
	  $this->generateId('autocomplete_'.$name)//11

	  );
  }
}
