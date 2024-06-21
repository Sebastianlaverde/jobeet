<?php use_stylesheet('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') ?>
 
<div id="jobs">
  <?php include_partial('job/list', array('jobs' => $jobs)) ?>
</div>