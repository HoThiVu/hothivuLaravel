<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>ho thi vu</title>
</head>
<body>
      <table class="table table-bordered table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            <th scope="col">Handle</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">{{$car['id']}}</th>
            <td> <img src="/img/{{$car['image'] }}" width="200px" height="300px"></td>
            <td>{{ $car['description']}}</td>
            <td>{{$car['make'] }}</td>
            <td>{{$car['model'] }}</td>
            <td>{{ $car['produced_on']}}</td>
          </tr>
         
        </tbody>
      </table>
</body>
</html>