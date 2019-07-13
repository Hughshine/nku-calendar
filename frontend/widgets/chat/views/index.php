<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<style type="text/css">
.timeline {
    position:relative;
    margin-bottom:60px;
}
/* left */
.timeline .timeline-left .item {
    background-color: rgba(240, 240, 240, 0.3);
    border-right:rgba(240, 240, 240, 0.3) 3px solid;
    padding:10px;
    margin-left:50px;
    margin-bottom:15px;
    position:relative;
}
.timeline .timeline-left .item:after {
    right: 100%;
    border: solid transparent;
    content: " ";
    width: 0; height: 0;
    position: absolute;
    border-right-color:rgba(191, 141, 198, 0.06);;
    border-width: 10px;
    top: 10px; left:-20px;
}
.timeline .timeline-left .item:before {
    right: 100%;
    border: #ddd 5px solid;
    content: " ";
    position: absolute;
    top: 10px; left:-50px;
    background-color:#333;
    width:22px; height:22px;
    z-index:1;

}
.timeline-left:after {
    background: #ddd;
    z-index:0;
    content: "";
    display: block;
    left: 10px;
    top:0;
    bottom:0;
    position: absolute;
    width: 4px;
    opacity: 0.35;
}
.timeline  .timeline-left .timeline-centered-title {
    float:right;
    content:' ';
    clear:both;
    font-size:19px;
}



/*tap*/
.tap-div{
    display: none;
}
.tap-div.active{
    display: block;
}

.timeline .timeline-left .item:before {
    border: #ddd 4px solid;
    left: -46px;
    width: 16px;
    height: 16px;
}
.timeline .item p{
    margin-bottom:0px;
    margin-top:10px;
}
.timeline .timeline-left .noborder{
    border-right:none;
}
.timeline .timeline-left .item .singleline{
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}
.timeline .timeline-left .item-light:before {
    border: #dec0d8  4px solid;
    left: -46px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
}
.slideBox{
    color:#fff;
}
.slideBox p{
    margin: 20px 0px;
    text-align: left;
}
.bnlc-img{
    max-height:500px;
    max-width: 100%;
}









﻿@charset "utf-8";/* CSS Document */

/**====================Lay Out=============================*/

/** 01. Globals
 **************************************************************** **/
html {
    overflow-x: hidden;
    overflow-y: auto;
}

html, body {
    min-height: 100%;
}

body {
    color:#666;
    background-color:#fff;
    font-family:'Microsoft Yahei','微软雅黑','Open Sans', Arial, sans-serif;

    font-size:14px; line-height:23px;
    margin:0; padding:0 !important;
}
body.grey .divider .fa,
body.grey { /* grey background - YT style */
    background-color:#f1f2f7;
}

section {
    padding-top:60px;
    padding-bottom:60px;
}
section.alternate .divider .fa,
section.alternate {
    background-color:#F5F3F4;
}
body.grey section.alternate .divider .fa,
body.grey section.alternate {
    background-color:#e9e9e9;
}

section.dark {
    color:#fff;
    background-color:#333;
}

section header {
    display:block;
    margin-bottom:60px;
}
section header p {
    margin:0;
    padding:0;
}
section header strong {
    font-weight:500;
}
section header h1,
section header h2,
section header h3 {
    margin-bottom:10px;
}
figure {
    margin-bottom:20px;
}

input[type="color"],
input[type="email"],
input[type="number"],
input[type="password"],
input[type="tel"],
input[type="url"],
input[type="text"],
textarea, select {
    margin-bottom:10px;
}
.form-group input {
    margin:0;
}

.btn {
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
}

/* sticky header using bootstrap affix */
#header.sticky {
    display:block;
    left:0; right:0;
    z-index:100;
}
#header.sticky.affix #topBar {
    display:none;
}
#header.sticky.affix.has-slider { /* slider above */
    top:0;
    margin-top:0 !important;
}





/** 02. Boxed Layout
 **************************************************************** **/
body.boxed {
    background-color:#D7D6D6;
}
body.boxed #wrapper {
    position:relative;
}
body.boxed #wrapper,
body.boxed #topBar, /* IE BUG */
body.boxed footer {
    margin:auto;
    max-width:1170px;
}
body.boxed #wrapper {
    background-color:#fff;
    margin:30px auto !important;
    overflow:hidden;
    box-shadow:rgba(0,0,0,0.3) 0 0 6px;

    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
}
body.boxed #topBar {
    border-top:#333 4px solid;

    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
}
body.boxed #header.sticky.affix {
    margin-top:-30px; /* wrapper margin */
}

body.boxed #header.sticky.affix #topNav.translucent {
    margin-top:30px !important;
}

@media only screen and (max-width: 768px) {
    body.boxed #topBar,
    body.boxed #wrapper {
        margin:0 !important;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
    }
}


/** 03. Callout
 **************************************************************** **/
.callout {
    z-index:10;
    background-color:#F6F6F6;
    padding:30px 0;
}
.callout.styleBackgroundColor h2,
.callout.styleBackgroundColor h3,
.callout.styleBackgroundColor h4,
.callout.styleBackgroundColor p {
    color:#fff;
}
.callout.styleBackgroundColor .btn {
    border-color:rgba(255,255,255,0.3);
}
.callout h2,
.callout h3,
.callout h4 {
    font-weight:300;
    margin:0 0 8px 0;
}
.callout p {
    margin:0;
    padding:0;
    font-size:16px;
    font-weight:300;
}
.callout .btn {
    margin-top:0;
}


.callout.dark,
.callout.dark h2,
.callout.dark h3,
.callout.dark h4,
.callout.dark p {
    color:#fff;
    background-color:#252525;
}

.callout.dark p {
    color:#b1b1b1;
    font-size:17px;
    max-width:960px;
    margin:auto;
}
.callout.dark.arrow-up,
.callout.dark.arrow-down {
    position:relative;
    padding:60px 0;
}

.callout.dark.arrow-down:after{
    content:' ';
    position:absolute;
    width: 0; height: 0;
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
    border-top: 20px solid #252525;
    left:50%; margin-left:-10px;
    bottom:-20px;
}
.callout.dark.arrow-up:after{
    content:' ';
    position:absolute;
    width: 0; height: 0;
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
    border-bottom: 20px solid #252525;
    left:50%; margin-left:-10px;
    top:-20px;
}

@media only screen and (max-width: 990px) {
    .callout h2,
    .callout h3,
    .callout h4 {
        font-size:18px;
        font-weight:600;
    }
    .callout .btn {
        margin-top:20px;
    }
}




/** 04. Slider
 **************************************************************** **/
div.slider {
    background-color:#171717;
    position:relative;
    z-index:1;

    -webkit-box-shadow: 0 4px 0 rgba(0, 0, 0, 0.04);
    -moz-box-shadow: 0 4px 0 rgba(0, 0, 0, 0.04);
    -o-box-shadow: 0 4px 0 rgba(0, 0, 0, 0.04);
    box-shadow: 0 4px 0 rgba(0, 0, 0, 0.04);
}

div.slider a.btn {
    color:#fff;
}
div.slider a.btn-default {
    color:#000;
}


.tp-bannertimer {
    background:#777 !important;
    background:rgba(0,0,0,0.1) !important;
    height:4px !important;
}


.tparrows.round:before {
    font-family: 'revicons';
    color: #fff;
    font-style: normal;
    font-weight: normal;
    speak: none;
    display: inline-block;
    text-decoration: inherit;
    margin-right: 0;
    margin-top: 9px;
    text-align: center;
    width: 40px;
    font-size: 20px;
}
.tparrows {

}
.tparrows.round {

    cursor: pointer;

    background: rgba(0, 0, 0, 0.5) !important;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    width: 40px !important;
    height: 40px !important;

}
.tparrows:hover {
    color: #fff;
}
.tp-leftarrow.round:before {
    font-family: "fontawesome";
    content: "\f104";
}
.tp-rightarrow.round:before {
    font-family: "fontawesome";
    content: "\f105";
}
.tparrows.tp-rightarrow:before {
    margin-left: 1px;
}
.tparrows.round:hover {
    background: rgba(0, 0, 0, 1) !important;
}


