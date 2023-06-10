<?php
  // Start the session
  ini_set('display_errors', 1);
  session_start();
?>

<!DOCTYPE html>
<center>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}

/* Estilo de barra */
.topnav {
  overflow: hidden;
  background-color: #60249B;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

/* Style the topnav links */
.topnav-left {
  display: flex;
}

.topnav-center {
  display: flex;
  justify-content: center;
}

.topnav-right {
  display: flex;
  justify-content: flex-end;
}

.topnav a {
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Color de Link de barra*/
.topnav a:hover {
  background-color: #b6ee50;
  color: #60249B;
}
#myTextarea {
  width: 500px;
  height: 300px;
  resize: vertical;
  min-height: 100px;
}
.form-control {
  position: relative;
  margin: 20px 0 40px;
  width: 25%;
}

.form-control input {
  background-color: transparent;
  border: 0;
  border-bottom: 2px #000 solid;
  display: block;
  width: 100%;
  padding: 15px 0;
  font-size: 14px;
  color: #7A3500;
}

.form-control input:focus,
.form-control input:valid {
  outline: 0;
  border-bottom-color: #CC58D6;
}

.form-control label {
  position: absolute;
  top: 15px;
  left: 0;
  pointer-events: none;
}

.form-control label span {
  display: inline-block;
  font-size: 18px;
  min-width: 5px;
  color: #000;
  transition: 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.form-control input:focus+label span,
.form-control input:valid+label span {
  color: #CC58D6;
  transform: translateY(-30px);
}
.contenido-publicacion {
  font-size: 18px;
  color: #333;
  font-weight: bold;
  margin-bottom: 10px;
}
button {
  font-family: inherit;
  font-size: 20px;
  background: royalblue;
  color: white;
  padding: 0.7em 1em;
  padding-left: 0.9em;
  display: flex;
  align-items: center;
  border: none;
  border-radius: 16px;
  overflow: hidden;
  transition: all 0.2s;
}

button span {
  display: block;
  margin-left: 0.3em;
  transition: all 0.3s ease-in-out;
}

button svg {
  display: block;
  transform-origin: center center;
  transition: transform 0.3s ease-in-out;
}

button:hover .svg-wrapper {
  animation: fly-1 0.6s ease-in-out infinite alternate;
}

button:hover svg {
  transform: translateX(1.2em) rotate(45deg) scale(1.1);
}

button:hover span {
  transform: translateX(5em);
}

button:active {
  transform: scale(0.95);
}

@keyframes fly-1 {
  from {
    transform: translateY(0.1em);
  }

  to {
    transform: translateY(-0.1em);
  }
}

#loader {
  width: 80px;
  height: 40px;
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -20px -40px;
  z-index: 1000;
}

.lightsaber {
  position: absolute;
  width: 4px;
  height: 12px;
  background-color: #666;
  border-radius: 1px;
  bottom: 0;
}

.lightsaber.ls-left {
  left: 0;
}

.lightsaber.ls-right {
  right: 0;
}

.lightsaber:before {
  position: absolute;
  content: ' ';
  display: block;
  width: 2px;
  height: 25px;
  max-height: 1px;
  left: 1px;
  top: 1px;
  background-color: #fff;
  border-radius: 1px;
  -webkit-transform: rotateZ(180deg);
  transform: rotateZ(180deg);
  -webkit-transform-origin: center top;
  -ms-transform-origin: center top;
  transform-origin: center top;
}

.lightsaber:after {
  position: absolute;
  content: ' ';
  display: block;
  width: 2px;
  height: 2px;
  left: 1px;
  top: 4px;
  background-color: #fff;
  border-radius: 50%;
}

.ls-particles {
  position: absolute;
  left: 42px;
  top: 10px;
  width: 1px;
  height: 5px;
  background-color: rgb(51, 51, 51, 0);
  -webkit-transform: rotateZ(0deg);
  transform: rotateZ(0deg);
}

.lightsaber.ls-green:before {
  -webkit-animation: showlightgreen 2s ease-in-out infinite 1s;
  animation: showlightgreen 2s ease-in-out infinite 1s;
}

.lightsaber.ls-red:before {
  -webkit-animation: showlightred 2s ease-in-out infinite 1s;
  animation: showlightred 2s ease-in-out infinite 1s;
}

.lightsaber.ls-left {
  -webkit-animation: fightleft 2s ease-in-out infinite 1s;
  animation: fightleft 2s ease-in-out infinite 1s;
}

.lightsaber.ls-right {
  -webkit-animation: fightright 2s ease-in-out infinite 1s;
  animation: fightright 2s ease-in-out infinite 1s;
}

.ls-particles.ls-part-1 {
  -webkit-animation: particles1 2s ease-out infinite 1s;
  animation: particles1 2s ease-out infinite 1s;
}

.ls-particles.ls-part-2 {
  -webkit-animation: particles2 2s ease-out infinite 1s;
  animation: particles2 2s ease-out infinite 1s;
}

.ls-particles.ls-part-3 {
  -webkit-animation: particles3 2s ease-out infinite 1s;
  animation: particles3 2s ease-out infinite 1s;
}

.ls-particles.ls-part-4 {
  -webkit-animation: particles4 2s ease-out infinite 1s;
  animation: particles4 2s ease-out infinite 1s;
}

.ls-particles.ls-part-5 {
  -webkit-animation: particles5 2s ease-out infinite 1s;
  animation: particles5 2s ease-out infinite 1s;
}

@-webkit-keyframes showlightgreen {
  0% {
    max-height: 0;
    box-shadow: 0 0 0 0 #87c054;
  }

  5% {
    box-shadow: 0 0 4px 2px #87c054;
  }

  10% {
    max-height: 22px;
  }

  80% {
    max-height: 22px;
  }

  85% {
    box-shadow: 0 0 4px 2px #87c054;
  }

  100% {
    max-height: 0;
    box-shadow: 0 0 0 0 #87c054;
  }
}

@-webkit-keyframes showlightred {
  0% {
    max-height: 0;
    box-shadow: 0 0 0 0 #f06363;
  }

  20% {
    box-shadow: 0 0 4px 2px #f06363;
  }

  25% {
    max-height: 22px;
  }

  80% {
    max-height: 22px;
  }

  85% {
    box-shadow: 0 0 4px 2px #f06363;
  }

  100% {
    max-height: 0;
    box-shadow: 0 0 0 0 #f06363;
  }
}

@-webkit-keyframes fightleft {
  0% {
    -webkit-transform: rotateZ(0deg);
    transform: rotateZ(0deg);
    left: 0;
    bottom: 0;
  }

  30% {
    -webkit-transform: rotateZ(0deg);
    transform: rotateZ(0deg);
    bottom: 0;
  }

  40% {
    -webkit-transform: rotateZ(45deg);
    transform: rotateZ(45deg);
    left: 0;
    bottom: 2px;
  }

  45% {
    -webkit-transform: rotateZ(65deg);
    transform: rotateZ(65deg);
    left: 0;
  }

  65% {
    -webkit-transform: rotateZ(410deg);
    transform: rotateZ(410deg);
    left: 30px;
    bottom: 10px;
  }

  95% {
    -webkit-transform: rotateZ(410deg);
    transform: rotateZ(410deg);
    left: 0;
    bottom: 0;
  }

  100% {
    -webkit-transform: rotateZ(360deg);
    transform: rotateZ(360deg);
    left: 0;
    bottom: 0;
  }
}

@-webkit-keyframes fightright {
  0% {
    -webkit-transform: rotateZ(0deg);
    transform: rotateZ(0deg);
    right: 0;
    bottom: 0;
  }

  30% {
    -webkit-transform: rotateZ(0deg);
    transform: rotateZ(0deg);
    bottom: 0;
  }

  45% {
    -webkit-transform: rotateZ(-45deg);
    transform: rotateZ(-45deg);
    right: 0;
    bottom: 2px;
  }

  50% {
    -webkit-transform: rotateZ(-65deg);
    transform: rotateZ(-65deg);
    right: 0;
  }

  68% {
    -webkit-transform: rotateZ(-410deg);
    transform: rotateZ(-410deg);
    right: 27px;
    bottom: 13px;
  }

  95% {
    -webkit-transform: rotateZ(-410deg);
    transform: rotateZ(-410deg);
    right: 0;
    bottom: 0;
  }

  100% {
    -webkit-transform: rotateZ(-360deg);
    transform: rotateZ(-360deg);
    right: 0;
    bottom: 0;
  }
}

@-webkit-keyframes particles1 {
  0% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(35deg) translateY(0px);
    transform: rotateZ(35deg) translateY(0px);
  }

  63% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(35deg) translateY(0px);
    transform: rotateZ(35deg) translateY(0px);
  }

  64% {
    background-color: rgba(51, 51, 51,1);
    -webkit-transform: rotateZ(35deg) translateY(0px);
    transform: rotateZ(35deg) translateY(0px);
  }

  100% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(35deg) translateY(-30px);
    transform: rotateZ(35deg) translateY(-30px);
  }
}

