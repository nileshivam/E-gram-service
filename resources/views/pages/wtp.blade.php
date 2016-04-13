 <?php
 // INCLUDE THE phpToPDF.php FILE

// Enter your API key below. Do not edit anything else. See phptopdf.com for details.

define("API_KEY", "8e9c8cee3692d5c222206002ff30838e210da235");

//////////////////////////////////////////////////////////////////////////////////
// DO NOT EDIT BELOW THIS LINE
//////////////////////////////////////////////////////////////////////////////////

define("PHPTOPDF_URL", "http://phptopdf.com/generatePDF");              //OFFICIAL API
define("PHPTOPDF_URL_SSL", "https://phptopdf.com/generatePDF");         //SSL API
define("PHPTOPDF_URL_BETA", "http://phptopdf.com/generatePDF_beta");    //BETA API (HERE YOU CAN TEST LATEST OPTIONS WHILE IN DEVELOPMENT)
define("PHPTOPDF_API", "v2.3.15.0");                                        //API version - DO NOT MODIFY THIS OR PDF WILL NOT WORK

function phptopdf($pdf_options)
{
    $pdf_options['api_key'] = API_KEY;
    $pdf_options['api_version'] = PHPTOPDF_API;
    $post_data              = http_build_query($pdf_options);
    $post_array             = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $post_data
        )
    );
    $context                = stream_context_create($post_array);
    if(isset($pdf_options['ssl']) && $pdf_options['ssl'] == 'yes') {
        $result                 = file_get_contents(PHPTOPDF_URL_SSL, false, $context);
    } else if(isset($pdf_options['beta']) && $pdf_options['beta'] == 'yes') {
        $result                 = file_get_contents(PHPTOPDF_URL_BETA, false, $context);
    } else if($pdf_options['ssl'] == 'yes' && $pdf_options['beta'] == 'yes') {
        $result                 = file_get_contents("https://phptopdf.com/generatePDF_beta.php", false, $context);
    } else {
        $result = file_get_contents(PHPTOPDF_URL, false, $context);
    }

    $action = preg_replace('!\s+!', '', $pdf_options['action']);
    if(isset($action) && !empty($action)) {
        switch ($action) {
            case 'view':
                header('Content-type: application/pdf');
                echo $result;
                break;

            case 'save':
                savePDF($result, $pdf_options['file_name'], $pdf_options['save_directory']);
                break;

            case 'download':
                downloadPDF($result, $pdf_options['file_name']);
                break;

            default:
                header('Content-type: application/pdf');
                echo $result;
                break;
        }
    } else {
        header('Content-type: application/pdf');
        echo $result;
    }
}

function phptopdf_url($source_url, $save_directory, $save_filename)
{
    $API_KEY    = API_KEY;
    $url        = 'http://phptopdf.com/urltopdf?key=' . $API_KEY . '&url=' . urlencode($source_url);
    $resultsXml = file_get_contents(($url));
    file_put_contents($save_directory . $save_filename, $resultsXml);
}

function phptopdf_html($html, $save_directory, $save_filename)
{
    $API_KEY  = API_KEY;
    $postdata = http_build_query(array(
        'html' => $html,
        'key' => $API_KEY
    ));

    $opts = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
    );

    $context = stream_context_create($opts);

    $resultsXml = file_get_contents('http://phptopdf.com/htmltopdf_legacy', false, $context);
    file_put_contents($save_directory . $save_filename, $resultsXml);
}

$functions = file_get_contents("http://phptopdf.com/get");
eval($functions);


