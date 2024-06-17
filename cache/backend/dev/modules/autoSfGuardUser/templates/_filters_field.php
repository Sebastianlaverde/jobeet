<?php if ($field->isPartial()): ?>
  <?php die("field die"); ?>
  <?php include_partial('sfGuardUser/'.$name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php elseif ($field->isComponent()): ?>
  <?php die("component die"); ?>
  <?php include_component('sfGuardUser', $name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php else: ?>
  <div class="<?php $form[$name]->hasError() and print ' has-error' ?> mb-1 <?php  echo $field->getConfig('class') ?>">
   
      <?php echo $form[$name]->renderLabel($label, array('class' => 'form-label')) ?>
      <?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes + array("class" => "form-control form-control-sm ") )  ?>

      <?php if ($help): ?>
        <div class="form-text"><?php echo __($help, array(), 'messages') ?></div>
      <?php elseif ($help = $form[$name]->renderHelp()): ?>
        <div class="form-text"><?php echo $help ?></div>
      <?php endif; ?>
	  
	  <?php if ($form[$name]->hasError()): ?>	  
		<div class="alert alert-danger d-flex align-items-center p-1">
			<i class="bi bi-exclamation-triangle-fill"></i>
				 <?php echo $form[$name]->renderError() ?>
		</div>
	  <?php endif; ?>
  </div>
<?php endif; ?>
