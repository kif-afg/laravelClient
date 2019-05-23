<html lang="en">
<head>
    <title>Edit record in laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="background: #f4511e;">
<div class="container">
    <br>
    <div class="col-md-8" style="background: #fff;">
        <h2 class="text-center">Edit Movie</h2>
        {!! Form::model($data, ['method' => 'PATCH','route' => ['movie.update',$id]]) !!}
        {{ csrf_field() }}

        @if(!empty($data))
            @foreach($data as $key => $value)


        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="email">Title:</label>
            <input type="text" class="form-control" value="{{$value['title']}}" id="title" name="title">
            @if ($errors->has('title'))
                <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
            @endif

            <div class="form-group {{ $errors->has('poster') ? ' has-error' : '' }}">
                <label for="email">poster:</label>
                <input type="text" class="form-control" value="{{$value['poster']}}" id="poster" name="poster">
                @if ($errors->has('poster'))
                    <span class="help-block">
                  <strong>{{ $errors->first('poster') }}</strong>
              </span>
                @endif


                <div class="form-group {{ $errors->has('trailer') ? ' has-error' : '' }}">
                    <label for="email">trailer:</label>
                    <input type="text" class="form-control" value="{{$value['trailer']}}" id="trailer" name="trailer">
                    @if ($errors->has('trailer'))
                        <span class="help-block">
                  <strong>{{ $errors->first('trailer') }}</strong>
              </span>
                    @endif
            @endforeach
            @endif
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <br>
    </div>
</div>
    </div>
</div>
</body>
</html>