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

<div id="news" class="container">
    <div class="col-xs-12">
        <h2><?php e($this->title);?></h2>
        <div class="content"><?php e($this->content);?></div>
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

<div id="black-layer">
    <img src="">
</div>

<script>
    window.addEventListener('load', function () {
        $('#news').on('click', 'img', function () {
            $('#black-layer img').attr('src', $(this).attr('src'));
            $('#black-layer').fadeIn('fast');
        });
        $('#black-layer').on('click', function () {
            $(this).fadeOut('fast');
        });
    }, false);
</script>