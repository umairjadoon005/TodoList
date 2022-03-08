
<!DOCTYPE html>
<html>
<head>
    <title>View Task</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data.js"></script>
  
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('tasks') }}">View All tasks</a></li>
        <li><a href="{{ URL::to('tasks/create') }}">Create a task</a></li>
    </ul>
</nav>

<h1>Showing {{ $task->task_title }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $task->task_title }}</h2>
        <p>
            <strong>Created At:</strong> <span id='createdAt'></span><br>
            <strong>DeadLine:</strong> <span id='DeadLine'></span>
        </p>
    </div>

</div>
<script  src="{{ asset('jquery/jquery.min.js') }}" ></script>
<script>
GetDates();
function GetDates(){
    var utc=moment.utc('{{ $task->created_at }}');
    var local=moment(moment.utc('{{ $task->created_at }}')).local();
      $('#createdAt').html( moment(moment.utc('{{ $task->created_at }}')).local().format("YYYY-MM-DD HH:mm:ss"));
      $('#DeadLine').html( moment(moment.utc('{{ $task->deadline }}')).local().format("YYYY-MM-DD HH:mm:ss"));
    }
  </script>
</body>
</html>