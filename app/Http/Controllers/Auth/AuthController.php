<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'auth/created';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|min:3|unique:users',
            'name' => 'required|max:255',
            'city' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'terms' => 'accepted'
        ]);
    }

    protected function created(){
        return view('auth/created');
    }

    /*
     * Create and send a verification email to validate the existence and ownership of the provided email.
     */
    protected function sendVerificationEmail(array $data, $confirmation_code)
    {
//        //START OF EMAIL FOR CONFIRMATION
//        $subject= 'Tagpanel Accounts - Email Address Verification';
//        $username = $data['username'];
//        $name= $data['name'];
//        $email=$data['email'];
//        $to=$email;
//        $city=$data['city'];
//        $message="You now have created an account on tagpanel.com";
//        $message= <<<EMAIL
//<!DOCTYPE html>
//<html>
//<body>
//	<div style="width:500px;margin:auto;text-align:center;border-style:double;">
//		<h1><img src="http://tagpanel.com/images/TagPanelLogoSMALL.png">TagPanel</h1>
//		<div style="background-color: rgba(204, 204, 204, 0.28)">
//			<div style="background-color:#83B91E; border-top:double;">
//				<h1 style="margin-top:0px">Tagpanel Verification Email</h1>
//			</div>
//				<p>Share what you love with us and your community.</p>
//				<p>Partagez ce que vous aimez avec nous et votre communaut&eacute;!</p>
//			<hr style="width:50%"/>
//
//
//
//			<div>
//				<p>Hello! <b>$username</b>(<b>$name</b>),  <br/>
//                Thank you for creating an account(<b>$email</b>) with us at <a href="http://www.tagpanel.com/">tagpanel.com</a><br/>
//				Before you can Login, we require that you verify this email address.<br/>
//                Please follow the link below to verify your email address<br/>
//				<a href="http://www.tagpanel.com/register/verify/$confirmation_code">http://www.tagpanel.com/register/verify/$confirmation_code</a><br/>
//				(if the link is not working properly, please copy/paste this address into your browsers URL bar)<p>
//            </div>
//
//			<hr style="width:50%"/>
//
//			<p>If you did not create this account please ignore this email.</p>
//			<p>Please do not reply to this email - direct emails to <a href="http://www.tagpanel.com/contact">support@tagpanel.com</a></p>
//			<div style="background-color:#83B91E; border-top:double;">
//        Copyright &copy; 2016 tagpanel.com <br/>
//			<a href="http://tagpanel.com/privacy">Privacy Policy</a> | <a href="http://tagpanel.com/terms">Terms of Service</a>
//			</div>
//		</div>
//	</div>
//</body>
//</html>
//EMAIL;
//        $headers='noreply@tagpanel.com';
//        $headers = "From: " . "noreply@tagpanel.com" . "\r\n";
//        $headers .= "Reply-To: ". "support@tagpanel.com" . "\r\n";
//        $headers .= "MIME-Version: 1.0\r\n";
//        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//
//        mail($to,$subject,$message,$headers);
//        //end OF EMAIL FOR CONFIRMATION
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $confirmation_code = uniqid(null, true);

        $this->sendVerificationEmail($data, $confirmation_code);

        return User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'city' => $data['city'],
            'region' => $data['region'],
            'country' => $data['country'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'profile_path' => 'images/default_profile.png',
            'banner_path' => 'images/default_banner.png',
            'confirmation_code' => $confirmation_code,
        ]);
    }

    public function confirm($confirmation_code)
    {
        if (!$confirmation_code) {
            return redirect('/login');
        }

        $user = User::where('confirmation_code', $confirmation_code)->first();;

        if (isset($user)) {
            $user->confirmed = 1;
            $user->confirmation_code = null;
            $user->save();
            return view('auth/verified');
            return redirect('/verified');
        }

        return redirect('/login');

    }

    public function verified(){
        return view('auth/verified');
    }
}
