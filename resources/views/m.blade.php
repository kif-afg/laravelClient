<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="background: #f4511e;">
<div class="container">
    <br>
    <div class="col-md-8" style="background: #fff;">
        <h1 class="col-md-6">Movie</h1>
        <a href="{{URL::route('movie.create')}}">
            <button class="btn btn-primary btn-lg col-md-3 text-right" >Create New Blog</button>
        </a>
        <a href="{{URL::route('movie.index')}}">
            <button class="btn btn-success btn-lg col-md-3 text-right" >Blog List</button>
        </a>
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
                                <strong>Title : </strong>   {{$value['title']}}<br>
                                <strong>Year : </strong>{{$value['year']}}<br>
                                <strong>Actor : </strong>{{$value['FirstName']}} {{$value['LastName']}}<br>
                                <strong>Rating : </strong>{{$value['rating']}}
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