<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tiny.cloud/1/jja3seomenr9al24c16g2mgpgvh8osadzhpncpiienwjoty3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      image_title: true,

      automatic_uploads: true,

      file_picker_types: 'image',
      /* and here's our custom image picker*/
      file_picker_callback: function (cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');


        input.onchange = function () {
          var file = this.files[0];

          var reader = new FileReader();
          reader.onload = function () {

            var id = 'blobid' + (new Date()).getTime();
            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            var base64 = reader.result.split(',')[1];
            var blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);

            cb(blobInfo.blobUri(), { title: file.name });
          };
          reader.readAsDataURL(file);
        };

        input.click();
      },
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
  </script>
  <h1 style="text-align: center;">Thêm bài viết mới</h1>
  <div class="container">
  <form method="post" action="saveBlog.php" enctype="multipart/form-data">
  <label for="blog_title">Tên bài viết: </label>
  <input type="text" class="form-control" style="width:50%" name="blog_title" required><br>
  <label for="blog_tag">Danh mục: </label>
  <select name="blog_tag" style="width:50%" class="form-select" required>
  <?php 
      require_once "./Connect.php";
      $stmt = $conn->prepare("SELECT * FROM blog_tag");
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      $tag = $stmt->fetchAll();
      foreach ($tag as $t) {
    ?>
      <option><?php echo $t["tag_name"];?></option>
    <?php }?>
  </select>
  <br>

  <textarea id="editor" name="content">
    ...
  </textarea>
  <br>
  <input type="file" name="thumbnail" id="thumbnail">
  <br>
  <br>
  <button class="btn btn-primary" type="submit" name="submit">Đăng bài</button>
  </form>
  </div>
</body>
</html>