  <script>
    function tags() {
      $.ajax({
      type : 'POST',
      url : '/get/tags',
      data : $('#tagsform').serialize(),
      dataType: 'html',
        success: function(data) {
          $('#tag_list').html(data);
        }
      });
    }
    tags();
  </script>