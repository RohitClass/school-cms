@extends('layouts.master')
@section('page_title', 'Notice Board')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Notice Board</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-students">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Notice</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notice as $n)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $n->notice }}</td>
                                    <td>{{ $n->created_at }}</td>
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
