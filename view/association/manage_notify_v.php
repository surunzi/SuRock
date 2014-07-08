<div id="manage-notify" class="container well margin-top-10">
    <div class="row">
        <table class="col-xs-12 table table-striped">
            <thead>
                <tr>
                    <th>标题</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->notifications as $key => $value) {
                ?>
                    <tr>
                        <td><?php e($value['notify_title']);?></td>
                        <td><?php e($value['notify_created']);?></td>
                        <td>
                            <a href="#" class="link view" data-toggle="modal" data-target="#view-modal" data-id="<?php e($value['notify_id']);?>">查看</a>
                            <a href="#" class="link delete" data-toggle="modal" data-target="#delete-modal" data-id="<?php e($value['notify_id']);?>">删除</a>
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
            <li><a href="<?php e(URL.'association/manageNotify/'.($this->page['page']-1));?>">上页</a></li>
            <?php } if ($this->page['no_next'] != true) {?>
            <li><a href="<?php e(URL.'association/manageNotify/'.($this->page['page']+1));?>">下页</a></li>
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
        <h4 class="modal-title">删除公告</h4>
      </div>
      <div class="modal-body">
        <p>确实要删除该公告吗？</p>
      </div>
      <div class="modal-footer">
        <a id="delete-confirm-btn" href="#" class="btn btn-primary" data-url="<?php e(URL);?>association/deleteNotify/">确认</a>
      </div>
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
        var $deleteBtn = $('#delete-confirm-btn'),
            $viewContent = $('#view-modal .modal-body');
        $('#manage-notify').on('click', '.delete', function () {
            var id = $(this).attr('data-id');
            $deleteBtn.attr('href', $deleteBtn.attr('data-url') + id);
        }).on('click', '.view', function () {
            var id = $(this).attr('data-id');
            $.get($viewContent.attr('data-url') + id, '', function (data) {
                $viewContent.html(data);
            });
        });
    }, false);
</script>