/* CUSTOM TEXT */
.tp-caption.default_white {
    font-size: 18px;
    line-height: 21px;
    font-weight: 300;
    color: #fff;
    text-decoration: none;
    background-color: transparent;
    padding: 0px;
}
.tp-caption.default_black {
    font-size: 18px;
    line-height: 21px;
    font-weight: 300;
    color: #000;
    text-decoration: none;
    background-color: transparent;
    padding: 0px;
}
.tp-caption.block_black {
    background-color:#000;
}
.tp-caption.block_white {
    background-color:#fff;
}
.tp-caption.block_white,
.tp-caption.block_styleColor,
.tp-caption.block_black {
    white-space: nowrap;
    line-height: 34px;
    border-width: 0px;
    margin: 0px;
    padding: 1px 10px;
    letter-spacing: 0px;
    font-size: 22px;
    color:#fff;
}
.tp-caption.block_huge {
    font-size:130px;
    line-height:130px;
}
.tp-caption.block_huge.text-white {
    color:#fff;
}
.tp-caption.block_huge.text-black {
    color:#000;
}

/*
	@Flex Slider
*/
.flexslider.flexFull .flex-direction-nav a,
.flexslider.flexContent .flex-direction-nav a {
    display: block;
    width: 45px;
    height: 45px;
    margin: -22px 0 0 0;
    background: #333333;
    position: absolute;
    top: 50%;
    z-index: 10;
    cursor: pointer;
    font-size:0;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    color: transparent;
    opacity: 1;
    -webkit-transition: all .3s ease;
}
.flexslider.flexFull .flex-direction-nav a.flex-next:after,
.flexslider.flexContent .flex-direction-nav a.flex-next:after {
    content: "\e080";
}
.flexslider.flexFull .flex-direction-nav a.flex-prev:after,
.flexslider.flexContent .flex-direction-nav a.flex-prev:after {
    content: "\e079";
}

.flexslider.flexFull .flex-direction-nav a.flex-prev:after,
.flexslider.flexFull .flex-direction-nav a.flex-next:after,
.flexslider.flexContent .flex-direction-nav a.flex-prev:after,
.flexslider.flexContent .flex-direction-nav a.flex-next:after {
    font: 12px/1em 'Glyphicons Halflings';
    left: 16px;
    top: 16px;
    font-style: normal;
    position: absolute;
    display: inline-block;
    color: #fff;
}

/*
	@Layer Slider
*/
div.layerslider div.ls-slide>div.ls-l.fullvideo {
    width:100% !important;
    height:100% !important;
}
.ls-borderlessdark .ls-thumbnail-inner,
div.ls-thumbnail-slide-container {
    background-color:rgba(0,0,0,0.1) !important;
}

/*
	@OWL Slider
*/
#bar {
    width: 0%;
    max-width: 100%;
    height: 4px;
    background: #999;
}
#progressBar{
    width: 100%;
    background: rgba(0,0,0,0.05);
}
div.owl-carousel>div {
    position:relative;
}
div.owl-carousel .caption {
    position:absolute;
    left:0; right:0; bottom:0;
    color:#333; font-size:20px;
    background:rgba(0,0,0,0.2);
    text-shadow:#fff 1px 1px 1px;
    text-align:center;
    padding:3px; margin-right:1px;
    z-index:10;
}




/** 05. Misc
 **************************************************************** **/
#toTop {
    background-color: #333;
    border-radius: 4px 4px 0 0;
    color: #FFF;
    position: fixed;
    height: 35px; width: 48px;
    right: 6px; bottom: 0;
    text-align: center;
    text-transform: uppercase;
    opacity: 0.9;
    padding-top: 7px;
    text-decoration:none;
    display:none;
    z-index: 1000;

    -webkit-transition: all 0.2s;
    -moz-transition: all 0.2s;
    -o-transition: all 0.2s;
    transition: all 0.2s;
}
#toTop:before {
    font-family: "fontawesome";
    content: "\f077";
}
span.user-avatar {
    background:#eee;
    width:64px; height:64px;
    float:left;
    margin-right:10px;
}
section.page-title {
    padding:20px 0 0 0;
    display:block;
    position:relative;
    background-color:rgba(0,0,0,0.03);
    border-bottom:rgba(0,0,0,0.03) 1px solid;

    background-repeat: no-repeat;
    background-position: 50% 50%;

    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
body.grey section.page-title {
    background-color:#ddd;
}
section.page-title header {
    margin:0;
}
section.page-title h1 {
    font-size: 2.2em;
    line-height: 42px;
}

section.page-title ul.breadcrumb {
    display:block;
}
section.page-title h2 {
    margin:0 0 -1px 0;
    padding-bottom:15px;
    border-bottom:rgba(0,0,0,0.07) 1px solid;
    display:inline-block;
}

ul.has-icons>li>i {
    margin-right:6px;
    min-width:15px;
}
.callout  ul.list-icon li:before {
    font-size:20px;
}

section.brands {
    padding:30px 0;
}

.dropdown-menu .label {
    color:#fff !important;
    margin-top:-2px;
}

/* alert - callout */
.alert-default h4 {
    margin-bottom:3px;
}
.alert-default p:last-child {
    margin:0;
}

/* bootstrap form icons */
.has-feedback .form-control-feedback {
    top:30px;
}

/* range picker buttons */
.range_inputs .btn {
    padding:6px;
}

/* color picker */
.colorpicker.inline:before {
    display:none;
}

/* form slider */
.slider.slider-horizontal,
.slider.slider-vertical {
    background: transparent;
}

/* sidebar */
.tab-post {
    padding-bottom:20px;
    margin-bottom:20px;
    border-bottom:rgba(0,0,0,0.06) 1px solid;
}
.tab-post:last-child {
    border-bottom:0;
    margin-bottom:0;
    padding-bottom:0;
}
.tab-post .tab-post-link {
    font-size:13px;
    line-height:13px;
}
.tab-post small {
    display:block;
    font-size:10px;
}

/* sky-form */
.sky-form {
    margin-bottom:30px;
}

/* parallax */
.parallax {
    padding:60px 0;
    position:relative;
    background-color:rgba(0,0,0,0.8);
}
.parallax-overlay {
    position:absolute;
    left:0; right:0; top:0; bottom:0;
    background-image:url('../images/patterns/parallax_overlay.png');
    background-repeat:repeat;
    background-color:rgba(0,0,0,0.6);
    z-index:1;
}
.parallax .parallax-content {
    z-index:2;
}
@media only screen and (max-width: 1024px) {
    .parallax {
        background-attachment: scroll ;
        background-position: center ;
        background-size: 1024px 100% ;
        /*background-attachment: scroll !important;*/
        /*background-position: center !important;*/
        /*background-size: 1024px 100% !important;*/
    }
}

/* footable */
.footable {
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
}
.footable > thead > tr > th, .footable > thead > tr > td {
    background-image:none;
    background-color: rgba(0,0,0,0.03) !important;
}

/* search page */
form.search-big {
    margin-bottom:30px;
    margin-top:-30px;
    display:block;
}
form.search-big input {
    height:46px;
    border-width:1px;
    border: #c6c6c6 1px solid;
}
div.search-result {
    padding:20px 0;
    border-bottom:#eee 1px solid;
}
div.search-result h4 {
    margin:0;
    line-height:20px;
    font-weight:400;
}
div.search-result p {
    margin:0; padding:0;
}
div.search-result img {
    float:left;
    margin-right:10px;
    margin-top:6px;
}
.search-title-aside {
    margin-top:20px;
    font-size:17px;
    line-height: 20px;
    color:#888;
    font-weight:400;
}
ul.search-history {
    border-bottom:#eee 1px solid;
    margin-bottom:0;
    padding-bottom:6px;
}


/* user profile */
.buttons-over-image {
    position:absolute;
    left:23px; top:8px;
}





/**	06. Maps
 *************************************************** **/
/* vectorial map */
#world-map {
    background-color:rgba(0,0,0,0.06);
    padding:0 3px 3px 0;
}

.jvectormap-zoomin, .jvectormap-zoomout {
    background: #333;
    width: 20px; height: 20px;
    padding: 4px 0;

    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
}

.jvectormap-zoomout {
    top: 40px;
}

/* gmaps.js */
#map, #panorama {
    height: 300px;
}




/**	07. Maintenance
 *************************************************** **/
.maintenance {
    padding: 20px;
    margin-top: 10%;
    background-color: rgba(0,0,0,0.05);
    font-family:'Open Sans';
    font-size:14px;
    line-height:23px;
    text-align: center;
    font-weight:300;
}
.maintenance h1 {
    font-size:50px;
    line-height:50px;
    font-weight:300;
    margin-bottom:6px;
}
@media only screen and (max-width: 480px) {
    .maintenance h1 {
        font-size:40px;
        line-height:40px;
    }
}




/**	08. Error 404
 *************************************************** **/
.default-404 {
    font-size:170px;
    line-height:170px;
    color:rgba(0,0,0,0.3);
    text-align:center;
    display:block;
    margin-bottom:30px;
}

@media only screen and (max-width: 600px) {
    .default-e404 p {
        margin-bottom:60px;
    }
    .default-404 {
        display:none;
    }
}




