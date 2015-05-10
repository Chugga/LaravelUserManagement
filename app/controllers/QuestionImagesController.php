<?php

class QuestionImagesController extends \BaseController {

    public function store($questionId) {

        return Response::json([$questionId, file_get_contents('php://input')]);

    }

}