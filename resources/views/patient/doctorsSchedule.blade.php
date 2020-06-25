@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Доступное время приема:</div>
                    <ul class="list-group list-unstyled">
                        @foreach($schedules as $schedule)

                            <li>
                                {{$schedule->visit}} <a
                                    href="{{ route('changeSingUpStatus',['id'=>$schedule->id])}}">@csrfЗаписаться</a>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
