{{--
<head>
    <title>Ajax Example</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <h1 id="h1">ll</h1>
    <form  ><input type="text" id="test"></form>

</body>

<script>
        $('#test').change(function () {
            var lol= $(this).val();
            $.ajax({
                url:'{{route('ajax')}}',
                type:'POST',
                data: {lol:lol},
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                success:function(data){
                    console.log(data);
                    $('#h1').html(data['data']);
                }
            });

        });

</script>
--}}

<h1>{{$role}}</h1>
<form>
    <p>Выберите дату:
        <input type="date" name="calendar" value="2012-06-01"
               max="2012-06-04" min="2012-05-29">
        <input type="submit" value="Отправить"></p>
</form>
