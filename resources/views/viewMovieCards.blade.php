<!DOCTYPE html>
<html>
<head>
    <title>VideoStore | Movie Cards</title>
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
            @php
            $i=0;
            $rows=3;
            @endphp
            @foreach ( $movies as $movie )
                @php $i++; @endphp
                @if ( $i == 1  || $i == $rows * 2 )
                   <div class="card-group">
                @endif
               <div class="card text-center" style="width: 10rem;">
                    <div class="card-header">{{$movie['title']}}</div>
                    <div class="card-body">
                        <button type="button" id ="{{$movie['id']}}" class="btn btn-primary btn-sm">
                            <span class="badge badge-light">Likes {{ $movie['likes']}}</span>
                        </button>
                    </div>
                </div>
                @if ( $i == ($rows) )
                </div>
                @php $i = 0; @endphp
                @endif
            @endforeach
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
            </div>
            <div id="alertMessage" class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" id="okButton" class="btn btn-primary">OK</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script type="text/javascript">
    $('button').click(function(e) {
        e.preventDefault();
        if ($(this).attr('id') === 'okButton')
        {
            location.reload();
        }
        $('#myModal').modal('show');
        let movieId = $(this).attr('id');
        let url     = '{{ route('movie.addMovieLike') }}';
        let data    =  { 'movieId': movieId };

        $.post({
            type:'POST',
            dataType : 'json',
            data: JSON.stringify(data),
            contentType: "application/json",
            url: url,
            processData: false,

            success: (response) => {

                if (!response.success)
                {
                    $("#alertMessage").append(response.error.movieId);
                }
                else
                {
                    $("#alertMessage").append(response.message);
                }
            },
        });
    });
</script>