@-webkit-keyframes particles2 {
  0% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-65deg) translateY(0px);
    transform: rotateZ(-65deg) translateY(0px);
  }

  63% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-65deg) translateY(0px);
    transform: rotateZ(-65deg) translateY(0px);
  }

  64% {
    background-color: rgba(51, 51, 51,1);
    -webkit-transform: rotateZ(-65deg) translateY(0px);
    transform: rotateZ(-65deg) translateY(0px);
  }

  95% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-65deg) translateY(-40px);
    transform: rotateZ(-65deg) translateY(-40px);
  }

  100% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-65deg) translateY(-40px);
    transform: rotateZ(-65deg) translateY(-40px);
  }
}

@-webkit-keyframes particles3 {
  0% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-75deg) translateY(0px);
    transform: rotateZ(-75deg) translateY(0px);
  }

  63% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-75deg) translateY(0px);
    transform: rotateZ(-75deg) translateY(0px);
  }

  64% {
    background-color: rgba(51, 51, 51,1);
    -webkit-transform: rotateZ(-75deg) translateY(0px);
    transform: rotateZ(-75deg) translateY(0px);
  }

  97% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-75deg) translateY(-35px);
    transform: rotateZ(-75deg) translateY(-35px);
  }

  100% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-75deg) translateY(-35px);
    transform: rotateZ(-75deg) translateY(-35px);
  }
}

