@extends('layouts.master')
@section('page_title', 'Book Records')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Book Records</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-exams" class="nav-link active" data-toggle="tab">Book Record</a></li>
                <li class="nav-item"><a href="#new-exam" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> Add Record</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-exams">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Book Name</th>
                                <th>Student Name</th>
                                <th>Issue Date</th>
                                <th>Last Date</th>
                                <th>Returned Date</th>
                                <th>Book Id</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recs as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->book->name }}</td>
                                    <td>{{ $s->student->name }}</td>
                                    <td>{{ $s->start_date }}</td>
                                    <td>{{ $s->end_date }}</td>
                                    <td>{{ ($s->returned)? $s->returned :"-------------------" }}</td>
                                    <td>{{ $s->book->book_id }}</td>
                                    <td>{{ $s->status }}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-left">
                                                    <a target=""
                                                        href="{{ route('books.status',$s->id) }}"
                                                        class="dropdown-item"><i class="icon-check"></i>Change Status</a>

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
                        <form id="ajax-reg" method="post" enctype="multipart/form-data" action="{{route('books_record.store')}}" class="wizard-form steps-validation"  data-fouc>
                            @csrf
                            <h6>Book Data</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="user_type"> Select Book: <span class="text-danger">*</span></label>
                                            <select  class="form-control select" name="book_id" id="user_type">
                                                @foreach ($books as $book )
                                                <option value="{{ $book->id }}">{{ $book->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="user_type"> Select Student: <span class="text-danger">*</span></label>
                                            <select  class="form-control select" name="user_id" id="user_type">
                                                @foreach ($students as $st )
                                                <option value="{{ $st->id }}">{{ $st->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Issue Date: <span class="text-danger">*</span></label>
                                            <input value="" required type="date" name="start_date"
                                                placeholder="Name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Last Date: <span class="text-danger">*</span></label>
                                            <input value="" class="form-control" placeholder="Author"
                                                name="end_date" type="date" required>
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
