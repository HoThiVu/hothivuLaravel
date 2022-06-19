<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>FORM THÊM MỚI XE</h3>

    <button class="btn btn-success"> <a href="{{route('cars.index')}}">Quay lại trang danh sách xe</a></button>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
    <form method='POST' enctype='multipart/form-data' action='{{route("cars.store")}}' >
        <br>
        <br>
        @csrf
        <!-- $table->increments('id');
            $table->string('make');
            $table->string('description');        
            $table->string('model');
            $table->string('image');
            $table->date('produced_on'); -->
        <div class="form-row">
          <!-- <div class="form-group col-md-3">
            <label for="inputEmail4">id</label>
            <input type="text" class="form-control" id="inputEmail4">
          </div> -->
          <div class="form-group col-md-3">
            <label for="inputPassword4">hình jjjjj   ảnh</label>
            <input type="file" name="image" class="form-control" id="inputPassword4">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="inputCity">miêu tả</label>
            <input type="text" name="description"class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-3">
            <label for="inputCity">tác giả</label>
            <input type="text" name="model"class="form-control" id="inputCity">
          </div>
          
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
              <label for="inputCity">diễn viên</label>
              <input type="text" name="make"class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-3">
              <label for="inputCity">ngày sinh</label>
              <input type="date" name="produced_on"class="form-control" id="inputCity">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">SAVE</button>
        </div>
      </form>
</body>
</html>