@-webkit-keyframes particles4 {
  0% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-25deg) translateY(0px);
    transform: rotateZ(-25deg) translateY(0px);
  }

  63% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-25deg) translateY(0px);
    transform: rotateZ(-25deg) translateY(0px);
  }

  64% {
    background-color: rgba(51, 51, 51,1);
    -webkit-transform: rotateZ(-25deg) translateY(0px);
    transform: rotateZ(-25deg) translateY(0px);
  }

  97% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-25deg) translateY(-30px);
    transform: rotateZ(-25deg) translateY(-30px);
  }

  100% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-25deg) translateY(-30px);
    transform: rotateZ(-25deg) translateY(-30px);
  }
}

@-webkit-keyframes particles5 {
  0% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(65deg) translateY(0px);
    transform: rotateZ(65deg) translateY(0px);
  }

  63% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(65deg) translateY(0px);
    transform: rotateZ(65deg) translateY(0px);
  }

  64% {
    background-color: rgba(51, 51, 51,1);
    -webkit-transform: rotateZ(65deg) translateY(0px);
    transform: rotateZ(65deg) translateY(0px);
  }

  97% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(65deg) translateY(-35px);
    transform: rotateZ(65deg) translateY(-35px);
  }

  100% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(65deg) translateY(-35px);
    transform: rotateZ(65deg) translateY(-35px);
  }
}

@keyframes showlightgreen {
  0% {
    max-height: 0;
    box-shadow: 0 0 0 0 #87c054;
  }

  5% {
    box-shadow: 0 0 4px 2px #87c054;
  }

  10% {
    max-height: 22px;
  }

  80% {
    max-height: 22px;
  }

  85% {
    box-shadow: 0 0 4px 2px #87c054;
  }

  100% {
    max-height: 0;
    box-shadow: 0 0 0 0 #87c054;
  }
}

@keyframes showlightred {
  0% {
    max-height: 0;
    box-shadow: 0 0 0 0 #f06363;
  }

  20% {
    box-shadow: 0 0 4px 2px #f06363;
  }

  25% {
    max-height: 22px;
  }

  80% {
    max-height: 22px;
  }

  85% {
    box-shadow: 0 0 4px 2px #f06363;
  }

  100% {
    max-height: 0;
    box-shadow: 0 0 0 0 #f06363;
  }
}

