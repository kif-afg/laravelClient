<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create New Movie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="background: #f4511e;">
<div class="container">
    <br>
    <div class="col-md-8" style="background: #fff;">
        <h2 class="text-center">Create New Movie</h2>
        <form action="{{URL::route('movie.store')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                @if ($errors->has('title'))
                    <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
                @endif
            </div>


            <div class="form-group {{ $errors->has('Year') ? ' has-error' : '' }}">
                <label for="pwd">Relesed Year:</label>
                <input class="date-own form-control" style="width: 300px;" type="text" name="year" id="year">
                <script type="text/javascript">
                    $('.date-own').datepicker({
                        minViewMode: 2,
                        format: 'yyyy'
                    });
                </script>

            </div>

            <div class="form-group {{ $errors->has('poster') ? ' has-error' : '' }}">
                <label for="poster">Poster:</label>
                <input type="text" class="form-control" id="poster" placeholder="Link to poster" name="poster">
                @if ($errors->has('poster'))
                    <span class="help-block">
                  <strong>{{ $errors->first('poster') }}</strong>
              </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('trailer') ? ' has-error' : '' }}">
                <label for="trailer">Trailer:</label>
                <input type="text" class="form-control" id="trailer" placeholder="Link to trailer" name="trailer">
                @if ($errors->has('trailer'))
                    <span class="help-block">
                  <strong>{{ $errors->first('trailer') }}</strong>
              </span>
                @endif
            </div>


            <div class="form-group {{ $errors->has('genre') ? ' has-error' : '' }}">
                <label for="genre">Genre:</label>
                <input type="text" class="form-control" id="genre" placeholder="genre" name="genre">
                @if ($errors->has('genre'))
                    <span class="help-block">
                  <strong>{{ $errors->first('trailer') }}</strong>
              </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }}">
                <label for="firstname">First Name:</label>
                <input type="text" class="form-control" id="firstname" placeholder="firstname" name="firstname">
                @if ($errors->has('firstname'))
                    <span class="help-block">
                  <strong>{{ $errors->first('firstname') }}</strong>
              </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('lastname') ? ' has-error' : '' }}">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" id="lastname" placeholder="lastname" name="lastname">
                @if ($errors->has('lastname'))
                    <span class="help-block">
                  <strong>{{ $errors->first('lastname') }}</strong>
              </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                <label for="lastname">Gender:</label>
                <input type="text" class="form-control" id="gender" placeholder="gender" name="gender">
                @if ($errors->has('gender'))
                    <span class="help-block">
                  <strong>{{ $errors->first('gender') }}</strong>
              </span>
                @endif
            </div>


            <div class="form-group {{ $errors->has('rating') ? ' has-error' : '' }}">
                <label for="rating">Initial Rating:</label>
                <input type="text" class="form-control" id="gender" placeholder="lastname" name="rating">
                @if ($errors->has('rating'))
                    <span class="help-block">
                  <strong>{{ $errors->first('rating') }}</strong>
              </span>
                @endif
            </div>



            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <br>
    </div>
</div>
</body>
</html>