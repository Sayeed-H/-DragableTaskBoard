<div class="container" style="margin-top: 100px;">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#projectModal">
      Create Project
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#taskModal">
      Create Task
    </button>

  

    @foreach ($projects as $project)
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <table class="table table-stripped table-hover table-bordered" style="margin-top:30px">
          <thead>
            <tr>
              <td>Project Name: {{$project['project_name']}} </td>
            </tr>
          </thead>
          <tbody>
            @foreach($tasks as $task)

            @if($task['project_id'] == $project['id'])

            <tr data-index="{{$task['id']}}" id="{{$task['id']}}" onclick="editData(id)" data-position="{{$task['priority']}}">
              <input type="hidden" id="projectId" name="Project_id" value="{{$project['id']}}">
              <td>{{ $task['task_name'] }}
                <div class="text-right">
                  <li class="list-inline-item">
                    <button class="btn btn-success btn-sm rounded-0 float-right" type="button" title="Edit" data-toggle="modal" data-target="#taskModalEdit"><i class="fa fa-edit"></i></button>
                  </li>
                  <li class="list-inline-item">
                    <button class="btn btn-danger btn-sm rounded-0 float-right" id="{{$task['id']}}" onclick="deleteTask(id)" type="button" title="Delete"><i class="fa fa-trash"></i></button>
                  </li>
                </div>
              </td>
            </tr>

            @endif
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
    @endforeach
  </div>