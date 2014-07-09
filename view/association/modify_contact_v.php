<div class="container well margin-top-10">
    <div class="row">
        <form class="col-xs-12 form-horizontal" action="<?php e(URL);?>association/modifyContactHandler/" method="post">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">手机</span>
                    <input type="text" class="form-control" name="phone" value="<?php e($this->phone);?>">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">邮箱</span>
                    <input type="text" class="form-control" name="email" value="<?php e($this->email);?>">
                </div>
            </div>
            <div class="form-group">
                    <button type="submit" class="btn btn-primary">修改</button>
            </div>
        </form>
    </div>
</div>