/**	09. Coming Soon
 *************************************************** **/
.comingsoon {
    padding: 20px;
    margin-top: 10%;
    background-color: rgba(0,0,0,0.05);
    font-family:'Open Sans';
    font-size:14px;
    line-height:23px;
    text-align: center;
    font-weight:300;
    color:#000;
}
.comingsoon hr {
    border:0;
    border-bottom:rgba(0,0,0,0.1) 2px solid;
}
.comingsoon h1 {
    font-size:50px;
    line-height:50px;
    font-weight:300;
    margin-bottom:6px;
}

.comingsoon span.countdown_amount {
    font-size: 50px !important;
    padding: 15px;
}
.comingsoon span.countdown_section {
    color: #fff;
    padding: 30px 45px;
    margin-bottom: 2px;
    background: rgba(0,0,0,0.05);
    text-align: center;
}
.comingsoon span.countdown_row span {
    font-size: 16px;
    line-height: 19px;
    margin-right: 1px;
    text-align: center;
    display: inline-block;
}
.comingsoon .form-control {
    height:38px;
    border:0;

    -webkit-border-radius:0;
    -moz-border-radius:0;
    border-radius:0;
}

@media only screen and (max-width: 960px) {
    .comingsoon span.countdown_amount {
        font-size:50px !important;
        padding:6px;
    }
    .comingsoon span.countdown_section {
        padding:20px;
    }
    .comingsoon span.countdown_row span {
        font-size:14px;
    }
}
@media only screen and (max-width: 550px) {
    .comingsoon h1 {
        font-size:40px;
        line-height:40px;
    }

    .comingsoon span.countdown_amount {
        font-size:20px !important;
        padding:6px;
    }
    .comingsoon span.countdown_section {
        font-size:12px;
        padding:10px;
    }
    .comingsoon span.countdown_row span {
        font-size:11px;
    }
}




/** 10. Word Rotator
 **************************************************************** **/
.word-rotator {
    visibility: hidden;
    width: 100px;
    height: 0;
    margin-bottom:-11px;
    display: inline-block;
    overflow: hidden;
    text-align: left;
    position: relative;
}
h2 .word-rotator {
    bottom:2px;
    height: 42px !important;
}
h3 .word-rotator {
    bottom:9px;
    height: 24px !important;
}
h4 .word-rotator {
    bottom:5px;
    height: 27px !important;
}
h5 .word-rotator {
    bottom:7px;
    height: 18px !important;
}
p .word-rotator {
    bottom:5px;
}
p.lead .word-rotator {
    bottom:4px;
}
.word-rotator.active {
    visibility: visible;
    width: auto;
}
.word-rotator .items {
    position: relative;
    width: 100%;
}
.word-rotator .items span {
    display:block;
    margin-bottom:0;
}




/** 11. Item Box
 **************************************************************** **/
.item-box {
    background:#f6f6f6;
    overflow:hidden;
    margin:16px 0;
    position:relative;
    display:inline-block;

    -webkit-border-radius:0;
    -moz-border-radius:0;
    border-radius:0;
}
.item-box.fullwidth {
    max-width:100%;
}
section.alternate .item-box {
    background-color:#fff;
}


.item-box figure {
    width:100%;
    display:block;
    margin-bottom:0;
    overflow:hidden;
    position:relative;
    text-align:center;
}
.item-box.fixed-box figure img {
    width:100%;
    height:auto;
}
.item-box-desc {
    padding:10px 20px;
    overflow:hidden;
}
.item-box-desc p {
    margin-top:20px;
    display:block;
    overflow:hidden;
    text-overflow:ellipsis;
    /*white-space: nowrap;*/
}
.item-box.fixed-box .item-box-desc p {
    height:98px;
}
.item-box-desc h4 {
    padding:0; margin:0;
}
.item-box .item-box-desc small {
    display:block;
}

.item-box.fixed-box .item-box-desc {
    height:256px;
}

.item-box.fixed-box figure {
    max-height:263px;
}
.item-box .socials {
    border-top:#eee 1px solid;
    text-align:center;
    display:block;
}


/* hover */
.item-box .item-hover {
    opacity: 0;
    filter: alpha(opacity=0);
    position:absolute;
    left:0; right:0; top:0; bottom:0;
    text-align:center;
    color:#fff;

    -webkit-transition: all 0.2s;
    -moz-transition: all 0.2s;
    -o-transition: all 0.2s;
    transition: all 0.2s;
}
.item-box .item-hover,
.item-box .item-hover button,
.item-box .item-hover a {
    color:#fff;
}
.item-box .item-hover .inner {
    position:absolute;
    display:block;
    left:0; right:0; top:50%;
    margin-top:-10px;
    z-index:100;
}
.item-box:hover .item-hover {
    opacity: 1;
    filter: alpha(opacity=100);
}

.nav-pills>li.active>a,
.nav-pills>li.active>a:hover,
.nav-pills>li.active>a:focus {
    color:#333;
    background-color:rgba(0,0,0,0.07);
}
.item-box .item-hover .overlay {
    background-color:rgba(127,127,127,0.6);
}



/** Box Content **/
.box-content.thumbnail {
    position:relative;
    max-width:255px;
    display:inline-block;
    margin-bottom:30px;
    border:0; padding:0;
    background:rgba(0,0,0,0.03);
}
.box-content.thumbnail:hover {
    background:rgba(0,0,0,0.08);
    border:0 !important;
}
.box-content.thumbnail .item-image {
    position:relative;
    display:inline-block;
    overflow:hidden;
}
.box-content.thumbnail  h3 {
    position:absolute;
    bottom:10px; left:0;
    text-align:left;
    font-size:18px;
    line-height:18px;
    color:#fff;
}
.box-content.thumbnail img {
    width:100%; /* IE fix */
}
.box-content.thumbnail  h3 span {
    display:inline-block;
    background-color:rgba(0,0,0,0.8);
    padding:10px 10px 20px 10px;
}
.box-content.thumbnail  h3 small {
    display:inline-block; color:#333;
    background:rgba(255,255,255,0.9);
    padding:3px; margin-top:-10px;
    position:absolute; bottom:-10px; left:10px;
}
.box-content.thumbnail p {
    font-size:12px;
    line-height:16px;
    text-align:left;
    height:80px;
    overflow:hidden;
    text-overflow:ellipsis;
    border-bottom:#eee 1px solid;
    padding-bottom:10px;
    margin-bottom:6px;
}
@media only screen and (max-width: 480px) {
    .box-content.thumbnail  h3 {
        font-size:15px;
        line-height:15px;
    }
}

.box-content .item-image>img {
    -webkit-transition: all .2s ease 0s;
    -moz-transition: all .2s ease 0s;
    -o-transition: all .2s ease 0s;
    transition: all .2s ease 0s;
}

.box-content .item-image:hover>img {
    -webkit-transform: scale(1.1, 1.1);
    -moz-transform: scale(1.1, 1.1);
    -ms-transform: scale(1.1, 1.1);
    -o-transform: scale(1.1, 1.1);
    transform: scale(1.1, 1.1);
}





/** 12. Timeline
 **************************************************************** **/
.timeline {
    position:relative;
    margin-bottom:60px;
}


/* left */
.timeline .timeline-left .item {
    background-color: rgba(240, 240, 240, 0.3);
    border-right:rgba(240, 240, 240, 0.3) 3px solid;
    padding:10px;
    margin-left:50px;
    margin-bottom:15px;
    position:relative;
}
.timeline .timeline-left .item:after {
    right: 100%;
    border: solid transparent;
    content: " ";
    width: 0; height: 0;
    position: absolute;
    border-right-color:rgba(191, 141, 198, 0.06);;
    border-width: 10px;
    top: 10px; left:-20px;
}
.timeline .timeline-left .item:before {
    right: 100%;
    border: #ddd 5px solid;
    content: " ";
    position: absolute;
    top: 10px; left:-50px;
    background-color:#333;
    width:22px; height:22px;
    z-index:1;

}
.timeline-left:after {
    background: #ddd;
    z-index:0;
    content: "";
    display: block;
    left: 10px;
    top:0;
    bottom:0;
    position: absolute;
    width: 4px;
    opacity: 0.35;
}
.timeline  .timeline-left .timeline-centered-title {
    float:right;
    content:' ';
    clear:both;
    font-size:19px;
}

