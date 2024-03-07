@extends('layouts.master')
@section('page_title', 'Books')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Books</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-students">
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    {{-- Student List Ends --}}

@endsection
