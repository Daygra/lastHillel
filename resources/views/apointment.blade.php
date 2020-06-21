@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Подробно о записи</div>
                    <ul class="list-group list-unstyled">
                        <li>Уникальная ссылка на эту страницу:</li>
                        <li>{{url()->current()}}</li>
                        <li>Доктор:</li>
                        <li>{{$sc->doctorsSchedules->userName->name}}</li>
                        <li>Пациент:</li>
                        <li>{{$sc->patient->name}}</li>
                        <li>Время приема:</li>
                        <li>{{$sc->visit}}</li>
                        <li><a href="{{ route('pdf',['id'=>$sc->id])}}">Скачать талон</a></li>



                    </ul>

                </div>
            </div>
        </div>
    </div>

@endsection
