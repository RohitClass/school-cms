<form class="ajax-update" action="{{ route('marks.update', [$exam_id, $my_class_id, $section_id, $subject_id]) }}" method="post">
    @csrf @method('put')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>ADM_NO</th>
            <th>PT1 (20)</th>
            <th>Sub Enr (5)</th>
            <th>Multi Asse (5)</th>
            <th>Portfoloi (5)</th>
            <th>Project (5)</th>
            <th>Haly Yearly (60)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($marks->sortBy('user.name') as $mk)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mk->user->name }} </td>
                <td>{{ $mk->user->student_record->adm_no }}</td>

{{--                CA AND EXAMS --}}
                <td><input title="1ST CA" min="1" max="20" class="text-center" name="t1_{{ $mk->id }}" value="{{ $mk->t1 }}" type="number"></td>
                <td><input title="2ST CA" min="1" max="5" class="text-center" name="t2_{{ $mk->id }}" value="{{ $mk->t2 }}" type="number"></td>
                <td><input title="3ST CA" min="1" max="5" class="text-center" name="t3_{{ $mk->id }}" value="{{ $mk->t3 }}" type="number"></td>
                <td><input title="4ST CA" min="1" max="5" class="text-center" name="t4_{{ $mk->id }}" value="{{ $mk->t4 }}" type="number"></td>
                <td><input title="5ST CA" min="1" max="5" class="text-center" name="t5_{{ $mk->id }}" value="{{ $mk->t5 }}" type="number"></td>
                <td><input title="EXAM" min="1" max="60" class="text-center" name="exm_{{ $mk->id }}" value="{{ $mk->exm }}" type="number"></td>

            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="text-center mt-2">
        <button type="submit" class="btn btn-primary">Update Marks <i class="icon-paperplane ml-2"></i></button>
    </div>
</form>
