@extends('layouts.master')
@section('page_title', 'Edit Books')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Books</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="tab-content">
                <div class="" id="new-exam">
                    <div class="card-body">
                        <form id="ajax-reg" method="post" enctype="multipart/form-data" action="{{ route('books.update') }}"
                            class="wizard-form steps-validation" data-fouc>
                            @csrf
                            <h6>Book Data</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="user_type"> Select Class: <span class="text-danger">*</span></label>
                                            <select class="form-control select" name="user_type" id="user_type">
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}"
                                                        {{ $books->my_class_id == $class->id ? 'selected' : '' }}>
                                                        {{ $class->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $books->id }}">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Name: <span class="text-danger">*</span></label>
                                            <input value="{{ $books->name }}" required type="text" name="name"
                                                placeholder="Name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Author: <span class="text-danger">*</span></label>
                                            <input value="{{ $books->author }}" class="form-control" placeholder="Author"
                                                name="author" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Book Type: <span class="text-danger">*</span></label>
                                            <input value="{{ $books->book_type }}" class="form-control"
                                                placeholder="Book Type" name="book_type" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Description: <span class="text-danger">*</span></label>
                                            <input value="{{ $books->description }}" class="form-control"
                                                placeholder="Description" name="description" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Location: <span class="text-danger">*</span></label>
                                            <input value="{{ $books->location }}" class="form-control"
                                                placeholder="Location" name="location" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Total Copies: <span class="text-danger">*</span></label>
                                            <input value="{{ $books->total_copies }}" class="form-control"
                                                placeholder="Total Copies" name="total_opies" type="number" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Issued Copies: <span class="text-danger">*</span></label>
                                            <input value="{{ $books->issued_copies }}" class="form-control"
                                                placeholder="Issued Copies" name="issued_opies" type="number" required>
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
