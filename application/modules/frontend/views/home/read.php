<div class="mdl-cell mdl-cell--8-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-grid mobile-cell-container">
    <div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col art-container-pink">
        <h2 class="h2-header"><a href="#" class="link-header">Detail</a></h2>
        <div class="article-wrapper">
            <?php $date = date('d M Y, H:i', strtotime($article['created_at'])); ?>
            <span style="color:#888">by&nbsp;</span><span><?php echo $article['created_by']; ?></span>&nbsp;
            <time itemprop="datePublished" content="<?php echo $date;?>"  style="color:#888"><?php echo $date;?></time>
            <h1 class="article-title"><?php echo $article['title']; ?></h1>
            <hr>
            <div itemprop="articleBody" class="article-body">
                <?php echo $article['content'];?>
            </div>
        </div>
    </div>
</div>

<!--Right side-->
<div class="mdl-cell mdl-cell--4-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mobile-cell-container">
<?php $this->view('frontend/widget/right'); ?>
</div>
