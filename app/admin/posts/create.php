<?php
session_start();
    include_once('../../include/header-admin.php');
    include  ('../../controller/post.php');
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
            <div class="button row">
                <a href="create.php" class="col-2 btn btn-success">Додати</a>
                <span class="col-1"></span>
                <a href="index.php" class="col-2 btn btn-danger">Редагувати</a>
            </div>
            <div class="row title-table">
                <h2>Додавання записів</h2>
            </div>
            <div class="row edd-post">
                <div class="mb-3 col-12 col-md-4 err">
               <!-Масив з помилками-->
                    <?php include  ('../../../app/helps/erorinfo.php'); ; ?>
                </div>
            </div>
            <div class="row edd-post">
                <form action="create.php" method="post" ENCTYPE="multipart/form-data">
                    <div class="col">
                        <input  value="<?=$title; ?>" name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="Назва посту">
                    </div>

                    <div class="col">
                        <label for="content" class="form-label">Вміст запису</label>
                        <textarea name="content" id="editor" class="form-control" id="content" rows="6"><?=$content; ?></textarea>
                    </div>
                    <!-- CKEditor initialization script -->
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            ClassicEditor
                                .create(document.querySelector('#editor'), {
                                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                                    heading: {
                                        options: [
                                            {model: 'paragraph', title: 'Параграф', class: 'ck-heading_paragraph'},
                                            {model: 'heading1', view: 'h1', title: 'Заголовок 1', class: 'ck-heading_heading1'},
                                            {model: 'heading2', view: 'h2', title: 'Заголовок 2', class: 'ck-heading_heading2'}
                                        ]
                                    }
                                })
                                .catch(error => {
                                    console.log(error);
                                });
                        });
                    </script>
                    <div class="input-group сol">
                        <input  name="img" type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text">Upload</label>
                    </div>

                    <select name="topic" class="form-select" aria-label="Default select example">
                        <option selected>Категорія поста:</option>
                        <?php foreach ($topics as $key  => $topic): ?>
                            <option value="<?=$topic['id'];?>"><?=$topic['name'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-check form-switch">
                        <input name="publish" class="form-check-input" type="checkbox"  value="1" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Publish</label>
                    </div>
                    <div class="col col-6">
                        <button name="add_post" class="btn btn-primary" type="submit">Добавити запис</button>
                    </div>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include_once("../../include/footer.php"); ?>
</body>
</html>
