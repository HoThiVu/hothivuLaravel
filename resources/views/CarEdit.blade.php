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
    <h3>EDIT XE</h3>
    <button class="btn btn-success"><a href="{{ route('cars.index') }}">Quay lại trang danh sách xe</a></button>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method='post' enctype='multipart/form-data' action="{{ route('cars.update', $car->id) }}">
        <br>
        <br>
        @csrf
        @method('put')
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputPassword4">Hình ảnh</label>
                <img src="/img/{{ isset($car) ? $car->image : '' }}" width="100px" height="100px" id="preview-img">
                <input type="file" name="image" class="form-control" onchange="changeImage(event)" required>
                {{-- <img src="/img/{{ isset($car) ? $car->image : '' }}" alt="" id="preview-img" /> --}}
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
                <label for="inputCity">hãng xe</label>
                <input type="text" value="{{ isset($car) ? $car->hãng : '' }}" name="hãng"class="form-control"
                    id="inputCity">
            </div>
            <div class="form-group col-md-3">
                <label for="inputCity">màu xe</label>
                <input type="text" value="{{ isset($car) ? $car->màu : '' }}" name="màu"class="form-control"
                    id="inputCity">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputCity">Chọn Tên nhà sx</label>
                {{-- <input type="text" value="{{ isset($car) ?$car->manufacture->name : '' }}" name="name"class="form-control"
                    id="inputCity"> --}}
                <select name="name" id="cars">
                    @foreach ($list as $item)
                        <option value="{{ $item->id }}"> {{ $item->name }} </option>
                    @endforeach
                </select>
                <br><br>
            </div>
            <div class="form-group col-md-3">
                <label for="inputCity">ngày sx</label>
                <input type="date" value="{{ isset($car) ? $car->produced_on : '' }}"
                    name="produced_on"class="form-control" id="inputCity">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">SAVE</button>
        </div>
    </form>
</body>

</html>
