<?php

class QuestionImagesController extends \BaseController {

    public function store($questionId) {
        $image = QuestionImage::create(array('cl_question_id' => $questionId));

        $this->base64_to_jpeg(file_get_contents('php://input'),  $_SERVER['DOCUMENT_ROOT'] . '/photos/' . $image->id . '.jpg');

        return Response::json();

    }

    private function base64_to_jpeg($base64_string, $output_file) {
        $ifp = fopen($output_file, "wb");

        $data = explode(',', $base64_string);

        fwrite($ifp, base64_decode($data[0]));
        fclose($ifp);

        return $output_file;
    }

}