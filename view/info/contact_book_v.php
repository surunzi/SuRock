<div class="container well margin-top-10">
    <div class="row">
        <table class="col-xs-12 table table-striped">
            <thead>
                <tr>
                    <th>学号</th>
                    <th>姓名</th>
                    <th>性别</th>
                    <th>手机</th>
                    <th>邮箱</th>
                    <th>QQ</th>
                    <th>部门</th>
                    <th>宿舍</th>
                    <th>专业</th>
                    <th>角色</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->contacts as $key => $value) {
                ?>
                <tr>
                    <td><?php e($value['user_login']);?></td>
                    <td><?php e($value['user_name']);?></td>
                    <td><?php e(Util::get_sex($value['user_sex']));?></td>
                    <td><?php e($value['user_phone']);?></td>
                    <td><?php e($value['user_email']);?></td>
                    <td><?php e($value['user_qq']);?></td>
                    <td><?php e(SQLUtil::get_department($value['user_department']));?></td>
                    <td><?php e($value['user_dormitory']);?></td>
                    <td><?php e($value['user_major']);?></td>
                    <td><?php e(SQLUtil::get_type_name($value['user_type']));?></td>
                </tr>
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