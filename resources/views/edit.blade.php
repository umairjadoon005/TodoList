<html>
    <head>
        <title>Create Task</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

        <link rel="stylesheet" href="{{ asset('bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    </head>
    <body>
	<form id="storeTasks" class="ajax-form container" method="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div><label>Task</label>
<input name="task_title" type="text" value="{{ $task->task_title }}" class="form-control"/>
</div>
<div><label>DeadLine</label>
<input name="deadline" type="datetime-local" value="{{ date('Y-m-d\TH:i', strtotime($task->deadline)) }}" class="form-control"/>
</div>
<div>
    <input type="button" id="store-task" class="btn btn-success" value="Save">
</div>
    </form>

    </body>
    <script  src="{{ asset('jquery/jquery.min.js') }}" ></script>
<script src="{{ asset('bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

<script>
     $('.date').datepicker({
        autoclose: true,
        todayHighlight: true,
    });
    $('#store-task').click(function () {
        $.ajax({
            url: '/tasks',
            type: "PUT",
            data: $('#storeTasks').serialize(),
            success: function (data) {
                $('#storeTasks').trigger("reset");
                   var msgs = "@lang('messages.taskCreatedSuccessfully')";
                    alert(msgs);
                
            }
        })
    });
</script>
</html>