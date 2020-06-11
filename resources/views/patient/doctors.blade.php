@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Наши врачи:</div>
                    <ul class="list-group list-unstyled">
                    @foreach($doctors as $doctor)

                        <li>
                            {{$doctor->doctors_type}} <a href="{{route('doctor.schedule',['id'=>$doctor->id])}}">Выбрать </a>

                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
