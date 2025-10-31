<?php
header("Content-type: text/css");
?>

* {
margin: 0;
padding: 0;
}

body {
margin: 0;
font-family: "Merriweather", "Poppins", sans-serif;
background-color: #121212;
height: fit-content;
color: white;
min-height: 100vh;
background-size: cover;
display: flex;
flex-direction: column;
}

body::selection {
background-color: #1bd450;
color: #fdf6e3;
}

.mainNav {
height: 100px;
width: 100%;
background-color: #232323;
display: flex;
flex-direction: row;
align-items: center;
}

.mainNav img {
height: 95px;
width: 95px;
margin-top: 5px;
margin-left: 1rem;
}

.headings {
color: #1bd460;
align-self: center;
margin-left: 0.5rem;
font-size: 40px;
margin-top: 0px;
margin-bottom: 0px;
cursor: pointer;
}

.logo-heading-container {
display: flex;
margin-right: 1rem;
padding-right: 1rem;
flex-shrink: 1;
min-width: 200px;
}

.navContainer {
width: 85%;
display: flex;
flex-direction: row;
align-items: center;
justify-content: center;
gap: 2.5rem;
flex-wrap: nowrap;
min-width: 200px;
margin-left: 12rem;
}

.options {
color: white;
padding: 10px;
}

.options:hover {
color: #1bd460;
font-weight: 600;
cursor: pointer;
}

.login-signup-container {
color: white;
width: 19%;
display: flex;
justify-content: flex-end;
align-items: center;
gap: 2rem;
flex-shrink: 0;
min-width: 200px;
}

.post-login-icons {
width: 25%;
color: #fdf6e3;
display: flex;
justify-content: flex-end;
gap: 1.75rem;
transform: translateX(-1rem);
align-items: center;
}

.post-login-icons i:hover {
color: #1bd460;
transition: all 0.2s linear;
transform: scale(1.05);
cursor: pointer;
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

#signup-btn {
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

#login-btn:hover {
background-color: #1bad50;
transform: scale(1.01);
border-radius: 5px;
cursor: pointer;
}

#signup-btn:hover {
transform: scale(1.1);
cursor: pointer;
}

#user {
margin-right: 0.65rem;
font-size: 2rem;
color: #1bd460;
}

#logout:hover {
color: rgb(252, 23, 23);
}

/* VIEW EXPENSES */
.content {
flex: 1;
padding: 36px;
}

#login-heading {
color: #1bd450;
font-size: 35px;
margin: 1.5rem 2rem;
text-align: center;
font-weight: 700;
margin-top: 1rem;
margin-bottom: 1.5rem;
}

.table-container {
background-color: #232323;
border-radius: 20px;
padding: 20px;
max-width: 85vw;
margin: 2rem auto;
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
}

select,
button {
padding: 8px 12px;
border-radius: 5px;
border: none;
background-color: #232323;
color: #fff;
font-size: 14px;
}

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

select option {
background-color: #232323;
}

table {
width: 100%;
border-collapse: collapse;
margin-top: 20px;
}

th {
background-color: #232323;
padding: 12px;
text-align: left;
border-bottom: 2px solid #444;
color: #1bd450;
}

td {
padding: 12px;
border-bottom: 1px solid #333;
}

tr:hover {
background-color: #2a2a2a;
}

.remove-btn {
background-color: #ff4d4d;
color: #fff;
cursor: pointer;
transition: background-color 0.3s;
}

.remove-btn:hover {
background-color: #ff1a1a;
}

.footerContainer {
background-color: #232323;
color: #fdf6e3;
height: 31vh;
display: flex;
flex-direction: column;
gap: 1.3rem;
width: 100%;
}

.footerContainer #foot-heading,
#copyright {
margin: 0;
align-self: center;
}

.footerContainer #foot-heading {
margin-top: 1rem;
margin-bottom: 0.25rem;
font-size: 1.5rem;
color: #1bd460;
font-weight: 700;
cursor: pointer;
}

#foot-heading:hover {
text-decoration: underline;
}

.footerContainer #connect-us,
#contact-us {
color: #1bd460;
margin-top: -1rem;
margin-bottom: 0;
font-weight: 400;
font-size: 15px;
text-align: center;
}

#contact-us {
margin-top: 0.1rem;
}

.footerContainer #copyright {
margin-bottom: 0.5rem;
color: #1bd460;
font-size: 0.9rem;
}

.social-row {
display: flex;
justify-content: center;
align-items: center;
gap: 2rem;
margin-top: 0;
}

.socialIcon a {
display: block;
color: #fdf6e3;
padding: 0.55rem;
}

.socialIcon a:hover {
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

#login-btn,
#signup-btn {
font-size: 13px;
padding: 8px;
margin-left: 1rem;
}

.post-login-icons {
margin-right: 2.75rem;
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

.post-login-icons {
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

.options {
width: 100%;
text-align: center;
}

.social-row {
flex-direction: row;
gap: 1rem;
margin: 0.75rem 0 0.75rem 0;
}

.post-login-icons {
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

#login-btn,
#signup-btn {
font-size: 12px;
padding: 6px;
}

.post-login-icons {
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

#highlight {
color: #1bd460;
}

/* responsive design for table */
/* Responsive Design */
@media (max-width: 1024px) {
#login-heading {
font-size: 28px;
}
select,
button {
font-size: 13px;
padding: 6px 10px;
}
th,
td {
font-size: 14px;
padding: 10px;
}
}

@media (max-width: 768px) {
#login-heading {
font-size: 24px;
}
select,
button {
font-size: 12px;
padding: 5px 8px;
}
th,
td {
font-size: 12px;
padding: 8px;
}
.table-container {
height: fit-content;
min-width: fit-content;
}
}

@media (max-width: 480px) {
#login-heading {
font-size: 20px;
}
select,
button {
font-size: 11px;
padding: 4px 6px;
}
th,
td {
font-size: 11px;
padding: 6px;
}
.table-container {
padding: 10px;
}
}

.pdfBtn {
margin-top: 20px;
}

@media (max-width: 768px) {
.navContainer {
margin-left: 0;
background: none;
}

.content{
padding-left: 0;
padding-right: 0;
}

.mainNav {
min-width: 120%;
}

.footerContainer {
min-width: 120%;
}
}

@media (max-width: 480px) {
.table-container{
width:auto;
height:auto;
}
}

@media (max-width: 768px) {

.navContainer {
margin-left: 0;
background: none;
}

.mainNav {
width: 115%;
}

.footerContainer{
width:115%;
position:sticky;
margin-bottom:0;

}

.content{
padding: 2rem;
padding-right:0;
padding-top: 3.5rem;
padding-bottom: 3.5rem;
margin-top: 2rem;
margin-bottom:2rem;
}
}