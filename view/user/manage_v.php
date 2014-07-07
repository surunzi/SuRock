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
                    <td class="authority"><?php e($value['user_authority']);?></td>
                    <td>
                        <a href="<?php e(URL.'user/viewInfo/'.$value['user_id']);?>" class="link">查看</a>
                        <a href="#" class="link modify-type" data-toggle="modal" data-target="#modify-type-modal" data-id="<?php e($value['user_id']);?>">修改角色</a>
                        <a href="#" class="link modify-authority" data-toggle="modal" data-target="#modify-authority-modal" data-id="<?php e($value['user_id']);?>">修改权限</a>
                        <a href="#" class="link delete" data-toggle="modal" data-target="#delete-modal" data-id="<?php e($value['user_id']);?>">删除</a>
                        <a href="<?php e(URL.'user/modifyInfo/'.$value['user_id']);?>" class="link">修改</a>
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

<!-- 删除确认 -->
<div id="delete-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">删除用户</h4>
      </div>
      <div class="modal-body">
        <p>确实要删除该用户吗？</p>
      </div>
      <div class="modal-footer">
        <a id="delete-confirm-btn" href="#" class="btn btn-primary" data-url="<?php e(URL);?>user/delete/">确认</a>
      </div>
    </div>
  </div>
</div>

<!-- 修改角色 -->
<form id="modify-type-modal" class="modal fade" action="" method="post" data-url="<?php e(URL);?>user/updateUserType/">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">修改角色</h4>
      </div>
      <div class="modal-body">
        <div class="form-group row">
            <label for="input-type" class="control-label col-xs-2">角色</label>
            <div class="col-xs-9">
                <select id="input-type" class="form-control" name="type">
                    <option value="0">会员</option>
                    <?php
                    foreach ($this->types as $key => $value) {
                    ?>
                        <option value="<?php e($value['user_type_id']);?>"><?php e($value['user_type_name']);?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="delete-confirm-btn" type="submit" class="btn btn-primary">修改</a>
      </div>
    </div>
  </div>
</form>

<!-- 修改角色 -->
<form id="modify-authority-modal" class="modal fade" action="" method="post" data-url="<?php e(URL);?>user/updateUserAuthority/">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">修改权限</h4>
      </div>
      <div class="modal-body">
        <div class="form-group row">
            <label for="input-authority" class="control-label col-xs-2">权限</label>
            <div class="col-xs-9">
                <input id="input-authority" class="form-control" name="authority">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="delete-confirm-btn" type="submit" class="btn btn-primary">修改</a>
      </div>
    </div>
  </div>
</form>

<script>
    window.addEventListener('load', function () {
        var $deleteBtn = $('#delete-confirm-btn'),
            $modifyTypeModal = $('#modify-type-modal'),
            $modifyAuthorityModal = $('#modify-authority-modal'),
            $inputAuthority = $('#input-authority');
        $('#manage-users').on('click', '.delete', function () {
            var id = $(this).attr('data-id');
            $deleteBtn.attr('href', $deleteBtn.attr('data-url') + id);
        }).on('click', '.modify-type', function () {
            var id = $(this).attr('data-id');
            $modifyTypeModal.attr('action', $modifyTypeModal.attr('data-url') + id);
        }).on('click', '.modify-authority', function () {
            var id = $(this).attr('data-id'),
                authority = $(this).parent().siblings('.authority').text();
            $inputAuthority.val(authority);
            $modifyAuthorityModal.attr('action', $modifyAuthorityModal.attr('data-url') + id);
        });
    }, false);
</script>