<div id="nav">
    <ul>
        <li><a href="<?php e(URL);?>">首页</a></li>
        <li><a href="<?php e(URL);?>index/news/">新闻</a></li>
        <li><a href="<?php e(URL);?>index/notify/">公告</a></li>
        <li><a href="<?php e(URL);?>index/message/">留言板</a></li>
        <li><a href="<?php e(URL);?>index/contact/">联系</a></li>
        <li><a href="<?php e(URL);?>manager/">管理中心</a></li>
    </ul>
</div>

<div class="container">
    <?php
    foreach ($this->news as $key => $value) {
    ?>
    <div class="news col-xs-12">
        <h2><span><?php e(Util::time_tran($value['news_created']).'</span><a href="'.URL.'index/view_news/'.$value['news_id'].'">'.$value['news_title'].'</a>');?></h2>
    </div>
    <?php
    }
    ?>
    <?php if ($this->page['no_page_nav'] != true) {?>
        <div class="row">
            <ul class="pager">
            <?php if ($this->page['no_pre'] != true) {?>
            <li><a href="<?php e(URL.'index/notify/'.($this->page['page']-1));?>">上页</a></li>
            <?php } if ($this->page['no_next'] != true) {?>
            <li><a href="<?php e(URL.'index/notify/'.($this->page['page']+1));?>">下页</a></li>
            <?php }?>
            </ul>
        </div>
    <?php }?>
</div>

<div id="footer">
    <div class="container">
        <div class="col-xs-12">
            <p>&copy;华南理工大学学生会</p>
            <p>Powered By <a href="https://github.com/surunzi/SuRock">SuRock</a></p>
        </div>
    </div>
</div>