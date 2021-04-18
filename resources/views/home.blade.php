@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header ">
                    <h1 class="text-center">Pesquisa de fundos</h1>
                </div>
                <div class="panel panel-default">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <h3 class="card-title">Selecione pelo menos 1 fundo</h5>
                        <form method="post" action="/fundos">
                            @csrf
                            <div class="form-group">
                                @foreach ($funds as $f)
                                <label><input type="checkbox" name="name[]" value="{{ $f->name }}"> {{ $f->name }}</label>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <h4>Inicio Pesquisa</h4>
                                <input class="dateInicio form-control" value="{{ date('Y-m-d', strtotime(date('Y-m-d'). ' - 388 days')) }}" name="dateInicio" type="text">
                            </div>

                            <div class="form-group">
                                <h4>Fim Pesquisa</h4>
                                <input class="dateInicio form-control" value="{{ date('Y-m-d', strtotime(date('Y-m-d'). ' - 380 days')) }}" name="dateFim" type="text">
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-5">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.dateInicio').datepicker({
        format: 'yyyy/mm/dd',
        defaultdate: '12-02-20'
    });

    $('.dateFim').datepicker({
        format: 'yyyy/mm/dd'
    });
</script>