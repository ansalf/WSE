

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Admin LTE -->
  <script src="{{ asset('assets/modules/sweetalert2/sweetalert2.min.js') }}"></script>
  
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  @stack('script')

  

  <script> 
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
  
      function setError(title) {
        Toast.fire({
        icon: 'error',
        title: title
        })
      }
    $(function() {
  
         if({{ Session::has('success') }})
         {
            Toast.fire({
              icon: 'success',
              title: "{{ Session::get('success') }}",
            }) 
         }
         
        $('.swalDefaultInfo').click(function() {
          Toast.fire({
            icon: 'info',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.swalDefaultError').click(function() {
          Toast.fire({
            icon: 'error',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.swalDefaultWarning').click(function() {
          Toast.fire({
            icon: 'warning',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.swalDefaultQuestion').click(function() {
          Toast.fire({
            icon: 'question',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
      });
    </script>
  <script>
    $(document).ready(function(){
      $('#btn-signout').click(()=>{
        $.ajax({
          type: "post",
          data: {
            "_token": $("meta[name='csrf-token']").attr("content")
          },
          url: "{{ route('signout') }}",
          success: function (response) {
            if (response.success) {
              window.location.href = "{{ route('login') }}";
            } else {
              setError('Logout Gagal')
            }
          }
        });
      });
    });
  </script>