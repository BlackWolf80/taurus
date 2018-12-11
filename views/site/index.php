<?php
use app\components\HitWidget;
use app\components\PressCategoryWidget;
?>
	<div class="container ban_block_wrap">
      <div class="row">
          <?=PressCategoryWidget::widget (['var_cats' => '1']);?>
          <?=PressCategoryWidget::widget (['var_cats' => '2']);?>
      </div>
	</div>
    <div class="container-fluid tabs_block_main">
      <div class="container">
        <div class="row">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Новинки</a></li>
            <li><a href="#tab2" data-toggle="tab">Хиты</a></li>
            <li><a href="#tab3" data-toggle="tab">Акции</a></li>
          </ul>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="tab-content">
	    <div class="tab-pane fade in active" id="tab1">
            <?=HitWidget::widget (['var_view' => 'new']);?>
            </div>
            <div class="tab-pane fade" id="tab2">
                <?=HitWidget::widget (['var_view' => 'hit']);?>
            </div>
            <div class="tab-pane fade" id="tab3">
                <?=HitWidget::widget (['var_view' => 'sales']);?>
            </div>
          </div>
        </div>
      </div>
    </div>