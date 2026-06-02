<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Inertia\Inertia;

class PasswordResetController extends Controller
{
    // Tela de pedir o link (E-mail)
    public function create()
    {
        return Inertia::render('Auth/ForgotPassword', [
            'status' => session('status')
        ]);
    }

    // Envia o e-mail com o token
    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    // Tela de digitar a nova senha (vinda do e-mail)
    public function edit(Request $request, $token)
    {
        // 1. Busca o usuário pelo e-mail da request
        $user = Password::getUser($request->only('email'));

        // 2. Valida se o usuário existe e se o token é válido/não expirou
        if (!$user || !Password::getRepository()->exists($user, $token)) {
            // Se for inválido, redireciona para a tela de esqueci a senha com um erro
            return redirect()->route('password.request')
                ->withErrors(['email' => 'Este link de redefinição de senha é inválido ou expirou.']);
        }

        // 3. Se passou na validação, exibe a tela do Inertia com segurança
        return Inertia::render('Auth/ResetPassword', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    // Atualiza a senha no banco
    public function update(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
