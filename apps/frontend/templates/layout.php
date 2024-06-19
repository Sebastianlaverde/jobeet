<!-- apps/frontend/templates/layout.php -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <link rel="alternate" type="application/atom+xml" title="Latest Jobs"
      href="<?php echo url_for('job', array('sf_format' => 'atom'), true) ?>" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
    <title>
      <?php if (!include_slot('title')): ?>
        Jobeet - Your best job board
      <?php endif; ?>
    </title>

  </head>
  <body>
    <div id="container">
      <nav class="navbar navbar-light bg-light">
      
        <h1><a href="<?php echo url_for('@homepage') ?>">
            <img src="/legacy/images/logo.jpg" alt="Inicio" />
        </a></h1>
        <a class="navbar-brand" style="font-weight: 600;">Ask for a job</a>
        <div>
          <a href="<?php echo url_for('@job_new') ?>" class="btn btn-primary">Post a Job</a>
        </div>
        <h2>Ask for a job</h2>
          <form action="<?php echo url_for('job_search') ?>" method="get">
            <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" />
            <input type="submit" value="search" />
            <div class="help">
              Enter some keywords (city, country, position, ...)
            </div>
          </form>
      </nav>
      
    <div id="job_history">
      Recent viewed jobs:
      <ul class="list-group list-group-horizontal">
        <?php foreach ($sf_user->getJobHistory() as $job): ?>
          <li class="list-group-item">
            <?php echo link_to($job->getPosition().' - '.$job->getCompany(), 'job_show_user', $job) ?>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
  
 
      <div class="mx-auto p-2" style="width: -10px;">
          
        <?php if ($sf_user->hasFlash('notice')): ?>
          <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
        <?php endif ?>
        
        <?php if ($sf_user->hasFlash('error')): ?>
          <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
        <?php endif ?>

    
  
          <div class="mx-auto p-2" style="width: -10px;">
            <?php echo $sf_content ?>
          </div>
      </div>

      <section class="">
        <!-- Footer -->
        <footer class="text-center text-white" style="background-color: #343a40;">
          <!-- Grid container -->
          <div class="container p-4 pb-0">
            
            <!-- Section: CTA -->
            <section class="">
              <p class="d-flex justify-content-center align-items-center">
                <li class="last">
                  <a href="<?php echo url_for('affiliate_new') ?>">Become an affiliate</a>
                </li>
                <button data-mdb-ripple-init type="feed" class="btn btn-outline-light btn-rounded">
                  <a href="<?php echo url_for('job', array('sf_format' => 'atom')) ?>">Full feed</a>
                </button>
                <button data-mdb-ripple-init type="button" class="btn btn-outline-light btn-rounded">
                  <a href="">About Jobeet</a>
                </button>
              </p>
              <spa class="me-3">powered by </span>
            </section>
            <!-- Section: CTA -->
          </div>
          <!-- Grid container -->

          <!-- Copyright -->
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
          </div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->
      </section>
    </div>
  </body>
</html>
