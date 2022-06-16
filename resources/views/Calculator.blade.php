<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{route ('Calculator.post')}}">
        <input type="hidden" name="_token" value="<?php 
        echo csrf_token(); ?>"
        >
        @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 justify-content-center">
                <div class="col text-center mb-3 mb-md-5">
                        <label for="Operand1" class="form-label fs-3">First Number</label>
                        <input id="Operand1" name="a" type="number" step="any" class="form-control form-control-custom" value="{{isset($a)?$a:''}}">
                </div>
                <div class="row justify-content-center mb-3">
                        <label for="cong">Choose Calculator:</label>
                        <select name="chon" id="chon">
                                <option name="cong" value="cong">+</option>
                                <option name="tru" value="tru">-</option>
                                <option name="nhan" value="nhan">x</option>
                                <option name="chia" value="chia">/</option>
                        </select>
                </div>
                <div class="col text-center mb-3 mb-md-4">
                        <label for="Operand2" class="form-label fs-3">Second Number</label>
                        <input id="b" name="b" type="number" step="any" class="form-control form-control-custom" value="{{isset($b)?$b:''}}">
                </div>
        </div>

        </div> 
        <input type="submit" name="calculate" value="Tinh"/>
        <h3> {{isset($Result)?$Result:''}}</h3>
</form>

</body>
</html>