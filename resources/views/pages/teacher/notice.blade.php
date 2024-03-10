@extends('layouts.master')
@section('page_title', 'Notice Board')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Notice Board</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">Notice Board</a></li>
                <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> Create New Notice </a></li>
            </ul>

            <div class="tab-content">
                    <div class="tab-pane fade show active" id="all-classes">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Notice</th>
                                <th>Class</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notice as $c)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $c->notice }}</td>
                                    <td>{{ $c->class->name }}</td>
                                    <td>{{ $c->created_at }}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-left">
                                                    @if(Qs::userIsTeamSA())
                                                    {{--Edit--}}
                                                    <a href="{{ route('classes.edit', $c->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                   @endif

                                                    {{--Delete--}}
                                                    <a id="{{ $c->id }}" href="{{ route('notice.delete', $c->id) }}" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                <div class="tab-pane fade" id="new-class">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="ajax-store" method="post" action="{{ route('notice.store') }}">
                                @csrf
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="my_class_id">Class: <span class="text-danger">*</span></label>
                                        <select onchange="getClassSections(this.value)" data-placeholder="Choose..." required
                                            name="my_class_id" id="my_class_id" class="select-search form-control">
                                            <option value=""></option>
                                            @foreach ($classes as $c)
                                                <option {{ old('my_class_id') == $c->id ? 'selected' : '' }}
                                                    value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Create Notice: <span class="text-danger">*</span></label>
                                        <textarea name="notice" class="form-control" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button id="ajax-btn" type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Class List Ends--}}

@endsection
