

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  <script src = "{{ asset('assets/modules/datatables/jquery.dataTables.min.js') }}" defer ></script>
  
  <!-- JS Libraies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/components-table.js') }}"></script>

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
  
  function setSuccess(title) {
    Toast.fire({
      icon: 'success',
      title: title
    });
  }

    function setError(title) {
      Toast.fire({
        icon: 'error',
        title: title
      });
    }
  
    $(function() {
      $('.swalDefaultInfo').click(function() {
        Toast.fire({
          icon: 'info',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        });
      });
      
      $('.swalDefaultError').click(function() {
        Toast.fire({
          icon: 'error',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        });
      });
      
      $('.swalDefaultWarning').click(function() {
        Toast.fire({
          icon: 'warning',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        });
      });
      
      $('.swalDefaultQuestion').click(function() {
        Toast.fire({
          icon: 'question',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        });
      });
    });
  </script>

@if (Session::has('success'))
<script>
  $(document).ready(function() {
  Toast.fire({
    icon: 'success',
    title: "{{ Session::get('success') }}"
  });
  });
</script>
@endif

@if (Session::has('error'))
<script>
  $(document).ready(function() {
  Toast.fire({
    icon: 'error',
    title: "{{ Session::get('error') }}"
  });
  });
</script>
@endif