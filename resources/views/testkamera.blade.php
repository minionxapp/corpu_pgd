<!DOCTYPE html>
<html>
  <head>
    <title>Instascan</title>
    <script type="text/javascript" src="js/instascan.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  </head>
  <body>
    <video id="preview"></video><br>

    <input type="text" name="content" class="form-control" id="content">
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        // console.log(content);
        // alert(content);
        $("#content").val(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            // alert(cameras.length);
            if(cameras.length>1){
                scanner.start(cameras[1]);//1 kamera belakang
                alert('Kamera Belakang.'); 
            }else{
                scanner.start(cameras[0]);//1 kamera belakang
                alert('Kamera depan.'); 
            }
        } else {
          console.error('No cameras found.');
          alert('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
  </body>
</html>