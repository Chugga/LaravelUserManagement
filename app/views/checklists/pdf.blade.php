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

        .front-page {
            border:5px solid #2F4050;
            padding: 20px;
            height: 250mm;
            text-align:center;
        }
    </style>
@stop

@section('content')
    <div class="content" style="background-color: #fff; width:100%; margin:0;">
        <div class="page-content white-bg" style="margin: 0; padding: 10px 10px;">
            <div class="end-page front-page" style="padding-top: 10mm;">
                <div style="float:right;">
                    <p><strong>Inspector:</strong> {{ $checklist->user->first_name }} {{ $checklist->user->last_name }}</p>
                    <p><strong>Phone Number:</strong> {{ $checklist->user->phone_number }}</p>
                    <p><strong>Email Address:</strong> {{ $checklist->user->email }}</p>
                </div>
                <div style="clear:both;"></div>
                <br />
                <h1>Kelvin Court QA Inspections</h1>
                @if(count($checklist->checklist_images) > 0)
                    <img src="{{ Request::root() }}/photos/{{ $checklist->checklist_images[0]->filename }}" style="max-height:100mm;" />
                @endif
                <h2>Job Number {{ $checklist->job_number or 'N/A'}}</h2>
                <br />
                <table style="width:100% border: 0;">
                    <thead></thead>
                    <tbody>
                    <tr>
                        <td style="width:50%">
                            <strong>Client:</strong> {{ $checklist->client->name }}
                        </td>
                        <td style="width:50%">
                            <strong>Address:</strong> {{ $checklist->address }}
                        </td>
                    </tr>
                    <tr style="height: 10px;"><td></td><td></td></tr>
                    <tr>
                        <td style="width:50%">
                            <strong>Weather:</strong> {{ $checklist->weather }}
                        </td>
                        <td style="width:50%">
                            <strong>Conducted at:</strong> {{ $checklist->conducted_at->toDayDateTimeString() }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            @foreach($checklist->cl_sections as $section)
                <div class="row end-page" style="text-align:center;">
                    <div class="col-md-12">
                        <h2>{{ $section->cl_section_template->name }} {{ $section->cl_section_template->subsection_titles }}</h2>
                        @foreach($section->cl_subsections as $subsection)
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>{{ $subsection->cl_subsection_template->name }} @if($subsection->cl_subsection_template->name == 'Bedroom'){{ $bedroom++ }}@endif</h4>
                                    @if(strlen($subsection->comments) > 0)
                                        <p><strong>Notes:</strong> {{ $subsection->comments or 'none' }}</p>
                                    @endif
                                    @foreach($subsection->cl_questions as $question)
                                        @if(!$question->pass)
                                            <div class="together">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><strong>{{ $i++ }}. {{ $question->cl_question_template->question }}: </strong>{{ $question->pass ? "Passed" : $question->answer }}</p>
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
                        @endforeach
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-md-12" style="text-align:center">
                    <h3>Terms and Conditions</h3>
                    <p>
                        The purpose and intent of this inspection and report is to provide the 'client' with an opinion and list of defects (if any)
                        on the quality of the finishes and fixtures as viewed at the property on the day the inspection occurred, based on best practice
                        building methods, BCA and relevant standards and tolerances. This report has been produced on the basis that no person or persons
                        using the information in part or whole contained within shall have any claim against Kelvin Court Pty Ltd or its representatives.
                        It does not comment or take into account the structural integrity accuracy or compliance with any formal documentation including
                        final working drawings, permit approvals, statutory, regulatory or legislation requirements, colour selections, manufacturers
                        installation guidelines or requirements.
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop