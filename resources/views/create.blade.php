<html>
    <head>
        <title>Create Task</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="{{ asset('bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
        <link rel="stylesheet" href="{{asset('toast-master/css/jquery.toast.css') }}">
    </head>
    <body>
	<form id="storeTasks" class="ajax-form container" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div><label>Task</label>
<input name="task_title" type="text" class="form-control"/>
</div>
<div><label>DeadLine</label>
<input name="deadline" type="datetime-local" class="form-control"/>
</div>
<div>
    <input type="button" id="store-task" class="btn btn-success" value="Save">
</div>
    </form>

    </body>
    <script  src="{{ asset('jquery/jquery.min.js') }}" ></script>
<script src="{{ asset('bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('toast-master/js/jquery.toast.js') }}"></script>

<script>
     $('.date').datepicker({
        autoclose: true,
        todayHighlight: true,
    });
    $('#store-task').click(function () {
        $.ajax({
            url: '/tasks',
            type: "POST",
            data: $('#storeTasks').serialize(),
            success: function (data) {
                $('#storeTasks').trigger("reset");
                   var msgs = "@lang('messages.taskCreatedSuccessfully')";
                   $.toast({
    heading: 'Success',
    text: msgs,
    position: 'top-right',
    showHideTransition: 'slide',
    icon: 'success'
});
                   window.location.href = '/tasks';
            }
        })
    });
</script>
</html>