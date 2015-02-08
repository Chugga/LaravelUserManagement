<?php

class ChecklistGenerator {
    public static function section($checklist_id, $template_id, $section_number) {
        return ClSection::create([
            'checklist_id' => $checklist_id,
            'cl_section_template_id' => $template_id,
            'section_number' => $section_number
        ]);
    }

    public static function subsection($section_id, $template_id, $subsection_number) {
        $cl_subsection = ClSubSection::create([
            'cl_section_id' => $section_id,
            'cl_subsection_template_id' => $template_id,
            'subsection_number' => $subsection_number
        ]);

        foreach(CLQuestionTemplate::where('cl_subsection_template_id', '=', $template_id)->get() as $template) {
            self::question($cl_subsection->id, $template->id);
        }

        return ClSubSection::with('cl_questions')->find($cl_subsection->id);
    }

    public static function question($subsection_id, $template_id) {
        return ClQuestion::create([
            'cl_subsection_id' => $subsection_id,
            'cl_question_template_id' => $template_id
        ]);
    }
}