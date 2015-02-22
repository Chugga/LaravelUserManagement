<!DOCTYPE html>
    <html lang="en-US">
        <head>
            <meta charset="utf-8">
        </head>
    <body>
        <h2>Inspection Report</h2>

        <div>
            <p>
                Your inspection report for Job {{ $checklist->job_number }} at {{ $checklist->address }} is complete.<br />
                Please click the following link to download it: <a href="{{ URL::route('checklists.pdf', $checklist->id, true) }}">Click Here</a><br />
                Regards,<br />
                Kelvin Court Homes
            </p>
        </div>
    </body>
</html>
