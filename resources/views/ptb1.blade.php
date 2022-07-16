<!DOCTYPE html>
<html>
    <head>
        <title>Giải phương trình bậc nhất</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <h1>Giải phương trình bậc nhất</h1>
    <form method="post" action="{{route ('ptb1.post')}}" >
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <input type="hidden" name="_token" value="<?php 
        echo csrf_token(); ?>"
        >
      <input type="text" style="width: 20px" name="a" value="{{isset($a)?$a:''}}" /> x 
        +
        <input type="text" style="width: 20px" name="b" value="{{isset($b)?$b:''}}" /> = 0
        <br/>
        <br/>
        <input type="submit" name="calculate" value="Tinh"/>
        </form>
      <h3> {{isset($kq)?$kq:''}} </h3>
      </body>
</html>