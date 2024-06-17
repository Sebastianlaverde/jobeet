<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_filter card" >
  <div class="card-header bg-light text-dark">
	Filtro
  </div>
  <div class="card-body">
  <?php if ($form->hasGlobalErrors()): ?>
    <?php echo $form->renderGlobalErrors() ?>
  <?php endif; ?>

  <form action="<?php echo url_for('sf_guard_user_collection', array('action' => 'filter')) ?>" method="post">
		<div class="row">
        <?php echo $form->renderHiddenFields() ?>
         
        <?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?>
        <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
          <?php include_partial('sfGuardUser/filters_field', array(
            'name'       => $name,
            'attributes' => $field->getConfig('attributes', array()),
            'label'      => $field->getConfig('label'),
            'help'       => $field->getConfig('help'),
            'form'       => $form,
            'field'      => $field,
            'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_filter_field_'.$name,
          )) ?>
        <?php endforeach; ?>
		
		</div>
		<div class="row">
		<div class="text-center">
		<?php echo link_to(__('Reset', array(), 'sf_admin'), 'sf_guard_user_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?>
        
		<button type="submit" class="btn btn-light" value="<?php echo __('Filter', array(), 'sf_admin') ?>" >
			<i class="bi bi-search"></i> <span class="hidden-xs ">Buscar</span>
		</button>
		</div>
		</div>
  </form>
  </div>
</div>
