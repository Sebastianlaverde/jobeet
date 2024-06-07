<?php slot('title') ?>
  <?php echo sprintf('%s is looking for a %s', $jobeet_job->getCompany(), $jobeet_job->getPosition()) ?>
<?php end_slot(); ?>


<?php use_stylesheet('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') ?>
<?php use_helper('Text') ?>

<div id="job">
  <h1><?php echo $jobeet_job->getCompany() ?></h1>
  <h2><?php echo $jobeet_job->getLocation() ?></h2>
  <h3>
    <?php echo $jobeet_job->getPosition() ?>
    <small> - <?php echo $jobeet_job->getType() ?></small>
  </h3>
 
  <?php if ($jobeet_job->getLogo()): ?>
    <div class="logo">
      <a href="<?php echo $jobeet_job->getUrl() ?>">
        <img src="/uploads/jobs/<?php echo $jobeet_job->getLogo() ?>"
          alt="<?php echo $jobeet_job->getCompany() ?> logo" />
      </a>
    </div>
  <?php endif; ?>
 
  <div class="description">
    <?php echo simple_format_text($jobeet_job->getDescription()) ?>
  </div>
 
  <h4>How to apply?</h4>
 
  <p class="how_to_apply"><?php echo $jobeet_job->getHowToApply() ?></p>
 
  <div class="meta">
    <small>posted on <?php echo $jobeet_job->getDateTimeObject('created_at')->format('m/d/Y') ?></small>
  </div>
 
  <div style="padding: 110px 0">
    <a href="<?php echo url_for('job/edit?id='.$jobeet_job->getId()) ?>">
      Edit
    </a>
    <a href="<?php echo url_for('job/index') ?>">List</a>

  </div>
</div>