<div id="manage-department" class="container well">
    <div class="row">
        <table class="col-xs-12 table table-striped">
            <thead>
                <tr>
                    <th>部门</th>
                    <th class="width-50">简介</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->deps as $key => $value) {
                ?>
                    <tr>
                        <td class="depname"><?php e($value['dep_name']);?></td>
                        <td class="depinfo"><?php e($value['dep_info']);?></td>
                        <td>
                            <a href="" class="link modify" data-toggle="modal" data-target="#modify-modal" data-id="<?php e($value['dep_id']);?>">修改</a>
                            <a href="" class="link delete" data-toggle="modal" data-target="#delete-modal" data-id="<?php e($value['dep_id']);?>">删除</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <form id="add-department-form" class="form-horizontal col-xs-12" action="<?php e(URL);?>association/addDepartment" method="post">
            <div class="form-group">
                <label for="input-department-name" class="control-label col-xs-2">部门名称</label>
                <div class="col-xs-9">
                    <input id="input-department-name" class="form-control" name="name">
                </div>
            </div>
            <div class="form-group">
                <label for="input-department-info" class="control-label col-xs-2">部门简介</label>
                <div class="col-xs-9">
                    <textarea id="input-department-info" class="form-control" rows="3" name="info"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-9 col-xs-offset-2">
                    <button type="submit" class="btn btn-primary">添加</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- 删除确认 -->
<div id="delete-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">删除部门</h4>
      </div>
      <div class="modal-body">
        <p>确实要删除该部门吗？</p>
      </div>
      <div class="modal-footer">
        <a id="delete-confirm-btn" href="#" class="btn btn-primary" data-url="<?php e(URL);?>association/deleteDepartment/">确认</a>
      </div>
    </div>
  </div>
</div>

<!-- 修改 -->
<form id="modify-modal" class="modal fade" action="" method="post" data-url="<?php e(URL);?>association/updateDepartment/">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">修改部门信息</h4>
      </div>
      <div class="modal-body">
        <div class="form-group row">
            <label for="input-depname" class="control-label col-xs-2">部门名称</label>
            <div class="col-xs-9">
                <input id="input-depname" class="form-control" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="input-depinfo" class="control-label col-xs-2">部门简介</label>
            <div class="col-xs-9">
                <textarea id="input-depinfo" class="form-control" name="info" rows="3"></textarea>
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
            $inputDepinfo = $('#input-depinfo'),
            $inputDepname = $('#input-depname');
        $('#manage-department').on('click', '.delete', function () {
            var id = $(this).attr('data-id');
            $deleteBtn.attr('href', $deleteBtn.attr('data-url') + id);
        }).on('click', '.modify', function () {
            var id = $(this).attr('data-id'),
                name = $(this).parent().siblings('.depname').text(),
                info = $(this).parent().siblings('.depinfo').text();
            $inputDepinfo.val(info);
            $inputDepname.val(name);
            $modifyModal.attr('action', $modifyModal.attr('data-url') + id);
        });
    }, false);
</script>