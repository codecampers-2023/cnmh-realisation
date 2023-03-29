@extends("master")

@section("content")

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Type handicap</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header   -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <div class="col-sm-12 d-flex justify-content-between p-0">
                        <div class="d-flex justify-content-between">
                            <a href="{{route('typeHandicap.create')}}" class="btn btn-primary"><i
                                    class="fa-solid fa-plus"></i></a>
                        </div>
                        <!-- SEARCH FORM -->
                        <form class="form-inline ml-3">
                            <div class="input-group input-group-sm">

                                <input type="search" class="form-control form-control-lg"
                                    placeholder="Type your keywords here">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 100px">Id</th>
                                <th style="width: 400px">Type handicap</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($type_handicap as $value )

                            <tr>
                                <td>{{$value->id}} </td>
                                <td>{{$value->nom}} </td>
                                <td>{{$value->description}} </td>



                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="{{route('typeHandicap.show',$value->id)}}">
                                        <i class="fas fa-folder">
                                        </i>
                                        Afficher
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{route('typeHandicap.edit',$value->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Modifier
                                    </a>
                                    <form class style="display: contents"
                                        action="{{route('typeHandicap.destroy',$value->id)}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Supprimer
                                        </button>
                                    </form>


                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="under-table">
                {!! $type_handicap->links() !!}
                <div class="">
                    <a href="{{route('typeHandicap.export')}}" class="btn btn-default swalDefaultQuestion">
                        <i class="fas fa-download"></i> Exporter
                    </a>
                    <a href="{{route('typeHandicap.import')}}" class="btn btn-default swalDefaultQuestion">
                        <i class="fas fa-file-import"></i> Importer
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <form action="{{ route('typeHandicap.import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-control">
        <br>
        <button class="btn btn-success">Import User Data</button>
    </form>
</div>

<!-- /.control-sidebar -->
<script src="{{asset('https://code.jquery.com/jquery-3.6.4.js')}}"
    integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        //   alert("eee")
    })

</script>
@endsection
