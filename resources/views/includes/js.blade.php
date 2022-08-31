<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('table tbody').sortable({
        update: function(event, ui) {
          $(this).children().each(function(index) {
            if ($(this).attr('data-position') != (index + 1)) {
              $(this).attr('data-position', (index + 1)).addClass('updated');
            }
          });

          saveNewPositions();
        }
      });
    });

    function saveNewPositions() {
      // alert("in");
      var positions = [];
      $('.updated').each(function() {
        positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
        $(this).removeClass('updated');
      });
      // alert(positions);
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: '{{url("task/setPriority")}}',
        method: 'POST',
        dataType: 'text',
        data: {
          update: 1,
          positions: positions
        },
        success: function(response) {
          console.log(response);
        }
      });
    }

    function editData(id) {
      // alert(id);
      var oldData = $('#' + id).text();
      var oldValue = oldData.trim();;

      var oldProject = $('#projectId').val();
      // alert(oldProject)

      // alert(oldValue);
      $("input#taskEditName").val(oldValue);
      $("input#taskEditNameOld").val(oldValue);

      $("#projectName").val(oldProject);

    }

    function deleteTask(id) {
      var taskId = id;

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: '{{url("task/delete")}}',
        method: 'POST',
        dataType: 'text',
        data: {
          id: taskId,
        },
        success: function(response) {
          if (response == 1) {
            location.reload();
          } else {
            alert("An error occured");
          }
        }
      });

    }
  </script>