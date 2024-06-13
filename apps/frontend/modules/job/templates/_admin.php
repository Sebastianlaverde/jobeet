<?php use_stylesheet('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') ?>

<div id="job_actions">
  <h3>Admin</h3>
  <ul>
    <?php if (!$jobeet_job->getIsActivated()): ?>
      <li><?php echo link_to('Edit', 'job_edit', $jobeet_jobb) ?></li>
      <li><?php echo link_to('Publish', 'job_edit', $jobeet_job) ?></li>
    <?php endif ?>
    <li><?php echo link_to('Delete', 'job_delete', $jobeet_job, array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></li>
    <?php if ($jobeet_job->getIsActivated()): ?>
      <li<?php $jobeet_job->expiresSoon() and print ' class="expires_soon"' ?>>
        <?php if ($jobeet_job->isExpired()): ?>
          Expired
        <?php else: ?>
          Expires in <strong><?php echo $jobeet_job->getDaysBeforeExpires() ?></strong> days
        <?php endif ?>
 
        <?php if ($jobeet_job->expiresSoon()): ?>
        - <?php echo link_to('Extend', 'job_extend', $jobeet_job, array('method' => 'put')) ?> for another <?php echo sfConfig::get('app_active_days') ?> days
        <?php endif; ?>
      </li>
    <?php else: ?>
      <li>
        [Bookmark this <?php echo link_to('URL', 'job_show', $jobeet_job, true) ?> to manage this job in the future.]
      </li>
    <?php endif ?>
  </ul>
</div>
