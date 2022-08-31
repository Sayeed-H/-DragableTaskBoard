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

                <form id="myForm" method="POST" action="{{ route('task.store') }}" class="needs-validation" novalidate>
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
                            @if($projects != null)
                            <button class="btn btn-success" type="submit">Submit</button>
                            @else
                            <h4>Please add Project first</h4>
                            @endif
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- task edit modal -->

<div class="modal" id="taskModalEdit">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title w-100 text-center">Edit Task</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <!-- adding Bootstrap Form here -->

                <form id="myForm" method="POST" action="{{ route('task.update') }}" class="needs-validation" novalidate>
                    @csrf

                    <div class="container">
                        <div class="form-group row">
                            <label for="id" class="col-sm-4 col-form-label">Task Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="taskEditName" name="task_name" placeholder="Enter Task Name" required />
                                <input type="hidden" class="form-control" value="" id="taskEditNameOld" name="task_name_old" />

                                <div class="invalid-feedback">
                                    <!-- Project Name -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id" class="col-sm-4 col-form-label">Project Name</label>
                            <div class="col-sm-8">


                                <select name="project_id" id="projectName" class="form-control selectpicker" readonly>
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