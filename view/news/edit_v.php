<div class="container well margin-top-10">
    <form class="col-xs-12" action="<?php e(URL);?>news/update/<?php e($this->id);?>" method="post">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">标题</span>
                <input type="text" class="form-control" name="title" value="<?php e($this->title);?>">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">修改</button>
                </span>
            </div>
        </div>
        <div class="form-group">
            <textarea name="content" class="form-control" rows="14"><?php e($this->content);?></textarea>
        </div>
    </from>
</div>

<script>
    window.addEventListener('load', function () {
        tinymce.init({
            language: "zh_CN",
            selector: "textarea",
            theme: "modern",
            plugins: [
                "advlist autolink lists link image charmap hr anchor pagebreak",
                "searchreplace visualblocks visualchars code fullscreen textcolor",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste"
            ],
            toolbar1: "undo redo | styleselect fontselect fontsizeselect | bold italic | alignleft aligncenter alignright | bullist numlist | link unlink image | forecolor fullscreen"
        });
    }, false);
</script>