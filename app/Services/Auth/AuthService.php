<?php

namespace App\Services\Auth;

use App\Repositories\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService implements AuthServiceInterface
{
    use ThrottlesLogins;

    /**
     * @var \App\Repositories\User\UserRepositoryInterface
     */
    public UserRepositoryInterface $userRepository;

    /**
     * AuthService constructor.
     * @param \App\Repositories\User\UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\User
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request): User
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }

        try {
            $user = $this->userRepository->findByUserName($request->input('username'));
        } catch (ModelNotFoundException $exception) {
            throw ValidationException::withMessages([
                'username' => __("Kullanıcı bulunamadı")
            ]);
        }

        if (!Hash::check($request->input('password'), $user->password)) {
            $this->incrementLoginAttempts($request);

            throw ValidationException::withMessages([
                'username' => __("Kullanıcı bulunamadı")
            ]);
        }

        $this->clearLoginAttempts($request);

        $user->updateLastLoginDate();

        return $user;
    }

    /**
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|string|null
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::user()->token()->revoke();

            return __("User successfully logged out");
        }

        throw ValidationException::withMessages([
                'username' => __("Kullanıcı bulunamadı")
            ]);
    }
}
