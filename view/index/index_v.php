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

<div id="pic">
    <div class="container">
        <div class="col-xs-5">
            <h1><?php e($this->asso_name);?></h1>
            <p><?php e($this->asso_intro);?></p>
        </div>
    </div>
</div>

<div id="sub-module" class="container">
    <div class="col-xs-4">
        <h3><a href="<?php e(URL);?>index/news/">新闻</a></h3>
        <ul>
            <?php
            foreach ($this->news as $key => $value) {
            ?>
                <li><a href="<?php e(URL);?>index/view_news/<?php e($value['news_id']);?>" class="link" data-id="<?php e($value['notify_id']);?>"><?php e(Util::shrink_text($value['news_title'], 20));?></a></li>
            <?php
            }
            ?>
        </ul>
    </div>
    <div class="col-xs-4">
        <h3><a href="<?php e(URL);?>index/notify/">公告</a></h3>
        <ul>
            <?php
            foreach ($this->notifications as $key => $value) {
            ?>
                <li><a href="#" class="link view" data-toggle="modal" data-target="#view-modal" data-id="<?php e($value['notify_id']);?>"><?php e(Util::shrink_text($value['notify_title'], 20));?></a></li>
            <?php
            }
            ?>
        </ul>
    </div>
    <div class="col-xs-4">
        <h3><a href="<?php e(URL);?>manager/signup/">加入我们</a></h3>
        <p>看了我们的活动，对我们的社团心动了？</p>
        <p>那就赶紧加入我们吧！</p>
    </div>
</div>

<div id="footer">
    <div class="container">
        <div class="col-xs-12">
            <p>&copy;华南理工大学学生会</p>
            <p>Powered By <a href="https://github.com/surunzi/SuRock">SuRock</a></p>
        </div>
    </div>
</div>

<!-- 查看公告 -->
<div id="view-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">查看公告</h4>
      </div>
      <div class="modal-body" data-url="<?php e(URL);?>association/getNotify/">
      </div>
    </div>
  </div>
</div>

<script>
    window.addEventListener('load', function () {
        var $viewContent = $('#view-modal .modal-body');
        $('#sub-module').on('click', '.view', function () {
            var id = $(this).attr('data-id');
            $.get($viewContent.attr('data-url') + id, '', function (data) {
                $viewContent.html(data);
            });
        });
    }, false);
</script>