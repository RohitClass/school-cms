@extends('layouts.master')
@section('page_title', 'Manage Books')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Books</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-exams" class="nav-link active" data-toggle="tab">Manage Books</a></li>
                <li class="nav-item"><a href="#new-exam" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> Add
                        Book</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-exams">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>My Class</th>
                                <th>Author</th>
                                <th>Book Type</th>
                                <th>Book Id</th>
                                <th>Total Copies</th>
                                <th>Total Issued Copies</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->name }}</td>
                                    <td>{{ $s->getcalss->name }}</td>
                                    <td>{{ $s->author }}</td>
                                    <td>{{ $s->book_type }}</td>
                                    <td>{{ $s->book_id }}</td>
                                    <td>{{ $s->total_copies }}</td>
                                    <td>{{ $s->issued_copies }}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left">
                                                    <a href="{{ route('books.edit',$s->id) }}"class="dropdown-item" ><i class="icon-pencil"></i>Edit</a>
                                                    <a target=""
                                                        href="{{ route('books.delete',$s->id) }}"
                                                        class="dropdown-item"><i class="icon-check"></i> Delete</a>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="new-exam">
                    <div class="card-body">
                        <form id="ajax-reg" method="post" enctype="multipart/form-data" action="{{route('books.store')}}" class="wizard-form steps-validation"  data-fouc>
                            @csrf
                            <h6>Book Data</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="user_type"> Select Class: <span class="text-danger">*</span></label>
                                            <select  class="form-control select" name="user_type" id="user_type">
                                                @foreach ($classes as $class )
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Name: <span class="text-danger">*</span></label>
                                            <input value="" required type="text" name="name"
                                                placeholder="Name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Author: <span class="text-danger">*</span></label>
                                            <input value="" class="form-control" placeholder="Author"
                                                name="author" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Book Type: <span class="text-danger">*</span></label>
                                            <input value="" class="form-control" placeholder="Book Type"
                                            name="book_type" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Description: <span class="text-danger">*</span></label>
                                            <input value="" class="form-control" placeholder="Description"
                                                name="description" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Location: <span class="text-danger">*</span></label>
                                            <input value="" class="form-control" placeholder="Location"
                                                name="location" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Total Copies: <span class="text-danger">*</span></label>
                                            <input value="" class="form-control" placeholder="Total Copies"
                                                name="total_opies" type="number" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Issued Copies: <span class="text-danger">*</span></label>
                                            <input value="" class="form-control" placeholder="Issued Copies"
                                                name="issued_opies" type="number" required>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Class List Ends --}}

@endsection
