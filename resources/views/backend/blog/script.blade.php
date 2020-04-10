@section('script')

  <script type="text/javascript">
      $('ul.pagination').addClass('no-margin pagination-sm');

      var simplemde1 = new SimpleMDE({ element: $("#excerpt")[0] });
      var simplemde2 = new SimpleMDE({ element: $("#body")[0] });

      $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        showClear: true
    });

    $('#draft-btn').click(function(e){
      e.preventDefault();
      $('#published_at').val("");
      $('#post-form').submit();
    });
  </script>

@endsection


