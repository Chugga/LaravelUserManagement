@extends('layouts.master')

@section('title')
    @parent
    View Checklist {{ $checklist->job_number or '' }}
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
        <h1>Job Number {{ $checklist->job_number or 'N/A'}}</h1>
        <div class="row">
            <div class="col-md-4">
                <p><strong>Client:</strong> {{ $checklist->client->name }}</p>
            </div>
            <div class="col-md-8">
                <p><strong>Address:</strong> {{ $checklist->address }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><strong>Weather:</strong> {{ $checklist->weather }}</p>
            </div>
            <div class="col-md-4">
                <p><strong>Conducted at:</strong> {{ $checklist->conducted_at->toDayDateTimeString() }}</p>
            </div>
        </div>
        @foreach($checklist->cl_sections as $section)
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $section->cl_section_template->name }} {{ $section->cl_section_template->subsection_titles }}</h2>
                    @foreach($section->cl_subsections as $subsection)
                        @if(count($subsection->cl_questions) > 0 || strlen($subsection->comments) > 0)
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>{{ $subsection->cl_subsection_template->name }}</h4>
                                    @if(strlen($subsection->comments) > 0)
                                        <p><strong>Notes:</strong> {{ $subsection->comments or 'none' }}</p>
                                    @endif
                                    @foreach($subsection->cl_questions as $question)
                                        @if(!$question->pass)
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><strong>{{ $i++ }}. {{ $question->cl_question_template->question }} : </strong>{{ $question->answer }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @foreach($question->question_images as $image)
                                                        <div class="col-md-6">
                                                            <img src="/photos/{{ $image->filename }}" style="max-width:100%" />
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
        <a href="{{ URL::route('checklists.pdf', $checklist->id) }}" class="btn btn-primary pull-right">Download as PDF</a>
        <a href="" class="btn btn-success pull-right">Send Checklist</a>
    </div>
@stop


@section('javascripts')

@stop


