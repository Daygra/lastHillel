@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ваши записи на прием</div>
                    <ul class="list-group list-unstyled">
                        @foreach($appointments as $appointment)
                            <li>
                                {{$appointment->visit}} <a href="{{ route('changeSingUpStatus',['id'=>$appointment->id])}}" >Отменить запись к врачу</a>

                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
