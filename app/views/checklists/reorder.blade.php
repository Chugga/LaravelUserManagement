@extends('layouts.master')

@section('title')
    @parent
    Reorder Subsections
@stop

@section('stylesheets')
    <style>
        #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
        #sortable li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; }
        .ui-state-highlight { height: 1.5em; line-height: 1.2em; }
    </style>
@stop

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <h1>Reorder the Checklist Subsections</h1>
                {{ Form::open(array('route' => array('checklists.reorder', $checklist->id), 'method' => 'post', 'id' => 'reorder-form')) }}
                <ul id="sortable">
                    @foreach($checklist->cl_sections as $section)
                        @foreach($section->cl_subsections as $subsection)
                            <li id="{{ $subsection->id }}" class="ui-state-default">{{ $subsection->cl_subsection_template->name }}</li>
                        @endforeach
                    @endforeach
                </ul>
                {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
            </div>
        </div>
    </div>
@stop


@section('javascripts')
    <script>
        $(function() {
            var sortable = $("#sortable");
            sortable.sortable({
                placeholder: "ui-state-highlight"
            });
            sortable.disableSelection();

            $("#reorder-form").submit(function( event ) {
                var form_array = $( "#sortable" ).sortable( "toArray" );

                for(var i = 0; i < form_array.length; i++) {

                    var input = $("<input>")
                            .attr("type", "hidden")
                            .attr("name", "cl_subsections[ " + i + "]")
                            .val(form_array[i]);
                    $('#reorder-form').append($(input));

                }

            });
        });
    </script>
@stop


