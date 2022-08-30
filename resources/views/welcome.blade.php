<!doctype html>
<html lang="en">
  

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>jQuery Sortable</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <div class="container" style="margin-top: 100px;">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#projectModal">
      Create Project
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#taskModal">
      Create Task
    </button>

    <!-- Project modal -->
    <div class="modal" id="projectModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title w-100 text-center">Create Project</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <!-- adding Bootstrap Form here -->

            <form id="myForm" method="POST" action="{{ route('project.store') }}">
              @csrf

              <div class="container">
                <div class="form-group row">
                  <label for="id" class="col-sm-4 col-form-label">Project Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="name_id" name="name" placeholder="Enter Project Name" required />
                    <div class="invalid-feedback">
                      Project Name
                    </div>
                  </div>
                </div>

                <div class="text-right">
                  <button class="btn btn-success" type="submit">Submit</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    <!-- task modal -->
    <div class="modal" id="taskModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title w-100 text-center">Create Task</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <!-- adding Bootstrap Form here -->

            <form id="myForm"method="POST" action="{{ route('task.store') }}"  class="needs-validation" novalidate>
            @csrf

              <div class="container">
                <div class="form-group row">
                  <label for="id" class="col-sm-4 col-form-label">Task Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="name_id" name="name" placeholder="Enter Task Name" required />
                    <div class="invalid-feedback">
                      <!-- Project Name -->
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="id" class="col-sm-4 col-form-label">Project Name</label>
                  <div class="col-sm-8">


                    <select name="project_id" class="form-control selectpicker">
                    <option>Select</option>

                      @foreach ($projects as $project)
                      <option value="{{$project['id']}}">{{$project['project_name']}}</option>
                      @endforeach
                      
                    </select>

                  </div>

                </div>
                <div class="text-right">
                  <button class="btn btn-success" type="submit">Submit</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
   
    @foreach ($projects as $project)
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <table class="table table-stripped table-hover table-bordered">
          <thead>
            <tr>
              <td>Project Name: {{$project['project_name']}} </td>
            </tr>
          </thead>
          <tbody>
          @foreach($tasks as $task)

          @if($task['project_id'] == $project['id'])
          
            <tr data-index="" data-position="">
              
              <td>{{ $task['task_name'] }}</td>
            </tr>
            @endif
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
    @endforeach
  </div>

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
      var positions = [];
      $('.updated').each(function() {
        positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
        $(this).removeClass('updated');
      });

      $.ajax({
        url: 'index.php',
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
  </script>





</body>

</html>