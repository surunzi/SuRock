<div id="manage-users" class="container well">
    <div class="row">
        <table class="col-xs-12 table table-striped">
            <thead>
                <tr>
                    <th>学号</th>
                    <th>姓名</th>
                    <th>角色</th>
                    <th>权限</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->users as $key => $value) {
                ?>
                <tr>
                    <td><?php e($value['user_login']);?></td>
                    <td><?php e($value['user_name']);?></td>
                    <td><?php e(SQLUtil::get_type_name($value['user_type']));?></td>
                    <td><?php e($value['user_authority']);?></td>
                    <td>
                        <a href="#" class="link">查看</a>
                        <a href="#" class="link">修改角色</a>
                        <a href="#" class="link">修改权限</a>
                        <a href="#" class="link">删除</a>
                        <a href="#" class="link">修改</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php if ($this->page['no_page_nav'] != true) {?>
        <div class="row">
            <ul class="pager">
            <?php if ($this->page['no_pre'] != true) {?>
            <li><a href="<?php e(URL.'user/manage/'.($this->page['page']-1));?>">上页</a></li>
            <?php } if ($this->page['no_next'] != true) {?>
            <li><a href="<?php e(URL.'user/manage/'.($this->page['page']+1));?>">下页</a></li>
            <?php }?>
            </ul>
        </div>
    <?php }?>
</div>