@extends('layouts.pdf')

@section('stylesheets')
    <link href="http://inspect.kelvincourt.com.au/assets/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="http://inspect.kelvincourt.com.au/assets/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="http://inspect.kelvincourt.com.au/assets/css/animate.css" type="text/css" rel="stylesheet">
    <link href="http://inspect.kelvincourt.com.au/assets/css/style.min.css" type="text/css" rel="stylesheet">
    <style>
        .align-right {
            float:right;
            clear:both;
        }

        .together {
            page-break-inside: avoid;
        }

        .end-page {
            page-break-after: always;
        }
    </style>
@stop

@section('content')
    <div class="content" style="background-color: #fff; width:100%; margin:0;">
        <div class="page-content white-bg" style="margin: 0; padding: 10px 10px;">
            <div class="end-page" style="border:10px solid #2F4050;">
                <h1>Kelvin Court Homes Inspection Report</h1>
                <br /><br /><br />
                <h2>Job Number {{ $checklist->job_number or 'N/A'}}</h2>
                <div class="row">
                    <div class="col-md-4" style="width: 40%;">
                        <p><strong>Client:</strong> {{ $checklist->client->name }}</p>
                    </div>
                    <div class="col-md-8" style="width:50%;">
                        <p><strong>Address:</strong> {{ $checklist->address }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" style="width: 40%">
                        <p><strong>Weather:</strong> {{ $checklist->weather }}</p>
                    </div>
                    <div class="col-md-4" style="width:50%;">
                        <p><strong>Conducted at:</strong> {{ $checklist->conducted_at->toDayDateTimeString() }}</p>
                    </div>
                </div>
            </div>
            @foreach($checklist->cl_sections as $section)
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{ $section->cl_section_template->name }} {{ $section->cl_section_template->subsection_titles }}</h2>
                        @foreach($section->cl_subsections as $subsection)
                            @if(count($subsection->cl_questions) > 0 || strlen($subsection->comments) > 0)
                                <div class="row end-page">
                                    <div class="col-md-12">
                                        <h4>{{ $subsection->cl_subsection_template->name }}</h4>
                                        @if(strlen($subsection->comments) > 0)
                                            <p><strong>Notes:</strong> {{ $subsection->comments or 'none' }}</p>
                                        @endif
                                        @foreach($subsection->cl_questions as $question)
                                            @if(!$question->pass)
                                                <div class="together">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p><strong>{{ $i++ }}. {{ $question->cl_question_template->question }} : </strong>{{ $question->answer }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            @foreach($question->question_images as $image)
                                                                    <img src="{{ Request::root() }}/photos/{{ $image->filename }}" style="max-width:40%; margin-left:5%; margin-right:5%" />
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <br />
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <hr /><br />
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop