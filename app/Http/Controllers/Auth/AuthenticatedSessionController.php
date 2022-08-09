<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        function aztro($sign, $day) {
            $allZodiac = array();
            for ($i=0; $i < sizeof($sign); $i++) { 
                $aztro = curl_init('https://aztro.sameerkumar.website/?sign='.$sign[$i].'&day='.$day);
                curl_setopt_array($aztro, array(
                    CURLOPT_POST => TRUE,
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json'
                    )
                ));
                $response = curl_exec($aztro);
                if($response === FALSE){
                    die(curl_error($aztro));
                }
                $responseData = json_decode($response, TRUE);
                array_push($allZodiac, $responseData);
            }
            return $allZodiac;
        }
              
        $ObjData = aztro(["aries","taurus","gemini","cancer","leo","virgo","libra","scorpio","sagittarius","capricorn","aquarius","pisces"], 'today');
        foreach($ObjData as $Key => $val) {   
            echo $val['description']; 
        }
        $name= ["Chu,Che,Cho,La,Li,Lu,Le,Lo,A",
        "E,V,Ai,O,Vaa,Vi,Vu,Ve,Vo"
        ,"ka,Ki,Ku,Gh,Chh,Ke,Ko,Ha",
        "Hi,Hu,He,Ho,Da,Di,Du,De,DO",
        "M,Mi,Mu,Me,Mo,Ta,Ti,Tu,Te",
        "To,Pa,Pi,Pe,Sha,Thha,Pe,Po",
        "Ra,Ri,Ru,Ro,Taa,Ti,Tu,Te",
        "To,N,Ni,Ne,No,Yo,Yi,Yu","
        Ye,Yo,Bha,Bhi,Bhu,Dha,Pha(F),Dhha,Bhe","
        Bho,Ja,Ji,Khi,Khu(Khoo),Khe,Kho,Ga,Gi","Gu(Goo),Ge,Go,Sa,SI,Soo(Su),Se,So,Da(The)","Di,Du,Thha,Jha,Jya,De,Do,Ch,Chi"];
     die;
  
       
           
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
