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
                            <a href="<?php e(URL);?>public/doc/<?php e($value['doc_id'].'_'.$value['doc_name']);?>" class="link" target="_blank">下载</a>
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