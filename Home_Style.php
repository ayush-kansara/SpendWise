<?php
header("Content-type: text/css");
?>
body{
margin: 0;
font-family: 'Merriweather','Poppins', sans-serif ;
background-color: #121212;
/* display: flex;
justify-content: center;
align-items:center ; */
height: fit-content;
color: white;
font-family: 'Merriweather','Poppins', sans-serif ;
background: url(./Images/login_bg_2.png);
background-size: contain;
}
body::selection{
background-color: #1bd450;
color: #fdf6e3;
}
.mainNav{
height: 100px;
width: 100%;
background-color: #232323;
display: flex;
flex-direction: row;
/* justify-content: center; */
align-items: center;
}

.mainNav img{
height: 95px;
width: 95px;
margin-top: 5px;
margin-left: 1rem;
}

.headings{
/* margin-top: 18px; */
/* margin-left: 1rem; */
/* color: #6AB187; */
color: #1bd460;

/* background: -webkit-linear-gradient(top,#1bd460,#1bd450,#1bad50);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent; */
align-self: center ;
margin-left: 0.5rem;
font-size: 40px ;
margin-top: 0px;
margin-bottom: 0px;
cursor: pointer;
/* color: #121212; */
}

.logo-heading-container{
display: flex;
/* width: 25%; */
margin-right: 1rem;
padding-right: 1rem;
flex-shrink: 1;
min-width: 200px;

/* justify-content: center; */

}

.navContainer{
width: 50%;
display: flex;
flex-direction: row;
align-items: center;
justify-content: center;
gap: 2.5rem;
flex: 1;
flex-wrap:nowrap;
min-width: 200px;
}

.options{
color: white;
padding: 10px;
}

.options:hover{
/* background-color: #1bd460; */
/* letter-spacing: 1px; */
color: #1bd460;
font-weight: 600;
/* border-radius: 10%; */
cursor: pointer;
}

.login-signup-container{
color: white;
width:19%;
display: flex;
justify-content: flex-end;
align-items: center;
gap: 2rem;
flex-shrink: 0;
min-width: 200px;
}

.post-login-icons{
/* width: 100%; */
width:25%;
color: #fdf6e3;
display: flex;
justify-content: flex-end;
gap: 1.75rem;
/* margin-right: 2.2rem; */
transform: translateX(-1rem);
align-items: center;
}

.post-login-icons i:hover{
color: #1bd460;
transition: all 0.2s linear;
transform: scale(1.05);
cursor: pointer;

}

#login-btn{
padding: 10px;
border: none;
border-radius: 10%;
font-size: 15px;
font-weight: 600;
background-color: #1bd460;
color: #121212;


}
#signup-btn{
padding: 10px;
border: none;
border-radius: 10%;
font-size: 15px;
font-weight: 600;
background-color: transparent;
color: #1bd460;
border: 3px solid #1bd460;
margin-right: 1rem;

}
#login-btn:hover{
/* padding: 10px; */
background-color: #1bad50;
transform: scale(1.1);
border-radius: 10%;
cursor: pointer;
}

#signup-btn:hover{
transform: scale(1.1);
cursor: pointer;
}

#user{
margin-right: 0.65rem;
font-size: 2rem;
color: #1bd460;
}

#logout:hover{
color: rgb(252, 23, 23);
}

.mainContent{
/* margin-top: 3px; */
height: auto;
width: auto;
background-color: #121212;
border: 2px solid black;
padding-bottom: 2rem;

}

.mainContent .feature{
color: white;
text-align: center;
font-size: 35px;
font-weight: 500;
margin-top: 2rem;
margin-bottom: 2rem;
}
/* .mainContent .card-container{
display: grid;
grid-template-rows: 240px 240px ;
grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
grid-gap: 15px 15px;
place-content: center;
padding: 0 20%;

} */

.mainContent .card-container {
display: grid;
grid-template-columns: repeat(3, 1fr); /* Default: 3 columns */
gap: 2rem;
padding: 0 2rem;
}



.card-container .card {
height: 200px;
background-color: #232323;
/* background-color: #164c42db; */
border-radius: 20px;
color: white;
padding: 0.5rem;
display: flex;
flex-direction: column;
transition: transform 0.2s ease;
}

.card-container .card:hover {
transform: translateY(-5px);
border: 3px solid #1bd460;
/* transition: all 0.1s linear; */
/* padding: 0.5rem; */
}


/* .card-container .card{
margin-top: 1rem;
height: 240px;
width: 440px; */
/* background-color: #164c42db; */
/* background-color: #232323;
border-radius: 30px;
color: white;
/* padding: 0.5rem 1rem 0.5rem 1rem; */
/* } */


