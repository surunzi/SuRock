<div id="user-info" class="container well">
    <div class="title row">
        <img src="<?php e(URL);?>public/img/default_avatar.jpg">
        <h3 class="col-xs-10 col-xs-offset-2"><?php e($this->stunum.' '.$this->name);?></h3>
    </div>
    <div class="content row">
        <table class="col-xs-12 table table-striped">
            <tbody>
                <tr>
                    <td>学号</td>
                    <td><?php e($this->stunum);?></td>
                </tr>
                <tr>
                    <td>姓名</td>
                    <td><?php e($this->name);?></td>
                </tr>
                <tr>
                    <td>性别</td>
                    <td><?php e($this->sex);?></td>
                </tr>
                <tr>
                    <td>手机</td>
                    <td><?php e($this->phone);?></td>
                </tr>
                <tr>
                    <td>邮箱</td>
                    <td><?php e($this->email);?></td>
                </tr>
                <tr>
                    <td>QQ</td>
                    <td><?php e($this->qq);?></td>
                </tr>
                <tr>
                    <td>部门</td>
                    <td><?php e($this->department);?></td>
                </tr>
                <tr>
                    <td>宿舍</td>
                    <td><?php e($this->dormitory);?></td>
                </tr>
                <tr>
                    <td>专业</td>
                    <td><?php e($this->major);?></td>
                </tr>
                <tr>
                    <td>籍贯</td>
                    <td><?php e($this->birthplace);?></td>
                </tr>
                <tr>
                    <td>生日</td>
                    <td><?php e($this->birthday);?></td>
                </tr>
                <tr>
                    <td>类型</td>
                    <td><?php e($this->usertype);?></td>
                </tr>
                <tr>
                    <td>注册</td>
                    <td><?php e($this->created);?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>