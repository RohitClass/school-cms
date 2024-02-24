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
                                <th>Image</th>
                                <th>Name</th>
                                <th>My Class</th>
                                <th>Author</th>
                                <th>Book Type</th>
                                <th>Total Copies</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ $s->image }}" alt=""></td>
                                    <td>{{ $s->name }}</td>
                                    <td>{{ $s->my_class_id }}</td>
                                    <td>{{ $s->author }}</td>
                                    <td>{{ $s->book_type }}</td>
                                    <td>{{ $s->total_copies }}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left">
                                                    <a href="{{ route('students.show', Qs::hash($s->id)) }}"
                                                        class="dropdown-item"><i class="icon-eye"></i> View Profile</a>
                                                    <a target="_blank"
                                                        href="{{ route('marks.year_selector', Qs::hash($s->id)) }}"
                                                        class="dropdown-item"><i class="icon-check"></i> Marksheet</a>

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
                        <form method="post" enctype="multipart/form-data" action="{{route('books.store')}}">
                            @csrf
                            <h6>Book Data</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="user_type"> Select Class: <span class="text-danger">*</span></label>
                                            <select  class="form-control select" id="user_type">
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
                                            <label>Url: <span class="text-danger">*</span></label>
                                            <input value="" class="form-control" placeholder="Url"
                                                name="url" type="text" required>
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
                                                name="total_opies" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Issued Copies: <span class="text-danger">*</span></label>
                                            <input value="" class="form-control" placeholder="Issued Copies"
                                                name="issued_opies" type="text" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="d-block">Upload Passport Photo:</label>
                                            <input value="{{ old('photo') }}" accept="image/*" type="file"
                                                name="photo" class="form-input-styled" data-fouc>
                                            <span class="form-text text-muted">Accepted Images: jpeg, png. Max file size
                                                2Mb</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
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
