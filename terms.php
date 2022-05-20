<?php

include("path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Terms of Use";

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include(ROOT_PATH . "/includes/head.php"); ?>

  <link rel="stylesheet" href="<?php echo BASE_URL . '/css/main.css' ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . '/css/other.css' ?>">

</head>

<body>

  <?php include(ROOT_PATH . "/includes/header.php"); ?>

    <main>
        
        <div class="serve">
            <div class="container">
                <div class="left">
                    <h1>Terms of Use</h1>
                    <p> <br>
                    This site provides access to resources of <?php echo $companyRealName; ?> and is protected by International copyright law.
                </div>
                
                <div style="background-image: url(img/privacy.jpg)" class="right"></div>
                
            </div>
        </div>
        
        <div class="personal">
            
            <div class="below">
                
                <h4>1. <?php echo $companyName; ?> Website Terms of Use</h4>

                <p> 
                    <li>
                    <br> <br> You understand and agree that the contents of this website include all audio, video, graphics, images and textual materials, downloadable files, pdfs, Microsoft word, etc. All contents are protected by International copyright law. None of the contents on this website shall be used for any commercial purposes without the written consent of <?php echo $companyName; ?>.

                    <br> <br> You acknowledge and agree that the Service and any necessary software used in connection with the Service contain proprietary and confidential information that is protected by applicable intellectual property and other laws. You further acknowledge and agree that the contents of sponsored advertisements or information presented to you through the Service or advertisers is protected by copyrights, trademarks, service marks, patents or other proprietary rights and laws. Except as expressly authorized by <?php echo $companyName; ?>, you agree not to modify, rent, lease, loan, sell, distribute or create derivative works based on the Service or the Software, in whole or in part. <?php echo $companyName; ?> Limited grants you a personal, non-transferable and non-exclusive right and licence to use the contents of the site; provided that you do so within the ambit of the Terms Of Service.

                    <br> <br> In addition, when using particular <?php echo $companyName; ?> services, you and <?php echo $companyName; ?> Limited shall be subject to any posted guidelines or rules applicable to such services, which may be posted from time to time. All such guidelines or rules are hereby incorporated by reference into the Terms Of Service.

    
                    </li>
                </p>

                <a> DESCRIPTION OF SERVICE </a>
                <div> 
                
                    <li>
                    <?php echo $companyName; ?> website provides you with access to resources that are rich in content concerning the Bank and its services. You understand and agree that the Service is provided “AS-IS” and that <?php echo $companyName; ?> assumes no responsibility for the timeliness, deletion, or failure to store any user communications. You are responsible for obtaining access to the Service and that access may involve third party fees (such as Internet service provider or airtime charges). You are responsible for those fees.
                    </li>
                
                </div>

                <a> REQUIREMENT FOR FILLING ONLINE FORM </a>
                <div> 
                
                    <li>
                    In consideration of your use of the Service, you agree to: provide true, accurate, current and complete information about yourself as indicated in the form’s section. If you provide any information that is untrue, inaccurate, not current or incomplete, or <?php echo $companyName; ?> Limited has a reasonable ground to suspect that such information is untrue, inaccurate, not current, or incomplete, <?php echo $companyName; ?> has the right to delete your form data from our server
                    </li>
                
                </div>

                <a> WEB ACCOUNT OPENING </a>
                <div> 
                
                    <li>
                    Your initiation of the web account opening process does not automatically guarantee that the account(s) will be opened on your behalf. You agree that the account opening will be subject to the Bank’s processes and reviews which may require you to provide further confirmation or documents. You agree to comply with the standard account opening documentation requirements and to meet KYC requirements as may be stipulated by <?php echo $companyName; ?>. <?php echo $companyName; ?> reserves the right to accept or reject your application.
                    </li>
                
                </div>

                <a> INDEMNITY </a>
                <div> 
                
                    <li>
                    You agree to indemnify and hold <?php echo $companyName; ?>, and its subsidiaries, affiliates, officers, agents, co-branders or other partners, and employees, harmless from any claim or demand, including reasonable attorneys’ fees, made by any third party due to or arising out of any matter you submit, post, transmit or make available through the Service, your use of the Service, your connection to the Service, your violation of the Terms Of Service, or your violation of any rights of another.
                    </li>
                
                </div>

                <a> LIMITATION OF LIABILITY </a>
                <div> 
                
                    <li>
                    You expressly understand and agree that <?php echo $companyName; ?> shall not be liable for any direct, indirect, incidental, special, consequential or exemplary damages, including but not limited to, damages for loss of profits, goodwill, use, data or other intangible losses (even if <?php echo $companyName; ?> has been advised of the possibility of such damages) resulting from:
                        <br> <br> The use or the inability to use the service;
                        <br> <br> The cost of procurement of substitute goods and services resulting from any goods, data, information or services purchased or obtained or messages received or transactions entered into through or from the service;
                        <br> <br> Unauthorized access to or alteration of your transmissions or data;
                        <br> <br> Statements or conduct of any third party on the service; or
                        <br> <br> Any other matter relating to the service.
                    </li>
                
                </div>

                <a> COPYRIGHTS </a>
                <div> 
                
                    <li>
                    <?php echo $companyName; ?> respects the intellectual property of others, and we ask our customers to do the same. If you believe that your work has been copied in a way that constitutes copyright infringement, or your intellectual property rights have been otherwise violated, please provide <?php echo $companyName; ?>’s Webmaster the following information:
                      
                        <br> <br> An electronic or physical signature of the person authorized to act on behalf of the owner of the copyright or other intellectual property interest;
                        <br> <br> A description of the copyrighted work or other intellectual property that you claim has been infringed;
                        <br> <br> A description of where the material that you claim is infringing is located on the site;
                        <br> <br> Your address, telephone number, and e-mail address;
                        <br> <br> A statement by you that you have a good faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law;
                        <br> <br> A statement by you, made under penalty of perjury, that the above information in your Notice is accurate and that you are the copyright or intellectual property owner or authorized to act on the copyright or intellectual property owner’s behalf.

                    </li>
                
                </div>

                <a> GENERAL INFORMATION </a>
                <div> 
                
                    <li>
                    The Terms of Service constitute the entire agreement between you and <?php echo $companyName; ?> and govern your use of the Service, superseding any prior agreements between you and <?php echo $companyName; ?>. You also may be subject to additional terms and conditions that may apply when you use affiliate services, third-party matter or third-party software. The Terms of Service and the relationship between you and <?php echo $companyName; ?> shall be governed by the laws of the United Kingdom without regard to its conflict of law provisions. You and <?php echo $companyName; ?> agree to submit to the personal and exclusive jurisdiction of the courts located within the United Kingdom. The failure of <?php echo $companyName; ?> to exercise or enforce any right or provision of the Terms of Service shall not constitute a waiver of such right or provision or prevent a subsequent enforcement of that or any other right or provision. If any provision of the Terms of Service is found by a court of competent jurisdiction to be invalid, the parties nevertheless agree that the court should endeavour to give effect to the parties’ intentions as reflected in the provision, and that all the provisions of the Terms Of Service shall remain in full force and effect. You agree that regardless of any provision of any statute or law to the contrary, any claim or cause of action arising out of or related to use of the Service or the Terms of Service must be filed within one (1) year after such claim or cause of action arose or be forever barred and extinguished.
                    </li>
                
                </div>
            </div>
        </div>
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
    
</body>


</html>