@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Доступное время приема:</div>
                    <ul class="list-group list-unstyled">
                        @foreach($schedules as $schedule)

                            <li >
                                 <form method="post" action="{{ route('deleteSchedule',['id'=>$schedule->id])}}">
                                     {{$schedule->visit}}
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class=" btn btn-link btn-sm float-right">Удалить</button>
                                </form>

                            </li>
                        @endforeach
                    </ul>
                    <form method="post" action="{{ route('addSchedule')}}" >
                        @csrf
                    <input type="datetime-local" name="dataTime">

                        <button type="submit" class=" btn btn-link btn-sm float-right">Добавить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
