@extends('layouts.master')
@section('page_title', 'Attendence')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Attendence</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        @php
            $st = DB::table('student_records')
                ->where('user_id', session('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d'))
                ->first();
            $todayEntries = DB::table('attendances')
                ->whereRaw('DATE(created_at) = CURDATE()') // Compare date part only
                ->where('studance_id', $st->id)
                ->exists();
            $todayEntries2 = DB::table('attendances')
                ->whereRaw('DATE(created_at) = CURDATE()') // Compare date part only
                ->where('studance_id', $st->id)
                ->first();
            $distinctDatesCounts = DB::table('attendances')
                ->select(DB::raw('DATE(created_at) as attendance_date'), DB::raw('COUNT(*) as count'))
                ->groupBy('attendance_date')
                ->get();
            $distinctDatesCounts2 = DB::table('attendances')
                ->select(DB::raw('DATE(created_at) as attendance_date'), DB::raw('COUNT(*) as count'))
                ->WHERE('studance_id', $st->id)
                ->groupBy('attendance_date')
                ->get();
            $id = 1;
            $totalDistinctDatesCount = $distinctDatesCounts->count();
            $studentDistinctDatesCount = $distinctDatesCounts2->count();
            $percent = $totalDistinctDatesCount > 0 ? ($studentDistinctDatesCount / $totalDistinctDatesCount) * 100 : 0;
            $attandance = DB::table('attendances')
                ->WHERE('studance_id', $st->id)
                ->get();
        @endphp
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-students">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                            <tr>percentage : {{ $percent }}%</tr>
                            <tr>
                                <th>S/N</th>
                                <th>Date</th>
                                <th>Prensent</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- @dd(session('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d')) --}}
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td>
                                     <td>{{$percent}}</td>
                                    <td>{{ $attend->updated_at }}</td> --}}

                            </tr>
                            @foreach ($attandance as $item)
                                <td>{{ $id }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>Present</td>
                                @php
                                    $id++;
                                @endphp
                            @endforeach
                            <tr></tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    {{-- Student List Ends --}}

@endsection
