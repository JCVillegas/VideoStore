<!DOCTYPE html>
<html>
<head>
    <title>VideoStore | Add New Movie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
</head>
<body>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            @include('nav-bar')
        </div>
        <div class="card-body">
            <form id="ajax-form" action="{{ route('movie.addMovie') }}">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Movie Title:</label>
                    <input type="text" id="title" class="form-control" placeholder="title">
                </div>
                <div id="alertSuccess" class="alert alert-primary" role="alert"></div>
                <div id="alertError" class="alert alert-danger" role="alert"> </div>
                <div class="mb-3 text-center">
                    <button class="btn btn-success btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>
<script type="text/javascript">
    clearAlertBox();
    $('#ajax-form').submit(function(e) {
        e.preventDefault();

        let url = $(this).attr("action");
        let formData = { 'title':  $('#title').val()};

        $.post({
            type:'POST',
            dataType : 'json',
            data: JSON.stringify(formData),
            contentType: "application/json",
            url: url,
            processData: false,

            success: (response) => {
                clearAlertBox();
                if (!response.success)
                {
                    $('#alertError').show();
                    $("#alertError").append(response.error.title);
                }
                else
                {
                    $('#alertSuccess').show();
                    $("#alertSuccess").append(response.message);
                }


            },

        });
    });

    function clearAlertBox()
    {
        $('#alertSuccess').hide();
        $("#alertSuccess").empty();
        $('#alertError').hide();
        $("#alertError").empty();
    }
</script>
