@extends('base2')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Page d'accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Documents</li>
                </ol>
            </nav>
            <div class="row">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <div class="table-responsive">
                                <table class="table" id="table" data-addrbar="true" data-pagination="true"
                                    data-search="true" data-side-pagination="server"
                                    class="table table-bordered table-hover">
                                    <thead style="color: #3e74fc;">
                                        <tr>
                                            <th>Designation </th>
                                            <th>Type</th>
                                            <th>Taille</th>
                                            <th>QR Code</th>
                                            <th>Date de création</th>
                                            <th>Aperçu</th>
                                        </tr>
                                    </thead>
                                    @foreach ($documents as $document)
                                        <tbody>
                                            <tr>
                                                <td onclick="document.location='{{ route('documents.show', $document->id) }}'"
                                                    style="cursor:pointer;">
                                                    {{ $document->designation }}
                                                </td>
                                                <td onclick="document.location='{{ route('documents.show', $document->id) }}'"
                                                    style="cursor:pointer;">
                                                    {{ $document->type }}
                                                </td>
                                                <td onclick="document.location='{{ route('documents.show', $document->id) }}'"
                                                    style="cursor:pointer;">
                                                    @if ($fileSize = File::size(public_path('documents/' . $document->file . '')))
                                                        {{ $document->formatBytes($fileSize) }}
                                                    @endif
                                                </td>
                                                <td onclick="document.location='{{ route('documents.show', $document->id) }}'"
                                                    style="cursor:pointer;">
                                                    {!! DNS2D::getBarcodeHTML($document->file, 'QRCODE', 3, 3) !!}
                                                </td>
                                                <td onclick="document.location='{{ route('documents.show', $document->id) }}'"
                                                    style="cursor:pointer;">
                                                    {{ $document->dateFormatted() }}
                                                </td>
                                                <td><button type="button" class="btn btn-primary btn-rounded btn-icon"
                                                        data-toggle="modal" data-target="#show{{ $document->id }}">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                    <div class="modal fade" id="show{{ $document->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        {{ $document->designation }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @switch($document->type)
                                                                        @case('image')
                                                                            <center>
                                                                                <img src="{{ url('documents/' . $document->file) }}"
                                                                                    style="width: auto !important; height: auto !important; border-radius: 0%; max-width: 720px"
                                                                                    alt="image" />
                                                                            </center>
                                                                        @break

                                                                        @case('video')
                                                                            <center>
                                                                                <video controls width="100%" autoplay>

                                                                                    <source
                                                                                        src="{{ url('documents/' . $document->file) }}">

                                                                                </video>
                                                                            </center>
                                                                        @break

                                                                        @case('audio')
                                                                            <center>
                                                                                <figure>
                                                                                    <audio controls
                                                                                        src="{{ url('documents/' . $document->file) }}">
                                                                                    </audio>
                                                                                </figure>
                                                                            </center>
                                                                        @break

                                                                        @case('excel')
                                                                            <center>
                                                                                <a href="{{ url('documents/' . $document->file) }}"
                                                                                    target="_blank">Ouvrir le fichier
                                                                                    excel</a>
                                                                            </center>
                                                                        @break

                                                                        @case('word')
                                                                            <center>
                                                                                <a href="{{ url('documents/' . $document->file) }}"
                                                                                    target="_blank">Ouvrir le fichier
                                                                                    word</a>
                                                                                <iframe
                                                                                    src="https://view.officeapps.live.com/op/view.aspx?src={{ url('documents/' . $document->file) }}"
                                                                                    frameborder="0"></iframe>
                                                                            </center>
                                                                        @break

                                                                        @case('txt')
                                                                            <center>
                                                                                <object
                                                                                    data="{{ url('documents/' . $document->file) }}"
                                                                                    type="text/plain" width="100%" height="700px">
                                                                                    <a
                                                                                        href="{{ url('documents/' . $document->file) }}">No
                                                                                        Support?</a>
                                                                                </object>
                                                                            </center>
                                                                        @break

                                                                        @default
                                                                            <center>
                                                                                <iframe
                                                                                    src="{{ url('documents/' . $document->file) }}"
                                                                                    width="100%" height="700px"></iframe>
                                                                            </center>
                                                                    @endswitch
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ route('documents.show', $document->id) }}"
                                                                        type="button" class="btn btn-primary">Afficher
                                                                        plus</a>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>

                            </div>
                        </div>
                        <div class='d-flex justify-content-center mt-5'>
                            {{ $documents->links('vendor.pagination.custom') }}
                        </div>
                    </div>





                </div>
                <!-- content-wrapper ends -->

            </div>
            <!-- content-wrapper ends -->
        </div>
    </div>
@endsection
