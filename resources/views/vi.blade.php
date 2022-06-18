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