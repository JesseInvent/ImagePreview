<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter 4 Image upload with preview example</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://code.jquery.com/jquery-3.4.1.js"></script> 

</head>
<body>
 <div class="container">
    <br>
    
    <?php if (session('msg')) : ?>
        <div class="alert alert-info alert-dismissible">
            <?= session('msg') ?>
            <button type="button" class="close" data-dismiss="alert"><span>&times</span></button>
        </div>
    <?php endif; ?>

    <div class="row">
      <div class="col-md-9">
        <form action="<?php echo base_url('form/store');?>" name="ajax_form" id="ajax_form" method="post" accept-charset="utf-8" enctype="multipart/form-data">

            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="file" name="images[]" class="form-control" id="file" onchange="readURL(this);" multiple >
            </div>           

            
            <div class="form-group">
                <button type="submit" id="send_form" class="btn btn-success">Submit</button>
            </div>
            
        </form>

        <div class="" id="preview" >
        </div> 

       </div>
      </div>

    </div>
 
</div>
<script>

 function readURL(input) {

    //if (inputitfiles && input.files[0]) {

console.log(input.files.length);

        for(let i = 0; i < input.files.length; i++){

            let reader = new FileReader();

            reader.onload = function (e) {

                let img = document.createElement('img');
                img.setAttribute('class', 'm-3 img-thumbnail img-fluid');
                img.setAttribute('width', 200);
                img.setAttribute('height', 150);
                img.setAttribute('id', 'previewImage');
                img.setAttribute('src', e.target.result);
                console.log(img);
                document.querySelector('#preview').appendChild(img);

             }

            reader.readAsDataURL(input.files[i]);
        }
   }
//}
</script>  
</body>
</html>