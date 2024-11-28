<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    //
    public function login(Request $request){
        $validator =Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }
        $credential = $request->only('email','password');
        $token = auth()->guard('api')->attempt($credential);
        $user = auth()->guard('api')->user();
        tap(User::where(['email'=>$request->email]))->update(['login_token'=>$token])->first();
        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Username atau password anda salah'
            ],404);
        }else{
            return response()->json([
                'success' => true,
                'user' => $user,
                'token' => $token
            ],200);
        }
    }


    public function showId(Request $request, $id)
    {
        // Check if the token is present
        if ($request->token == null) {
            return response()->json(['message' => 'Unauthorized user'], 401);
        }

        // Find the user based on the login token
        $user = User::where('login_token', $request->token)->first();

        // If user not found, return unauthorized response
        if (!$user) {
            return response()->json(['message' => 'Unauthorized user'], 401);
        }

        // Find the student associated with the logged-in user
        $student = Student::where('user_id', $user->id)->first();

        // If the student is not found, return a not found response
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        // Retrieve the examination data for the student
        $examination = Examination::where('student_id', $student->id)
            ->where('id', $id) // Ensure we are fetching the specific examination by ID
            ->with(['assessor', 'competencyElement']) // Eager load related data
            ->first();

        // If the examination is not found, return a not found response
        if (!$examination) {
            return response()->json(['message' => 'Examination not found'], 404);
        }

        // Prepare the response data
        $data = [
            'examination' => [
                'id' => $examination->id,
                'exam_date' => $examination->exam_date,
                'status' => $examination->status,
                'comment' => $examination->comment,
                'assessor' => $examination->assessor, // Include assessor data
                'competency_element' => $examination->competencyElement, // Include competency element data
            ],
        ];

        return response()->json($data, 200);
    }
}
