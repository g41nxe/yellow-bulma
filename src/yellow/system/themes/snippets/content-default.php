<?php

$children = $yellow->page->getChildren()

?>

<section class="content section">
    <div class="container">
        <h1><?php echo $yellow->page->getHtml("titleContent") ?></h1>

        <?php echo $yellow->page->getContent() ?>
    </div>
</section>

<section class="container children">
        <div class="columns">
            <?php foreach ($children as $page): ?>
                <div class="column is-one-quarter">
                    <?php $yellow->snippet('card', $page) ?>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>