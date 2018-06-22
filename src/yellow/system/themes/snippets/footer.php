<footer class="footer">
    <div class="content has-text-centered">
        <p>
            <a href="<?php echo $yellow->page->base . "/" ?>">&copy;
                2018 <?php echo $yellow->page->getHtml("sitename") ?></a>
        </p>
    </div>

    <?php echo $yellow->page->getExtra("footer") ?>
    
</footer>
</div>

<script src="<?php echo $yellow->config->get("assetLocation"); ?>js/app.js"></script>

</body>
</html>