/* right */
.timeline .timeline-right .item {
    background-color: rgba(191, 141, 198, 0.06);
    border-left:rgba(0,0,0,0.06) 3px solid;
    padding:15px;
    margin-right:50px;
    margin-bottom:30px;
    position:relative;
}
.timeline .timeline-right .item:after {
    right: 100%;
    border: solid transparent;
    content: " ";
    width: 0; height: 0;
    position: absolute;
    border-left-color: rgba(0,0,0,0.06);
    border-width: 10px;
    top: 10px; right:-20px;
}
.timeline .timeline-right .item:before {
    right: 100%;
    border: #ddd 5px solid;
    content: " ";
    position: absolute;
    top: 10px; right:-50px;
    background-color:#333;
    width:22px; height:22px;
    z-index:1;

}
.timeline-right:after {
    background: #ddd;
    z-index:0;

    content: "";
    display: block;
    right: 10px; top:0; bottom:0;
    position: absolute;
    width: 4px;
    opacity: 0.35;
}
.timeline .timeline-right .item h4 {
    text-align:right;
}
.timeline .timeline-right .timeline-centered-title {
    float:left;
    content:' ';
    clear:both;
    font-size:19px;
}

/** centered **/
.timeline .timeline-centered .item {
    background-color: rgba(0,0,0,0.06);
    padding:15px;
    margin-bottom:30px;
    position:relative;
    margin-top:100px;
}
.timeline .timeline-centered .item:first-child {
    margin-top:0;
}
.timeline-centered:after {
    background: #ddd;
    z-index:0;

    content: "";
    display: block;
    top:0; bottom:0;
    position: absolute;
    width: 4px;
    opacity: 0.35;

    left: 50%;
    margin-left: 0;
    height:100%;
}
.timeline-centered .item {
    max-width:46%;

}
.timeline .timeline-centered .item.pull-right:after {
    right: 100%;
    border: solid transparent;
    content: " ";
    width: 0; height: 0;
    position: absolute;
    border-right-color: rgba(0,0,0,0.06);
    border-width: 10px;
    top: 10px; left:-20px;
}
.timeline .timeline-centered .item.pull-right:before {
    right: 100%;
    border: #ddd 5px solid;
    content: " ";
    position: absolute;
    top: 10px; left:-43px;
    background-color:#333;
    width:22px; height:22px;
    z-index:1;

}
.timeline .timeline-centered .item.pull-left:after {
    right: 100%;
    border: solid transparent;
    content: " ";
    width: 0; height: 0;
    position: absolute;
    border-left-color: rgba(0,0,0,0.06);
    border-width: 10px;
    top: 10px; right:-20px;
}
.timeline .timeline-centered .item.pull-left:before {
    right: 100%;
    border: #ddd 5px solid;
    content: " ";
    position: absolute;
    top: 10px; right:-46px;
    background-color:#333;
    width:22px; height:22px;
    z-index:1;

}
.timeline .timeline-centered .item.pull-left h4 {
    text-align:right;
}
.timeline .timeline-centered .item.pull-right .timeline-centered-title {
    float:right;
    content:' ';
    clear:both;
    font-size:19px;
}
.timeline .timeline-centered .item.pull-left .timeline-centered-title {
    float:left;
    content:' ';
    clear:both;
    font-size:19px;
}

.timeline  .timeline-centered p {
    content:'';
    clear:both;
}

@media only screen and (max-width: 768px) {
    .timeline-centered .item {
        width:100% !important;
        max-width:100% !important;
        margin:0 0 30px 0 !important;
    }
    .timeline .timeline-centered .item.pull-left,
    .timeline .timeline-centered .item.pull-right {
        float:none !important;
        display:block !important;
        position:relative !important;
    }
    .timeline .timeline-centered .item.pull-left h4 {
        text-align:left;
    }
    .timeline .timeline-centered .item.pull-right:after,
    .timeline .timeline-centered .item.pull-right:before,
    .timeline .timeline-centered .item.pull-left:after,
    .timeline .timeline-centered .item.pull-left:before,
    .timeline-centered:after {
        display:none;
    }
}



/** 13. Portfolio
 **************************************************************** **/
/* item list */
#portfolio .item-box-desc h4 {
    font-size:17px;
    max-height:32px;
    overflow:hidden;
}
#portfolio .item-box figure img {
    width:100%;
    margin:auto;
}

#portfolio .item-box-desc small {
    font-size:12px;
    margin-bottom:0;
}

#portfolio .item-box a {
    text-decoration:none;
}

/* Full Width */
#portfolio ul.fullwidth .isotope-item,
#portfolio ul.fullwidth .item-box {
    margin:0;
}
#portfolio ul.fullwidth .item-box .overlay,
#portfolio ul.fullwidth .item-box {
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
}
#portfolio ul.fullwidth .isotope-item {
    width:20%; /* 5 items / row - also, see responsive*/
    float:left;
}

#portfolio .project_quick_info span {
    padding:0 8px;
}
#portfolio .project_quick_info i.fa {
    padding-right:6px;
}


/* Full Center */
#portfolio ul.fullcenter {
    margin-left:15px;
    margin-right:15px;
}
#portfolio ul.fullcenter .isotope-item,
#portfolio ul.fullcenter .item-box {
    margin:0;
}
#portfolio ul.fullcenter .item-box .overlay,
#portfolio ul.fullcenter .item-box {
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
}
#portfolio ul.fullcenter .isotope-item {
    width:25%; /* 4 items / row - also, see responsive*/
    float:left;
}

@media only screen and (max-width: 960px) {
    #portfolio ul.fullwidth .isotope-item,
    #portfolio ul.fullcenter .isotope-item {
        width:33.333333333%;  /* 3 items / row */
    }
}
@media only screen and (max-width: 768px) {

}
@media only screen and (max-width: 479px) {
    #portfolio ul.fullwidth .isotope-item,
    #portfolio ul.fullcenter .isotope-item {
        width:100%;  /* 1 item / row */
    }
}




/** 14. Contact
 **************************************************************** **/
#gmap {
    width:100%;
    height:400px;
    display:block;

    z-index:1;
}
#gmap.gmap-half {
    height:250px;
}
#gmap.grayscale {
    -webkit-filter: grayscale(100%);
    -moz-filter: grayscale(100%);
    -ms-filter: grayscale(100%);
    -o-filter: grayscale(100%);
    filter: grayscale(100%);
    filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale");
    filter: gray;
}



/** 15. Onepage
 **************************************************************** **/
.divider.onepage {
    max-width:300px;
}
.divider.onepage.center {
    margin: 60px auto;
}
.divider.half-margins.onepage.center {
    margin: 30px auto;
}
h1.font-dosis,
h2.font-dosis,
h3.font-dosis,
h4.font-dosis,
h5.font-dosis,
h6.font-dosis {
    font-family:'Dosis';
}

form.onepage input[type="text"],
form.onepage input[type="password"],
form.onepage input[type="email"],
form.onepage input[type="phone"],
form.onepage textarea,
form.onepage textarea:focus,
form.onepage select,
form.onepage select:focus {
    border: #ddd 1px solid;
    margin: 0 !important;
    padding: 16px;
    font-size: 16px;
    box-shadow: none !important;
    background: #fff;
}
form.onepage .row div {
    padding-top: 4px;
    padding-right: 2px;
    padding-left: 2px;
}
form {
    padding-left:15px;
    padding-right:15px;
}
.onepage-slider-offset {
    padding-top:60px;
}
body.boxed .onepage-slider-offset {
    padding-top:30px;
}







/**	16. User Profile
 *************************************************** **/
.profile-buttons {
    background-color:rgba(0,0,0,0.05);
    padding:15px;
}
.profile-buttons h2 {
    margin:0; padding:0;
    font-size:30px;
    line-height:30px;
}
.profile-btn-link {
    padding:4px 10px !important;
    margin:0 !important;
    color:#999;
}
.profile-activity h6 {
    margin-bottom:6px;
    padding-left:15px;
    font-weight:bold;
}
.profile-activity p {
    font-size:13px;
    padding-left:15px;
}

.profile-tabs {
    border-top:rgba(0,0,0,0.1) 1px solid;
    padding-top:30px;
    margin-top:-1px;
}


time.datebox {
    font-size: 14px;
    display: block;
    position: relative;
    width: 35px;
    background-color: #fff;
    margin: 3px auto;
    border:1px solid;
}
time.datebox strong {
    padding: 2px 0;
    color: #fff;
    background-color:rgba(0,0,0,0.7);
    display:block;
    text-align:center;
}
time.datebox span {
    font-size: 15px;
    color: #2f2f2f;
    display:block;
    text-align:center;
}




/** 17. Comments
 *************************************************** **/
#comments {
    margin-top:60px;
}
#comments .comment {
    margin:40px 0;
}
#comments a.replyBtn {
    float:right;
    font-size:11px;
    text-transform:uppercase;
}
#comments span.user-avatar {
    background:#eee;
    width:64px; height:64px;
    float:left;
    margin-right:10px;
}

