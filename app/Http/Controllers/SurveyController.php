<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Survey;
use App\Models\Question;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    // Method to save survey details, questions, and options
    public function saveSurveyDetails(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'survey_title' => 'required|string|max:255',
            'survey_description' => 'nullable|string',
            'questions.*.question' => 'required|string',
            'questions.*.type' => 'required|in:text,textarea,radio,checkbox,dropdown,scale',
            'questions.*.options' => 'nullable|array', // Only required for radio, checkbox, dropdown types
        ]);

        // Create a new survey record
        $survey = Survey::create([
            'survey_title' => $validatedData['survey_title'],
            'survey_description' => $validatedData['survey_description'],
        ]);

        // Iterate over each question in the request
        foreach ($validatedData['questions'] as $questionData) {
            // Create a new question
            $question = Question::create([
                'question' => $questionData['question'],
                'type' => $questionData['type'],
            ]);

            // If the question has options, create options for it
            if (isset($questionData['options'])) {
                foreach ($questionData['options'] as $optionValue) {
                    Option::create([
                        'question_id' => $question->id,
                        'value' => $optionValue,
                    ]);
                }
            }

            // Associate the question with the survey
            $survey->questions()->save($question);
        }

        // Return a response indicating success or failure
        if ($survey) {
            return response()->json(['message' => 'Survey details, questions, and options saved successfully', 'survey' => $survey], 201);
        } else {
            return response()->json(['message' => 'Failed to save survey details, questions, and options'], 500);
        }
    }
}
