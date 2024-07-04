@extends('Proprio.app')
@section('title',"MES BIEN")
@section('content')
<div class="content">
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Mes biens</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col">Nom</th>
                                <th scope="col">Loyer</th>
                                <th scope="col">Description</th>


                            </tr>
                        </thead>
                        <tbody>
                            
                                @foreach ($biens as $item)
                                <tr>

                                    <td>{{$item->name}}</td>
                                    <td>{{$item->loyer}}</td>
                                    <td>{{$item->description}}</td>
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
@endsection
