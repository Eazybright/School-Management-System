@extends('main')

@section('title', 'Manage Course')

@section('stylesheets')
    {{-- {!! Html::style('css/manageCourse.css') !!} --}}
@endsection

@include('courses.addAcademic')
@include('courses.addProgram')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                <i class="fa fa-file-text-o"></i>Courses
            </h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="">Home</a></li>
                <li><i class="icon_document_alt"></i>Courses</li>
                <li><i class="fa fa-file-text-o"></i>Manage Course</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-default">
                <header class="panel-heading">
                    Manage Course
                </header>
                <form class="form-horizontal">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="academic-year">Academic year</label>
                                <div class="input-group">
                                    <select class="form-control" name="academic_id" id="academic_id">
                                        <option value="">--</option>
                                        @foreach ($academics as $academ)
                                            <option value="{{ $academ->id }}">{{ $academ->academic}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-addon">
                                        <span class="fa fa-plus" id="add_academic"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="program">Course</label>
                                <div class="input-group">
                                    <select class="form-control" name="program_id" id="program_id">
                                        <option value="">--</option>
                                        @foreach ($programs as $prog)
                                            <option value="{{ $prog->id }}">{{ $prog->program}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-addon">
                                        <span class="fa fa-plus" id="add_program"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="level">Level</label>
                                <div class="input-group">
                                    <select class="form-control" name="level_id" id="level_id">
                                    
                                    </select>
                                    <div class="input-group-addon">
                                        <span class="fa fa-plus"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="shift">Shift</label>
                                <div class="input-group">
                                    <select class="form-control" name="shift_id" id="shift_id">
                                    
                                    </select>
                                    <div class="input-group-addon">
                                        <span class="fa fa-plus"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="time">Time</label>
                                <div class="input-group">
                                    <select class="form-control" name="time_id" id="time_id">
                                    
                                    </select>
                                    <div class="input-group-addon">
                                        <span class="fa fa-plus"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="batch">Batch</label>
                                <div class="input-group">
                                    <select class="form-control" name="batch_id" id="batch_id">
                                    
                                    </select>
                                    <div class="input-group-addon">
                                        <span class="fa fa-plus"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="group">Group</label>
                                <div class="input-group">
                                    <select class="form-control" name="group_id" id="group_id">
                                    
                                    </select>
                                    <div class="input-group-addon">
                                        <span class="fa fa-plus"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="startDate">Date Started</label>
                                <div class="input-group">
                                    <input type="text" name="start_date" id="start_date" class="form-control">
                                    <div class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="endDate">Date Ended</label>
                                <div class="input-group">
                                    <input type="text" name="end_date" id="end_date" class="form-control">
                                    <div class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <button type="submit" class="btn btn-default btn-lg">Create Course</button>
                    </div>
                </form>
            </section>
        </div>
    </div>

@endsection

@section('scripts') 

    <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        
        $(function(){
            $('#start_date').datepicker({
                changeMonth: true,
                changeYear: true,
            });
        });

        $('#add_academic').on('click', function(){
            $('#academic_show').modal();
        });

        $('.save_button').on('click', function(){
            var academic = $('#new_academic').val();
            $.post("{{ route('postAcademicYear') }}", { academic:academic }, function(data){
               $('#academic_id').append($('<option/>', {
                   value: data.academic_id,
                   text: data.academic
               }));
               $('#new_academic').val("");
            });
        });

         $('#add_program').on('click', function(){
            $('#program_show').modal();
        });

        $('.save_program').on('click', function(){
            var program = $('#program').val();
            var description = $('#description').val();

            $.post("{{ route('postProgram') }}", { program:program, description:description }, function(data){
                $('#program_id').append($('<option/>', {
                    value: data.program_id,
                    text: data.program
                }));
                $('#program').val();
                $('#description').val("");
            });
        });

    </script>
@endsection