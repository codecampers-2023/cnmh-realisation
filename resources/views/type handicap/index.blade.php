


@extends("master")

@section("content")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
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
            <div class="card-header" style="display: flex ;align-items: center;">
              <h3 class="card-title"></h3>
              <a href="{{route('typeHandicap.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
              {{-- <div class="search_field">
                <i class="fa-solid fa-magnifying-glass"></i>
                  <input type="text" name="searsh" id="searsh" placeholder="Search here...">
                  </div> --}}
            </div>
        <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th style="width: 100px">Id</th>
                    <th style="width: 400px">Type handicap</th>
                    <th>Description</th>
                  <th style="width: 105px">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($type_handicap as $value )

                  <tr>
                  <td>{{$value->id}} </td>
                  <td>{{$value->nom}} </td>
                  <td>{{$value->description}} </td>
                  <td>


                  <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="{{route('typeHandicap.show',$value->id)}}">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{route('typeHandicap.edit',$value->id)}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <form class style="display: contents" action="{{route('typeHandicap.destroy',$value->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </form>

                </td>
            </td>   
              </tr>
              @endforeach

              </tbody>
            </table>
        </div>
    </div>
    <div style="    display: flex;
    justify-content: space-between;">
        {!! $type_handicap->links() !!}
        <div class="">
        <button type="button" class="btn btn-default swalDefaultQuestion">
            <i class="fas fa-download"></i>export_pdf
          </button>
            <button type="button" class="btn btn-default swalDefaultQuestion">
            <i class="fas fa-download"></i>export_excel
          </button>
            <button type="button" class="btn btn-default swalDefaultQuestion">
            <i class="fas fa-download"></i>import_excel
          </button>
        </div>
    </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.control-sidebar -->
  <script src="{{asset('https://code.jquery.com/jquery-3.6.4.js')}}" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <script>
      $(document).ready(function(){
        //   alert("eee")
      })

  </script>
@endsection

