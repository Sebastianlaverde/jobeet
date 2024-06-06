 
<!-- apps/frontend/templates/layout.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Jobeet - Your best job board</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
    <div id="container">
      <div class="mx-auto p-2" style="width: -10px;">
        <div class="row align-items-start ">
          <div class="col-md-12">
            <h1><a href="<?php echo url_for('job/index') ?>">
              <img src="/legacy/images/logo.jpg" alt="Jobeet Job Board" />
            </a></h1>
            <div class="row">
              <div class="col-md-6">
                <h2>Ask for people</h2>
                <div>
                  <a href="<?php echo url_for('job/index') ?>" class="btn btn-primary">Post a Job</a>
                </div>
              </div>
              <div class="col-md-6">
                <h2>Ask for a job</h2>
                <form action="" method="get" class="form-inline">
                  <input type="text" name="keywords" id="search_keywords" class="form-control mr-sm-2" placeholder="Search" />
                  <button type="submit" class="btn btn-primary">Search</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
 
      <div class="mx-auto p-2" style="width: -10px;">
          <?php if ($sf_user->hasFlash('notice')): ?>
            <div class="flash_notice">
              <?php echo $sf_user->getFlash('notice') ?>
            </div>
          <?php endif; ?>
  
          <?php if ($sf_user->hasFlash('error')): ?>
            <div class="flash_error">
              <?php echo $sf_user->getFlash('error') ?>
            </div>
          <?php endif; ?>
  
          <div class="mx-auto p-2" style="width: -10px;">
            <?php echo $sf_content ?>
          </div>
      </div>
 
      <div id="footer">
        <div class="content">
          <span class="symfony">
            <img src="/legacy/images/jobeet-mini.png" />
            powered by <a href="/">
            <img src="/legacy/images/symfony.gif" alt="symfony framework" />
            </a>
          </span>
          <ul>
            <li><a href="">About Jobeet</a></li>
            <li class="feed"><a href="">Full feed</a></li>
            <li><a href="">Jobeet API</a></li>
            <li class="last"><a href="">Affiliates</a></li>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>
