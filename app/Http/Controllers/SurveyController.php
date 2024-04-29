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
        // Validate the incoming request data including distribution details
        $validatedData = $request->validate([
            'survey_title' => 'required|string|max:255',
            'survey_description' => 'nullable|string',
            'questions.*.question' => 'required|string',
            'questions.*.type' => 'required|in:text,textarea,radio,checkbox',
            'questions.*.options' => 'nullable|array|required_if:questions.*.type,radio,checkbox', // Only required for radio and checkbox types
            'distribute_position' => 'nullable|string', // Validate position
            'distributeType' => 'nullable|string', // Validate distribute type
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        // Create a new survey record
        $survey = Survey::create([
            'survey_title' => $validatedData['survey_title'],
            'survey_description' => $validatedData['survey_description'],
            'distribute_position' => $validatedData['distribute_position'], // Save position
            'distribute_type' => $validatedData['distributeType'], // Save distribute type
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
        ]);

        // Iterate over each question in the request
        foreach ($validatedData['questions'] as $questionData) {
            // Create a new question
            $question = Question::create([
                'survey_id' => $survey->id, // Associate question with the survey
                'question' => $questionData['question'],
                'type' => $questionData['type'],
            ]);

            // If the question has options, create options for it
            if (isset($questionData['options'])) {
                foreach ($questionData['options'] as $optionValue) {
                    // Create option and associate it with the question
                    $option = new Option(['value' => $optionValue]);
                    $question->options()->save($option);
                }
            }
        }

        // Return a response indicating success or failure
        if ($survey) {
            return response()->json(['message' => 'Survey details, questions, and options saved successfully', 'survey' => $survey], 201);
        } else {
            return response()->json(['message' => 'Failed to save survey details, questions, and options'], 500);
        }
    }
}
