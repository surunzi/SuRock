<div class="navbar navbar-default">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php e(URL);?>"><?php e(TITLE);?></a>
    </div>
    <ul class="nav navbar-nav">
        <!-- 用户 -->
        <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">用户 <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php e(URL);?>user/viewInfo/" target="content">浏览个人信息</a></li>
                <li><a href="<?php e(URL);?>user/modifyInfo/" target="content">修改个人信息</a></li>
                <?php if (Util::has_authority(10)) {?>
                    <li><a href="<?php e(URL);?>user/manage/" target="content">管理所有用户</a></li>
                    <li><a href="<?php e(URL);?>user/search/" target="content">管理指定用户</a></li>
                    <li><a href="<?php e(URL);?>user/type/" target="content">管理用户角色</a></li>
                <?php }?>
            </ul>
        </li>
        <?php if (Util::has_authority(20) || Util::has_authority(21)) {?>
            <!-- 社团 -->
            <li class="dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">社团 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php if (Util::has_authority(20)) {?>
                        <li><a href="<?php e(URL);?>association/manageDepartment/" target="content">管理社团部门</a></li>
                        <li><a href="<?php e(URL);?>association/modifyAssoInfo/" target="content">修改社团信息</a></li>
                        <li><a href="<?php e(URL);?>association/modifyContact/" target="content">修改联系方式</a></li>
                        <li><a href="<?php e(URL);?>association/manageMessage/" target="content">管理社团留言</a></li>
                    <?php }?>
                    <?php if (Util::has_authority(21)) {?>
                        <li><a href="<?php e(URL);?>association/notify/" target="content">发布社团公告</a></li>
                        <li><a href="<?php e(URL);?>association/manageNotify/" target="content">管理社团公告</a></li>
                    <?php }?>
                </ul>
            </li>
        <?php }?>
        <?php if (Util::has_authority(30)) {?>
            <!-- 信息 -->
            <li class="dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">信息 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php e(URL);?>info/contactBook/" target="content">通讯录</a></li>
                </ul>
            </li>
        <?php }?>
        <?php if (Util::has_authority(40)) {?>
            <!-- 新闻 -->
            <li class="dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">新闻 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php e(URL);?>news/post/" target="content">发布新闻</a></li>
                    <li><a href="<?php e(URL);?>news/manage/" target="content">管理新闻</a></li>
                </ul>
            </li>
        <?php }?>
        <?php if (Util::has_authority(50) || Util::has_authority(51)) {?>
            <!-- 文档上传 -->
            <li class="dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">文档 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php e(URL);?>document/view/" target="content">浏览文档</a></li>
                    <?php if (Util::has_authority(51)) {?>
                        <li><a href="<?php e(URL);?>document/upload/" target="content">上传文档</a></li>
                        <li><a href="<?php e(URL);?>document/manage/" target="content">文档管理</a></li>
                     <?php }?>
                </ul>
            </li>
        <?php }?>
        <!--
        <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">活动 <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php e(URL);?>manager/logout/">发起活动</a></li>
                <li><a href="<?php e(URL);?>manager/logout/">活动管理</a></li>
                <li><a href="<?php e(URL);?>manager/logout/">人员安排</a></li>
                <li><a href="<?php e(URL);?>manager/logout/">经费申请</a></li>
                <li><a href="<?php e(URL);?>manager/logout/">经费审批</a></li>
                <li><a href="<?php e(URL);?>manager/logout/">活动照片</a></li>
                <li><a href="<?php e(URL);?>manager/logout/">活动资料</a></li>
            </ul>
        </li>-->
        <!-- 系统 -->
        <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">系统 <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php e(URL);?>manager/logout/">退出</a></li>
            </ul>
        </li>
    </ul>
</div>
<div id="main-content">
    <iframe src="<?php e(URL);?>user/viewInfo" name="content"></iframe>
</div>