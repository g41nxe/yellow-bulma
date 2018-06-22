<?php
list($name, $page) = $yellow->getSnippetArgs();
$img_src = $this->yellow->config->get("serverBase") . $this->yellow->config->get("imageLocation") . substr($page->getLocation(), 0, -1) . '.jpg';
?>

<div class="card">
    <div class="card-image">
        <figure class="image is-4by3">
            <?php echo $page->getHtml("Description") ?>

            <img src="<?php echo $img_src ?>" alt="Placeholder image">
        </figure>
    </div>
    <div class="card-content">
        <p class="title is-6"><?php echo $page->getHtml("titleContent") ?></p>
        <p><?php echo $page->getHtml("Description") ?></p>
    </div>
</div>