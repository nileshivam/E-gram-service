<?php 
namespace App\Http\Controllers;
use App\Model\Tmp;
use Auth;

class MainController extends Controller
{
	public function btc()
	{
		return view('pages.btc');
	}
	public function list1($pur=NULL)
	{
		if(!Auth::check())
		{
			return \Redirect::to('login'); 
		}
		$b=Auth::user()->did;
		if($pur=="pending")
		{
			$pa=1;
			$a=Tmp::where('status','=',$b)->get();
			return view('pages.list1')->with(['a'=>$a,'pa'=>$pa]);
		}
		else if($pur=="accepted")
		{
			$pa=0;
			$a=Tmp::where('status','>',$b)->get();
			return view('pages.list1')->with(['a'=>$a,'pa'=>$pa]);
		}
		else if($pur=="rejected")
		{
			$pa=0;
			$a=Tmp::where('status','<',$b)->where('reje','=',Auth::user()->id)->get();
			return view('pages.list1')->with(['a'=>$a,'pa'=>$pa]);
		}
		else if($pur==NULL && Auth::user()->did==1)
		{
			$pa=0;
			$a=Tmp::where('status','>=',0)->get();
			return view('pages.list1')->with(['a'=>$a,'pa'=>$pa]);
		}
		else
		{
			abort(404);
		}
	}

	public function vie($id)
	{
		if(!Auth::check())
		{
			return \Redirect::to('login'); 
		}
		$a=Auth::user();
		if($a->did===1)
		{
			$pa=1;
			$a=Tmp::where('id','=',$id)->where('status','=','5')->firstOrFail();
		}
		else
		{
			$pa=0;
			$a=Tmp::where('id','=',$id)->where('status','=',$a->did)->firstOrFail();
		}
		return view('pages.list')->with(['a'=>$a,'pa'=>$pa]);
	}

	public function getcp($id)
	{
		//$a=Tmp::where('id','=',$id)->firstOrFail()>with(['a'=>$a]);
		return view('pages.wtp');	
	}

	public function acc($it)
	{
		if(!Auth::check())
		{
			return \Redirect::to('login'); 
		}
		$a=Tmp::where('id','=',$it)->firstOrFail();
		if($a->status==3)
		{
			$a->status=5;
		}
		else
		{
			$a->status=$a->status+1;
		}
		$a->save();
		return redirect()->route('list',['pur'=>"pending"]);
	}

	public function reg($it)
	{
		if(!Auth::check())
		{
			return \Redirect::to('login'); 
		}
		$a=Tmp::where('id','=',$it)->firstOrFail();
		$a->status=0;
		$a->reje=Auth::user()->id;
		$a->save();
		return redirect()->route('list',['pur'=>"pending"]);
	}

	public function form()
	{
		if(!Auth::check())
		{
			return \Redirect::to('login'); 
		}
		$msg=0;
		$id=4;
		return view('pages.form')->with(['msg'=>$msg,'id'=>$id]);
	}

	public function index()
	{
		if(!Auth::check())
		{
			return \Redirect::to('login'); 
		}
		if(!Auth::check())
		{
			return view('pages.login');
		}
		$user=Auth::user();
		if($user->did==1)
		{
			return view('pages.index2');
		}
		return view('pages.index1');
	}
	public function login()
	{
		if(!Auth::check())
			return view('pages.login');
		else
			return \Redirect('/');
	}
	public function plogin()
	{
		$userdata = array(
       		'username'     	=> 	\Input::get('username'),
        	'password'  	=> 	\Input::get('password'),
    	);
		$a=Auth::attempt($userdata);
		if ($a) 
		{
			session()->regenerate();
        	Auth::viaRemember();
			return \Redirect('/');
   	 	} 
   	 	else 
   	 	{  
        	return \Redirect::to('login')->with('msg',"Incorrect E-mail Or password");      	
        }
	}


	public function logout()
	{

		if(Auth::check())
		{
			\Session::flush();
			Auth::logout();
    		return \Redirect::to('login'); 
		}
		else
		{
			return view('pages.login');
		}
	}


	public function temp()
	{
		$re=Tmp::where('status','=',0)->count();
		$ac=Tmp::where('status','=',5)->count();
		$t=Tmp::where('status','>=',0)->count();
		return view('pages.record')->with(['t'=>$t,'re'=>$re,'ac'=>$ac]);
	}