ul.comment {
    margin-bottom:30px;
}
li.comment {
    position:relative;
    margin-bottom:25px;
    font-size:13px;
}
li.comment p {
    margin:0; padding:0;
}
li.comment img.avatar {
    position:absolute;
    left:0; top:0;
    display:inline-block;
}
li.comment.comment-reply img.avatar {
    left:6px; top:6px;
}
li.comment .comment-body {
    position:relative;
    padding-left:60px;
}
li.comment.comment-reply {
    margin-left:60px;
    background-color:#fafafa;
    padding:6px;
    margin-bottom:6px;
}
li.comment a.comment-author {
    margin-bottom:6px;
    display:block;
}
li.comment a.comment-author span {
    font-size:15px;
}




/** 18. Responsive
 **************************************************************** **/
@media only screen and (max-width: 1216px) {
    .container {
        width:100%;
    }
}

@media only screen and (max-width: 990px) {
}

@media only screen and (max-width: 768px) {
    #header.sticky #topNav {
        max-height: 300px;
        overflow-y: auto;
        width:100%;
    }
}

@media only screen and (max-width: 480px) {
    .alert-default div.text-right {
        text-align:left;
    }
    .alert-default .btn {
        margin-top:20px;
    }

    /* centered page-title */
    section.page-title h2,
    section.page-title h2 span,
    section.page-title {
        text-align:center;
    }
}




/** --. DEMO ONLY
 **************************************************************** **/
/** feature-icons.html - icon text color - can be removed on production **/
.fa-hover a {
    display:block;
    padding:4px;
    text-decoration:none;
}
.fa-hover a:hover {
    background-color:#f3f3f3;
}
.fa-hover i {
    width:20px;
    margin-right:10px;
}
.fa-hover a span {
    color:#666;
}
/** *** **/



.bs-glyphicons .glyphicon-class {
    display: block;
    text-align: center;
    word-wrap: break-word;
}
.bs-glyphicons .glyphicon {
    margin-top: 5px;
    margin-bottom: 10px;
    font-size: 24px;
}
.bs-glyphicons li {
    float: left;
    width: 25%;
    height: 115px;
    padding: 10px;
    font-size: 10px;
    line-height: 1.4;
    text-align: center;
    border: 1px solid #fff;
    background-color: #f9f9f9;
    cursor:pointer;
}
.bs-glyphicons li:hover {
    background-color:#f3f3f3;
}
@media (min-width: 768px) {
    .bs-glyphicons li {
        width: 12.5%;
        font-size: 12px;
    }
}

.iconExamples .example {
    text-align: center;
    cursor:pointer;
    padding:6px 3px;
}
.iconExamples .example:hover {
    background-color:#f3f3f3;
}
.iconExamples .example:before,
.iconExamples .example:after {
    content: " ";
    display: table;
}
.iconExamples .example .icon {
    font-size: 20px;
    float: left;
    width: 35px;
}
.iconExamples .example .class {
    text-align: center;
    font-size: 13px;
    float: left;
    margin-top: 0;
    font-weight: 400;
    margin-left: 10px;
    color: #333;
}



/** *** **/
.grid-color span {
    display:block;
    padding: 10px 0;
    text-align: center;
    background-color:rgba(0,0,0,0.1);
}
.grid-demo [class*="col-"] {
    background: #fafafa;
    border: 1px solid;
    border-color: #ddd;
    padding: 10px;
    text-align: center;
    margin-bottom:20px;
}
.grid-demo .row {
    margin-left:0;
    margin-right:0;
}

/** *** **/
.linecon .icon {
    width: 12.5%;
    float: left;
    height: 115px;
    text-align: center;
    padding: 22px 10px;
    margin: 0 -1px -1px 0;
    border: 1px solid #fff;
    background-color: #f6f6f6;
    word-wrap: break-word;
    cursor:pointer;
}
.linecon .icon:hover {
    background-color:#f3f3f3;
}
.linecon .icon i {
    display: block;
    font-size: 30px;
    margin-bottom: 10px;
}

/**====================Head Part=============================*/
/** Menu
 **************************************************************** **/
#topBar {
    display:block;
    position:relative;
    background-color:#fff;
    min-height:30px;
    z-index:10;
}
#topBar a.logo {
    margin:25px 0;
    display:inline-block;
    min-height:50px;
}
body.boxed #topBar {
    -webkit-border-bottom-left-radius: 0;
    -webkit-border-bottom-right-radius: 0;
    -moz-border-radius-bottomleft: 0;
    -moz-border-radius-bottomright: 0;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
#topNav a.logo.onepage {
    display:inline-block;
    height:50px;
    overflow:hidden;
    margin-top:3px;
}
#topBar a.social {
    width:24px; height:24px;
    line-height:26px;
    font-size:16px;
}

#topNav {
    display:block; left:0; right:0; top:0;

    background:#fff;
    position:relative;
    z-index:10;

    -webkit-box-shadow: 0 4px 0 rgba(0, 0, 0, 0.04);
    -moz-box-shadow: 0 4px 0 rgba(0, 0, 0, 0.04);
    -o-box-shadow: 0 4px 0 rgba(0, 0, 0, 0.04);
    box-shadow: 0 4px 0 rgba(0, 0, 0, 0.04);
}


#topNav .nav-pills>li>a,
#topNav .nav-pills>li>a:hover,
#topNav .nav-pills>li>a:focus,
#topNav .nav-pills>li.active>a,
#topNav .nav-pills>li.active>a:hover,
#topNav .nav-pills>li.active>a:focus {
    background-color:transparent;
}
#topNav div.navbar-collapse {
    padding:0;
}
#topNav ul.nav>li {
    color:#666;
    text-align:center;
    position:relative;
    margin:0;
    background: url(../img/menu-divider.png) right center no-repeat;
}
#topNav ul.nav>li:last-child {
}
#topNav ul.nav>li:hover>a:before,
#topNav ul.nav>li.active>a:before {

}

#topNav ul.nav>li a {
    color:#FFF;
    padding: 15px 35px;
    position: relative;
    text-decoration: none;
    font-size:14px;
    line-height:14px;
    display:block;
    font-weight:300;

    -webkit-transition: all 0.2s;
    -moz-transition: all 0.2s;
    -o-transition: all 0.2s;
    transition: all 0.2s;
}
#topNav ul.nav>li>a>span {
    display:block;
    font-size:12px;
    color:#ccc;

    -webkit-transition: all 0.2s;
    -moz-transition: all 0.2s;
    -o-transition: all 0.2s;
    transition: all 0.2s;
}

#topNav ul.nav>li:hover a {
    color:#ffa0e5;
}
#topNav ul.nav>li>ul>li a {
    color:#666 !important;
}
#topNav ul.nav>li:hover a>span {
    color:#888;
}



/* submenu */
#topNav ul.dropdown-menu li.divider {
    margin:-1px 0 0 0;
    padding:0; border:0;
    border-bottom:rgba(0,0,0,0.2) 1px solid;
}
#topNav .nav li:hover>ul.dropdown-menu {
    padding:0;
    display:block;
    z-index:100;
}

#topNav ul.dropdown-menu {
    text-align:left;
    margin-top:0;
    box-shadow:none;
    border:#eee 1px solid;
    border-top:0;
    list-style:none;
    background-color:#fff;
    box-shadow:rgba(0,0,0,0.2) 0 6px 12px;
    min-width:200px;

    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
}
#topNav ul.dropdown-menu li {
    position:relative;
}
#topNav ul.dropdown-menu>li a {
    margin:0;
    padding:10px 15px;
    font-weight:400;

    color:#555;
    font-size:13px;
    border-bottom:rgba(0,0,0,0.1) 1px solid;
}
#topNav ul.dropdown-menu>li a i.fa {
    margin-right:4px;
}
#topNav ul.dropdown-menu a.dropdown-toggle:after {
    content: "\f105";
    font-family: FontAwesome;
    position: absolute;
    font-size: 15px;
    right: 10px;
    top: 9px;
    color:#999;
}

#topNav .dropdown-submenu > a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #eaeaea;
    margin-top: 5px;
    margin-right: -10px;
}
#topNav .dropdown-submenu li:hover> a:after {
    color:#fff !important;
}
#topNav ul.dropdown-menu li:last-child>a {
    border-bottom:0;
    border-bottom:0;
}
.dropdown-menu>li:hover>a,
.dropdown-menu>li:focus>a {
    color:#fff !important;
    background-color:#333;
}

