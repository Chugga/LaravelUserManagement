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
            <div class="col-md-12">
                @if(count($checklist->checklist_images) > 0)
                    <img src="{{ Request::root() }}/photos/{{ $checklist->checklist_images[0]->filename }}" style=" max-width:90%;" />
                @endif
            </div>
        </div>
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
                        <div class="row">
                            <div class="col-md-12">
                                <h3>{{ $subsection->cl_subsection_template->name }} @if($subsection->cl_subsection_template->name == 'Bedroom'){{ $bedroom++ }} @if($bedroom == 2) (Master) @endif @endif</h3>
                                <div class="together">
                                    @if(strlen($subsection->comments) > 0)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p><strong>Notes:</strong> {{ $subsection->comments or 'none' }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if(count($subsection->subsection_images) > 0)
                                        <div class="row">
                                            <div class="col-md-12">
                                                @foreach($subsection->subsection_images as $image)
                                                    @if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/photos/subsection' . $image->filename))
                                                        <img src="{{ Request::root() }}/photos/{{ $image->filename }}" style="max-width:46%; margin-left:1%; margin-right:1%" />
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <br />
                                @foreach($subsection->cl_questions as $question)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><strong>{{ $i++ }}. {{ $question->cl_question_template->question }} : </strong>{{ $question->pass ? "Passed" : (strlen($question->answer) > 0 ? $question->answer : "Failed") }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @foreach($question->question_images as $image)
                                                @if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/photos/' . $image->filename))
                                                    <div class="col-md-6">
                                                        <img src="/photos/{{ $image->filename }}" style="max-width:100%" />
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <br />
                                @endforeach
                            </div>
                        </div>
                        <hr /><br />
                    @endforeach
                </div>
            </div>
        @endforeach
        <a href="{{ URL::route('checklists.pdf', $checklist->id) }}" class="btn btn-primary pull-right">Download as PDF</a>
        <a href="{{ URL::route('checklists.mail', $checklist->id) }}" class="btn btn-success pull-right">Send Checklist</a>
    </div>
@stop


@section('javascripts')

@stop


