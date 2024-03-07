@extends('layouts.master')
@section('page_title', 'Payment')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Payment</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-students">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Title</th>
                                <th>Pay_Ref</th>
                                <th>Amount</th>
                                <th>Paid</th>
                                <th>Balance</th>
                                <th>Receipt_No</th>
                                <th>Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $pay)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pay->payment->title }}</td>
                                    <td>{{ $pay->payment->ref_no }}</td>

                                    {{--Amount--}}
                                    <td class="font-weight-bold" id="amt-{{ Qs::hash($pay->id) }}" data-amount="{{ $pay->payment->amount }}">{{ $pay->payment->amount }}</td>

                                    {{--Amount Paid--}}
                                    <td id="amt_paid-{{ Qs::hash($pay->id) }}" data-amount="{{ $pay->amt_paid ?: 0 }}" class="text-blue font-weight-bold">{{ $pay->amt_paid ?: '0.00' }}</td>

                                    {{--Balance--}}
                                    <td id="bal-{{ Qs::hash($pay->id) }}" class="text-danger font-weight-bold">{{ $pay->balance ?: $pay->payment->amount }}</td>

                                    {{--Receipt No--}}
                                    <td>{{ $pay->ref_no }}</td>

                                    <td>{{ $pay->year }}</td>

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
