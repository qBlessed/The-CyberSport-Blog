<?php
include SITE_ROOT ."/app/controller/comment.php";
?>
<div class="container">
    <h3>Залишити комент :)</h3>
    <form action="<?="single.php?post=$page"?>" method="post">
        <input type="hidden" name="page" value="<?=$page;?>">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input name="email" type="email"   class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Ваш коментар</label>
            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
        </div>
        <div class="col-12">
            <button type="submit" name="goComment" class="btn btn-dark">Відправити</button>
        </div>
    </form>
    <?php if(count($comments) > 0): ?>
        <div class="row all-comments">
            <h3 class="col-12">Обговорення</h3>
            <?php foreach ($comments as $comment): ?>
                <div class="one-comment col-12">
                    <span><i class="fa fa-envelope" aria-hidden="true" style="color: red;"></i><?=$comment['email']?></span>
                    <span><i class="fa fa-calendar" aria-hidden="true" style="color: red;"></i><?=$comment['created_date']?></span>
                    <div class="col-12 text">
                        <?=$comment['comment']?>
                    </div>
                    <button class="reply-button" onclick="replyToComment('<?=$comment['email']?>')">Відповісти</button>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif;?>
</div>

<script>
    function replyToComment(email) {
        document.getElementById('exampleFormControlTextarea1').value = `@${email} `;
        document.getElementById('exampleFormControlTextarea1').focus();
    }
</script>
