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
    foreach ($this->notifications as $key => $value) {
    ?>
    <div class="notification col-xs-12">
        <h2><span><?php e(Util::time_tran($value['notify_created']).'</span>'.$value['notify_title']);?></h2>
        <p><?php e($value['notify_content']);?></p>
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
            <p>&copy;IBM俱乐部</p>
            <p>Powered By <a href="https://github.com/surunzi/SuRock">SuRock</a></p>
        </div>
    </div>
</div>