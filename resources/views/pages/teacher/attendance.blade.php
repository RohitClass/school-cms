@extends('layouts.master')
@section('page_title', 'My Dashboard')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Manage Classes</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">Manage Classes</a></li>
           
        </ul>

        <div class="tab-content">
                <div class="tab-pane fade show active" id="all-classes">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Class Type</th>
                            <th>Section</th>
                        </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($students) --}}
                            @php
                                $d=1;
                            @endphp
                    @foreach ($records as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->user->name }}</td>
                        <td>{{ $record->my_class->name }}</td>
                        <td>{{ $record->section->name }}</td>
                    </tr>
                @endforeach
                        </tbody>
                    </table>
                </div>

            <div class="tab-pane fade" id="new-class">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info border-0 alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>

                            <span>When a class is created, a Section will be automatically created for the class, you can edit it or add more sections to the class at <a target="_blank" href="{{ route('sections.index') }}">Manage Sections</a></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
    @endsection
