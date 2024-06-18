<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Jobeet Admin Interface</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php use_stylesheet('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') ?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
    <div id="container">
      <nav class="navbar navbar-light bg-light ">
        <h1><a href="<?php echo url_for('@') ?>">
            <img src="/legacy/images/logo.jpg" alt="Inicio" />
        </a></h1>
        <a class="navbar-brand" style="font-weight: 600;">Ask for a job</a>
        <div>
          <a href="<?php echo url_for('/') ?>" class="btn btn-primary">Post a Job</a>
        </div>
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" >
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="background-color: #007bff">Search</button>
        </form>
      </nav>
 
      <?php if ($sf_user->isAuthenticated()): ?>
        <div id="menu">
          <ul class="list-group list-group-horizontal">
            <li class="list-group-item"><?php echo link_to('Jobs', 'jobeet_job') ?></li>
            <li class="list-group-item"><?php echo link_to('Categories', 'jobeet_category') ?></li>
            <li class="list-group-item"><?php echo link_to('Users', 'sf_guard_user') ?></li>
            <li class="list-group-item"><?php echo link_to('Logout', 'sf_guard_signout') ?></li>
          </ul>
        </div>
      <?php endif ?>
        <div id="content">
          <?php echo $sf_content ?>
        </div>
      

      <footer class="text-center text-white" style="background-color: #343a40;">
          <!-- Grid container -->
          <div class="container p-4 pb-0">
            <!-- Section: CTA -->
            <section class="">
              <p class="d-flex justify-content-center align-items-center">
                <spa class="me-3">powered by </span>
                <button data-mdb-ripple-init type="button" class="btn btn-outline-light btn-rounded">
                  <a href="">About Jobeet</a>
                </button>
              </p>
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
    </div>
  </body>
</html>