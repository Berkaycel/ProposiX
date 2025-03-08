<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Library\Objects\UserObject;
use App\Library\Repository\Interfaces\UserRepositoryInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ){}

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.sign-up');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): RedirectResponse|JsonResponse
    {

        $userData = (new UserObject())->setName($request->get('name'))
                                ->setEmail($request->get('email'))
                                ->setPassword($request->get('password'))
                                ->setPhone($request->get('phone'))
                                ->setIdentity($request->get('identity'))
                                ->setTaxIdentityNo($request->get('tax_identity_no'))
                                ->setTaxNo($request->get('tax_no'))
                                ->setTradeRegistry($request->get('trade_registry'))
                                ->setAddress($request->get('address'))
                                ->setCompanyName($request->get('company_name'))
                                ->setUserType($request->get('user_type'));

        $user = $this->userRepository->register($userData);

        event(new Registered($user));

        Auth::login($user);

        if (request()->ajax()) {
            return response()->json([
                'redirect_url' => route('dashboard'),
            ]);
        }
        
        return redirect(route('dashboard', absolute: false));
    }
}
