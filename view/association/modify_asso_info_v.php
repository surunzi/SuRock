<div class="container well margin-top-10">
    <div class="row">
        <form class="col-xs-12 form-horizontal" action="<?php e(URL);?>association/modifyAssoInfoHandler/" method="post">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">社团名称</span>
                    <input type="text" class="form-control" name="name" value="<?php e($this->asso_name);?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">修改</button>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="5" name="intro" placeholder="社团简介"><?php e($this->asso_intro);?></textarea>
            </div>
        </form>
    </div>
</div>