/* sub-submenu */
#topNav ul.dropdown-menu>li:hover > ul.dropdown-menu {
    display:block;
    position:absolute;
    left:100%; top:0;
    padding:0; margin:0;
    border-top:0 !important;
    border-bottom:0 !important;
    border-right:0 !important;

    border:#eaeaea 1px solid;

    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
}


/* search */
#topNav form.search {
    float:right;
    max-width:180px;
    margin:12px 0 0 0;
    padding:0;
}
#topNav form.search {
    position:relative;
}
#topNav form.search input {
    padding:6px 26px 6px 6px;
    height:auto; width:100%;
    font-size:13px;
    position:relative;
    z-index:0;

    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
}
#topNav form.search button {
    position:absolute;
    top:10px; right:10px;
    color:#ccc;
    z-index:1;
}


/* mobile */
#topNav button.btn-mobile {
    display:none;
}
#topNav button.btn-mobile {
    color:#fff;
    display: none;
    background:#333;
    padding:6px 10px;
    margin-top:8px;
    margin-bottom:3px;

    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
}
#topNav button.btn-mobile i {
    padding:0; margin:0;
    font-size:21px;
}


/** Mega Menu
 **************************************************************** **/
#topNav ul.nav>li.mega-menu {
    position:inherit;
}
#topNav ul.nav>li.mega-menu p {
    margin:0; padding:10px 10px 0 10px;
    font-size:13px;
}

#topNav ul.nav>li.mega-menu div.row {
    width:100%;
}

#topNav ul.nav>li.mega-menu div {
    display:table;
}
#topNav ul.nav>li.mega-menu div.nottable {
    display:block;
}
#topNav ul.nav>li.mega-menu div div {
    border-left:#eee 1px solid;
    margin-left:-1px;
    display: table-cell;
    vertical-align:top;
    float:none;
}
#topNav ul.nav>li.mega-menu div div:first-child {
    border-left:0;
}

#topNav ul.nav>li.mega-menu>ul {
    width:100%;
    background-color:transparent;
    border:none;
    box-shadow:none;
}
#topNav ul.nav>li.mega-menu>ul.dropdown-menu>li {
    margin:0 15px; padding:15px;
    background-color:#fff;
    border: #eee 1px solid;
    box-shadow: rgba(0,0,0,0.2) 0 6px 12px;
}
#topNav ul.nav>li.mega-menu>ul ul {
    margin:0 !important;
    padding:0 !important;
    list-style:none;
}

#topNav ul.nav>li.mega-menu h3 {
    font-size:18px;
    line-height:18px;
    margin:10px 10px 20px 10px; padding:0;
}
#topNav ul.nav>li.mega-menu>ul li>a {
    border-bottom:0;
    padding: 6px 10px;
}
#topNav ul.nav>li.mega-menu>ul li.active>a,
#topNav ul.nav>li.mega-menu>ul li:hover>a {
    color:#fff;
    background-color:#333;
}
#topNav ul.nav>li.mega-menu>ul li.divider {
    border:0;
    border:rgba(0,0,0,0.01) 1px solid;
    margin:10px 0;
}


/** Secondary Main Menu
	Top Bar / Shop Cart
 **************************************************************** **/
#barMain {
    float:right;
    margin-top:6px;
    font-size:12px;
}

#barMain .nav>li>a {
    padding:5px 10px;
}
#barMain .nav>li>a:hover,
#barMain .nav>li>a:focus {
    background-color:rgba(0,0,0,0.03);
}

/* cart */
#barMain .nav>li.quick-cart {
    background-color:#F8F8F8;
    margin-left:10px;
}
#topBar.styleBackgroundColor .nav>li.quick-cart {
    background-color:rgba(0,0,0,0.1) !important;
}
#topBar.styleBackgroundColor .nav>li.quick-cart.open>a {
    color:#000;
}
#topBar.styleBackgroundColor .nav>li.quick-cart p {
    color:#000;
}
#barMain .nav>li.quick-cart>.dropdown-menu {
    border:0; margin:0;
    background-color:#F0F0F0;
    width:250px;
}
#barMain .nav>li.quick-cart .quick-cart-content {
    padding:10px 10px 0 10px;
}
#barMain .nav>li.quick-cart p {
    margin:0; padding:10px 10px 0 10px;
    font-size:13px;
}
#barMain .nav>li.quick-cart a.quick-cart-item {
    clear: both;
    display: block;
    padding: 10px 8px;
    font-size: 13px;
    line-height: 16px;
    min-height: 60px;
    text-decoration: none;
    border-bottom: rgba(0,0,0,0.1) 1px solid;
    background: rgba(0,0,0,0.05);
}
#barMain .nav>li.quick-cart a.quick-cart-item,
#barMain .nav>li.quick-cart a.quick-cart-item a {
    color:#999 !important;
}
#barMain .nav>li.quick-cart a.quick-cart-item:hover {
    background: rgba(0,0,0,0.08);
}
#barMain .nav>li.quick-cart .cart-footer {
    margin-top:10px;
}

/** Responsive Top Nav
 **************************************************************** **/
@media only screen and (max-width: 1280px) {
    #topNav ul.nav>li a {
        font-size: 18px;
        padding: 15px 30px;
    }
}

@media only screen and (max-width: 1166px) {
    #topNav ul.nav>li a {
        font-size: 18px;
        padding: 15px 25px;
    }
}

@media only screen and (max-width: 767px) {
    .navbar-collapse {
        max-height:100%;
    }
    #topNav .container {
        padding:0;
        margin:0;
    }

    #topNav button.btn-mobile {
        display:block;
        float:right;
        margin-right:15px;
    }

    #topNav form.search {
        float:left;
        margin-top:10px;
        margin-left:15px;
        margin-bottom:0;
    }

    #topNav nav.nav-main {
        background-color:#fff;
    }
    #topNav div.nav-main-collapse,
    #topNav div.nav-main-collapse.in {
        width: 100%;
        margin:50px 0 0 0;
    }
    #topNav div.nav-main-collapse {
        float: none;
        overflow-x:hidden;
    }
    #topNav div.nav-main-collapse.collapse {
        display: none !important;
    }
    #topNav div.nav-main-collapse.in {
        display: block !important;
    }
    #topNav div.nav-main-collapse {
        position: relative;
    }


    #topMain>li>a>span {
        display:none !important;
    }
    #topMain li {
        display:block !important;
        float:none;
        text-align:left;

        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
    }
    #topMain>li>a {
        text-align:left;
        border:0;
        border-bottom:rgba(0,0,0,0.1) 1px solid;

        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
    }
    #topMain>li:hover,
    #topMain>li:hover>a {
        border-top:0 !important;
    }

    #topNav ul.nav>li>a:after {
        content: "\f107";
        font-family: FontAwesome;
        position: absolute;
        font-size: 14px;
        right: 20px;
        top: 15px;
        color:#999;
    }

    /* submenu */
    #topMain ul.dropdown-menu {
        position: static;
        clear: both;
        float: none;
        display: none !important;
        border-left:0 !important;

        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
    }

    #topNav nav.nav-main li.resp-active > ul.dropdown-menu {
        display: block !important;
        margin-left:30px;
        margin-right:30px;
        padding:20px 0;
        border-right:0;
    }
    #topNav nav.nav-main li.resp-active > ul.dropdown-menu li {
        border-left:0;
    }

    #topNav ul.nav>li:hover>a:before,
    #topNav ul.nav>li.active>a:before {
        background-color:transparent;
    }

    #topNav ul.dropdown-menu>li:hover > ul.dropdown-menu {
        position:static;
    }

    /* mega menu */
    #topNav ul.nav>li.mega-menu>ul.dropdown-menu>li {
        padding:0; margin:0 30px 0 0;
        border:0;

        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
    }
    #topNav ul.nav>li.mega-menu h3 {
        margin-left:8px;
    }
    #topNav ul.nav>li.mega-menu>ul li>a {
        border-bottom: rgba(0,0,0,0.1) 1px solid;
    }
    #topNav ul.nav>li.mega-menu div,
    #topNav ul.nav>li.mega-menu div div {
        border:0; margin-bottom:30px;
        display:block;
        width:100%;
    }
    #topNav ul.nav>li.mega-menu div div:last-child {
        margin-bottom:0;
    }
}


@media only screen and (max-width: 479px) {

    #topNav form.search {
        margin-left:4px;
    }
    #topNav button.btn-mobile {
        margin-right:4px;
    }

    #topBar a.logo {
        display:block;
        text-align:center;
        margin:6px 0;
        float:none;
    }

    .hide_mobile {
        display:none;
    }
}




/*=============================大事记start============================*/


