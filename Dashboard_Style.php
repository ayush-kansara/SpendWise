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
/* background: url(./Images/login_bg_2.png); */
/* background-size: contain; */
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
color: #1bd460;
align-self: center ;
margin-left: 0.5rem;
font-size: 40px ;
margin-top: 0px;
margin-bottom: 0px;
cursor: pointer;
}

.logo-heading-container{
display: flex;
margin-right: 1rem;
padding-right: 1rem;
flex-shrink: 1;
min-width: 200px;
}

.navContainer{
width: 85%;
display: flex;
flex-direction: row;
align-items: center;
justify-content: center;
gap: 2.5rem;
/* flex: 1; */
flex-wrap:nowrap;
min-width: 200px;
margin-left: 12rem;
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
transition: all 0.1s linear;
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

.socialIcon a{
display: block;
color: #fdf6e3;
padding: 0.55rem;
}

.socialIcon a:hover{
color: #1bd460;
transition: all 0.2s linear;
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

#highlight{
color: #1bd460;
}


/* dashboard styling*/


main{
height: auto;
}

.dashboard-container{
display: flex;
justify-content: center;
align-items: center;
height: auto;
}

.dboard-content{
margin: 3rem auto;
height: auto;
width: 95vw; /* Change */
background-color: #232323;
display: flex ;
flex-direction: column;
border-radius: 30px;

}

#login-heading{
color: #1bd450;
font-size: 35px;
margin: 1.5rem 2rem ;
text-align: center;
font-weight: 700;

}
#card-heading{
color: #1bd450;
font-weight:500;
font-size: 20px;
margin: 1.5rem 2rem ;
border-left: 4px solid #1bd450;
padding-left: 0.5rem;
margin-bottom: 1.55rem;
}

#display-figures{
margin-top: 0.1rem;
margin-bottom: 0.2rem ;
color: #FFF;
font-weight:500;
font-size: 30px;
margin: 1.5rem 1rem ;
margin-left: 2rem;
}

/* #time-info{
margin-top: 0;
margin: 1.5rem 2rem ;
font-size: 15px;

} */
.total-fields-container{

display: flex;
width: 100%;
height: 20vh;
justify-content: space-evenly;
align-items: center;
}

.field-cards{
margin-top: 1rem;
background-color: #333;
height: auto;
width: 21.75%;
border-radius: 10px;
box-shadow: 0 4px 8px rgba(0,0,0,0.5);
}
.chart-container{
display: flex;
justify-content: space-between;
align-items: center;
width: auto;
margin: 2rem;
gap: 2rem;
}

.bar-chart-div,.pie-chart-div{
background-color: #333;
padding: 1rem;
border-radius: 10px;
box-shadow: 0 4px 8px rgba(0,0,0,0.5);
/* margin: 2rem; */
}

#myChart{
max-width: 65vw; /* Change */
}

#pieChart{
max-width: 32.5vw; /* Change */
}

#chart-heading,#table-heading{
color: #1bd450;
font-weight:500;
font-size: 20px;
margin: 1.25rem 1rem ;
border-left: 4px solid #1bd450;
padding-left: 0.5rem;
margin-bottom: 1.75rem;
}

#chart-heading{
margin-top: 0.75rem;
margin-bottom: 1rem;
}
#table-heading{
margin: 1rem 1rem ;
}

/* table styling */

