<?php
use yii\helpers\Url;
?>
        <div class="row">
		    <div class="col-lg-12 contant_wrap">
		    	<div class="navigation">
		    		<ul>
		    			<li><a href="<?=Url::toRoute('site/index');?>"><i class="glyphicon glyphicon-home"></i></a></li>
  		    			<li><span>Новости</span></li>
		    		</ul>
		    	</div>
		    </div>
    	</div>


<?php $news=array_reverse($news); ?>
<?php foreach ($news as $news_s): ?>
        <div>

            <h3><?php echo $news_s['date']; ?> - <?php echo $news_s['title']; ?></h3></br>
            <?php echo $news_s['spoiler']; ?>

            <div class="news_spoiler">

                <div class="spoiler_body">
                    <?php echo $news_s['body']; ?>
                </div>
                <a href="" class="spoiler_links">Читайте подробнее</a>
            </div>

        </div>
<?php  endforeach;?>


</body> 