	public function pform()
	{
		/*$rules=array(
			'firstname'	=>	'required|min:3|max:30',
			'lastname'	=>	'required|min:3|max:30',
			'username'	=>	'required|min:3|unique:users',
			'email'		=>	'required|email|unique:users',
			'password'	=>	'required|min:3',
			'cpass' 	=> 	'required|same:password',
			'mobile'	=>	'required|digits:10',
			'college'	=>	'required|min:2|max:50',
			);
		$validator=\Validator::make(\Input::all(),$rules);
		if($validator->fails())
		{
			return \Redirect::to('login')
        	->withErrors($validator) 
        	->withInput(\Input::except('password','cpass'));
		}*/
		if(!Auth::check())
		{
			return \Redirect::to('login'); 
		}
		$m= new Tmp();
		$m->name 				=	\Input::get('nm');
		$m->dob 				=	\Input::get('dob');
		$m->gen					=	"Male";
		$m->place  				= 	\Input::get('place');
		$m->fn  				= 	\Input::get('fn');
       	$m->mn    				= 	\Input::get('mn');
       	$m->nationality			=	\Input::get('nation');
       	$m->Religion			= 	\Input::get('relig');
       	$m->dname 				= 	\Input::get('dname');
       	$m->dphone  			= 	\Input::get('dname');
       	$m->phone				=	\Input::get('phone');
       	$m->addre				=	\Input::get('addre');
       	$m->doctype				=	\Input::get('doctype');
       	$m->status=2;
       	$temp = explode(".", $_FILES['pro']["name"]);
		$extension = end($temp);
		$m->extension=$extension;
		$m->save();
		$loc='C:\\xampp\\htdocs\\freeshing\\myapp\\public\\images\\pro\\'.$m->id.".".$extension;
		move_uploaded_file($_FILES['pro']["tmp_name"],$loc);
		$msg=1;
		$id=$m->id;
       	return view('pages.form')->with(['msg'=>$msg,'id'=>$id]);
	}

