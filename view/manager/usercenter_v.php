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
                <li><a href="<?php e(URL);?>user/manage/" target="content">管理所有用户</a></li>
                <li><a href="<?php e(URL);?>user/search/" target="content">管理指定用户</a></li>
                <li><a href="<?php e(URL);?>user/type/" target="content">管理用户角色</a></li>
            </ul>
        </li>
        <!-- 社团 -->
        <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">社团 <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php e(URL);?>association/manageDepartment/" target="content">管理社团部门</a></li>
            </ul>
        </li>
        <!-- 信息 -->
        <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">信息 <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#">通讯录</a></li>
                <li><a href="#">空闲表</a></li>
            </ul>
        </li>
        <!-- 新闻 -->
        <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">新闻 <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#">发布新闻</a></li>
                <li><a href="#">管理新闻</a></li>
            </ul>
        </li>
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