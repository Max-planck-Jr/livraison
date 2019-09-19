@extends('Layouts.template')
@section('title', 'Suggestions des clients')
@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="mb-0">
                            Suggestions
                        </h3>
                        <p class="text-sm mb-0">
                            Suggestions des visiteurs du site web
                        </p>
                    </div>
                </div>
            </div>

            <div class="table-responsive py-4">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-flush dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Sujet</th>
                                    <th>Message</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($suggestions as $suggestion)
                                    <tr>
                                        <td>{{ ++$count }}</td>
                                        @if ($suggestion->name != null)
                                            <td>{{ $suggestion->name }}</td>
                                        @else
                                            <td>Non défini</td>
                                        @endif
                                        
                                        <td>{{ $suggestion->email }}</td>
                                        
                                        @if ($suggestion->subject != null)
                                            <td>{{ $suggestion->subject }}</td>
                                        @else
                                            <td>Non défini</td>
                                        @endif
                                        
                                        <td>{{ $suggestion->message }}</td>
                                        <td>
                                            <form style="display: inline-block" method="post" id="form" action="{{ route('changeState', ['id' => $suggestion->id]) }}" style="border:none">
                                                @csrf
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-map-pin"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#bouton').onclick(function(e))
    </script>
@endsection