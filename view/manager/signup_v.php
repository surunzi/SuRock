<div class="container">
    <div class="row">
        <form id="signup-form" class="form-horizontal col-xs-8 col-xs-offset-2" action="<?php e(URL);?>manager/signupHandler" method="post">
            <div class="form-group">
                <label for="input-username" class="control-label col-xs-2">学号</label>
                <div class="col-xs-9">
                    <input id="input-username" class="form-control" type="text" name="username">
                </div>
            </div>
            <div class="form-group">
                <label for="input-password" class="control-label col-xs-2">密码</label>
                <div class="col-xs-9">
                    <input id="input-password" class="form-control" type="text" name="password">
                </div>
            </div>
            <div class="form-group">
                <label for="input-realname" class="control-label col-xs-2">姓名</label>
                <div class="col-xs-9">
                    <input id="input-realname" class="form-control" type="text" name="realname">
                </div>
            </div>
            <div class="form-group">
            <div class="col-xs-9 col-xs-offset-2">
                <a class="btn btn-default" href="<?php e(URL);?>manager/login">登录</a>
                <button type="submit" class="btn btn-primary">报名</button>
            </div>
        </div>
        </form>
    </div>
</div>