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
   
    <form >
        <br>
        <br>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="inputEmail4">id</label>
            <input type="email" class="form-control" id="inputEmail4">
          </div>
          <div class="form-group col-md-3">
            <label for="inputPassword4">hình ảnh</label>
            <input type="file" class="form-control" id="inputPassword4">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="inputCity">miêu tả</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-3">
            <label for="inputCity">tác giả</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
          
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
              <label for="inputCity">diễn viên</label>
              <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-3">
              <label for="inputCity">ngày sinh</label>
              <input type="text" class="form-control" id="inputCity">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">SAVE</button>
        </div>
      </form>
</body>
</html>