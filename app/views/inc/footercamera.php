</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

      scanner.addListener('scan', function (content) {

        $.post( "http://localhost/Revels/checkers/buy", { content: content }, function(){
			alert("Scan Complete");
		} );

      });


      $("#scan").on('click', function() {
        Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
        }).catch(function (e) {
          console.error(e);
        });
	    });

      $("#stop").on('click', function() {
        Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.stop(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
        }).catch(function (e) {
          console.error(e);
        });
	    });
    </script>
</body>
</html>