

<!DOCTYPE html>
<html lang="en">
<head>
 
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
        <!-- Bootstrap CSS -->   
        <title>Hello, world!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>   
    @foreach ($cars as $car)
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="/img/{{$car['image'] }}" width="200px" height="300px">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{$car['id']}}</h5>
              <p class="card-text">{{ $car['description']}}</p>
              {{-- <p class="card-text">{{ $car['description']}}</p>  --}}
            <p class="card-text"><small class="text-muted"> {{$car['make'] }}</small></p>
              <p class="card-text"><small class="text-muted">{{$car['model'] }}</small></p>
              <p class="card-text"><small class="text-muted">{{ $car['produced_on']}}</small></p>
            </div>
          </div>
        </div>
      </div>
    {{-- <h1>Car{{$car['id']}}</h1>
    <img src="/img/{{$car['image'] }}" alt="" width="200px" height="300px">
    <ul>
        <li>Make: {{$car['make'] }}</li>
        <li>Model: {{$car['model'] }}</li>
        <li>Produced on:{{ $car['produced_on']}}</li>
        <li>Discription:{{ $car['description']}}</li>
    </ul> --}}
    @endforeach

</body>
</html>
