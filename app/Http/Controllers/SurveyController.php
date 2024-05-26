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
        // Log the entire request data to check what is being received
        \Log::info('Request Data:', $request->all());

        // Validate the incoming request data including distribution details
        $validatedData = $request->validate([
            'survey_title' => 'required|string|max:255',
            'survey_description' => 'nullable|string',
            'questions.*.question' => 'required|string',
            'questions.*.type' => 'required|in:text,textarea,radio,checkbox',
            'questions.*.options' => 'nullable|array|required_if:questions.*.type,radio,checkbox', // Only required for radio and checkbox types
            'distribute_position' => 'nullable|string', // Validate position
            'distribute_type' => 'nullable|string', // Validate distribute type
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        // Log the validated data to confirm presence of distribute_type
        \Log::info('Validated Data:', $validatedData);

        // Create a new survey record
        $survey = Survey::create([
            'survey_title' => $validatedData['survey_title'],
            'survey_description' => $validatedData['survey_description'],
            'distribute_position' => $validatedData['distribute_position'], // Save position
            'distribute_type' => $validatedData['distribute_type'], // Save distribute type
            'start_date' => $validatedData['start_date'] ?? null,
            'end_date' => $validatedData['end_date'] ?? null,
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

    public function getSurvey($id)
    {
        $survey = Survey::with('questions.options')->find($id);

        if (!$survey) {
            return response()->json(['error' => 'Survey not found'], 404);
        }

        return response()->json($survey);
    }

    public function getSurveyById($id)
    {
        $survey = Survey::with('questions.options')->find($id);

        if (!$survey) {
            return response()->json(['error' => 'Survey not found'], 404);
        }

        return response()->json([
            'survey_title' => $survey->survey_title,
            'survey_description' => $survey->survey_description,
            'distribute_position' => $survey->distribute_position,
            'distribute_type' => $survey->distribute_type,
            'start_date' => $survey->start_date,
            'end_date' => $survey->end_date,
            'questions' => $survey->questions->map(function ($question) {
                return [
                    'id' => $question->id,
                    'question' => $question->question,
                    'type' => $question->type,
                    'value' => $question->value,
                    'options' => $question->options->map(function ($option) {
                        return [
                            'value' => $option->value,
                            'selected' => $option->selected
                        ];
                    })
                ];
            })
        ]);
    }

    public function update(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'id' => 'required|exists:surveys,id',
            'editSurveyTitle' => 'nullable|string|max:255',
            'editSurveyDescription' => 'nullable|string',
            'edit_distribute_position' => 'nullable|string',
            'edit_distributeType' => 'nullable|string',
            'edit_start_date' => 'nullable|date',
            'edit_end_date' => 'nullable|date',
            'questions' => 'nullable|array',
            'questions.*.question' => 'nullable|string',
            'questions.*.type' => 'nullable|in:text,textarea,radio,checkbox',
            'questions.*.options' => 'nullable|array|required_if:questions.*.type,radio,checkbox', // Only required for radio and checkbox types
        ]);

        // Find the survey
        $survey = Survey::findOrFail($validatedData['id']);

        // Update survey details
        $survey->survey_title = $request->input('editSurveyTitle');
        $survey->survey_description = $request->input('editSurveyDescription');
        $survey->distribute_position = $request->input('edit_distribute_position');
        $survey->distribute_type = $request->input('edit_distributeType');
        $survey->start_date = $request->input('edit_start_date');
        $survey->end_date = $request->input('edit_end_date');
        $survey->save();

        // Handle questions and options
        $survey->questions()->delete(); // Delete existing questions

        if (isset($validatedData['questions'])) {
            foreach ($validatedData['questions'] as $questionData) {
                $question = new Question([
                    'survey_id' => $survey->id,
                    'question' => $questionData['question'],
                    'type' => $questionData['type'],
                ]);
                $question->save();

                if (isset($questionData['options'])) {
                    foreach ($questionData['options'] as $optionValue) {
                        $option = new Option(['value' => $optionValue]);
                        $question->options()->save($option);
                    }
                }
            }
        }

        return response()->json(['message' => 'Survey updated successfully']);
    }

    public function deletesurvey($id)
    {
        try {
            // Find the request by ID
            $request = Survey::findOrFail($id);

            // Delete the request
            $request->delete();

            // Redirect with success message
            return redirect()->back()->with('success', 'Survey deleted successfully!');
        } catch (\Exception $exception) {
            // Redirect with error message if deletion fails
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
