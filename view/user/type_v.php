<div id="user-type" class="container well">
    <div class="row">
        <table class="col-xs-12 table table-striped">
            <thead>
                <tr>
                    <th>角色</th>
                    <th>权限</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->types as $key => $value) {
                ?>
                <tr>
                    <td class="name"><?php e($value['user_type_name']);?></td>
                    <td class="authority"><?php e($value['user_type_authority']);?></td>
                    <td>
                        <a href="" class="link modify" data-toggle="modal" data-target="#modify-modal" data-id="<?php e($value['user_type_id']);?>">修改</a>
                        <a href="" class="link delete" data-toggle="modal" data-target="#delete-modal" data-id="<?php e($value['user_type_id']);?>">删除</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <form id="add-type-form" class="row" action="<?php e(URL);?>user/addUserType/" method="post">
        <div class="col-xs-5">
            <input class="form-control" type="text" name="name" placeholder="角色名">
        </div>
        <div class="col-xs-5">
            <input class="form-control" type="text" name="authority" placeholder="权限">
        </div>
        <div class="col-xs-2">
            <button class="btn btn-primary" type="submit">添加</button>
        </div>
    </form>
    <div id="user-type-hint" class="row">
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p>10 - 查看并修改所有用户信息、管理用户角色、搜索并管理指定用户</p>
            <p>20 - 管理部门、修改社团信息、联系方式</p>
            <p>21 - 发布、管理社团公告</p>
            <p>30 - 查看通讯录等信息</p>
        </div>
    </div>
</div>

<!-- 删除确认 -->
<div id="delete-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">删除角色</h4>
      </div>
      <div class="modal-body">
        <p>确实要删除该角色吗？</p>
      </div>
      <div class="modal-footer">
        <a id="delete-confirm-btn" href="#" class="btn btn-primary" data-url="<?php e(URL);?>user/deleteType/">确认</a>
      </div>
    </div>
  </div>
</div>

<!-- 修改 -->
<form id="modify-modal" class="modal fade" action="" method="post" data-url="<?php e(URL);?>user/updateType/">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">修改角色</h4>
      </div>
      <div class="modal-body">
        <div class="form-group row">
            <label for="input-name" class="control-label col-xs-2">角色名</label>
            <div class="col-xs-9">
                <input id="input-name" class="form-control" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="input-authority" class="control-label col-xs-2">角色权限</label>
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
            $modifyModal = $('#modify-modal'),
            $inputAuthority = $('#input-authority'),
            $inputName = $('#input-name');
        $('#user-type').on('click', '.delete', function () {
            var id = $(this).attr('data-id');
            $deleteBtn.attr('href', $deleteBtn.attr('data-url') + id);
        }).on('click', '.modify', function () {
            var id = $(this).attr('data-id'),
                name = $(this).parent().siblings('.name').text(),
                authority = $(this).parent().siblings('.authority').text();
            $inputAuthority.val(authority);
            $inputName.val(name);
            $modifyModal.attr('action', $modifyModal.attr('data-url') + id);
        });
    }, false);
</script>