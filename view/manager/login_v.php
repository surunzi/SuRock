<div class="center">
    <form id="login-form" class="form-horizontal well" action="<?php e(URL)?>manager/loginHandler" method="post">
        <div class="form-group">
            <label for="input-username" class="control-label col-xs-3">学号</label>
            <div class="col-xs-9">
                <input id="input-username" class="form-control" type="text" name="username">
            </div>
        </div>
        <div class="form-group">
            <label for="input-password" class="control-label col-xs-3">密码</label>
            <div class="col-xs-9">
                <input id="input-password" class="form-control" type="password" name="password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-9 col-xs-offset-3">
                <a class="btn btn-default" href="<?php e(URL);?>manager/signup">报名</a>
                <button type="submit" class="btn btn-primary">登录</button>
            </div>
        </div>
    </form>
</div>