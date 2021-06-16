<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test Case Statistik</title>
	    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="{{url('assets')}}/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{url('assets')}}/vendor/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="{{url('assets')}}/css/components.css">
        <link rel="stylesheet" href="{{url('assets')}}/css/style.css">
    </head>
    <body>
        <div class="container">
            <header class="text-center mt-5">
                <h1><strong>TEST CASE</strong> STATISTIK</h1>
            </header>
            <div class="content">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6 mt-4">
                                        <div class="card card-body bg-success-400 text-white has-bg-image">
                                            <div class="media">
                                                <div class="mr-3 align-self-center">
                                                    <i class="fal fa-male icon-3x"></i>
                                                </div>
                                                <div class="media-body text-right">
                                                    <h3 class="mb-0">{{$gender[1]}}</h3>
                                                    <span class="text-uppercase font-size-sm">total laki-laki</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-4">
                                        <div class="card card-body bg-danger-400 text-white has-bg-image">
                                            <div class="media">
                                                <div class="mr-3 align-self-center">
                                                    <i class="fal fa-female icon-3x"></i>
                                                </div>

                                                <div class="media-body text-right">
                                                    <h3 class="mb-0">{{$gender[2]}}</h3>
                                                    <span class="text-uppercase font-size-sm">total perempuan</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Statistik by Jenis Kelamin</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr class="table-secondary">
                                                    <th>Jenis Kelamin</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($genders as $gender)
                                                <tr>
                                                    <th>{{$gender->label}}</th>
                                                    <th class="text-center">{{$gender->count}}</th>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-lg-12 mt-4 mt-lg-5">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title">Statistik by Kota</h6>
                                    </div>
                                    <div class="card-body pt-2 pb-2">
                                        {!! $chart->container(); !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">
                                    Daftar Nama dengan Jenjang Pendidikan
                                </h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="60">No</th>
                                                <th>Nama</th>
                                                <th>Pendidikan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($persons as $person)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td>{{$person->name}}</td>
                                                <td>{{$person->education}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">
                                    Statistik by Pekerjaan
                                </h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="align-middle">Jenis Kelamin</th>
                                                <th colspan="6" class="text-center">Pekerjaan</th>
                                                <th rowspan="2" class="text-center align-middle">Total</th>
                                            </tr>
                                            <tr>
                                            @foreach($master_profession as $key => $value)
                                                <th class="text-center align-middle" width="140">{{$value}}</th>
                                            @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($genders as $gender)
                                            <tr>
                                                <th>{{$gender->label}}</th>
                                                @foreach ($profession[$gender->id] as $key => $val)
                                                <th class="text-center">{{$val}}</th>
                                                @endforeach
                                                <th class="text-center">{{$profession[$gender->id]->sum()}}</th>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer>&copy 2021 Wahyu Septian, S.T.</footer>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    	<script src="{{url('assets')}}/js/echarts/echarts.min.js"></script>
    	<script src="{{url('assets')}}/js/pie_chart.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script> --}}
        <script>
            // $(document).ready(function(){
            //     var legend_data = ['Italy', 'Spain', 'Austria', 'Germany', 'Poland', 'Denmark', 'Hungary', 'Portugal', 'France', 'Netherlands'];
            //     EchartsPiesDonuts.init();
            // })
        </script>
        {!! $chart->script() !!}
    </body>
</html>
