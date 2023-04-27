<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminsController extends Controller
{
    //
   
    public function admins_list()
    {
        $admins = User::where('is_admin', 1)->get();
        return view('admin.admins.index')->with('admins', $admins);
    }
    
    public function add()
    {  
         return view('admin.admins.add') ;
    }

    public function sendsms()
    {  
        $basic  = new \Vonage\Client\Credentials\Basic("043ad9c4", "ewmivBx91rr93yqg");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("201113051656", 'OUDZ', 'HI TAHA HI HI ')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }









    public function sendWhatsAppMessage()
    {
        // Set the required parameters
        $senderID = '102950242754753'; // Your WhatsApp Business Account phone number, including the country code
        $receiver = '201113051656'; // The recipient's phone number, including the country code
        $data = array( // An array of message components
            array(
                'type' => 'text',
                'text' => array('Hello, this is a WhatsApp message!')
            )
        );
        $template = 'sample_template'; // The name of the message template you want to use
        $language = 'en'; // The language code for the template, e.g. 'en' for English

        // Create a new instance of the Whatsapp class
        $whatsapp = new Whatsapp($senderID, $receiver, $data, $template, $language);

        // Set your Facebook Graph API access token
        //  $whatsapp->setToken('your_access_token');

        // Send the WhatsApp message
        $response = $whatsapp->sendWithParameters();

        // Check the response for errors
        if (isset($response['error'])) {
            // Handle the error
            return response()->json([
                'status' => 'error',
                'message' => $response['error']['message']
            ]);
        }

        // If the message was sent successfully, return a success response
        return response()->json([
            'status' => 'success',
            'message' => 'WhatsApp message sent successfully'
        ]);
    }


































    public function admin_store(Request $request)
    {
        $request->validate([ 
            'email' => ['required', 'string', 'email','email:rfc' , 'max:255', 'unique:users'],
            'password' => ['required','confirmed', Rules\Password::defaults()],
            
        ],
            [ 
                'email.required' => 'الايميل مطلوب',
                'email.unique' => ' الايميل مستخدم من قبل',
                'password.confirmed' => 'كلمة المرور غير متطابقة',
                'password.required' => 'كلمة المرور مطلوبة'
                
            ]); 
        $user = User::create([
            'email' => $request->email,
            'fname' => $request->first_name,
            'password' => Hash::make($request->password),
            'status' => '1',
            'is_admin' => '1',
            'type' => '1',
            
        ]);

        notify()->success('تمت اضافة مشرف   !');
            return redirect()->back();
    
    }
    
    public function admin_profile($id)
    {
        $mentors = User::where('id', $id)->first(); 
         return view('admin.admins.profile')->with('mentor', $mentors) ;
    }

    public function admin_save(Request $request, $id)
    {
        $mentor = User::where('id', $id)->first();
        if ($mentor) {
            $mentor->fname = $request->first_name;
            $mentor->email = $request->email ;
            $mentor->status = $request->status;
           
            $mentor->save();
            notify()->success('تم التعديل  !');
            return redirect()->back();

        } else {
            return redirect()->back()->with('error', 'please try again');
        }
    }

    public function password(Request $request)
    {
         $data = User::where('id', $request->id)->first();
        if ($data) {  
                $this->validate($request, [
                    'new_password' => [
                        'required',
                        'string',
                        'min:8',             // must be at least 10 characters in length
                        // 'regex:/[a-z]/',      // must contain at least one lowercase letter
                        //  'regex:/[0-9]/',      // must contain at least one digit
                                        ],
                    'password_confirmation' => 'required|same:new_password'
                ],$messages = [
                    'new_password.required' => '  كلمة المرور مطلوب!',
                    'new_password.string' => '  كلمة المرور غير صالحة!',
                    'new_password.min' => '  كلمة المرور يجب ان تحتوي على كثر من 8 حروف!',

                    'password_confirmation.same' => '  كلمة المرور غير متطابقة!',
                    'password_confirmation.required' => '  تأكيد كلمة المرور مطلوب! ',

                ]); 
                 
                $data->password = Hash::make($request->new_password);
             
            $data->save();


            notify()->success('تم تغيير كلمة السر  !');
            return redirect()->back();

        } else {
            return redirect()->back()->with('error', 'Your session expired');
        }
    }

       function uploadImage($folder, $image)
    {
        $image->store('/', $folder);
        $filename = $image->hashName();
        $path = $filename;
        return $path;
    }
    public function admin_delete(Request $request){

        $user = User::find($request->id);  
        if( $user){

            $user->delete();
      
            return response()->json([
                'status' => true,
                'msg' => 'deleted!',
                'id' =>  $request -> id
            ]);
        } 
 }

}



class Whatsapp {
    private $baseUrl;
    private $senderID;
    private $receiver;
    private $data;
    private $template;
    private $language;
    private $apiVersion;
    private $token;
    public function __construct($senderID,$receiver,$data,$template,$language){
        $this->baseUrl = 'https://graph.facebook.com';
        $this->apiVersion = 'v15.0';
        $this->senderID = $senderID;
        $this->receiver = $receiver;
        $this->data = $data;
        $this->template = $template;
        $this->language = $language;
        $this->token = '';
    }
    public function sendWithParameters(){
      $curl = curl_init();
      $template = array(
           'name' => $this->template, 
           'language' => array('code' => $this->language),
           'components' => $this->data
      );
      $params = array(
           'messaging_product' => 'whatsapp',
           'to' => $this->receiver,
           'type' => 'template',
           'from' => $this->senderID,
           'template' => json_encode($template)
      );
      $url = "{$this->baseUrl}/{$this->apiVersion}/{$this->senderID}/messages/";
      curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>json_encode($params),
          CURLOPT_HTTPHEADER => array(
              'Authorization: Bearer '.$this->token,
              'Content-Type: application/json'
          ),
      ));
 
      $response = curl_exec($curl);
      $response = json_decode($response,true);
      $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
      curl_close ($curl);
      return $response;
    }
 }