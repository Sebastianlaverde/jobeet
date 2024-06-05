[?php if ($field->isPartial()): ?]
  [?php include_partial('<?php echo $this->getModuleName() ?>/'.$name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php elseif ($field->isComponent()): ?]
  [?php include_component('<?php echo $this->getModuleName() ?>', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php else: ?]
  <div class="[?php  echo $field->getConfig('class') ?]  [?php echo $class ?] [?php ($form[$name]->hasError() and get_class($form[$name])!= 'sfFormFieldSchema' ) and print ' has-error' ?] [?php  echo $field->getConfig('filter_class') ?] form-group">
      
	  [?php echo $form[$name]->renderLabel($label, array('class' => 'form-label')) ?]
      [?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes )  ?]

      [?php if ($help): ?]
        <div class="form-text">[?php echo __($help, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</div>
      [?php elseif ($help = $form[$name]->renderHelp()): ?]
        <div class="form-text">[?php echo $help ?]</div>
      [?php endif; ?]
	  
	  [?php if ($form[$name]->hasError() and get_class($form[$name])!= 'sfFormFieldSchema' ): ?]	  
		<div class="alert alert-danger d-flex align-items-center  p-1">
			<i class="bi bi-exclamation-triangle-fill"></i>
				[?php echo $form[$name]->getError() ?]
		</div>
	  [?php endif; ?] 
  </div>
[?php endif; ?]
