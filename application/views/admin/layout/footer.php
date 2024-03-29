        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>
                            document.write(new Date().getFullYear())
                            </script>
                            <strong>KEPEGAWAIAN DLH TANGSEL</strong>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/searchpanes/2.2.0/js/dataTables.searchPanes.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>

  <?php if($this->uri->segment(2) == 'foto'): ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
    <script language="JavaScript">
      var videoElement = document.querySelector('video');
      var videoSelect = document.querySelector('select#videoSource');

      videoSelect.onchange = getStream;

      getStream().then(getDevices).then(gotDevices);

      function getDevices() {
          return navigator.mediaDevices.enumerateDevices();
      }

      function gotDevices(deviceInfos) {
          window.deviceInfos = deviceInfos;
          console.log('Available input and output devices:', deviceInfos);
          for (const deviceInfo of deviceInfos) {
              const option = document.createElement('option');
              option.value = deviceInfo.deviceId;
              
              if (deviceInfo.kind === 'videoinput') {
                  option.text = deviceInfo.label || `Camera ${videoSelect.length + 1}`;
                  videoSelect.appendChild(option);
              }
          }
      }

      function getStream() {
          if (window.stream) {
              window.stream.getTracks().forEach(track => {
                  track.stop();
              });
          }

          const videoSource = videoSelect.value;
          const constraints = {
              video: {deviceId: videoSource ? {exact: videoSource} : undefined}
          };
          return navigator.mediaDevices.getUserMedia(constraints).
              then(gotStream).catch(handleError);
      }

      function gotStream(stream) {
          window.stream = stream;
          videoSelect.selectedIndex = [...videoSelect.options].
          findIndex(option => option.text === stream.getVideoTracks()[0].label);
          videoElement.srcObject = stream;
      }

      function handleError(error) {
          console.error('Error: ', error);
      }

      $('#upload').on('submit', function (event) {
        event.preventDefault();
        var image = '';
        var id = $('#id').val();
        var video = document.getElementById('video');
        var canvas = document.getElementById('canvas');
        var context = canvas.getContext('2d');

        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        var imageData = context.getImageData(0, 0, canvas.width, canvas.height);
        var croppedCanvas = document.createElement('canvas');
        var croppedContext = croppedCanvas.getContext('2d');

        croppedCanvas.width = canvas.width;
        croppedCanvas.height = canvas.height;

        var targetWidth = 750;
        var targetHeight = 1000;

        var offsetX = (canvas.width - targetWidth) / 2;
        var offsetY = (canvas.height - targetHeight) / 2;

        croppedContext.putImageData(imageData, 0, 0);
        var croppedImage = croppedContext.getImageData(offsetX, offsetY, targetWidth, targetHeight);

        canvas.width = targetWidth;
        canvas.height = targetHeight;

        context.putImageData(croppedImage, 0, 0);

        context.translate(targetWidth, 0);
        context.scale(-1, 1);
        context.drawImage(canvas, 0, 0, -targetWidth, targetHeight);

        var imageData = canvas.toDataURL('image/png').replace(/^data:image\/(png|jpg);base64,/, '');
        $.ajax({
          url: '<?php echo site_url("admin/foto/save");?>',
          type: 'POST',
          dataType: 'json',
          data: {id: id, image:imageData},
        }).done(function(data) {
          if (data === 1) {
            alert('Foto Berhasil Di Upload');
            location.reload()
          }
        }).fail(function() {
          console.log("error");
        }).always(function() {
          console.log("complete");
        });
      });
    </script>

  <?php elseif($this->uri->segment(2) == 'dashboard'): ?>
    <script>
      var ctx1 = document.getElementById("chart-line").getContext("2d");
      var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
      gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
      gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

      $.ajax({
        url: '<?= site_url('admin/dashboard/lineChart') ?>',
        type: 'get',
        success: function(res){
          new Chart(ctx1, {
            type: 'bar',
            data: {
              labels: res.labels,
              datasets: [{
                label: "Data Pegawai",
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                data: res.data,
                borderWidth: 1,
                borderRadius: 6
              }],
            },
            options: {
              responsive: true,
              indexAxis: 'y',
              animation: false,
              tooltipTemplate: "<%= value %>",
              tooltipFillColor: "rgba(0,0,0,0)",
              tooltipFontColor: "#444",
              tooltipEvents: [],
              tooltipCaretSize: 0,
              onAnimationComplete: function()
              {
                  this.showTooltip(this.datasets[0].bars, true);
              }

            },
          });
        }
      })

    </script>

  <?php elseif($this->uri->segment(2) == 'kepegawaian'): ?>
    <script>
      var table = $('#table').DataTable({
        fixedColumns: {
          left: 2
        },
        dom: 'lrtip',
      });

      $('#search-data').on( 'keyup', function () {
        table.columns(1).search( this.value ).draw();
      });

      $('#search-norek').on( 'keyup', function () {
        table.columns(3).search( this.value ).draw();
      });
    </script>
  <?php else: ?>
    <script>
      $('#table').DataTable();
      $('#table2').DataTable();
    </script>
  <?php endif; ?>

  <script>
    $(document).ready(function() {
        $('.select2').select2();
    });

    function previewImage() {
      var element = document.getElementById("image-preview")
      element.classList.remove("d-none")
      document.getElementById("image-preview").style.display = "block"

      var oFReader = new FileReader()
      oFReader.readAsDataURL(document.getElementById("image-source").files[0])
      oFReader.onload = function(oFREvent) {
          document.getElementById("image-preview").src = oFREvent.target.result
      }
    }
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/argon-dashboard.min.js?v=2.0.4') ?>"></script>
  <script>
    var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, '');
		});

    function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
		}

    function previewImage() {
        var element = document.getElementById("image-preview")
        element.classList.remove("d-none")
        document.getElementById("image-preview").style.display = "block"

        var oFReader = new FileReader()
        oFReader.readAsDataURL(document.getElementById("image-source").files[0])
        oFReader.onload = function(oFREvent) {
            document.getElementById("image-preview").src = oFREvent.target.result
        }
    }

    function previewImageKTP() {
        var element = document.getElementById("image-preview-KTP")
        element.classList.remove("d-none")
        document.getElementById("image-preview-KTP").style.display = "block"

        var oFReader = new FileReader()
        oFReader.readAsDataURL(document.getElementById("image-source-KTP").files[0])
        oFReader.onload = function(oFREvent) {
            document.getElementById("image-preview-KTP").src = oFREvent.target.result
        }
    }

    function previewImageREK() {
        var element = document.getElementById("image-preview-REK")
        element.classList.remove("d-none")
        document.getElementById("image-preview-REK").style.display = "block"

        var oFReader = new FileReader()
        oFReader.readAsDataURL(document.getElementById("image-source-REK").files[0])
        oFReader.onload = function(oFREvent) {
            document.getElementById("image-preview-REK").src = oFREvent.target.result
        }
    }

    function previewImageBPJS() {
        var element = document.getElementById("image-preview-BPJS")
        element.classList.remove("d-none")
        document.getElementById("image-preview-BPJS").style.display = "block"

        var oFReader = new FileReader()
        oFReader.readAsDataURL(document.getElementById("image-source-BPJS").files[0])
        oFReader.onload = function(oFREvent) {
            document.getElementById("image-preview-BPJS").src = oFREvent.target.result
        }
    }

    function previewImageBPJSNaker() {
        var element = document.getElementById("image-preview-BPJS-Naker")
        element.classList.remove("d-none")
        document.getElementById("image-preview-BPJS-Naker").style.display = "block"

        var oFReader = new FileReader()
        oFReader.readAsDataURL(document.getElementById("image-source-BPJS-Naker").files[0])
        oFReader.onload = function(oFREvent) {
            document.getElementById("image-preview-BPJS-Naker").src = oFREvent.target.result
        }
    }

    function previewImageNPWP() {
        var element = document.getElementById("image-preview-NPWP")
        element.classList.remove("d-none")
        document.getElementById("image-preview-NPWP").style.display = "block"

        var oFReader = new FileReader()
        oFReader.readAsDataURL(document.getElementById("image-source-NPWP").files[0])
        oFReader.onload = function(oFREvent) {
            document.getElementById("image-preview-NPWP").src = oFREvent.target.result
        }
    }

    $('.btn-lihat-document').click(function(){
      var doc = $(this).attr('data-document')

      $('.data-pdf').empty()
      $('.data-pdf').append("<embed type='application/pdf' src='" + doc + "' width='600' height='400'></embed>")

      $('#modal-doc').modal('show')
    })
  </script>
</body>

</html>