@keyframes fightleft {
  0% {
    -webkit-transform: rotateZ(0deg);
    transform: rotateZ(0deg);
    left: 0;
    bottom: 0;
  }

  30% {
    -webkit-transform: rotateZ(0deg);
    transform: rotateZ(0deg);
    bottom: 0;
  }

  40% {
    -webkit-transform: rotateZ(45deg);
    transform: rotateZ(45deg);
    left: 0;
    bottom: 2px;
  }

  45% {
    -webkit-transform: rotateZ(65deg);
    transform: rotateZ(65deg);
    left: 0;
  }

  65% {
    -webkit-transform: rotateZ(410deg);
    transform: rotateZ(410deg);
    left: 30px;
    bottom: 10px;
  }

  95% {
    -webkit-transform: rotateZ(410deg);
    transform: rotateZ(410deg);
    left: 0;
    bottom: 0;
  }

  100% {
    -webkit-transform: rotateZ(360deg);
    transform: rotateZ(360deg);
    left: 0;
    bottom: 0;
  }
}

@keyframes fightright {
  0% {
    -webkit-transform: rotateZ(0deg);
    transform: rotateZ(0deg);
    right: 0;
    bottom: 0;
  }

  30% {
    -webkit-transform: rotateZ(0deg);
    transform: rotateZ(0deg);
    bottom: 0;
  }

  45% {
    -webkit-transform: rotateZ(-45deg);
    transform: rotateZ(-45deg);
    right: 0;
    bottom: 2px;
  }

  50% {
    -webkit-transform: rotateZ(-65deg);
    transform: rotateZ(-65deg);
    right: 0;
  }

  68% {
    -webkit-transform: rotateZ(-410deg);
    transform: rotateZ(-410deg);
    right: 27px;
    bottom: 13px;
  }

  95% {
    -webkit-transform: rotateZ(-410deg);
    transform: rotateZ(-410deg);
    right: 0;
    bottom: 0;
  }

  100% {
    -webkit-transform: rotateZ(-360deg);
    transform: rotateZ(-360deg);
    right: 0;
    bottom: 0;
  }
}

@keyframes particles1 {
  0% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(35deg) translateY(0px);
    transform: rotateZ(35deg) translateY(0px);
  }

  63% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(35deg) translateY(0px);
    transform: rotateZ(35deg) translateY(0px);
  }

  64% {
    background-color: rgba(51, 51, 51,1);
    -webkit-transform: rotateZ(35deg) translateY(0px);
    transform: rotateZ(35deg) translateY(0px);
  }

  100% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(35deg) translateY(-30px);
    transform: rotateZ(35deg) translateY(-30px);
  }
}

@keyframes particles2 {
  0% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-65deg) translateY(0px);
    transform: rotateZ(-65deg) translateY(0px);
  }

  63% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-65deg) translateY(0px);
    transform: rotateZ(-65deg) translateY(0px);
  }

  64% {
    background-color: rgba(51, 51, 51,1);
    -webkit-transform: rotateZ(-65deg) translateY(0px);
    transform: rotateZ(-65deg) translateY(0px);
  }

  95% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-65deg) translateY(-40px);
    transform: rotateZ(-65deg) translateY(-40px);
  }

  100% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-65deg) translateY(-40px);
    transform: rotateZ(-65deg) translateY(-40px);
  }
}

@keyframes particles3 {
  0% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-75deg) translateY(0px);
    transform: rotateZ(-75deg) translateY(0px);
  }

  63% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-75deg) translateY(0px);
    transform: rotateZ(-75deg) translateY(0px);
  }

  64% {
    background-color: rgba(51, 51, 51,1);
    -webkit-transform: rotateZ(-75deg) translateY(0px);
    transform: rotateZ(-75deg) translateY(0px);
  }

  97% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-75deg) translateY(-35px);
    transform: rotateZ(-75deg) translateY(-35px);
  }

  100% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-75deg) translateY(-35px);
    transform: rotateZ(-75deg) translateY(-35px);
  }
}

