@extends('layouts.master')

@section('title')
    @parent
    Create Checklist
@stop

@section('stylesheets')
<style>
    .align-right {
        float:right;
        clear:both;
    }
</style>
@stop

@section('content')
    <div class="content">
        <h1>Create new Checklist</h1>
        {{ Form::open(array('route' => 'checklists.store', 'method' => 'post', 'class' => '', 'files' => true)) }}
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label('job_number', 'Job Number') }}
                    {{ Form::text('job_number', null, array('id' => 'client', 'class' => 'form-control', 'required' => 'required')) }}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label('client', 'Client') }}
                    {{ Form::select('client', $clients, null, array('id' => 'client', 'class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('address', 'Address') }}
                    {{ Form::text('address', null, array('id' => 'address', 'class' => 'form-control', 'required' => 'required')) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('weather', 'Weather') }}
                    {{ Form::text('weather', null, array('id' => 'weather', 'class' => 'form-control', 'required' => 'required')) }}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label('conducted_at', 'Conducted At') }}
                    <div class='input-group date' id='datetimepicker1'>
                        <input id="conducted_at" name="conducted_at" type='text' class="form-control" required="required" />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            {{ Form::hidden('checklist_template_id', $checklist_template->id) }}
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label("photo", 'Upload Cover Image') }}
                    {{ Form::file("photo", array('accept' => "image/*;capture=camera", 'class' => 'form-control', 'multiple', 'required')) }}
                </div>
            </div>
        </div>
        @foreach($checklist_template->cl_section_templates as $section_template)
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $section_template->name }}</h2>
                    <h3>{{ $section_template->subsection_titles }}</h3>
                    @foreach($section_template->cl_subsection_templates as $subsection_template)
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('subsection_number', $subsection_template->name) }}
                                {{ Form::selectRange("subsections_number[$section_template->id][$subsection_template->id]", '0', '10', '0', array('id' => 'subsection_number', 'class' => 'form-control align-right')) }}
                            </div>
                            <br />
                            <br />
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        {{ Form::submit('Submit', array('class' => 'btn btn-success pull-right')) }}
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


