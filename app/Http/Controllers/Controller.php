<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Question;

class Controller extends BaseController
{
    public function index()
    {
        // Getting the first question
        $firstQuestion = Question::getQuestionById(1);
        return view('questions', ['questions' => [$firstQuestion]]);
    }

    public function getNextQuestion(Request $request)
    {
        $answer = $request->input('answer');
        $currentQuestionId = $request->input('question_id');
        $nextQuestion = $this->getNextDependentQuestion($currentQuestionId, $answer);
    
        // If answer is "No", look for next question with dependsOn equals null
        if ($answer === 'No') {
            $nextQuestion = $this->getNextDependentQuestion($currentQuestionId, $answer);
        }
    
        if (!$nextQuestion) {
            // No dependent question, get next sequential question
            $nextQuestion = $this->getNextSequentialQuestion($currentQuestionId);
        }
    
        if ($nextQuestion) {
            return view('questions', ['questions' => [$nextQuestion]]);
        } else {
            return 'End of questions';
        }
    }

    // Get the next dependent question of current question based on user's answer
    private function getNextDependentQuestion($currentQuestionId, $answer)
    {
        foreach (Question::allQuestions() as $questionId => $question) {
            if ($question['dependsOn'] == $currentQuestionId && $answer === 'No') {
                return $question;
            }
        }
        return null;
    }

    // Get the next sequential question in the list of questions
    private function getNextSequentialQuestion($currentQuestionId)
    {
        foreach (Question::allQuestions() as $questionId => $question) {
            if ($questionId > $currentQuestionId) {
                return $question;
            }
        }
        return null;
    }
}