@keyframes particles4 {
  0% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-25deg) translateY(0px);
    transform: rotateZ(-25deg) translateY(0px);
  }

  63% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-25deg) translateY(0px);
    transform: rotateZ(-25deg) translateY(0px);
  }

  64% {
    background-color: rgba(51, 51, 51,1);
    -webkit-transform: rotateZ(-25deg) translateY(0px);
    transform: rotateZ(-25deg) translateY(0px);
  }

  97% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-25deg) translateY(-30px);
    transform: rotateZ(-25deg) translateY(-30px);
  }

  100% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(-25deg) translateY(-30px);
    transform: rotateZ(-25deg) translateY(-30px);
  }
}

@keyframes particles5 {
  0% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(65deg) translateY(0px);
    transform: rotateZ(65deg) translateY(0px);
  }

  63% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(65deg) translateY(0px);
    transform: rotateZ(65deg) translateY(0px);
  }

  64% {
    background-color: rgba(51, 51, 51,1);
    -webkit-transform: rotateZ(65deg) translateY(0px);
    transform: rotateZ(65deg) translateY(0px);
  }

  97% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(65deg) translateY(-35px);
    transform: rotateZ(65deg) translateY(-35px);
  }

  100% {
    background-color: rgba(51, 51, 51,0);
    -webkit-transform: rotateZ(65deg) translateY(-35px);
    transform: rotateZ(65deg) translateY(-35px);
  }
}
.spinner {
  height: 50px;
  width: max-content;
  font-size: 18px;
  font-weight: 600;
  font-family: monospace;
  letter-spacing: 1em;
  color: #6B0FA8;
  display: flex;
  justify-content: center;
  align-items: center;
  border-color: #BAFF3B;
 }
 
 .spinner span {
  animation: loading6454 3.75s ease infinite;
 }
 
 .spinner span:nth-child(2) {
  animation-delay: 0.25s;
 }
 
 .spinner span:nth-child(3) {
  animation-delay: 0.5s;
 }
 
 .spinner span:nth-child(4) {
  animation-delay: 0.75s;
 }
 
 .spinner span:nth-child(5) {
  animation-delay: 1s;
 }
 
 .spinner span:nth-child(6) {
  animation-delay: 1.25s;
 }
 
 .spinner span:nth-child(7) {
  animation-delay: 1.5s;
 }
 .spinner span:nth-child(8) {
  animation-delay: 1.75s;
 }
 
 .spinner span:nth-child(9) {
  animation-delay: 2s;
 }
 
 .spinner span:nth-child(10) {
  animation-delay: 2.25s;
 }
 
 .spinner span:nth-child(11) {
  animation-delay: 2.5s;
 }
 
 .spinner span:nth-child(12) {
  animation-delay: 2.75s;
 }
 
 .spinner span:nth-child(13) {
  animation-delay: 3s;
 }
 .spinner span:nth-child(14) {
  animation-delay: 3.25s;
 }
 
 .spinner span:nth-child(15) {
  animation-delay: 3.5s;
 }
 
 .spinner span:nth-child(16) {
  animation-delay: 3.75s;
 }
 
 .spinner span:nth-child(17) {
  animation-delay: 4s;
 }
 
 .spinner span:nth-child(18) {
  animation-delay: 4.25s;
 }
 
 .spinner span:nth-child(19) {
  animation-delay: 4.5s;
 }
 .spinner span:nth-child(20) {
  animation-delay: 4.75s;
 }
 
 .spinner span:nth-child(21) {
  animation-delay: 5s;
 }
 
 .spinner span:nth-child(22) {
  animation-delay: 5.25s;
 }
 
 .spinner span:nth-child(23) {
  animation-delay: 5.5s;
 }
 
 .spinner span:nth-child(24) {
  animation-delay: 5.75s;
 }
 
 .spinner span:nth-child(25) {
  animation-delay: 6s;
 }
 .spinner span:nth-child(26) {
  animation-delay: 6.25s;
 }
 
 .spinner span:nth-child(27) {
  animation-delay: 6.5s;
 }
 
 .spinner span:nth-child(28) {
  animation-delay: 6.75s;
 }
 
 .spinner span:nth-child(29) {
  animation-delay: 7s;
 }
 
 .spinner span:nth-child(30) {
  animation-delay: 7.25s;
 }
 
 .spinner span:nth-child(31) {
  animation-delay: 7.5s;
 }
 
 @keyframes loading6454 {
  0%, 100% {
   transform: translateY(0);
  }
 
  50% {
   transform: translateY(-10px);
  }
 }
