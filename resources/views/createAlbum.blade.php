<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Laravel Uploading</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<!-- Styles -->
<style>
.container {
margin-top:2%;
}
</style>
</head>
<body>
{{--  @if (count($errors) > 0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>s
@endif  --}}
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
<div class="row">
<div class="col-md-2"> </div>
<div class="col-md-8"><h2>Create Album With Multiple Images</h2>
</div>
</div>
<br>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form action="{{route('offers.store2')}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="form-group">
<label for="Product Name">Album Name</label>
<input type="text" name="album_name" class="form-control"  placeholder="Product Name" >
@error('album_name')
<small class="form-text text-danger">
    {{$message}}
</small>
@enderror
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
<input type="submit" class="btn btn-primary" value="Upload" />
</form>
</div>
</div>
</div>
</body>
</html>
