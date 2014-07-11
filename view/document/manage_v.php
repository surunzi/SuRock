<div class="container well margin-top-10">
    <div class="row">
        <table class="col-xs-12 table table-striped">
            <thead>
                <tr>
                    <th>名称</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->docs as $key => $value) {
                ?>
                    <tr>
                        <td><?php e($value['doc_name']);?></td>
                        <td><?php e($value['doc_created']);?></td>
                        <td>
                            <a href="#" class="link delete" data-toggle="modal" data-target="#delete-modal" data-id="<?php e($value['doc_id']);?>">删除</a>
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
        <p>确实要删除该文档吗？</p>
      </div>
      <div class="modal-footer">
        <a id="delete-confirm-btn" href="#" class="btn btn-primary" data-url="<?php e(URL);?>document/delete/">确认</a>
      </div>
    </div>
  </div>
</div>

<script>
    window.addEventListener('load', function () {
        var $deleteBtn = $('#delete-confirm-btn');
        $('.delete').on('click', function () {
            var id = $(this).attr('data-id');
            $deleteBtn.attr('href', $deleteBtn.attr('data-url') + id);
        });
    }, false);
</script>