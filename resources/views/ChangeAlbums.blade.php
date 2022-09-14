<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-primary" role="alert">
            {{Session::get('error')}}
        </div>
    @endif
<div class="container">
  <h2>Move Images To Another Albums</h2>
  <form  action="{{route('change.delete',$id)}}"  method="post" >
    {{ csrf_field() }}
    <select class="form-select" name="sel" aria-label="Default select example">
        <option disabled>Open this select menu</option>
        @foreach ($detail as $o)
        <option value="{{ $o->id }}">{{ $o->id }}</option>
        @endforeach
      </select>
    <br><br>
    <input type="submit" class="btn btn-primary" value="Change" />
</form>

</div>

</body>
</html>
