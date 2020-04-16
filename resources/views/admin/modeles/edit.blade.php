@extends('adminlte::page')

@section('title', 'Admin AP Model Home')

@section('content_header')
    <h1>Models Art Principaute Couture  <br>

    </h1>

@stop

@section ('css')

    {{-- <link  rel = "stylesheet"  href="{{ asset('css/bootstrap.min.css') }}" > --}}
@stop
@section ('js')
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>

    <script type="text/javascript">

        $(function(){
            $("input[name='image_modele']").change(showPreviewImage_click);
        })

        function showPreviewImage_click(e) {
            var $input = $(this);
            var inputFiles = this.files;
            if(inputFiles == undefined || inputFiles.length == 0) return;
            var inputFile = inputFiles[0];

            var reader = new FileReader();
            reader.onload = function(event) {

                //if($input.next(".preview"))
                $(".preview").remove();

                $input.after("<img class='preview' height='190' width='170'>");
                $(".preview").attr("src", event.target.result);
            };
            reader.onerror = function(event) {
                alert("I AM ERROR: " + event.target.error.code);
            };
            reader.readAsDataURL(inputFile);
        }
    </script>


@stop


@section('content')
    <p> <b> {{$email=App\User::find(\Illuminate\Support\Facades\Auth::id())->name}}</b>, TU ES CONNECTE!</p>


    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>

                    <h2>Tous les Models</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('modeles.index') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- small box -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>150</h3>

                    <h2>Nouveau Model</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('modeles.create') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    @include('admin.inclusion.form_model_create_edit')


@endsection
