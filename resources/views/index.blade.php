<!DOCTYPE html>
<html>
<head>
    <title>Tasks List</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-top:20px;">

<nav >
        <a class="btn btn-success" href="{{ URL::to('tasks/create') }}"> Create Task</a>
</nav>

<h1>All Tasks</h1>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>DeadLine</td>
            <td>Created At</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($tasks as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->task_title }}</td>
            <td>{{ $value->dead_line_locale }}</td>
            <td>{{ $value->created_at_locale }}</td>

            <td>

                <a class="btn btn-small btn-success" href="{{ URL::to('tasks/' . $value->id) }}">View</a>

                <a class="btn btn-small btn-info" href="{{ URL::to('tasks/' . $value->id . '/edit') }}">Edit</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>