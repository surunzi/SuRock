<div id="manage-message" class="container well margin-top-10">
    <div class="row">
        <table class="col-xs-12 table table-striped">
            <thead>
                <tr>
                    <th>姓名</th>
                    <th class="width-50">内容</th>
                    <th>邮箱</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->msgs as $key => $value) {
                ?>
                    <tr>
                        <td><?php e($value['msg_name']);?></td>
                        <td><?php e($value['msg_content']);?></td>
                        <td><?php e($value['msg_email']);?></td>
                        <td><?php e($value['msg_created']);?></td>
                        <td>
                            <a href="#" class="link delete" data-toggle="modal" data-target="#delete-modal" data-id="<?php e($value['msg_id']);?>">删除</a>
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
        <p>确实要删除该留言吗？</p>
      </div>
      <div class="modal-footer">
        <a id="delete-confirm-btn" href="#" class="btn btn-primary" data-url="<?php e(URL);?>association/deleteMessage/">确认</a>
      </div>
    </div>
  </div>
</div>

<script>
    window.addEventListener('load', function () {
        var $deleteBtn = $('#delete-confirm-btn');
        $('#manage-message').on('click', '.delete', function () {
            var id = $(this).attr('data-id');
            $deleteBtn.attr('href', $deleteBtn.attr('data-url') + id);
        });
    }, false);
</script>