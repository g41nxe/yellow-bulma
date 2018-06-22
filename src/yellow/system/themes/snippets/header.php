<!DOCTYPE html>
<html lang="<?php echo $yellow->page->getHtml("language") ?>">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="<?php echo $yellow->page->getHtml("description") ?>"/>
    <meta name="keywords" content="<?php echo $yellow->page->getHtml("keywords") ?>"/>
    <meta name="author" content="<?php echo $yellow->page->getHtml("author") ?>"/>
    <meta name="generator" content="Datenstrom Yellow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link href='<?php echo $yellow->config->get("assetLocation"); ?>/css/app.css' rel='stylesheet' type='text/css'>

    <title><?php echo $yellow->page->getHtml("titleHeader") ?></title>

    <?php echo $yellow->page->getExtra("header") ?>
</head>
<body>
<?php $yellow->page->set("pageClass", "page") ?>
<?php $yellow->page->set("pageClass", $yellow->page->get("pageClass") . " template-" . $yellow->page->get("template")) ?>

<div class="<?php echo $yellow->page->getHtml("pageClass") ?>">

    <section class="hero">
        <div class="hero-head">
            <?php $yellow->snippet('navigation-main') ?>
        </div>

        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    <?php echo $yellow->page->getHtml("sitename") ?>
                </h1>
                <h2 class="subtitle">
                    <?php echo $yellow->page->getHtml("tagline") ?>
                </h2>
            </div>
        </div>

        <div class="hero-foot">
            <?php $yellow->snippet('navigation-sub') ?>
        </div>
    </section>