.table-container {
background-color: #333;
border-radius: 10px;
padding: 20px;
max-width: 100%;
margin: 2rem;
margin-top: 1rem;
box-shadow: 0 4px 8px rgba(0,0,0,0.5);
}
.table-header {
display: flex;
gap: 15px;
margin-bottom: 20px;
display: flex;
justify-content: space-between;
align-items: center;
}
.table-header select {
padding: 8px 12px;
border-radius: 5px;
border: none;
background-color: #2c2c2c;
color: #fff;
font-size: 14px;
}
.table-header select option {
background-color: #2c2c2c;
}
table {
width: 100%;
border-collapse: collapse;
}
th {
background-color: #2c2c2c;
padding: 12px;
text-align: left;
border-bottom: 2px solid #444;
color: #1bd450;
}
td {
padding: 12px;
border-bottom: 1px solid #232323;
}
tr:hover {
background-color: #2a2a2a;
}
.amount {
color: #00ff00;
font-weight: 500;
}
@media (max-width: 768px) {
.navContainer {
margin-left: 0;
background: none;
}
.content{
width:auto;
overflow-x: scroll;
}
.dashboard-container{
width:auto;
}
.table-container {
max-height: 220px; /* adjust as needed */
overflow-y: auto;
overflow-x: auto;
border-radius: 10px;
margin-top: 10px;
}

/* Table styling */
.table-container table {

width: 100%;
border-collapse: collapse;
color: #fff;
background-color: #222; /* match your card background */
}

.table-container th,
.table-container td {
padding: 10px;
text-align: left;
border-bottom: 1px solid #333;
white-space: nowrap; /* prevents text wrapping */
}

.table-container th {
position: sticky;
top: 0;
background-color: #2c2c2c;
color: #1bd450; /* green header text */
z-index: 2;
}

.table-container::-webkit-scrollbar {
height: 6px;
width: 6px;
background-color: grey;
}

.table-container::-webkit-scrollbar-thumb {
border-radius: 5px;
background-color: grey;
}


}


<!-- 
/* COST ANALYSIS */
select,
button {
padding: 8px 12px;
border-radius: 5px;
border: none;
background-color: #232323;
color: #fff;
font-size: 14px;
margin-top: 0.25rem;
margin-bottom: 1rem;
}

/* changes */
form {
display: flex;
justify-content: center;
gap: 1rem;
align-items: center;
}

select {
outline: none;
border: 2px solid #1bd450;
}

/* changes */
select option {
background-color: #232323;
}

#login-btn {
padding: 7px;
border: none;
border-radius: 5px;
font-size: 15px;
font-weight: 600;
background-color: #1bd460;
color: #121212;
}

#login-btn:hover {
background-color: #1bad50;
transform: scale(1.01);
border-radius: 5px;
cursor: pointer;
}

.yearly-expense-content {
margin-top: 0;
padding-top: 2rem;
padding-bottom: 2rem;
} -->

/* ---------------- Responsive Dashboard ---------------- */
@media (max-width: 1024px) {
.total-fields-container {
flex-wrap: wrap;
height: auto;
gap: 1rem;
}

.field-cards {
width: 45%;
min-width: 200px;
}

.chart-container {
flex-direction: column;
}

.graph-table-Container {
flex-direction: column;
align-items: stretch;
}

#myChart, #exp-paymet-chart,
#exp-vs-inc-Chart,
#pieChart,
#yearly-categories-chart,
#monthly-spending-Chart {
max-width: 100% !important;
}

.actual-table {
width: 100%;
}

}

@media (max-width: 768px) {
.field-cards {
width: 85%;
}

#display-figures {
font-size: 22px;
margin: 1rem;
}

#card-heading,
#chart-heading,
#inc-vs-exp-chart-heading,
#table-heading,
#yearly-expense-heading {
font-size: 18px;
margin: 1rem;
}

form {
flex-direction: column;
gap: 0.5rem;
}

.actual-table {
overflow-x: auto;
}

.actual-table table {
width: 100%;
min-width: 450px; /* ensures structure */
display: block;
overflow-x: auto;
white-space: nowrap;
}

th,
td {
font-size: 14px;
padding: 8px;
}

}

@media (max-width: 480px) {
.dboard-content {
width: 98vw;
border-radius: 15px;
}

#login-heading,
#yearly-expense-heading {
font-size: 24px;
}

#display-figures {
font-size: 18px;
}

.actual-table table {
font-size: 12px;
min-width: 380px; /* shrink more */
}

.actual-table {
padding: 0;
}

th,
td {
padding: 6px;
}

th:last-child,
td:last-child {
white-space: nowrap; /* prevents wrapping of Payment Method */
}

}