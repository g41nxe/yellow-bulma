<nav class="navbar">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item">
                <img src="https://bulma.io/images/bulma-type-white.png" alt="Logo">
            </a>
            <span class="navbar-burger burger" data-target="mobile-nav">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </div>
        <div id="mobile-nav" class="navbar-menu">
            <div class="navbar-end">

                <?php foreach ($yellow->pages->top() as $page): ?>
                    <a class="navbar-item <?php echo $page->isActive() ? 'is-active' : ''?>"
                       href="<?php echo $page->getLocation(true) ?>">
                        <?php echo $page->getHtml("titleNavigation") ?>
                    </a>
                <?php endforeach ?>
           </div>
        </div>
    </div>
</nav>
