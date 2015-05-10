<?php

class QuestionImagesController extends \BaseController {

    public function store($questionId) {

        return Response::json([$questionId, Input::all()]);

    }

}