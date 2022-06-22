<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>FORM THÊM MỚI XE</h3>
    <button class="btn btn-success"> <a href="{{ route('cars.index') }}">Quay lại trang danh sách xe</a></button>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method='POST' enctype='multipart/form-data' action='{{ route('cars.store') }}'>
        <br>
        <br>
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputPassword4">Hình ảnh</label>
                <input type="file" name="image" class="form-control" id="inputPassword4"
                    onchange="changeImage(event)" required>
                <img src="/img/{{ isset($car) ? $car->image : '' }}" alt="" id="preview-img" />

                <script>
                    // const chaneImage = (event) => {
                    //     const preImg = document.getElementById("preview-img")
                    //     const file = event.target.files[0]
                    //     preImg.src = createObjectURL(file)
                    //     preImg.onload = () => {
                    //         URL.revokeObjectURL(preImg.src)
                    //     }
                    // }
                    const changeImage = (e) => {
                  //  console.log('change')
                   var imgEle = document.getElementById('preview-img')
                   imgEle.src = URL.createObjectURL(e.target.files[0])
                   imgEle.onload = () => {
                    RL.revokeObjectURL(output.src)
                   }
               }
                </script>
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
