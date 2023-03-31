
            @foreach ($data as $value )

            <tr>
                <td>{{$value->id}}dd </td>
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


            <div  style="display:none">





                
                <!--start-pagination--->
                {{ $data->links() }}
                <!--end-pagination--->
                </div>