.event_box{width:80%;margin:3% auto 0;position:relative;min-height:420px;}
.event_box .parHd {width:100%;display:inline-block;height:92px;overflow:hidden;}
.parHd  ul{width:100%;text-align:center;margin:0 auto;padding-top:25px !important;}
.parHd .tempWrap{margin:0 auto;}
.parHd .tempWrap:after{content:'';width:85%;height:1px;background:#d784c4;position:absolute;/* top:33%;*//* right:-140%;*/right:8%;top:35%;/* margin-top:-0.5px;*/z-index:10;}
.parHd li.no_line:before{display:none;}
.parHd li{display:inline-block;cursor:pointer;padding-top:30px;font-size:14px;color:#eee;margin:0 30px;position:relative;}
.parHd li:after{content:'';background: #922b7b;border-radius: 50%;border: 4px solid #ddd;width:16px;height:16px;position:absolute;z-index:20;top:-7px;left:50%;margin-left:-12px;}
.parBd{text-align:center;margin-top:30px;}

.sPrev,.sNext{width:30px;height:30px;display:block;position:absolute;top:10px;z-index: 20;}
.sPrev{left:0;}
.sNext{right:0;}
.sPrev img,.sNext img{transition:all .6s cubic-bezier(.51,1.1,.9,.95);-moz-transition:all .6s cubic-bezier(.51,1.1,.9,.95);-webkit-transition:all .6s cubic-bezier(.51,1.1,.9,.95);-o-transition:all .6s cubic-bezier(.51,1.1,.9,.95);}
.parHd li.act span{display:block;width:20px;height:20px;overflow:hidden;background: #f98d8d;border-radius: 50%; border: 4px solid #fff;;position:absolute;top:-8px;left:23px;z-index:21;}
.parHd li span,.parHd li.clone span{display:none;}

/*===============================Footer Part==============================*/
/** Footer
 **************************************************************** **/
#footer {
    color: #c8c8c8;
    display: block;
    vertical-align: bottom;
    background-color: #631c53;
    z-index: 101;
    border-top: 5px solid #8f4f80;
    padding-top: 10px;
}
#footer.bottom {
    position:absolute;
    left:0; right:0;
    bottom:0;
}
#footer a.copyright {
    color:#777;
    padding:0;
}
#footer .logo {
    display:block;
}
#footer .spaced {
    padding:15px 15px;
}
#footer .logo_footer {
    padding:15px 15px;
}
#footer .dark {
    background-color:#631c53;
}

#footer h2,
#footer h3,
#footer h4 {
    color:#c8c8c8;
}

#footer .copyright {
    background-color:#631c53;
    padding:15px 0;
}


#footer hr {
    border:0; margin:0; padding:0;
    border-bottom: rgba(255,255,255,0.1) 1px solid;
}

#footer li {
    position:relative;
    padding:6px 0;
}

#footer li:after {
    width: 100%;
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
}
#footer li a {
    color:#c8c8c8;
    text-decoration:none;
    font-size:14px;

    -webkit-transition: all .2s ease 0s;
    -moz-transition: all .2s ease 0s;
    -o-transition: all .2s ease 0s;
    transition: all .2s ease 0s;
}
#footer li a:hover {
    color:#fff;
}
#footer li small {
    font-size:11px;
}
#footer li small.ago {
    color:#666;
}
#footer .input-group-btn .btn,
#footer .input-group .btn,
#footer .form-control {
    border:0;
    height:38px;
    margin-top:0;
}
#footer .input-group-btn .btn {
    -webkit-border-top-right-radius: 6px;
    -webkit-border-bottom-right-radius: 6px;
    -moz-border-radius-topright: 6px;
    -moz-border-radius-bottomright: 6px;
    border-top-right-radius: 6px;
    border-bottom-right-radius: 6px;
}

#footer input.form-control {
    -webkit-border-top-left-radius: 6px;
    -webkit-border-bottom-left-radius: 6px;
    -moz-border-radius-topleft: 6px;
    -moz-border-radius-bottomleft: 6px;
    border-top-left-radius: 6px;
    border-bottom-left-radius: 6px;
}
#footer form {
    padding:0;
}


/* simple list */
#footer ul.nobordered li:after,
#footer ul.nobordered li {
    border-bottom:0;
    padding:0;
}
#footer ul.nobordered li a {
    padding:3px 0;
}
#footer ul.nobordered li a>i.fa{
    padding-right:6px;
}
#footer .padding-right-15{
    padding-right: 15px;
}
#footer img.logo{
    height:140px;
}

/** Responsive
 **************************************************************** **/
@media only screen and (max-width: 768px) {
    #footer .spaced {
        padding:20px 15px;
    }
    #footer .dark {
        height:auto;
    }
}
@media only screen and (max-width: 990px) {
    #footer {
        border-top:#2B2B2B 1px solid;
    }

}

/*==============================Colors=============================*/
/**
	@Purple		#a0468c
	@Dark Purple	#822e69
*/

a,
.tp-caption a {
    color:#822e69;
}

#footer li a:hover,
#footer a:hover,
a, a:hover, a:active,
#topNav ul.nav li li a:hover,
.tp-caption a:hover,
.featured-box-minimal h4,
.glyphicon, .wi,
p.dropcap:first-letter,
ul.side-nav a:hover,
ul.side-nav ul li.active>a,
.li, div.owl-carousel .caption,
.pagination>li>a,
.pagination>li>span,
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus,
div.mega-price-table .pricing:hover h4,
div.mega-price-table .pricing-table i.fa, /* icons */
#blog a>span,
#blog h1>span,
.cartContent a.remove_item:hover,
.owl-carousel.featured a.figure>span>i,
.btn-link,
.styleColor {
    color:#a0468c;
}

p.dropcap.color:first-letter,
span.badge,
#toTop:hover,
#bar, .slider-handle,
div.featured-box i.fa,
i.featured-icon,
.progress-bar-primary,
.modal-header,
.timeline .timeline-left .item:before,
.timeline .timeline-right .item:before,
.timeline .timeline-centered .item.pull-right:before,
.timeline .timeline-centered .item.pull-left:before,
div.mega-price-table .pricing-title,
div.mega-price-table .pricing-head,
div.mega-price-table .pricing.popular,
#topNav ul.nav>li:hover>a:before,
#topNav ul.nav>li.active>a:before,
.styleBackgroundColor {
    background-color:#a0468c;
}

/* icons , boxes */
i.featured-icon:after,
div.featured-box.nobg.border-only i.fa {
    color:#a0468c;
    border-color:#a0468c;
}
section.product-view-colors a:hover,
section.product-view-colors a.active,
i.featured-icon {
    border-color:#a0468c;

}
i.featured-icon.empty {
    color:#a0468c !important;
    border-color:#a0468c;
}

/* Top Nav */
#topNav ul.nav .dropdown-menu>li.active>a,
#topNav ul.nav .dropdown-menu>li:hover>a,
#topNav ul.nav .dropdown-menu>li:focus>a {
    color:#fff !important;
    background-color:#a0468c;
}

#topNav ul.dropdown-menu>li:hover>a.dropdown-toggle:after { /* arrow sub-submenu */
    color:#fff;
}

/* Primary Button */
.btn-primary {
    border-color:#822e69;
    background-color:#822e69;
}

.btn-white {
    color:#a0468c !important;
}

.pagination>.active>a,
.pagination>.active>span,
.pagination>.active>a:hover,
.pagination>.active>span:hover,
.pagination>.active>a:focus,
.pagination>.active>span:focus,
.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active,
.btn-primary.active,
.open .dropdown-toggle.btn-primary,
.daterangepicker td.active,
.daterangepicker td.active:hover,
.btn-primary:hover,
.btn-primary:active,
.btn-primary:focus {
    border-color:#a0468c;
    background-color:#a0468c;
}


/* embed title */
section header em,
h1>em, h2>em, h3>em, h4>em, h5>em, h6>em {
    font-style:normal;
    color:#a0468c;
}

/* Top Nav active/hover */
#topNav ul.nav>li.mega-menu>ul li:hover>a,
#topNav ul.nav>li.mega-menu>ul li.active>a,
#topNav ul.nav>li:hover:before,
#topNav ul.nav>li.active:before {
    background-color: #a0468c;
}
/* Top Nav color active */
#topNav .nav-pills.colored>li.active>a,
#topNav .nav-pills.colored>li.active>a:hover,
#topNav .nav-pills.colored>li.active>a:focus {
    color:#fff;
    background-color:#a0468c;
}

/* Misc */
.styleBackgroundColor,
.featured-box-minimal i.fa {
    background-color:#a0468c;
}

ul.list-icon li:before {
    color:#a0468c;
    font-size:16px;
}
body.boxed #topBar {
    border-top:#a0468c 4px solid;
}

