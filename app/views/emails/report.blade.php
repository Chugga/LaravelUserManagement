<!DOCTYPE html>
    <html lang="en-US">
        <head>
            <meta charset="utf-8">
        </head>
    <body>
        <h2>Inspection Report</h2>

        <div>
            <p>
                The inspection report for Job {{ $checklist->job_number }} at {{ $checklist->address }} has been completed.<br />
                <!--Please click the following link to download it: <a href="{{ URL::route('checklists.pdf', $checklist->id, true) }}">Click Here</a><br />-->
                Please find it attached.<br />
                Regards,<br />
                Kelvin Court Homes
            </p>
        </div>
    </body>
</html>
