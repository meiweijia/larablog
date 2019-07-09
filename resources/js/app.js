/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

import Prism from 'prismjs';

window.Vue = require('vue');

Vue.component('comment-component', require('./components/comment.vue').default);

const app = new Vue({
    el: '#app'
});

$(function () {
    $('[data-toggle="popover"]').popover({
        trigger: "manual",
        placement: "bottom", //placement of the popover. also can use top, bottom, left or right
        html: true, //needed to show html of course
        content: '<img src="../images/wx.jpg" width="200" height="200" />', //this is the content of the html box. add the image here or anything you want really.
        animation: true
    }).on("mouseenter", function () {
        let _this = this;
        $(this).popover("show");
        $(this).siblings(".popover").on("mouseleave", function () {
            $(_this).popover("hide");
        });
    }).on("mouseleave", function () {
        let _this = this;
        setTimeout(function () {
            if (!$(".popover:hover").length) {
                $(_this).popover("hide")
            }
        }, 100);
    });
    $('pre').addClass("line-numbers").css("white-space", "pre-wrap");
});