.card #feature-title{
text-align: center;
margin-top: 0.5rem;
margin-bottom: 0.5rem;

}

.card #feature-subtitle,#learn-more{
padding: 0.15rem 1rem 0.15rem 1rem;

}
#learn-more{
margin-top: 0.5rem;
font-size: 1.1rem;
}
#feature-subtitle{
font-size: 1.05rem;
}
#learn-more{
color: #98FF98;
}
.footerContainer{
background-color: #232323;
color: #fdf6e3;
height: 31vh;
display: flex;
flex-direction: column;
/* justify-content: space-between; */
gap: 1.30rem;
}

.footerContainer #foot-heading,#copyright{
margin: 0 ;
align-self: center;
}
.footerContainer #foot-heading{
margin-top: 1rem;
margin-bottom: 0.25rem;
/* background-color: #121212; */
font-size: 1.5rem;
color: #1bd460;
/* padding: 0.5rem; */
/* border-radius: 10%; */
font-weight: 700;
cursor: pointer;
}
#foot-heading:hover{
text-decoration: underline;
}

.footerContainer #connect-us,#contact-us{
color: #1bd460;
margin-top: -1rem;
margin-bottom: 0;
font-weight: 400;
font-size: 15px;
text-align: center;
/* margin: 0; */

}
#contact-us{
margin-top: 0.1rem;
}
.footerContainer #copyright{
margin-bottom: 0.5rem;
color: #1bd460;
font-size: 0.90rem;
}


.social-row{
display: flex;
justify-content: center;
align-items: center;
gap: 2rem;
margin-top: 0;
}
/* .socialIcon{
display: flex;
justify-content: center;
align-items: center ;
height: 2.25rem;
width: 2.25rem;
border-radius: 50%;
background: transparent;
border: 1px solid white;
/* transform: translate(0.5rem); */




.socialIcon a{
display: block;
color: #fdf6e3;
padding: 0.55rem;
}

.socialIcon a:hover{
color: #1bd460;
transition: all 0.2s linear;
}


.title-icon-container{
display: flex;
flex-direction: row;
justify-content: start;
align-items: center;
}

/* Responsive Design */

@media (max-width: 1024px) {
.navContainer {
gap: 1.5rem;
background-color: #232323;
}
.headings {
font-size: 30px;
}

#login-btn, #signup-btn {
font-size: 13px;
padding: 8px;
margin-left: 1rem;
}
.post-login-icons{
margin-right: 2.75rem ;
}
.mainContent .card-container {
grid-template-columns: repeat(2, 1fr);
}
}

@media (max-width: 1024px) {
.mainNav {
flex-direction: column;
height: auto;
padding: 1rem 0;
}

.logo-heading-container {
justify-content: center;
margin-bottom: 1rem;
}

.navContainer {
flex-direction: column;
gap: 1rem;
width: 100%;
text-align: center;
}

.post-login-icons{
transform: translateX(0.45rem);
}

.login-signup-container {
justify-content: center;
gap: 1rem;
margin-top: 1rem;
width: 100%;
}

.mainContent {
height: auto;
min-height: 60vh;
}

.footerContainer {
height: auto;
padding: 1rem 0;
}

.options{
width: 100%;
text-align: center;
}

.social-row {
flex-direction: row;
gap: 1rem;
margin: 0.75rem 0 0.75rem 0;
}

.post-login-icons{
padding: 6px;
margin-top: 1.5rem;
}
.mainContent .card-container {
grid-template-columns: 1fr;
}
}

@media (max-width: 480px) {
.headings {
font-size: 24px;
}

.options {
text-align: center;
width: 100%;
font-size: 14px;
}

#login-btn, #signup-btn {
font-size: 12px;
padding: 6px;
}

.post-login-icons{
/* font-size: 12px; */
padding: 6px;
margin-top: 1.5rem;
margin-left: 2.25rem;
}

.socialIcon i {
font-size: 1.2rem;
}
}


.hamburger {
display: none;

font-size: 1.8rem;
color: white;
/* margin-left: auto; */
margin-right: 1rem;
cursor: pointer;
}

@media (max-width: 768px) {
.hamburger {
display: block;
margin-top: 1.85rem;
margin-left: 2rem;
}

.navContainer {
display: none;
flex-direction: column;
align-items: center;
width: 100%;
background-color: #121212;
}

.navContainer.active {
display: flex;
}
}

@media (max-width: 1200px) {
.navContainer {
gap: 1rem;
}

.headings {
font-size: 32px;
}

.login-signup-container button {
font-size: 13px;
padding: 6px 10px;
}
}

/* For active navbar tab */
#highlight{
color: #1bd460;
}

.card-container .card {
height: auto;
}

.navContainer{
background: none;
}