

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
   
    <h2>DANH SACH XE</h2>
    <div>
      @if(Session::has('bạn đã thêm vào thành công'))
      {{Session::get('bạn đã thêm vào thành công')}}    
      @endif
    </div>
    <table class="table table-bordered table-info">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">ẢNH</th>
          <th scope="col">MIÊU TẢ</th>
          <th scope="col">TÁC GIẢ</th>
          <th scope="col">DIỄN VIÊN</th>
          <th scope="col">NGÀY SINH</th>
          <th scope="col">CÔNG CỤ</th>
        </tr>
      </thead>
      @foreach ($cars as $car)
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
      @endforeach
    </table>
</body>
</html>
