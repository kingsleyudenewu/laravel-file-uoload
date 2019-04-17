<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 17/04/2019
 * Time: 1:24 AM
 */
?>
@extends('layout.app')

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Recipients</div>
                        <div class="card-body">
                            <div class="row">
                                @include('flash::message')
                                <div class="col-sm-4">

                                    <form action="{{ route('upload.store') }}" enctype="multipart/form-data" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="">Upload File</label>
                                            <input class="form-control" type="file" name="file_upload">
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-primary" type="submit" value="submit">
                                        </div>

                                    </form>
                                </div>

                                <div class="col-sm-8">
                                    <form action="{{ route('csv.download') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <select name="field" id="field" class="form-control">
                                                <option value="" disabled>Sort By</option>
                                                <option value="reporting_region">Reporting Region</option>
                                                <option value="product_title">Product Title</option>
                                                <option value="container_title">Container Title</option>
                                                <option value="content_provider">Content Provider</option>
                                                <option value="artist">Artist</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="mode" id="csv" class="btn btn-primary pull-right">Download CSV</button>
                                        <button type="submit" name="mode" id="pdf" class="btn btn-success pull-right">Download PDF</button>
                                    </form>

                                </div>
                            </div>
                            <div class="table-responsive m-t-40">
                                <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="special_offer_table">
                                    <thead>
                                    <tr>
                                        <th>Reporting Region</th>
                                        <th>Title</th>
                                        <th>Container</th>
                                        <th>Provider</th>
                                        <th>Artist</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#special_offer_table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "processing": true,
                "serverSide": true,
                "language": {
                    "processing": "Processing Request"
                },
                "ajax":{
                    url :"{{ route('all_uploads') }}", // json datasource
                    type: "get"
                },
                searchDelay: 350,
                "lengthMenu": [[10, 25, 50, 100, 200, 500], [10, 25, 50, 100, 200, 500]],
                aoColumns: [

                    { data: 'reporting_region', name:'reporting_region' },
                    { data: 'product_title', name:'product_title' },
                    { data: 'container_title', name:'container_title' },
                    { data: 'content_provider', name:'content_provider' },
                    { data: 'artist', name: 'artist' }
                ]
            });

            {{--$('#csv').click(function () {--}}
                {{--$.ajax({--}}
                    {{--type: 'post',--}}
                    {{--url: "{{ route('csv.download') }}",--}}
                    {{--data: {--}}
                        {{--'mode': 'csv',--}}
                        {{--'field': $('field').val()--}}
                    {{--},--}}
                    {{--success: function(data) {--}}
                        {{--window.location.href = "{{ route('upload.index') }}";--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}
        });
    </script>
@endsection
