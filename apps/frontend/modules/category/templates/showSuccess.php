<?php use_stylesheet('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') ?>
 

<?php slot('title', sprintf('Jobs in the %s category', $category->getName())) ?>
 
<div class="category">
  <h1><?php echo $category ?></h1>
</div>

<div class="feed">
  <a href="<?php echo url_for('category', array('sf_subject' => $category, 'sf_format' => 'atom')) ?>">Feed</a>
</div>
 
<?php include_partial('job/list', array('jobs' => $pager->getResults())) ?>
 
<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for('category', $category) ?>?page=1">  
      <img src="" alt="Primera" title="Primera" />
    </a>
 
    <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $pager->getPreviousPage() ?>">
      <img src="/legacy/images/previous.png" alt="Anterior" title="Anterior" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $pager->getNextPage() ?>">
      <img src="/legacy/images/next.png" alt="Siguiente" title="Siguiente" />
    </a>
 
    <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $pager->getLastPage() ?>">
      <img src="/legacy/images/last.png" alt="Ultima" title="Ultima" />
    </a>
  </div>
<?php endif; ?>
 
<div class="pagination_desc">
  <strong><?php echo $pager->getNbResults() ?></strong> jobs in this category
 
  <?php if ($pager->haveToPaginate()): ?>
    - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>