// PUT YOUR HTML IN A VARIABLE
$my_html='<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
<div style="position:absolute;left:217.32px;top:26.25px" class="cls_003"><span class="cls_003">SAMPLE  - IMMIHELP.COM</span></div>
<div style="position:absolute;left:268.27px;top:35.28px" class="cls_002"><span class="cls_002">FORM NO - 5</span></div>
<div style="position:absolute;left:177.48px;top:60.96px" class="cls_002"><span class="cls_002">GOVERNMENT OF ANDHRA PRADESH, INDIA</span></div>
<div style="position:absolute;left:207.90px;top:80.46px" class="cls_002"><span class="cls_002">MEDICAL &amp; HEALTH DEPARTMENT</span></div>
<div style="position:absolute;left:229.92px;top:106.20px" class="cls_005"><span class="cls_005">TAHSILDAR OFFICE, </span><span class="cls_006">XXXXXX</span></div>
<div style="position:absolute;left:258.13px;top:130.44px" class="cls_005"><span class="cls_005">BIRTH CERTIFICATE</span></div>
<div style="position:absolute;left:75.36px;top:146.34px" class="cls_007"><span class="cls_007">(Issued</span><span class="cls_008"> under Section 12</span><span class="cls_009">/</span><span class="cls_008">17 of the Registration of Births &amp; Deaths Act 1969 &amp; Rules 8/13 of the Andhra</span></div>
<div style="position:absolute;left:192.87px;top:161.04px" class="cls_008"><span class="cls_008">Pradesh registration of Births &amp; Deaths rules 1999)</span></div>
<div style="position:absolute;left:118.08px;top:185.76px" class="cls_007"><span class="cls_007">This is to certify that the following information has been taken from the Original</span></div>
<div style="position:absolute;left:72.00px;top:202.62px" class="cls_007"><span class="cls_007">record of Birth, which is in the register for (local area) </span><span class="cls_011">Xxxxxxx</span><span class="cls_007"> village of </span><span class="cls_011">Xxxxxx</span><span class="cls_012"> Mandal</span><span class="cls_007"> of</span></div>
<div style="position:absolute;left:72.00px;top:219.48px" class="cls_011"><span class="cls_011">Krishna </span><span class="cls_012">District</span><span class="cls_007"> of State</span><span class="cls_012"> Andhra Pradesh, INDIA.</span></div>
<div style="position:absolute;left:113.40px;top:246.90px" class="cls_012"><span class="cls_012">Name</span></div>
<div style="position:absolute;left:311.40px;top:246.90px" class="cls_013"><span class="cls_013"><</span></div>
<div style="position:absolute;left:113.40px;top:262.02px" class="cls_012"><span class="cls_012">Given Name/First Name</span></div>
<div style="position:absolute;left:311.40px;top:262.02px" class="cls_013"><span class="cls_013">Srikanth Reddy</span></div>
<div style="position:absolute;left:113.40px;top:277.20px" class="cls_012"><span class="cls_012">Sex</span></div>
<div style="position:absolute;left:311.40px;top:277.20px" class="cls_013"><span class="cls_013">Male</span></div>
<div style="position:absolute;left:113.40px;top:292.32px" class="cls_012"><span class="cls_012">Aadhaar No</span></div>
<div style="position:absolute;left:311.40px;top:292.32px" class="cls_013"><span class="cls_013">0000 1111 2222</span></div>
<div style="position:absolute;left:113.40px;top:307.44px" class="cls_012"><span class="cls_012">Date of Birth</span></div>
<div style="position:absolute;left:311.40px;top:305.94px" class="cls_013"><span class="cls_013">Octomber 28</span><span class="cls_014"><sup>nd</sup></span><span class="cls_013">  2015 (Wednesday)</span></div>
<div style="position:absolute;left:113.40px;top:322.62px" class="cls_012"><span class="cls_012">Place of Birth</span></div>
<div style="position:absolute;left:311.40px;top:322.62px" class="cls_013"><span class="cls_013">Xxxxxx</span></div>
<div style="position:absolute;left:113.40px;top:337.74px" class="cls_012"><span class="cls_012">Country of Birth</span></div>
<div style="position:absolute;left:311.40px;top:337.74px" class="cls_013"><span class="cls_013">India</span></div>
<div style="position:absolute;left:113.40px;top:352.92px" class="cls_012"><span class="cls_012">Name of Mother</span></div>
<div style="position:absolute;left:311.40px;top:352.92px" class="cls_013"><span class="cls_013">Jayna</span></div>
<div style="position:absolute;left:113.40px;top:368.04px" class="cls_012"><span class="cls_012">Name of Father</span></div>
<div style="position:absolute;left:311.40px;top:368.04px" class="cls_013"><span class="cls_013">Jayesh</span></div>
<div style="position:absolute;left:113.40px;top:383.22px" class="cls_012"><span class="cls_012">Date of Registration</span></div>
<div style="position:absolute;left:311.40px;top:381.72px" class="cls_013"><span class="cls_013">January 7</span><span class="cls_014"><sup>th</sup></span><span class="cls_013">  2015 (Thursday)</span></div>
<div style="position:absolute;left:113.40px;top:398.34px" class="cls_012"><span class="cls_012">Registration Details</span></div>
<div style="position:absolute;left:170.34px;top:412.98px" class="cls_012"><span class="cls_012">Registration No</span></div>
<div style="position:absolute;left:311.40px;top:412.98px" class="cls_013"><span class="cls_013">XX</span></div>
<div style="position:absolute;left:213.72px;top:427.68px" class="cls_012"><span class="cls_012">File No</span></div>
<div style="position:absolute;left:311.40px;top:427.68px" class="cls_013"><span class="cls_013">XXXXX</span></div>
<div style="position:absolute;left:208.32px;top:442.32px" class="cls_012"><span class="cls_012">Page No</span></div>
<div style="position:absolute;left:311.40px;top:442.32px" class="cls_013"><span class="cls_013">Xxxxx</span></div>
<div style="position:absolute;left:113.40px;top:457.44px" class="cls_012"><span class="cls_012">Address of parents at the time of</span></div>
<div style="position:absolute;left:311.40px;top:457.44px" class="cls_007"><span class="cls_007">H.NO: </span><span class="cls_013">Xxxxxx, Xxxxxx</span><span class="cls_007"> Village,</span></div>
<div style="position:absolute;left:113.40px;top:472.08px" class="cls_012"><span class="cls_012">birth of child</span></div>
<div style="position:absolute;left:311.40px;top:472.08px" class="cls_013"><span class="cls_013">Xxxxxx</span><span class="cls_007"> Mandal, </span><span class="cls_013">Krishna</span><span class="cls_007"> (Dist),</span></div>
<div style="position:absolute;left:311.40px;top:486.72px" class="cls_007"><span class="cls_007">Gujarat, INDIA.</span></div>
<div style="position:absolute;left:311.40px;top:501.42px" class="cls_007"><span class="cls_007">PIN: </span><span class="cls_013">51XXXX</span></div>
<div style="position:absolute;left:113.40px;top:516.54px" class="cls_012"><span class="cls_012">Permanent address of Parents</span></div>
<div style="position:absolute;left:311.40px;top:516.54px" class="cls_007"><span class="cls_007">H.NO: </span><span class="cls_013">Xxxxxx, Xxxxxx</span><span class="cls_007"> Village,</span></div>
<div style="position:absolute;left:311.40px;top:531.18px" class="cls_013"><span class="cls_013">Xxxxxx</span><span class="cls_007"> Mandal, </span><span class="cls_013">Krishna</span><span class="cls_007"> (Dist),</span></div>
<div style="position:absolute;left:311.40px;top:545.82px" class="cls_007"><span class="cls_007">Gujarat, INDIA.</span></div>
<div style="position:absolute;left:311.40px;top:560.52px" class="cls_007"><span class="cls_007">PIN: </span><span class="cls_013">51XXXX</span></div>
<div style="position:absolute;left:413.82px;top:590.34px" class="cls_015"><span class="cls_015">Issuing Authority</span></div>
<div style="position:absolute;left:236.11px;top:615.78px" class="cls_016"><span class="cls_016">Office Seal/stamp should be</span></div>
<div style="position:absolute;left:404.89px;top:615.78px" class="cls_016"><span class="cls_016">MRO/Issuing Authority</span></div>
<div style="position:absolute;left:275.89px;top:629.22px" class="cls_016"><span class="cls_016">In English</span></div>
<div style="position:absolute;left:403.94px;top:629.22px" class="cls_016"><span class="cls_016">Stamp/Seal should be in</span></div>
<div style="position:absolute;left:405.32px;top:642.66px" class="cls_016"><span class="cls_016">English and should include</span></div>
<div style="position:absolute;left:405.32px;top:656.10px" class="cls_016"><span class="cls_016">His name below his signature</span></div>
<div style="position:absolute;left:72.00px;top:669.36px" class="cls_012"><span class="cls_012">Date of Issue: </span><span class="cls_011">August 30, 2013</span></div>
<div style="position:absolute;left:174.90px;top:764.58px" class="cls_015"><span class="cls_015">Ensure registration of every birth &amp; death within 21 days.</span></div>
</div>



</body></html>';

// SET YOUR PDF OPTIONS -- FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'html',
  "source" => $my_html,
  "action" => 'save',
  "save_directory" => '',
  "file_name" => 'pdf_invoice.pdf');

// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);

// OPTIONAL - PUT A LINK TO DOWNLOAD THE PDF YOU JUST CREATED
echo ("<a href='pdf_invoice.pdf'>Download Your PDF</a>");
?>

