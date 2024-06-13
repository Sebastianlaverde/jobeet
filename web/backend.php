<?php


require_once(__DIR__.'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('backend', 'prod', true);
sfContext::createInstance($configuration)->dispatch();
