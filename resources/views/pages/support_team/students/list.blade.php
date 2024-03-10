@extends('layouts.master')
@section('page_title', 'Student Information - ' . $my_class->name)
@section('content')
    <div class="card">
        @if($errors->any())
        <div class="alert alert-danger border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>

                @foreach($errors->all() as $er)
                    <span><i class="icon-arrow-right5"></i> {{ $er }}</span> <br>
                @endforeach

        </div>
    @endif
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Students List</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-students" class="nav-link active" data-toggle="tab">All {{ $my_class->name }}
                        Students</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sections</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach ($sections as $s)
                            <a href="#s{{ $s->id }}" class="dropdown-item"
                                data-toggle="tab">{{ $my_class->name . ' ' . $s->name }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-students">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Father's Name</th>
                                <th>ADM_No</th>
                                <th>Section</th>
                                <th>Email</th>
                                <th>Attendance</th>
                                <th>Percentage</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img class="rounded-circle" style="height: 40px; width: 40px;"
                                            src="{{ $s->user->photo }}" alt="photo"></td>
                                    <td>{{ $s->user->name }}</td>
                                    <td>{{ $s->father_name }}</td>
                                    <td>{{ $s->adm_no }}</td>
                                    <td>{{ $my_class->name . ' ' . $s->section->name }}</td>
                                    <td>{{ $s->user->email }}</td>
                                    @php

                                        $todayEntries = DB::table('attendances')
                                            ->whereRaw('DATE(created_at) = CURDATE()') // Compare date part only
                                            ->where('studance_id', $s->id)
                                            ->exists();
                                        $todayEntries2 = DB::table('attendances')
                                            ->whereRaw('DATE(created_at) = CURDATE()') // Compare date part only
                                            ->where('studance_id', $s->id)
                                            ->first();
                                        $distinctDatesCounts = DB::table('attendances')
                                            ->select(
                                                DB::raw('DATE(created_at) as attendance_date'),
                                                DB::raw('COUNT(*) as count'),
                                            )
                                            ->groupBy('attendance_date')
                                            ->get();
                                        $distinctDatesCounts2 = DB::table('attendances')
                                            ->select(
                                                DB::raw('DATE(created_at) as attendance_date'),
                                                DB::raw('COUNT(*) as count'),
                                            )
                                            ->WHERE('studance_id', $s->id)
                                            ->groupBy('attendance_date')
                                            ->get();
                                        $totalDistinctDatesCount = $distinctDatesCounts->count();
                                        $studentDistinctDatesCount = $distinctDatesCounts2->count();
                                        $percent =
                                            $totalDistinctDatesCount > 0
                                                ? ($studentDistinctDatesCount / $totalDistinctDatesCount) * 100
                                                : 0;

                                    @endphp

                                    <td>
                                        @if (!$todayEntries)
                                            <a class="btn btn-success"
                                                href="{{ route('pages.support_team.students.list', $s->id) }}">Present</a>
                                        @else
                                            <a class="btn btn-danger"
                                                href="{{ route('pages.support_team.students.list2', $todayEntries2->id) }}">absent</a>
                                        @endif
                                    </td>
                                    <td>{{ $percent }}%</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-left">
                                                    <a href="{{ route('students.show', Qs::hash($s->id)) }}"
                                                        class="dropdown-item"><i class="icon-eye"></i> View Profile</a>
                                                    <a href="{{ route('students.show', Qs::hash($s->id)) }}"
                                                        class="dropdown-item"><i class="icon-eye"></i> View Attendance</a>
                                                    @if (Qs::userIsTeamSA())
                                                        <a href="{{ route('students.edit', Qs::hash($s->id)) }}"
                                                            class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                        <a href="{{ route('st.reset_pass', Qs::hash($s->user->id)) }}"
                                                            class="dropdown-item"><i class="icon-lock"></i> Reset
                                                            password</a>
                                                    @endif
                                                    <a target="_blank"
                                                        href="{{ route('marks.year_selector', Qs::hash($s->user->id)) }}"
                                                        class="dropdown-item"><i class="icon-check"></i> Marksheet</a>

                                                    {{-- Delete --}}
                                                    @if (Qs::userIsSuperAdmin())
                                                        <a id="{{ $s->user->id }}"
                                                            onclick="confirmDelete(this.id)" href="#"
                                                            class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                        <form method="post" id="item-delete-{{ $s->user->id }}"
                                                            action="{{ route('students.destroy', $s->user->id) }}"
                                                            class="hidden">@csrf @method('delete')</form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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
