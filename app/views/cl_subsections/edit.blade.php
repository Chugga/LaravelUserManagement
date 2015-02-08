@extends('layouts.master')

@section('title')
    @parent
    Edit Checklist
@stop

@section('stylesheets')

@stop

@section('content')
    <div class="content">
        <h1>Job Number {{ $checklist->job_number or 'N/A' }}</h1>
        {{ Form::open(array('route' => 'clsubsections.update', 'method' => 'put', 'class' => '')) }}
        @foreach($cl_subsection->cl_questions as $question)
            <div class="row">
                <div class="col-md-12">
                    <h3>{{ $question->cl_question_template->question }}</h3>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                {{ Form::label('question[$question->id][pass]', 'Passed') }}
                                {{ Form::checkbox("question[$question->id][pass]", 1, $question->pass, array('class')) }}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                {{ Form::label('question[$question->id][answer]', 'Comments') }}
                                {{ Form::textarea('question[$question->id][answer]', $question->answer, array('id' => 'question[$question->id][answer]', 'class' => 'form-control', 'rows' => '2', 'cols' => 50)) }}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                {{ Form::label('question[$question->id][photo]', 'Upload Image') }}
                                {{ Form::file('question[$question->id][photo]', array('accept' => "image/*;capture=camera", 'class' => 'form-control', 'multiple')) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ Form::submit('Save and Next', array('class' => 'btn btn-success pull-right')) }}
        {{ Form::close() }}
    </div>
@stop

@section('javascripts')
    <script>
        $(document).ready(function(){
            $('#datetimepicker1').datetimepicker({
                useCurrent: true
            });
        });
    </script>
@stop