  <!-- Success Alert (optional) -->
  @if (session('success'))
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: "{{ session('success') }}",
              confirmButtonColor: '#3085d6'
          });
      });
  </script>
  @endif
  
  <!-- SweetAlert Error Alert Script -->
  @if ($errors->any())
      <script>
          document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  html: `{!! implode('<br>', $errors->all()) !!}`,
                  confirmButtonColor: '#d33'
              });
          });
      </script>
  @endif

  <script>
    function showAlert(icon, title, text) {
        Swal.fire({
            icon: icon,
            title: title,
            text: text,
            confirmButtonColor: icon === 'success' ? '#3085d6' : '#d33'
        });
    }
</script>