<?php
session_start();
include_once('../../include/header-admin.php');
include  ('../../controller/comment.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cybersport dota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Подключение Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <!-- CKEditor script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
</head>
<body>

<div class="container">
    <?php  include "../../include/sidebar-admin.php"; ?>
    <div class="posts col-9">
        <div class="row title-table">
            <h2>Редагування Коментарів</h2>
        </div>
        <div class="row edd-post">
            <div class="mb-3 col-12 col-md-4 err">
                <!-Масив з помилками-->
                <?php include  ('../../../app/helps/erorinfo.php'); ; ?>
            </div>
        </div>
        <div class="row edd-post">
            <form action="edit.php" method="post">
                <div class="col">
                    <input  type="hidden" name="id" value="<?=$id;?>">
                    <input  value="<?=$email;?>"  readonly name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Назва посту">
                </div>

                <div class="col">
                    <label for="content" class="form-label">Вміст коментаря</label>
                    <textarea name="content" id="editor" class="form-control" id="content" rows="6"><?=$text1?></textarea>
                </div>
                <div class="form-check">
                    <?php if($pub) $checked = "checked"; else $checked = "";?>
                    <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" <?=$checked;?> >
                    <label class="form-check-label" for="flexCheckChecked">
                        Publish
                    </label>
                </div>
                <div class="col col-6">
                    <button name="comment_edit" class="btn btn-primary" type="submit">Зберегти</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>
</body>
<!-- Footer -->

