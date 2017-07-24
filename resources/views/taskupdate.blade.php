

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">

                @if($taskObj)
                <label for="task" class="col-sm-3 control-label">Update Task</label>
                @else
                <label for="task" class="col-sm-3 control-label">Task</label>
                @endif

                <div class="col-sm-6">
                @if($taskObj)

                    <input type="text" name="name" id="task-name" class="form-control" value="{{ $taskObj->name }}">
                    @else
                    <input type="text" name="name" id="task-name" class="form-control">
                    @endif
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    
                    @if($taskObj)
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Update Task
                    </button>
                    @else
                     <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Tasks -->

    <!-- Current Tasks -->
    @if (count($taskCollection) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($taskCollection as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <td>
                                    <!-- TODO: Delete Button -->
                                    <form action="/task/{{ $task->id }}" method="POST">
                                    {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                                <button>Delete Task</button>
                                 </form>
                                </td>

                                <td>
                                    <a href="/task/update/{{ $task->id }}" class="btn btn-default">Update Task</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


@endsection