</style>
</head>
<body>
<div class="header">
  <h1>Header</h1>
</div>
<?php  
echo "<div class='topnav'>";
if(isset($_POST["ejecutar"])){
  echo "<meta http-equiv='refresh' content='0; url= http://localhost/whiskey/menuPage.php'>";
}
if(isset($_SESSION["start"]) && $_SESSION["token"] == "SI") {
  echo "<div class='topnav-left'>
          <a href='http://localhost/whiskey/cuentaPage.php'>Cuenta</a>
        </div>";
} else {
  echo "<div class='topnav-left'>
          <a href='#' id='iniciar-sesion'>Iniciar Sesion</a>
          <a href='#' id='crear-cuenta'>Crear Cuenta</a>
        </div>
        
        <form id='crear-cuenta-form' action='http://localhost/whiskey/Sesion/crear_sesion.php' method='POST' style='display: none;'>
        </form>
        <form id='iniciar-sesion-form' action='http://localhost/whiskey/Sesion/start_sesion.php' method='POST' style='display: none;'>
        </form>

        <script>
          document.getElementById('crear-cuenta').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('crear-cuenta-form').submit();
          });
        </script>
        <script>
          document.getElementById('iniciar-sesion').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('iniciar-sesion-form').submit();
          });
        </script>";
}

echo "<div class='topnav-center'>
    <a href='http://localhost/whiskey/menuPage.php'>Inicio</a>
        <a href='#'>Publicar</a>
        <a href='#'>Buscar</a>
        <a href='#'>News</a>
      </div>
      <div class='topnav-right'></div>
    </div>";

echo "<h1>Pagina Publicar </h1>";
if(isset($_SESSION['start']) && $_SESSION['token'] == 'SI') {
  echo "<form method='POST' action='procesarPublicacion.php'>

<div class='form-control'>
      <input type='text' name='titulo' required maxlength='60'>
      <label>
        <span style='transition-delay:0ms'>T</span><span style='transition-delay:50ms'>i</span><span style='transition-delay:100ms'>t</span>
        <span style='transition-delay:150ms'>u</span><span style='transition-delay:200ms'>l</span><span style='transition-delay:250ms'>o</span>
      </label>
    </div>
    <p class='contenido-publicacion'>Contenido de la publicación:</p>
    <textarea id='myTextarea' name='contenido' placeholder='Escribe el contenido de tu publicación aquí...' required></textarea>

    
    <button type='submit' name='ejecutar'>
      <div class='svg-wrapper-1'>
        <div class='svg-wrapper'>
          <svg height='24' width='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'>
            <path d='0 0h24v24H0z' fill='none'></path>
            <path d='M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z' fill='currentColor'></path>
          </svg>
        </div>
      </div>
      <span>Publicar</span>
    </button>
  </form>

  <script>
    function myFunction() {
      window.location.href = 'http://localhost/whiskey/menuPage.php';
    }
  </script>";
}else{ 
  echo "<div class='spinner'>
  <span>I</span>
  <span>n</span>
  <span>i</span>
  <span>c</span>
  <span>i</span>
  <span>a</span>
  <span>-</span>
  <span>S</span>
  <span>e</span>
  <span>s</span>
  <span>i</span>
  <span>o</span>
  <span>n</span>
  <span>-</span>
  <span>o</span>
  <span>-</span>
  <span>C</span>
  <span>r</span>
  <span>e</span>
  <span>a</span>
  <span>-</span>
  <span>u</span>
  <span>n</span>
  <span>a</span>
  <span>-</span>
  <span>c</span>
  <span>u</span>
  <span>e</span>
  <span>n</span>
  <span>t</span>
  <span>a</span>
</div>";
  echo "<div id='loader'>
  <div class='ls-particles ls-part-1'></div>
  <div class='ls-particles ls-part-2'></div>
  <div class='ls-particles ls-part-3'></div>
  <div class='ls-particles ls-part-4'></div>
  <div class='ls-particles ls-part-5'></div>
  <div class='lightsaber ls-left ls-green'></div>
  <div class='lightsaber ls-right ls-red'></div>
</div>";

  }
  ?>
</body>
</html>
</center>