.panel-epona {
    border:#a0468c 1px solid;
}

.panel-epona>.panel-heading {
    background-color:#a0468c;
    color:#fff;
}

/* Slider Captions */
.tp-caption.block_styleColor {
    background-color: #a0468c;
    color:#fff;
}
.tp-caption.block_white {
    color:#a0468c;
}

/* flex slider */
.flexslider.flexFull .flex-direction-nav a:hover,
.flexslider.flexContent .flex-direction-nav a:hover {
    background-color: #a0468c;
    color:#fff;
}

/* essentials rewrite */
.alert.alert-default {
    border-left:#a0468c 3px solid;
}

/* item box */
.item-box .item-hover .overlay {
    background-color:rgba(169,69,69,0.6);
}



/*
	Sky Forms
*/
/**/
/* normal state */
/**/
.sky-form .toggle i:before {
    background-color: #a0468c;
}
.sky-form .button {
    background-color: #a0468c;
}


/**/
/* checked state */
/**/
.sky-form .radio input + i:after {
    background-color: #a0468c;
}
.sky-form .checkbox input + i:after {
    color: #a0468c;
}
.sky-form .radio input:checked + i,
.sky-form .checkbox input:checked + i,
.sky-form .toggle input:checked + i {
    border-color: #a0468c;
}
.sky-form .rating input:checked ~ label {
    color: #a0468c;
}

/*==============================Custom=============================*/
section{
    padding-top:120px;
    padding-bottom:120px;
}
.first-section{
    padding-top:80px;
}
section header {
    padding-left:100px;
    padding-right:100px;
    margin-bottom:40px;
}
@media (min-width:1280px){
    .container{
        width:1250px
    }
}
#topBar{
    border-top: 5px solid #a0468c;
    background:url('assets/img/headerbg.png');
}
#topNav{
    background: none;
    top:-35px;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.parallax {
    overflow: hidden;
    -webkit-background-size: cover !important;
    -moz-background-size: cover !important;
    -o-background-size: cover !important;
    background-size: cover !important; */
}
.parallax .parallax-pic{
    margin-top:10px;
    padding-bottom:10px;
    text-align: center;
}
.parallax .parallax-pic img{
    max-height: 140px;
    max-width:80%;
}
.nopadding{
    padding:0;
}
.affix #topNav{
    background:rgba(160, 70, 140, 0.8);
}

#topNav ul.nav>li {
    float: inherit;
    display: inline-block;
    background:none;
}
#topNav ul.nav>li a{
    line-height: 40px;
    font-size:20px;
}
#topNav ul.nav>li:hover a {
    color:white;
}
#topNav ul.nav>li.mega-menu-right1{
    margin-left:200px;
}
#topNav .nav-pills>li>a:hover, #topNav .nav-pills>li>a:focus, #topNav .nav-pills>li.active>a:hover, #topNav .nav-pills>li.active>a:focus {
    background-color: #fffcfe1f;
}
#topNav .nav-pills>li.logo-menu>a:hover, #topNav .nav-pills>li.logo-menu>a:focus, #topNav .nav-pills>li.logo-menu.active>a:hover, #topNav .nav-pills>li.logo-menu.active>a:focus {
    background:none;
}
#topNav button.btn-mobile{
    background: #922b7b;
}

#topNav form.search {
    margin: 5px 0 0px 15px;
}
#topNav .form-control{
    background:rgba(255, 255, 255, 0.3);
    color:#fff;
}
#topNav form.search input {
    padding: 6px 26px 6px 6px;
    margin-bottom: 0px;
    border:2px solid rgba(255, 255, 255, 0.2);

}
.navbar-collapse{
    background: #933d7d;
    background-image: -moz-linear-gradient(top, #922b7b, #822e69);
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#922b7b), to(#822e69));
    background-image: -webkit-linear-gradient(top, #922b7b, #8e3072);
    background-image: -o-linear-gradient(top, #922b7b, #822e69);
    background-image: linear-gradient(to bottom, #922b7b, #822e69);
    background-repeat: repeat-x;
}
.nav-pills>li {
    float:none;
    position: initial;
    display: inline-block;
}
.nav-pills>li>a{
    border-radius: 0px;
}
.nav>li>a:hover {
    background-color: #8b2c73;
    color: #fff;
}
.white-nav-pills>li {
    float:none;
    position: initial;
    display: inline-block;
}
.white-nav>li>a:hover,.white-nav>li.active a {
    background-color:#fff;
    color: #8b2c73;
}
.white-nav>li>a {
    color: #fff;
}
.padding-bottom30{
    padding-bottom: 30px;
}
h1, h2 {
    font-family: 'Microsoft Yahei','微软雅黑','Open Sans';
    font-weight: 600;
    color:#000;
}
.title-div{
    padding:10px 0 15px 0;
    text-overflow:ellipsis;
    white-space:nowrap;
    overflow:hidden;
}
a.news-title{
    /** color:#666;
     font-size: 16px;**/
}
a.news-title:hover{
    color:#922b7b;
    text-decoration: none;
}
.news-div{
    padding:10px 15px;
    background: rgba(240, 240, 240, 0.3);
}
.news-item{
    padding:15px;
    border-bottom:1px dotted #ddd;
    margin-bottom: 0px;
    text-overflow:ellipsis;
    white-space:nowrap;
    overflow:hidden;
}
.news-item span{
    color:#a0468c;
}
.news-color-div{
    background:none;
    color:#fff;
    width: 80%;
    margin: 3% auto 0;
}
.news-color-div .news-item {
    border-bottom:1px dotted #c059aa;
}
.news-color-div .news-item a.news-title{
    color:#fff;
}
.news-color-div .news-item span{
    color:#fff;
}

/*tap*/
.tap-div{
    display: none;
}
.tap-div.active{
    display: block;
}

.timeline .timeline-left .item:before {
    border: #ddd 4px solid;
    left: -46px;
    width: 16px;
    height: 16px;
}
.timeline .item p{
    margin-bottom:0px;
    margin-top:10px;
}
.timeline .timeline-left .noborder{
    border-right:none;
}
.timeline .timeline-left .item .singleline{
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}
.timeline .timeline-left .item-light:before {
    border: #dec0d8  4px solid;
    left: -46px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
}
.slideBox{
    color:#fff;
}
.slideBox p{
    margin: 20px 0px;
    text-align: left;
}
.bnlc-img{
    max-height:500px;
    max-width: 100%;
}
@media only screen and (max-width: 1280px) {
    #topNav ul.nav>li a {
        font-size: 18px;
        padding: 15px 35px;
    }
    #topNav ul.nav>li.mega-menu-right1 {
        margin-left: 186px;
    }
}

@media only screen and (max-width: 1166px) {
    #topNav ul.nav>li a {
        font-size: 18px;
        padding: 15px 30px;
    }
    #topNav ul.nav>li.mega-menu-right1 {
        margin-left: 174px;
    }
}

@media only screen and (max-width: 990px) {
    #topNav ul.nav>li a{
        font-size:14px;
        padding: 15px 20px;
    }
    #topNav ul.nav>li.mega-menu-right1{
        margin-left:160px;
    }


}
@media only screen and (max-width: 767px) {
    section header {
        padding-left:0px;
        padding-right:0px;
    }

    #topNav ul.nav>li a{
        color:#a0468c;
        padding:5px 20px;

    }
    #header.sticky #topNav {
        max-height: 800px;
    }
    #topNav{
        top:-48px;
    }
    #topNav ul.nav>li.mega-menu-right1{
        margin-left:0;
    }
    #topNav .logo-menu{
        display:none !important;
    }
    #topNav ul.nav>li:hover{
        background:#a0468c;
    }
    .event_box,.news-color-div{
        width:100%;
        padding-left:15px;
        padding-right:15px;
    }
    section.margin-top--40{
        margin-top:-40px;
    }
    section.margin-top--60{
        margin-top:-60px;
    }

    .form-group input {
        margin:0;
    }

}
</style>
<div class="panel">
    <?php if (!empty($data['feed'])):?>
        <?php foreach ($data['feed'] as $list):?>
            <div class="item item-light">
                <p style="margin-top:0px;">
                    <span>@<?=$list['user']['username']?>: </ a><?=$list['content']?></span>
                </p>
                <div class="media-action">
                    <?=date('Y-m-d h:i:s',$list['created_at'])?>
                </div>
            </div>
        <?php endforeach;?>
    <?php endif;?>
</div>
<div class="panel-body">
    <form action="/" id="w0" method="post">
        <div class="form-group input-group field-feed-content required">
            <textarea id="feed-content" class="form-control" name="content" placeholder="我的留言" rows="" cols=""></textarea>
        </div>
    </form>







