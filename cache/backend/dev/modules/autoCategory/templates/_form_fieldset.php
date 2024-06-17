
 <?php
	$field_count = 0;
	
	foreach ($fields as $name => $field){
		if( isset($form[$name])) {
			$field_count++;
		}
	}
	
	if ($field_count > 0) : 
 ?>

<div id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?>" class="card" >
   <?php if ('NONE' != $fieldset): ?>
  <div class="card-header bg-light text-dark">
	<?php echo __($fieldset, array(), 'messages') ?>
  </div>
  <?php endif; ?>
  <div class="card-body px-3">
	<div class="row">
  <?php foreach ($fields as $name => $field): ?>
    <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
    <?php include_partial('category/form_field', array(
      'name'       => $name,
      'attributes' => $field->getConfig('attributes', array()),
      'label'      => $field->getConfig('label'),
      'help'       => $field->getConfig('help'),
      'form'       => $form,
      'field'      => $field,
      'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name,
    )) ?>
  <?php endforeach; ?>
	</div>
  </div>
</div>
 <?php endif; ?>
