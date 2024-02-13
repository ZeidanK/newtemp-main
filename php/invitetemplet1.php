<?php  //old template out dated might need some shit from here so keeping it for now
if(isset($_GET['client'])&&isset($_GET['guest'])){

  include "connection.php";
  $ClientSlug=$_GET['client'];
  $GuestSlug=$_GET['guest'];
  $Guestsql="select * from $ClientSlug WHERE slug='$GuestSlug'";
  $Guestresult=mysqli_query($conn,$Guestsql);
  $Guestrow=mysqli_fetch_array($Guestresult);
  $Clientsql= "select * from clientlist WHERE slug='$ClientSlug'";
  $Clientresult=mysqli_query($conn,$Clientsql);
  $Clientrow=mysqli_fetch_array($Clientresult);
  $result = $conn->query($Clientsql);
          if(!$result){
            die("Invalid query!");
          }
  $query = "UPDATE $ClientSlug SET visitcount = visitcount + 1 WHERE slug='$GuestSlug'";
  $execute= $conn1->query($query);

}


?>



<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="مرحب <?php 

echo "$Guestrow[fullname]" ;


          ?>  يسرنا دعوتكم لحفل زفاف ث">    <meta name="description" content="">
    <title>Page 4</title>
    <link rel="stylesheet" href="../css/nicepage.css" media="screen">
<link rel="stylesheet" href="../css/Page-4.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.2.1, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    
    
    
    
    
    
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/default-logo.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Page 4">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-header" id="sec-f0d1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><div class="u-clearfix u-sheet u-sheet-1">
        <a href="https://nicepage.com" class="u-image u-logo u-image-1">
          <img src="images/default-logo.png" class="u-logo-image u-logo-image-1">
        </a>
      </div></header>
    <section class="u-clearfix u-custom-color-1 u-section-1" id="sec-13f1">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-align-center u-custom-font u-font-courier-new u-text u-text-default u-text-1">
        <span class="u-text-palette-1-base">مرحب "<?php echo "$Guestrow[fullname]" ;?>" يسرنا دعوتكم</span>
          <br>
          <span class="u-text-palette-1-base">لحفل زفاف "<?php echo "$Clientrow[fullname]" ;?> "</span>
      </h1>
      </div>
    </section>
    <section class="u-clearfix u-custom-color-1 u-section-2" id="sec-65fa">
    <div class="u-clearfix u-sheet u-valign-bottom u-sheet-1">
        <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($Clientrow['inviteimg']); ?>"data-image-width="400" data-image-height="265">
      </div>
    </section>
    <section class="u-clearfix u-custom-color-1 u-section-3" id="sec-e5a3">
      <div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-text u-text-1">ماذا بدك توكل؟&nbsp;</p>
        <a href="https://nicepage.com/one-page-template" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius u-btn-1">Button1</a>
        <a href="https://google.com/one-page-template" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius u-btn-2">Button2</a>
      </div>
    </section>
    <section class="u-clearfix u-palette-2-light-2 u-section-4" id="sec-807b">
      <div class="u-clearfix u-sheet u-sheet-1">
        <a href=""class="u-border-2 u-border-custom-color-4 u-border-hover-custom-color-4 u-btn u-btn-round u-button-style u-hover-custom-color-4 u-none u-radius u-text-hover-black u-text-palette-3-dark-3 u-btn-1">الاعتذار من الحضور</a>
        <a href=""class="u-border-2 u-border-active-custom-color-5 u-border-custom-color-5 u-border-hover-custom-color-5 u-btn u-btn-round u-button-style u-hover-custom-color-5 u-none u-radius u-text-hover-black u-text-palette-3-dark-3 u-btn-2">تاكيد الحضور</a>
      </div>
    </section>
    <body style="text-align:center;"> 
      
    <h1 style="color:green;"> 
        GeeksforGeeks 
    </h1> 
      
    <h4> 
        How to call PHP function 
        on the click of a Button ? 
    </h4> 
      
    <?php
        if(array_key_exists('button1', $_POST)) { 
            
            $query = "UPDATE $ClientSlug SET attendance = b'0' WHERE slug='$GuestSlug'";
            button1($conn1,$query); 

        } 
        else if(array_key_exists('button2', $_POST)) { 
             
            $query1 = "UPDATE $ClientSlug SET attendance = b'1' WHERE slug='$GuestSlug'";
            button2($conn1,$query1);

        } 
        function button1($conn1,$query) { 
            $execute= $conn1->query($query);
            echo "This is Button1 that is selected"; 
                    } 
        function button2($conn1,$query1) {
             $execute= $conn1->query($query1);
            echo "This is Button2 that is selected"; 
                    } 
    ?> 
  
    <form method="post"> 
    <section class="u-clearfix u-palette-2-light-2 u-section-4" id="sec-807b">
      <div class="u-clearfix u-sheet u-sheet-1">
        <input type="submit" name="button1"
        class="u-border-2 u-border-custom-color-4 u-border-hover-custom-color-4 u-btn u-btn-round u-button-style u-hover-custom-color-4 u-none u-radius u-text-hover-black u-text-palette-3-dark-3 u-btn-1"value="الاعتذار من الحضور" /> 
          
        <input type="submit" name="button2"
                class="u-border-2 u-border-active-custom-color-5 u-border-custom-color-5 u-border-hover-custom-color-5 u-btn u-btn-round u-button-style u-hover-custom-color-5 u-none u-radius u-text-hover-black u-text-palette-3-dark-3 u-btn-2" value="تاكيد الحضور" /> 
                </div>
    </section>
            </form> 
