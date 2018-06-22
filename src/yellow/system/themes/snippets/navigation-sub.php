<?php
$page = $yellow->page;
$children = $page->getChildren();
$parent = $page->getParent();
$siblings = $parent ? $parent->getChildren() : $yellow->pages->clean();
$pages = (sizeof($children) > 0 ? $children : $siblings);
?>

<nav class="tabs">
    <div class="container">

        <ul>
            <?php foreach ($pages as $page): ?>
                <a class="navbar-item <?php echo $page->isActive() ? 'is-active' : ''?>"
                   href="<?php echo $page->getLocation(true) ?>">
                    <?php echo $page->getHtml("titleNavigation") ?>
                </a>
            <?php endforeach ?>
        </ul>
    </div>
</nav>