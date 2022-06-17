<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form class="form-inline" method="post" action="{{route ('CaculatorRadio.post')}}">
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
        {{-- <div class="container">
            <div class="col">
                <div class="">
                    
            </div>
            </div>
              
                <div class="col">
                        <div class="row ">
                            <label for="cong">Choose Calculator:</label>
                            <br>
                            <input type="radio" id="age1" name="math" value="cong">
                            <label for="age1">cộng</label><br>
                            <input type="radio" id="age2" name="math" value="tru">
                            <label for="age2">trừ</label><br>  
                            <input type="radio" id="age3" name="math" value="nhan">
                            <label for="age3">nhân</label><br>
                            <input type="radio" id="age3" name="math" value="chia">
                            <label for="age3">chia</label><br><br>
                    
                    </div>
                </div>
                <div class="col">
                    <div class="row ">
                        <label for="Operand2" class="form-label fs-3">Second Number</label>
                        <input id="b" name="b" type="number" step="any" class="form-control form-control-custom" value="{{isset($b)?$b:''}}">
                </div>
                </div>
                
        </div>

        </div> 
        <input type="submit" name="calculate" value="Tinh"/>
        <h3> {{isset($Result)?$Result:''}}</h3> --}}

      {{-- -------------------- --}}
            <div class="form-group mb-2">
                <label for="Operand1" class="form-label fs-3">First Number</label>
                <input id="Operand1" name="a" type="number" step="any" class="form-control form-control-custom" value="{{isset($a)?$a:''}}">
            </div>
            <div class="form-check">
                <label for="cong">Choose Calculator:</label>
                <br>
                <input type="radio" id="age1" name="math" value="cong">
                <label for="age1">cộng</label><br>
                <input type="radio" id="age2" name="math" value="tru">
                <label for="age2">trừ</label><br>  
                <input type="radio" id="age3" name="math" value="nhan">
                <label for="age3">nhân</label><br>
                <input type="radio" id="age3" name="math" value="chia">
                <label for="age3">chia</label><br><br>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="Operand2" class="form-label fs-3">Second Number</label>
                <input id="b" name="b" type="number" step="any" class="form-control form-control-custom" value="{{isset($b)?$b:''}}">
            </div>
            <br>
            <br>
            <input type="submit" name="calculate" value="Tinh"/>
            <h3> {{isset($Result)?$Result:''}}</h3>
          </form>
</body>
</html>