	public function getdoc($id)
	{
		$a=Tmp::where('id','=',$id)->firstOrFail();
		$mypdf=$my_html='<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
<!--
span.cls_003{font-family:Arial,serif;font-size:14.1px;color:rgb(255,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_003{font-family:Arial,serif;font-size:14.1px;color:rgb(255,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_002{font-family:"Calibri Bold",serif;font-size:14.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_002{font-family:"Calibri Bold",serif;font-size:14.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_005{font-family:"Calibri Bold",serif;font-size:13.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_005{font-family:"Calibri Bold",serif;font-size:13.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_006{font-family:"Calibri Bold",serif;font-size:13.1px;color:rgb(255,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_006{font-family:"Calibri Bold",serif;font-size:13.1px;color:rgb(255,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_007{font-family:"Calibri",serif;font-size:12.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_007{font-family:"Calibri",serif;font-size:12.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_008{font-family:"Calibri Italic",serif;font-size:11.0px;color:rgb(0,0,0);font-weight:normal;font-style:italic;text-decoration: none}
div.cls_008{font-family:"Calibri Italic",serif;font-size:11.0px;color:rgb(0,0,0);font-weight:normal;font-style:italic;text-decoration: none}
span.cls_009{font-family:"Calibri",serif;font-size:11.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_009{font-family:"Calibri",serif;font-size:11.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_011{font-family:"Calibri Bold",serif;font-size:12.1px;color:rgb(255,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_011{font-family:"Calibri Bold",serif;font-size:12.1px;color:rgb(255,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_012{font-family:"Calibri Bold",serif;font-size:12.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_012{font-family:"Calibri Bold",serif;font-size:12.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_013{font-family:"Calibri",serif;font-size:12.1px;color:rgb(255,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_013{font-family:"Calibri",serif;font-size:12.1px;color:rgb(255,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_014{font-family:"Calibri",serif;font-size:8.0px;color:rgb(255,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_014{font-family:"Calibri",serif;font-size:8.0px;color:rgb(255,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_015{font-family:"Calibri Bold",serif;font-size:11.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_015{font-family:"Calibri Bold",serif;font-size:11.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_016{font-family:"Calibri Bold",serif;font-size:11.0px;color:rgb(255,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_016{font-family:"Calibri Bold",serif;font-size:11.0px;color:rgb(255,0,0);font-weight:bold;font-style:normal;text-decoration: none}
-->
</style>
<script type="text/javascript" src="index_files/wz_jsgraphics.htm"></script>
</head>
<body>
<div style="position:absolute;left:50%;margin-left:-306px;top:0px;width:612px;height:792px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:0px;top:0px">
<img src="index_files/background1.jpg" height="792" width="612"></div>
<div style="position:absolute;left:268.27px;top:35.28px" class="cls_002"><span class="cls_002">FORM NO - '.$a->id.'</span></div>
<div style="position:absolute;left:177.48px;top:60.96px" class="cls_002"><span class="cls_002">GOVERNMENT OF GUJARAT, INDIA</span></div>
<div style="position:absolute;left:207.90px;top:80.46px" class="cls_002"><span class="cls_002"></span></div>
<div style="position:absolute;left:229.92px;top:106.20px" class="cls_005"><span class="cls_005">Ahmedabad Office, </span></div>
<div style="position:absolute;left:258.13px;top:130.44px" class="cls_005"><span class="cls_005">BIRTH CERTIFICATE</span></div>
<div style="position:absolute;left:75.36px;top:146.34px" class="cls_007"><span class="cls_007">(Issued</span><span class="cls_008"> under Section 12</span><span class="cls_009">/</span><span class="cls_008">17 of the Registration of Births &amp; Deaths Act 1969 &amp; Rules 8/13 of the Andhra</span></div>
<div style="position:absolute;left:192.87px;top:161.04px" class="cls_008"><span class="cls_008">Pradesh registration of Births &amp; Deaths rules 1999)</span></div>
<div style="position:absolute;left:118.08px;top:185.76px" class="cls_007"><span class="cls_007">This is to certify that the following information has been taken from the Original</span></div>
<div style="position:absolute;left:72.00px;top:202.62px" class="cls_007"><span class="cls_007">record of Birth, which is in the register for (local area) </span><span class="cls_011">Ahmedabad</span><span class="cls_007"> village of </span><span class="cls_011">Ahmedabad</span><span class="cls_012"> Mandal</span><span class="cls_007"> of</span></div>
<div style="position:absolute;left:72.00px;top:219.48px" class="cls_011"><span class="cls_011">Ahmedabad </span><span class="cls_012">District</span><span class="cls_007"> of State</span><span class="cls_012"> Gujarat, INDIA.</span></div>
<div style="position:absolute;left:113.40px;top:262.02px" class="cls_012"><span class="cls_012">Given Name/First Name</span></div>
<div style="position:absolute;left:311.40px;top:262.02px" class="cls_013"><span class="cls_013">'.$a->name.'</span></div>
<div style="position:absolute;left:113.40px;top:277.20px" class="cls_012"><span class="cls_012">Sex</span></div>
<div style="position:absolute;left:311.40px;top:277.20px" class="cls_013"><span class="cls_013">'.$a->gen.'</span></div>
<div style="position:absolute;left:113.40px;top:292.32px" class="cls_012"><span class="cls_012">Aadhaar No</span></div>
<div style="position:absolute;left:311.40px;top:292.32px" class="cls_013"><span class="cls_013">0000 1111 2222</span></div>
<div style="position:absolute;left:113.40px;top:307.44px" class="cls_012"><span class="cls_012">Date of Birth</span></div>
<div style="position:absolute;left:311.40px;top:305.94px" class="cls_013"><span class="cls_013">'.$a->dob.'</span></div>
<div style="position:absolute;left:113.40px;top:322.62px" class="cls_012"><span class="cls_012">Place of Birth</span></div>
<div style="position:absolute;left:311.40px;top:322.62px" class="cls_013"><span class="cls_013">'.$a->addre.'</span></div>
<div style="position:absolute;left:113.40px;top:337.74px" class="cls_012"><span class="cls_012">Country of Birth</span></div>
<div style="position:absolute;left:311.40px;top:337.74px" class="cls_013"><span class="cls_013">India</span></div>
<div style="position:absolute;left:113.40px;top:352.92px" class="cls_012"><span class="cls_012">Name of Mother</span></div>
<div style="position:absolute;left:311.40px;top:352.92px" class="cls_013"><span class="cls_013">'.$a->mn.'</span></div>
<div style="position:absolute;left:113.40px;top:368.04px" class="cls_012"><span class="cls_012">Name of Father</span></div>
<div style="position:absolute;left:311.40px;top:368.04px" class="cls_013"><span class="cls_013">'.$a->fn.'</span></div>
<div style="position:absolute;left:113.40px;top:383.22px" class="cls_012"><span class="cls_012">Date of Registration</span></div>
<div style="position:absolute;left:311.40px;top:381.72px" class="cls_013"><span class="cls_013">'.$a->updated_at.'</span></div>
<div style="position:absolute;left:113.40px;top:398.34px" class="cls_012"><span class="cls_012">Registration Details</span></div>
<div style="position:absolute;left:170.34px;top:412.98px" class="cls_012"><span class="cls_012">Registration No</span></div>
<div style="position:absolute;left:311.40px;top:412.98px" class="cls_013"><span class="cls_013">'.$a->id.'</span></div>
<div style="position:absolute;left:213.72px;top:427.68px" class="cls_012"><span class="cls_012">File No</span></div>
<div style="position:absolute;left:311.40px;top:427.68px" class="cls_013"><span class="cls_013">12</span></div>
<div style="position:absolute;left:208.32px;top:442.32px" class="cls_012"><span class="cls_012">Page No</span></div>
<div style="position:absolute;left:311.40px;top:442.32px" class="cls_013"><span class="cls_013">1240</span></div>
<div style="position:absolute;left:113.40px;top:457.44px" class="cls_012"><span class="cls_012">Address of parents at the time of</span></div>
<div style="position:absolute;left:311.40px;top:486.72px" class="cls_007"><span class="cls_007">Gujarat, INDIA.</span></div>
<div style="position:absolute;left:311.40px;top:501.42px" class="cls_007"><span class="cls_007">PIN: </span><span class="cls_013">360013</span></div>
<div style="position:absolute;left:413.82px;top:590.34px" class="cls_015"><span class="cls_015">Issuing Authority</span></div>
<div style="position:absolute;left:236.11px;top:615.78px" class="cls_016"><span class="cls_016">Office Seal/stamp should be</span></div>
<div style="position:absolute;left:404.89px;top:615.78px" class="cls_016"><span class="cls_016">MRO/Issuing Authority</span></div>
<div style="position:absolute;left:275.89px;top:629.22px" class="cls_016"><span class="cls_016">In English</span></div>
<div style="position:absolute;left:403.94px;top:629.22px" class="cls_016"><span class="cls_016">Stamp/Seal should be in</span></div>
<div style="position:absolute;left:405.32px;top:642.66px" class="cls_016"><span class="cls_016">English and should include</span></div>
<div style="position:absolute;left:405.32px;top:656.10px" class="cls_016"><span class="cls_016">His name below his signature</span></div>
<div style="position:absolute;left:72.00px;top:669.36px" class="cls_012"><span class="cls_012">Date of Issue: </span><span class="cls_011">'.$a->updated_at.'</span></div>
<div style="position:absolute;left:174.90px;top:764.58px" class="cls_015"><span class="cls_015">Ensure registration of every birth &amp; death within 21 days.</span></div>
</div>



</body></html>';

		require 'pdfcrowd.php';

		// create an API client instance
		//require 'pdfcrowd.php';

		try
		{   
		    // create an API client instance
		    $client = new Pdfcrowd("codeforg", "99be9d11a8407193d3382c7516013e6e");

		    // convert a web page and store the generated PDF into a $pdf variable
		     $pdf = $client->convertHtml($mypdf);


		    // set HTTP response headers
		    header("Content-Type: application/pdf");
		    header("Cache-Control: max-age=0");
		    header("Accept-Ranges: none");
		    header("Content-Disposition: attachment; filename=\"google_com.pdf\"");

		    // send the generated PDF 
		    echo $pdf;
		}
		catch(PdfcrowdException $why)
		{
		    echo "Pdfcrowd Error: " . $why;
		}

		/*$name = $id.".".$a->extension;
    	$file = 'C:\\xampp\\htdocs\\freeshing\\myapp\\public\\images\\pro\\'.$id.".".$a->extension;
    	$header = array(
				        'Content-Type' => 'application/octet-stream',
				        'Content-Disposition' => 'attachment', 
				        'Content-lenght' => filesize($file),
				        'filename' => $name,
				    );
 	   return \Response::download($file, $name, $header);*/
	}

	public function getpdf()
	{
    	$file = "C:\\xampp\\htdocs\\freeshing\\myapp\\public\\main.pdf";
    	$name = "main.pdf";
    	$header = array(
				        'Content-Type' => 'application/octet-stream',
				        'Content-Disposition' => 'attachment', 
				        'Content-lenght' => filesize($file),
				        'filename' => $name,
				    );
 	   return \Response::download($file, $name, $header);
	}
}

?>