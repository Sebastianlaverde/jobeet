
<?php use_stylesheet('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') ?>




<div id="jobs">
  <?php foreach ($categories as $category): ?>
    <div class="category_<?php echo Jobeet::slugify($category->getName()) ?>">
      <div class="category">
        <div class="feed">
          <a href="">Feed</a>
        </div>
        
        <h1><?php echo $category ?></h1>
      </div>
      
      <table class="table table-hover table-striped">
        <thead class="thead-dark">
          <tr>
            <th>Location</th>
            <th>Position</th>
            <th>Company</th>
          </tr>
        </thead>
        <?php foreach ($category->getActiveJobs() as $i =>  $jobeet_job): ?>
          <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
            <td class="location">
              <?php echo  $jobeet_job->getLocation() ?>
            </td>
            <td class="position">
              <?php echo link_to( $jobeet_job->getPosition(), 'job_show_user',  $jobeet_job) ?>
            </td>
            <td class="company">
              <?php echo  $jobeet_job->getCompany() ?>
            </td>
          </tr>
          
        <?php endforeach; ?>
        
      </table>
      <?php if (($count = $category->countActiveJobs() -
          sfConfig::get('app_max_jobs_on_homepage')) > 0): ?>
        <div class="more_jobs">
          and <?php echo link_to($count, 'category', $category) ?>
          more...
        </div>
      <?php endif; ?>
    </div>
  <?php endforeach; ?>
</div>

  <a href="<?php echo url_for('job/new') ?>"class="btn btn-primary">New</a>
  