</body> 
  
</html> 
    <section class="u-align-center u-clearfix u-section-5" id="sec-7042">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h2 class="u-text u-text-default u-text-1"> COMING SOON</h2>
        <p class="u-large-text u-text u-text-variant u-text-2">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
        <div class="u-countdown u-countdown-1" data-target-date="Thu, 16 Dec 2024 13:41:00 GMT" data-type="to-date" data-for="per-visitor" data-time-left="25d" data-timer-id="dfea" data-target-number="100" data-direction="down" data-start-time="Fri Nov 26 2021 16:40:08 GMT+0300 (Москва, стандартное время)" data-frequency="10s" data-after-count="none" data-redirect-url="https://">
          <div class="u-countdown-wrapper u-spacing-40">
            <div class="u-countdown-item u-countdown-years u-hidden u-spacing-15 u-countdown-item-1">
              <div class="u-countdown-counter u-spacing-2 u-countdown-counter-1"><div class="u-countdown-number">0</div><div class="u-countdown-number u-hidden">0</div></div>
              <div class="u-countdown-label u-text-grey-50 u-countdown-label-1">Years</div>
            </div>
            <div class="u-countdown-separator u-hidden u-countdown-separator-1"></div>
            <div class="u-countdown-days u-countdown-item u-spacing-15 u-countdown-item-2">
              <div class="u-countdown-counter u-spacing-2 u-countdown-counter-2"><div class="u-countdown-number">2</div><div class="u-countdown-number">5</div><div class="u-countdown-number u-hidden">0</div></div>
              <div class="u-countdown-label u-text-grey-50 u-countdown-label-2">Days</div>
            </div>
            <div class="u-countdown-separator u-countdown-separator-2"></div>
            <div class="u-countdown-hours u-countdown-item u-spacing-15 u-countdown-item-3">
              <div class="u-countdown-counter u-spacing-2 u-countdown-counter-3"><div class="u-countdown-number">0</div><div class="u-countdown-number">0</div></div>
              <div class="u-countdown-label u-text-grey-50 u-countdown-label-3">Hours</div>
            </div>
            <div class="u-countdown-separator u-countdown-separator-3"></div>
            <div class="u-countdown-item u-countdown-minutes u-spacing-15 u-countdown-item-4">
              <div class="u-countdown-counter u-spacing-2 u-countdown-counter-4"><div class="u-countdown-number">0</div><div class="u-countdown-number">0</div></div>
              <div class="u-countdown-label u-text-grey-50 u-countdown-label-4">Minutes</div>
            </div>
            <div class="u-countdown-separator u-countdown-separator-4"></div>
            <div class="u-countdown-item u-countdown-seconds u-spacing-15 u-countdown-item-5">
              <div class="u-countdown-counter u-spacing-2 u-countdown-counter-5"><div class="u-countdown-number">0</div><div class="u-countdown-number">0</div></div>
              <div class="u-countdown-label u-text-grey-50 u-countdown-label-5">Seconds</div>
            </div>
            <div class="u-countdown-separator u-hidden u-countdown-separator-5"></div>
            <div class="u-countdown-item u-countdown-numbers u-hidden u-spacing-15 u-countdown-item-6">
              <div class="u-countdown-counter u-spacing-2 u-countdown-counter-6"><div class="u-countdown-number">0</div><div class="u-countdown-number">0</div><div class="u-countdown-number">1</div><div class="u-countdown-number">0</div><div class="u-countdown-number">0</div></div>
              <div class="u-countdown-label u-text-grey-50 u-countdown-label-6">Items</div>
            </div>
          </div>
          <div class="u-countdown-message u-hidden">
            <p>Sorry, the time is up.</p>
          </div>
        </div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-grey-5 u-section-6" id="sec-4d93">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-text u-text-default u-text-1">ارسال رساله ل</h1>
        <div class="u-form u-form-1">
          <form action="guestmsg.php?guest={$row['slug']}&client={$row['clientslug']}" method=post>
            <div>
              <!--<label for="message-3b9a" class="u-label"></label>-->
              <textarea placeholder="اضافه رساله " rows="4" cols="50"  name="text"></textarea><br /> 
            </div>
            <div class="u-align-center u-form-group u-form-submit">
              <a href="guestmsg.php?guest={'GuestSlug'}&client={'ClientSlug'}" class="u-border-2 u-border-black u-btn u-btn-rectangle u-btn-submit u-button-style u-none u-btn-1">ارسال</a>
              <input type="submit">
            </div>
            <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
            <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
            <input type="hidden" value="" name="recaptchaResponse">
            <input type="hidden" name="formServices" value="dcfdfb5a-6c42-8212-d990-bcf56f7bdd1b">
          </form>
        </div>
      </div>
    </section>
    <?php

    function updateguestmsg($ClientSlug,$GuestSlug,$_POST1,$conn1)
        {
            $query1 = "UPDATE $ClientSlug SET msgfromguest = $_POST1 WHERE slug='$GuestSlug'";
            $execute= $conn1->query($query1);


        }
        

       
  

        



