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
    foreach ($this->msgs as $key => $value) {
    ?>
    <div class="msg col-xs-12">
        <h2><span><?php e(Util::time_tran($value['msg_created']).'</span><a href="mailto:'.$value['msg_email'].'" title="'.$value['msg_email'].'">'.$value['msg_name'].'</a>');?></h2>
        <p><?php e($value['msg_content']);?></p>
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

<div class="container form-horizontal margin-top-30">
    <form class="col-xs-12" action="<?php e(URL);?>index/addMsg/" method="post">
        <div class="form-group col-xs-5">
            <label for="input-name" class="control-label col-xs-2">姓名</label>
            <div class="col-xs-10">
                <input id="input-name" class="form-control" type="text" name="name">
            </div>
        </div>
        <div class="form-group col-xs-5">
            <label for="input-email" class="control-label col-xs-2">邮箱</label>
            <div class="col-xs-10">
                <input id="input-email" class="form-control" type="email" name="email">
            </div>
        </div>
        <div class="form-group col-xs-2">
            <button type="submit" class="btn btn-primary fill">提交</button>
        </div>
        <div class="form-group col-xs-12">
            <textarea id="input-content" class="form-control" type="email" name="content"></textarea>
        </div>
    </form>
</div>

<div id="footer">
    <div class="container">
        <div class="col-xs-12">
            <p>&copy;华南理工大学学生会</p>
            <p>Powered By <a href="https://github.com/surunzi/SuRock">SuRock</a></p>
        </div>
    </div>
</div>