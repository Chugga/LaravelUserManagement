@extends('layouts.master')

@section('title')
    @parent
    Reorder Subsections
@stop

@section('stylesheets')

@stop

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <h1>Reorder the Checklist Subsections</h1>
                {{ Form::open(array('route' => array('checklists.reorder', $checklist->id), 'method' => 'post', 'id' => 'reorder-form')) }}
                <ul id="sortable">
                    @foreach($checklist->cl_section as $section)
                        @foreach($section->cl_subsection as $subsection)
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

                $.each($( "#selector" ).sortable( "toArray" ), function(key, val) {
                    var input = $("<input>")
                            .attr("type", "hidden")
                            .attr("name", "cl_subsections[ " + key + "]")
                            .val(val);
                    $('#reorder-form').append($(input));
                });

            });
        });
    </script>
@stop