?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="مرحب <?php 

echo "$Guestrow[fullname]" ;
echo $_POST["message"];

          ?>  يسرنا دعوتكم لحفل زفاف ث"> 
    <section class="u-clearfix u-custom-color-1 u-section-7" id="sec-5ce1">
      <div class="u-clearfix u-sheet u-sheet-1"></div>
    </section>
    <section class="u-clearfix u-palette-2-base u-section-8" id="carousel_34a4">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="data-layout-selected u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                <h3 class="u-text u-text-default u-text-1">Address</h3>
                  <div class="custom-expanded u-align-left u-border-2 u-border-grey-75 u-container-style u-group u-radius u-shape-round u-group-1">
                    <div class="u-container-layout u-container-layout-2"><span class="u-icon u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 54.757 54.757" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-e83a"></use></svg><svg class="u-svg-content" viewBox="0 0 54.757 54.757" x="0px" y="0px" id="svg-e83a" style="enable-background:new 0 0 54.757 54.757;"><g><path d="M27.557,12c-3.859,0-7,3.141-7,7s3.141,7,7,7s7-3.141,7-7S31.416,12,27.557,12z M27.557,24c-2.757,0-5-2.243-5-5
		s2.243-5,5-5s5,2.243,5,5S30.314,24,27.557,24z"></path><path d="M40.94,5.617C37.318,1.995,32.502,0,27.38,0c-5.123,0-9.938,1.995-13.56,5.617c-6.703,6.702-7.536,19.312-1.804,26.952
		L27.38,54.757L42.721,32.6C48.476,24.929,47.643,12.319,40.94,5.617z M41.099,31.431L27.38,51.243L13.639,31.4
		C8.44,24.468,9.185,13.08,15.235,7.031C18.479,3.787,22.792,2,27.38,2s8.901,1.787,12.146,5.031
		C45.576,13.08,46.321,24.468,41.099,31.431z"></path>
