<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Laravel Updating</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<!-- Styles -->
<style>
.container {
margin-top:2%;
}
</style>
</head>
<body>
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{Session::get('success')}}
    </div>
@endif
<div class="container">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8"><h2>Update Album Images</h2>
</div>
</div>
<br>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form action="{{route('offers.update',$detail->id)}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="form-group">
<label for="Product Name">Album Name</label>
<input type="text" name="pppname" class="form-control"  placeholder="Product Name" value="{{$detail->album_name}}" readonly>
</div>
<label for="Product Name">Album photos (can attach more than one):</label>
<br />
<input type="file" class="form-control" name="photos[]" multiple />
    @error('photos')
    <small class="form-text text-danger">
        {{$message}}
    </small>
    @enderror
<br /><br />
<input type="submit" class="btn btn-primary" value="Update" />
</form>
</div>
</div>
</div>
</body>
</html>
