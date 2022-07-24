<?php

namespace App\Http\Controllers;

use App\Events\EmailVerification;
use App\Models\User;
use App\Repositories\RegistrationRepository;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public $registrationRepository;

    public function __construct(RegistrationRepository $registrationRepository)
    {
        $this->registrationRepository = $registrationRepository;
    }

    public function view()
    {
        return view('registration.view');
    }

    public function post(Request $request)
    {
        $data = $request->validate([
            'firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'mobile' => ['nullable'],
            'password' => ['required', 'max:50']
        ]);
        $user = $this->registrationRepository->post($data);
        EmailVerification::dispatch($user);

        return redirect(route('users.getUser', ['id' => $user->id]));
    }

    public function verification(string $token)
    {
        $user = $this->registrationRepository->findByVerificationToken($token);
        if ($user) {
            $this->registrationRepository->setDateOfVerification($user);
            return redirect(route('login-page'));
        } else {
            abort(404);
        }
    }
}