</g></svg></span>
                      <h5 class="u-text u-text-2"> زيمر الشارع الروء</h5>
                    </div>
                  </div>
                  <h3 class="u-text u-text-default u-text-3">Online</h3>
                  <div class="u-border-2 u-border-grey-75 u-container-style u-expanded-width u-group u-radius u-shape-round u-group-2">
                    <div class="u-container-layout u-container-layout-3"><span class="u-align-left u-icon u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 60 60" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-3da3"></use></svg><svg class="u-svg-content" viewBox="0 0 60 60" x="0px" y="0px" id="svg-3da3" style="enable-background:new 0 0 60 60;"><g><path d="M42.595,0H17.405C14.977,0,13,1.977,13,4.405v51.189C13,58.023,14.977,60,17.405,60h25.189C45.023,60,47,58.023,47,55.595
		V4.405C47,1.977,45.023,0,42.595,0z M15,8h30v38H15V8z M17.405,2h25.189C43.921,2,45,3.079,45,4.405V6H15V4.405
		C15,3.079,16.079,2,17.405,2z M42.595,58H17.405C16.079,58,15,56.921,15,55.595V48h30v7.595C45,56.921,43.921,58,42.595,58z"></path><path d="M30,49c-2.206,0-4,1.794-4,4s1.794,4,4,4s4-1.794,4-4S32.206,49,30,49z M30,55c-1.103,0-2-0.897-2-2s0.897-2,2-2
		s2,0.897,2,2S31.103,55,30,55z"></path><path d="M26,5h4c0.553,0,1-0.447,1-1s-0.447-1-1-1h-4c-0.553,0-1,0.447-1,1S25.447,5,26,5z"></path><path d="M33,5h1c0.553,0,1-0.447,1-1s-0.447-1-1-1h-1c-0.553,0-1,0.447-1,1S32.447,5,33,5z"></path><path d="M56.612,4.569c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414c3.736,3.736,3.736,9.815,0,13.552
		c-0.391,0.391-0.391,1.023,0,1.414c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293
		C61.128,16.434,61.128,9.085,56.612,4.569z"></path><path d="M52.401,6.845c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414c1.237,1.237,1.918,2.885,1.918,4.639
		s-0.681,3.401-1.918,4.638c-0.391,0.391-0.391,1.023,0,1.414c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293
		c1.615-1.614,2.504-3.764,2.504-6.052S54.017,8.459,52.401,6.845z"></path><path d="M4.802,5.983c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0c-4.516,4.516-4.516,11.864,0,16.38
		c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414
		C1.065,15.799,1.065,9.72,4.802,5.983z"></path><path d="M9.013,6.569c-0.391-0.391-1.023-0.391-1.414,0c-1.615,1.614-2.504,3.764-2.504,6.052s0.889,4.438,2.504,6.053
		c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414
		c-1.237-1.237-1.918-2.885-1.918-4.639S7.775,9.22,9.013,7.983C9.403,7.593,9.403,6.96,9.013,6.569z"></path>
