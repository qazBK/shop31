<?php
//9997
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\AuthRequest;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login()
{
    return view('login');
}

    /**
     * @param AuthRequest $request
     * @return RedirectResponse
     */
    public function loginSend(AuthRequest $request)
{
    if (auth()->attempt($request->only('email','password')+['is_admin'=>true])){
       return redirect()->route('admin-panel');
    }
    return redirect()->route('login')
        ->withInput($request
            ->validated())->withErrors([
        'status'=> 'Неверный email, пароль или отсутствует права администратора'
    ]);

}

public function logout()
{
    //$this->logout()
    auth()->logout();

    return redirect()-> route('login');
}

}

