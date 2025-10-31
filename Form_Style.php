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
background: url(login_bg_2.png);
background-size: cover;
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
gap: 2rem;
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

.reg-login{
margin-right: 1.25rem;
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

#user{
color: #c7a647;
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

.login-signup-container {
justify-content: center;
gap: 1rem;
margin-top: 1rem;
width: 100%;
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

.login-form-container{
width: 27vw;
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


/* LOGIN FORM */

main{
height: auto;
display: flex;
justify-content: center;
align-items: center;
margin: 3rem;
}
.login-form-container,.profile-form-container{
height: auto;
width: 32vw;
background-color: #232323;
border-radius: 20px;
box-shadow: 0px 0px 7px black;

}

.contact-form-container{
height: auto;
width: 35vw;
background-color: #232323;
border-radius: 20px;
box-shadow: 0px 0px 7px black;
}

.profile-form-container{
width: 36vw;
}
#login-heading{
color: #1bd450;
font-size: 35px;
margin: 1.5rem 2rem ;
text-align: center;
font-weight: 700;

}
#sub-heading{
text-align: center;
}

.form-element-container{
height: 100%;
width: auto;
padding: 1.5rem;
display: flex;
flex-direction: column;
gap: 2rem;
}



#fields{
display: flex;
flex-direction: column;
gap: 0.35rem;
}

.profile-icon-container{
margin-top: 1rem;
margin-bottom: 1rem;
margin: auto;
height: 120px;
width: 120px;
display: flex;
justify-content: center;
align-items: center;
background-color: #303030;
border-radius: 50%;
}
.profile-form-container .form-element-container > input{
border: 1px solid #1bd460;
}
#profile-pic{
font-size: 3.75rem;
color: gray;
}

input,select{
padding: 0.55rem;
background-color: transparent;
border: 1px solid gray;
color: white;
border-radius: 8px;
}

input::placeholder {
color: white;
}

textarea::placeholder {
color: white;
}

select{
background-color: #232323;
/* appearance: none; */

}


input:-webkit-autofill {
-webkit-box-shadow: 0 0 0px 1000px #232323 inset !important; /* match background */
-webkit-text-fill-color: white !important; /* text color */
caret-color: white; /* caret color */
transition: background-color 5000s ease-in-out 0s; /* disables flash */
}

input[type="date"]::-webkit-calendar-picker-indicator {
filter: invert(100%); /* Makes it white */
}
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
-webkit-appearance: none;
margin: 0;
}



input:focus,input[type="number"]:focus, select:focus{
outline: none;
border: 2px solid #1bd450;
}

textarea:focus{
outline: none;
border: 2px solid #1bd450;

}



#login-page-btn,#seng-msg-btn,#register-btn,#edit-update-btn, #updateBtn{
padding: 0.5rem;
font-size: 1rem;
font-weight: 700;
background-color: #1bd460;
color: #121212;
border-radius: 8px;
border: none;
}

#seng-msg-btn,#update-btn,#edit-update-btn, #updateBtn{
margin-top: 0.5rem;
margin-bottom: 0.75rem;
}


#login-page-btn:hover{
background-color: #1bad50;
cursor: pointer;
border-radius: 8px;
}

#remeber-checkbox{
display: inline;
}
#forget-pass {
margin-top: 2px;
display: inline;

}

#forget-pass a{
text-decoration: none;
color: rgb(0, 115, 255);
}
#forget-pass a:hover{
text-decoration: underline;
}


.remeber-forget-block{
width: auto;
display: flex;
justify-content: space-between;
}

#register-text{
font-size: 17px;
width: auto;
margin: auto;
text-align: center;
margin-top: 11px;
}


#register-btn:hover{
background-color: #1bad50;
cursor: pointer;
border-radius: 8px;
}

#edit-update-btn:hover, #updateBtn{
background-color: #1bad50;
cursor: pointer;
border-radius: 8px;
}

#seng-msg-btn:hover{
background-color: #1bad50;
cursor: pointer;
border-radius: 8px;
}

#register-text a{
font-weight: 700;
color: #1bd460;
cursor: pointer;
}

.container{
height: 55px;
}

#message{
background-color: #232323;
color: white;
resize: vertical;
max-width: 100%;
border-radius: 8px;
padding: 0.55rem;
}

#highlight{
color: #1bd460;
}

#user{
margin-right: 0.65rem;
font-size: 2rem;
color: #1bd460;
}

#logout:hover{
color: rgb(252, 23, 23);
}

.about-main {
background-color: #1a1a1a;
width: 85%;
margin: auto;
display: flex;
flex-direction: column;
gap: 2rem;
padding: 1.5rem 2.5rem;
border-radius: 20px;
font-size: 18px;
}

#about-us-heading {
color: #1bd450;
font-size: 35px;
margin: 0.5rem 1rem;
text-align: center;
font-weight: 700;
}

.about-section {
background-color: #232323;
padding: 2rem;
padding-top: 0;
border-radius: 20px;
box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.6);
}

.feature-grid,
.dev-grid {
display: grid;
gap: 1.5rem;
}

.feature-grid {
grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
}

.dev-grid {
grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
}

.feature-card,
.dev-card {
background: #1a1a1a;
padding: 1rem;
border-radius: 12px;
text-align: center;
transition: transform 0.3s ease;
}

.feature-card:hover,
.dev-card:hover {
transform: translateY(-5px);
}

.feature-card i,
.dev-card i {
color: #1bd460;
margin-bottom: 0.5rem;
}



.about-us-titles {
font-size: 1.8rem;
color: #1bd460;
margin-bottom: 1.75rem;
text-align: center;
}

.about-section ul > li {
padding: 0.75rem;
}
#our-story,
#how-it-works {
line-height: 28px;
}
.feature-card {
line-height: 24px;
}

#otp-container{
margin: 0.48rem;
}

#regsuccess-container{
margin: 1.8rem;
}

.navContainer{
background: none;
}

@media (max-width: 480px) {
.login-form-container,.profile-form-container {
width: auto;
}

.remeber-forget-block{
flex-wrap: wrap;
gap: 1.25rem;
}

#forget-pass{
width: 100%;
display: block;
margin-left: 6px;
}

.signup-heading-text{
padding: 0 0.4rem;
margin: 0.5rem;
}

.contact-form-container{
width: auto;
}
}

@media(max-width: 768px){
#sub-heading{
padding-left: 1rem;
padding-right: 1rem;
}
}