</g></svg></span>
                      <h5 class="u-align-left u-text u-text-4">+1 123 444 55 66</h5><span class="u-icon u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 60 60" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-9fcb"></use></svg><svg class="u-svg-content" viewBox="0 0 60 60" x="0px" y="0px" id="svg-9fcb" style="enable-background:new 0 0 60 60;"><g><path d="M38.914,0H6.5v60h47V14.586L38.914,0z M39.5,3.414L50.086,14H39.5V3.414z M8.5,58V2h29v14h14v42H8.5z"></path><path d="M42.5,21h-16c-0.552,0-1,0.447-1,1s0.448,1,1,1h16c0.552,0,1-0.447,1-1S43.052,21,42.5,21z"></path><path d="M22.875,18.219l-4.301,3.441l-1.367-1.367c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414l2,2
		C17.987,23.901,18.243,24,18.5,24c0.22,0,0.441-0.072,0.624-0.219l5-4c0.432-0.346,0.501-0.975,0.156-1.406
		C23.936,17.943,23.306,17.874,22.875,18.219z"></path><path d="M42.5,32h-16c-0.552,0-1,0.447-1,1s0.448,1,1,1h16c0.552,0,1-0.447,1-1S43.052,32,42.5,32z"></path><path d="M22.875,29.219l-4.301,3.441l-1.367-1.367c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414l2,2
		C17.987,34.901,18.243,35,18.5,35c0.22,0,0.441-0.072,0.624-0.219l5-4c0.432-0.346,0.501-0.975,0.156-1.406
		C23.936,28.943,23.306,28.874,22.875,29.219z"></path><path d="M42.5,43h-16c-0.552,0-1,0.447-1,1s0.448,1,1,1h16c0.552,0,1-0.447,1-1S43.052,43,42.5,43z"></path><path d="M22.875,40.219l-4.301,3.441l-1.367-1.367c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414l2,2
		C17.987,45.901,18.243,46,18.5,46c0.22,0,0.441-0.072,0.624-0.219l5-4c0.432-0.346,0.501-0.975,0.156-1.406
		C23.936,39.943,23.306,39.874,22.875,40.219z"></path>
</g></svg></span>
                      <h5 class="u-text u-text-5">info@sample.com</h5>
                    </div>
                  </div>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-4">
                  <h3 class="u-text u-text-default u-text-6">On a Map</h3>
                  <div class="u-expanded-width u-grey-light-2 u-map u-map-1">
                    <div class="embed-responsive">
                      <iframe class="embed-responsive-item" src="https://maps.google.com/maps?output=embed&amp;q=Manhattan%2C%20New%20York&amp;z=10&amp;t=m" data-map="JTdCJTIyYWRkcmVzcyUyMiUzQSUyMk1hbmhhdHRhbiUyQyUyME5ldyUyMFlvcmslMjIlMkMlMjJ6b29tJTIyJTNBMTAlMkMlMjJ0eXBlSWQlMjIlM0ElMjJyb2FkJTIyJTJDJTIybGFuZyUyMiUzQW51bGwlMkMlMjJhcGlLZXklMjIlM0FudWxsJTJDJTIybWFya2VycyUyMiUzQSU1QiU1RCU3RA=="></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-palette-2-base u-section-9" id="sec-db7d">
      <div class="u-clearfix u-sheet u-sheet-1"></div>
    </section>
    <section class="u-clearfix u-section-10" id="sec-4094">
      <div class="u-clearfix u-sheet u-sheet-1"></div>
    </section>
    
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-65bc"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Sample text. Click to select the Text Element.</p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
        <span>Website Templates</span>
      </a>
      <p class="u-text">
        <span>created with</span>
      </p>
      <a class="u-link" href="" target="_blank">
        <span>Website Builder Software</span>
      </a>. 
    </section>
  
</body></html>