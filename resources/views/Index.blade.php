<html lang="en">
<head>
    <title>QQ Movie DB</title>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="background: #f4511e;">
<div class="container">
    <div class="col-md-9" style="background: #fff;">
        <h1 class="col-md-8">Movies</h1>
        <a href="{{URL::route('movie.create')}}">
            <button class="btn btn-primary btn-lg col-md-4 text-right">Create</button>
        </a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissable col-md-12">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <table width="12%" class="table table-bordered">
            <tbody>
            @if(!empty($data))
                @foreach($data as $key => $value)
                    <div class="row">
                        <div >
                                <td>
                                    <img src={{$value['poster']}}>
                                </td>
                            <td>
                                <a href="{{URL::route('movie.show',$value['moviesid'])}}">{{$value['title']}}</a><br>

                                <strong>Year : </strong>{{$value['year']}}<br>
                                <strong>Actor : </strong>{{$value['FirstName']}} {{$value['LastName']}}<br>
                                <strong>Rating : </strong>{{$value['rating']}}<br>
                                <a class="btn btn-primary" href='{{$value['trailer']}}' role="button">Play Trailer</a>

                            </td>
                        <td>
                            <a href="{{URL::route('movie.show',$value['moviesid'])}}" class="btn btn-success">Show</a>
                            <a href="{{URL::route('movie.edit',$value['moviesid'])}}" class="btn btn-warning">Update</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['movie.destroy', $value['moviesid']],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
            @endif
            <tr>

            </tr>
                        </div>
                    </div>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>