<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 600px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<h2 style="text-align:center">User Profile</h2>
@if(empty($profileData))
<div class="card">
  <h1>Not Found</h1>
</div>
@else 
<div class="card">
    <img src="https://img.icons8.com/color/344/circled-user-male-skin-type-4--v1.png" alt="{{$profileData->full_name}}" style="width:50%;height: 50%;">
    <h1>Fullname: {{$profileData->user_name}}</h1>
    <p class="title">Email: {{$profileData->email}}</p>
    <p>Phone: {{$profileData->mobile}}</p>
    <p>Ratings: {{$profileData->ratings}}</p>
    <p>About Me: {{$profileData->about_me}}</p>
  </div>
  @endif

</body>
</html>
