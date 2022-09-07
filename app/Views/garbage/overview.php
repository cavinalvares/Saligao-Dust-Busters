<h2><?= esc($title) ?></h2>

<?php if (! empty($users) && is_array($users)): ?>

    <?php foreach ($users as $news_item): ?>

        <h3><?= esc($news_item) ?></h3>

    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>