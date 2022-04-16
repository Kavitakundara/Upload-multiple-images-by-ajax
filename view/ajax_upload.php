<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Multiple Image Upload</title>
    <style>
        .div {
    width: 40%;
    margin: 53px auto;
    border: 1px solid #80808099;
    padding: 10px;
}   
    </style>
  </head>
  <body>
   
  <form action="<?= base_url('ajax/upload_images');?>" method="POST" id="upload_form" enctype="multipart/form-data">
<div class="div">
  <div class="alert alert-success" id="divMsg" style="display:none">
  <span id="msg"></span>
</div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"></label>
    <input type="file" name="image" id="ajax_up_file"class="form-control" aria-describedby="image" multiple>
    </div>
     <button type="submit" class="btn btn-primary">Submit</button>
     </div>
</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script>

    $('form').submit(function(run){
    run.preventDefault();

    if($('#ajax_up_file').value == ''){
      alert('Please choose the files');
    }
    else{
      var form_data= new FormData();
      var ins = document.getElementById('ajax_up_file').files.length;
      for (var x=0; x< ins; x++){
        form_data.append('image[]', document.getElementById('ajax_up_file').files[x]);
      }
      $.ajax({
        url: "<?= base_url(); ?>ajax/upload_images",
        method:"POST",  
        data:form_data,  
        contentType: false,  
        cache: false,  
        processData:false,  
        dataType: "json",
        success:function(res) 
        {
          console.log(res.success);
          if(res.success== true){
            $('#image_file').val('');
              $('#uploadPreview').html('');   
              $('#msg').html(res.msg);   
              $('#divMsg').show();
          }else if(res.success== false){
            $('#msg').html(res.msg); 
            $('#divMsg').show();
          }
        } 
      });
    }
  });



  </script>
</html>