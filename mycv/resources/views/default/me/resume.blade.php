<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Resume/CV Design</title>
    <link rel="stylesheet" href="{{ asset('about/css/fontawesome/css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('about/css/style.css') }}">
</head>
<body>

<div class="resume">
   <div class="resume_left">
     <div class="resume_profile">
       {{-- <img src="{{ asset('about/images/me.png') }}" alt="profile_pic"> --}}
     </div>
     <div class="resume_content">
       <div class="resume_item resume_info">
         <div class="title">
           <p class="bold">LY KIM THANG</p>
           <p class="regular">Web developer</p>
         </div>
         <ul>
           <li>
             <div class="icon">
               <i class="fas fa-map-signs"></i>
             </div>
             <div class="data">
               quận 11, TPHCM
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fas fa-mobile-alt"></i>
             </div>
             <div class="data">
               +84-935367318
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fas fa-envelope"></i>
             </div>
             <div class="data">
               lykimthang22@gmail.com
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fab fa-weebly"></i>
             </div>
             <div class="data">
               www.thanginfo.com
             </div>
           </li>
         </ul>
       </div>
       <div class="resume_item resume_skills">
         <div class="title">
           <p class="bold">skill's</p>
         </div>
         <ul>
           <li>
             <div class="skill_name">
               HTML
             </div>
             <div class="skill_progress">
               <span style="width: 80%;"></span>
             </div>
             <div class="skill_per">80%</div>
           </li>
           <li>
             <div class="skill_name">
               CSS
             </div>
             <div class="skill_progress">
               <span style="width: 70%;"></span>
             </div>
             <div class="skill_per">70%</div>
           </li>
           <li>
             <div class="skill_name">
               PHP
             </div>
             <div class="skill_progress">
               <span style="width: 40%;"></span>
             </div>
             <div class="skill_per">70%</div>
           </li>
           <li>
             <div class="skill_name">
               JS
             </div>
             <div class="skill_progress">
               <span style="width: 60%;"></span>
             </div>
             <div class="skill_per">60%</div>
           </li>
           <li>
             <div class="skill_name">
               JQUERY
             </div>
             <div class="skill_progress">
               <span style="width: 68%;"></span>
             </div>
             <div class="skill_per">68%</div>
           </li>
         </ul>
       </div>
       <div class="resume_item resume_skills">
        <div class="title">
          <p class="bold">language</p>
        </div>
        <ul>
          <li>
            <div class="skill_name">
              Chinese
            </div>
            <div class="skill_progress">
              <span style="width: 80%;"></span>
            </div>
            <div class="skill_per">80%</div>
          </li>
          <li>
            <div class="skill_name">
              English
            </div>
            <div class="skill_progress">
              <span style="width: 60%;"></span>
            </div>
            <div class="skill_per">70%</div>
          </li>
          <li>
            <div class="skill_name">
              Japanese
            </div>
            <div class="skill_progress">
              <span style="width: 30%;"></span>
            </div>
            <div class="skill_per">30%</div>
          </li>
        </ul>
      </div>
       <div class="resume_item resume_social">
         <div class="title">
           <p class="bold">Social</p>
         </div>
         <ul>
           <li>
             <div class="icon">
               <i class="fab fa-facebook-square"></i>
             </div>
             <div class="data">
               <p class="semi-bold">Facebook</p>
               <p>kimthang.ly@facebook</p>
             </div>
           </li>
           {{-- <li>
             <div class="icon">
               <i class="fab fa-twitter-square"></i>
             </div>
             <div class="data">
               <p class="semi-bold">Twitter</p>
               <p>Stephen@twitter</p>
             </div>
           </li> --}}
           {{-- <li>
             <div class="icon">
               <i class="fab fa-youtube"></i>
             </div>
             <div class="data">
               <p class="semi-bold">Youtube</p>
               <p>Stephen@youtube</p>
             </div>
           </li> --}}
           {{-- <li>
             <div class="icon">
               <i class="fab fa-linkedin"></i>
             </div>
             <div class="data">
               <p class="semi-bold">Linkedin</p>
               <p>Stephen@linkedin</p>
             </div>
           </li> --}}
         </ul>
       </div>
     </div>
  </div>
  <div class="resume_right">
    <div class="resume_item resume_about">
        <div class="title">
           <p class="bold">About us</p>
         </div>
        <p>I started learning web design from 2018 until now, my language is PHP. In the next 2 years I want to become a professional PHP Laravel programmer.</p>
    </div>
    <div class="resume_item resume_work">
        <div class="title">
           <p class="bold">Work Experience</p>
         </div>
        <ul>
            <li>
                <div class="date">2018 - NOW</div> 
                <div class="info">
                     <p class="semi-bold">China website research</p> 
                  <p>Research Chinese e-commerce websites, learn about features and events to apply in Vietnam market.</p>
                </div>
            </li>
            <li>
              <div class="date">2015 - 2018</div>
              <div class="info">
                     <p class="semi-bold">Tian Long Ba Bu game operator</p> 
                  <p>Testing & monitor Tian Long Ba Bu client game online</p>
                </div>
            </li>
            <li>
              <div class="date">2014 - 2015</div>
              <div class="info">
                     <p class="semi-bold">Work from home</p> 
                  <p>Translate documents about Chinese online games, research new Chinese online game products to bring to Vietnam market.</p>
                </div>
            </li>
            <li>
                <div class="date">2012 - 2013</div>
                <div class="info">
                       <p class="semi-bold">VNG group</p> 
                    <p>Coordinator for Shen Qu webgame online</p>
                  </div>
              </li>
        </ul>
    </div>
    <div class="resume_item resume_education">
      <div class="title">
           <p class="bold">Education</p>
         </div>
      <ul> 
            <li>
              <div class="date">2008 - 2012</div>
              <div class="info">
                     <p class="semi-bold">HCMC University of Education</p> 
                  <p>Graduated from Chinese pedagogy.</p>
                </div>
            </li>
            <li>
                <div class="date">2010 - 2010</div> 
                <div class="info">
                     <p class="semi-bold">VNU University of Science</p> 
                  <p>Received a certificate of business administration</p>
                </div>
            </li>
        </ul>
    </div>
    <div class="resume_item resume_hobby">
      <div class="title">
           <p class="bold">Hobby</p>
         </div>
       <ul>
         <li><i class="fas fa-book"></i></li>
         <li><i class="fas fa-gamepad"></i></li>
         <li><i class="fas fa-music"></i></li>
         <li><i class="fas fa-tv"></i>
      </ul>
    </div>
  </div>
</div>

</body>
</html>