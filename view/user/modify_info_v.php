<div id="modify-info" class="container well">
    <form id="modify_info_form" class="form-horizontal" action="<?php e(URL.'user/updateUser/'.$this->id);?>" method="post">
        <div class="form-group">
            <label for="input-sex" class="control-label col-xs-2">性别</label>
            <div class="col-xs-9">
                <select id="input-sex" class="form-control" name="sex">
                    <option value="1" <?php if ($this->sex == 1) {e('selected');}?>>男</option>
                    <option value="0" <?php if ($this->sex == 0) {e('selected');}?>>女</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="input-phone" class="control-label col-xs-2">手机</label>
            <div class="col-xs-9">
                <input id="input-phone" class="form-control" type="text" name="phone" value="<?php e($this->phone);?>">
            </div>
        </div>
        <div class="form-group">
            <label for="input-email" class="control-label col-xs-2">邮箱</label>
            <div class="col-xs-9">
                <input id="input-email" class="form-control" type="email" name="email" value="<?php e($this->email);?>">
            </div>
        </div>
        <div class="form-group">
            <label for="input-qq" class="control-label col-xs-2">QQ</label>
            <div class="col-xs-9">
                <input id="input-qq" class="form-control" type="text" name="qq" value="<?php e($this->qq);?>">
            </div>
        </div>
        <div class="form-group">
            <label for="input-department" class="control-label col-xs-2">部门</label>
            <div class="col-xs-9">
                <select id="input-department" class="form-control" name="department">
                    <option value="0" <?php if ($this->department == 0) {e('selected');}?>>无</option>
                    <?php
                    foreach ($this->departments as $key => $value) {
                    ?>
                        <option value="<?php e($value['dep_id']);?>" <?php if ($this->department == $value['dep_id']) {e('selected');}?>><?php e($value['dep_name']);?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="input-dormitory" class="control-label col-xs-2">宿舍</label>
            <div class="col-xs-9">
                <input id="input-dormitory" class="form-control" type="text" name="dormitory" value="<?php e($this->dormitory);?>">
            </div>
        </div>
        <div class="form-group">
            <label for="input-major" class="control-label col-xs-2">专业</label>
            <div class="col-xs-9">
                <input id="input-major" class="form-control" type="text" name="major" value="<?php e($this->major);?>">
            </div>
        </div>
        <div class="form-group">
            <label for="input-birthplace" class="control-label col-xs-2">籍贯</label>
            <div class="col-xs-9">
                <input id="input-birthplace" class="form-control" type="text" name="birthplace" value="<?php e($this->birthplace);?>">
            </div>
        </div>
        <div class="form-group">
            <label for="input-birthday" class="control-label col-xs-2">生日 </label>
            <div class="col-xs-9">
                <input id="input-birthday" class="form-control" type="date" name="birthday" value="<?php e($this->birthday);?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-9 col-xs-offset-2">
                <button type="submit" class="btn btn-primary">修改</button>
            </div>
        </div>
    </form>
</div>