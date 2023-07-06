/*
 jQuery Superfish Menu Plugin
 Copyright (c) 2013 Joel Birch

 Dual licensed under the MIT and GPL licenses:
 http://www.opensource.org/licenses/mit-license.php
 http://www.gnu.org/licenses/gpl.html
*/
(function(c,n){var l=function(){var f=function(){var b=/^(?![\w\W]*Windows Phone)[\w\W]*(iPhone|iPad|iPod)/i.test(navigator.userAgent);if(b)c("html").css("cursor","pointer").on("click",c.noop);return b}(),l=function(){var b=document.documentElement.style;return"behavior"in b&&"fill"in b&&/iemobile/i.test(navigator.userAgent)}(),u=!!n.PointerEvent,p=function(b,a,d){var c="sf-js-enabled";a.cssArrows&&(c+=" sf-arrows");b[d?"addClass":"removeClass"](c)},v=function(b,a){return b.find("li."+a.pathClass).slice(0, a.pathLevels).addClass(a.hoverClass+" sf-breadcrumb").filter(function(){return c(this).children(a.popUpSelector).hide().show().length}).removeClass(a.pathClass)},q=function(b,a){var c=a?"addClass":"removeClass";b.children("a")[c]("sf-with-ul")},r=function(b){var a=b.css("ms-touch-action"),c=b.css("touch-action"),c="pan-y"===(c||a)?"auto":"pan-y";b.css({"ms-touch-action":c,"touch-action":c})},h=function(b){return b.closest(".sf-js-enabled").data("sfOptions")},k=function(){var b=c(this),a=h(b);clearTimeout(a.sfTimer); b.siblings().superfish("hide").end().superfish("show")},t=function(b){b.retainPath=-1<c.inArray(this[0],b.$path);this.superfish("hide");this.parents("."+b.hoverClass).length||(b.onIdle.call(this.closest(".sf-js-enabled")),b.$path.length&&c.proxy(k,b.$path)())},m=function(){var b=c(this),a=h(b);f?c.proxy(t,b,a)():(clearTimeout(a.sfTimer),a.sfTimer=setTimeout(c.proxy(t,b,a),a.delay))},w=function(b){var a=c(this),d=h(a),e=a.siblings(b.data.popUpSelector);if(!1===d.onHandleTouch.call(e))return this;0< e.length&&e.is(":hidden")&&(a.one("click.superfish",!1),"MSPointerDown"===b.type||"pointerdown"===b.type?a.trigger("focus"):c.proxy(k,a.parent("li"))())};return{hide:function(b){if(this.length){var a=h(this);if(!a)return this;var d=!0===a.retainPath?a.$path:"",d=this.find("li."+a.hoverClass).add(this).not(d).removeClass(a.hoverClass).children(a.popUpSelector),e=a.speedOut;b&&(d.show(),e=0);a.retainPath=!1;if(!1===a.onBeforeHide.call(d))return this;d.stop(!0,!0).animate(a.animationOut,e,function(){var b= c(this);a.onHide.call(b)})}return this},show:function(){var b=h(this);if(!b)return this;var a=this.addClass(b.hoverClass).children(b.popUpSelector);if(!1===b.onBeforeShow.call(a))return this;a.stop(!0,!0).animate(b.animation,b.speed,function(){b.onShow.call(a)});return this},destroy:function(){return this.each(function(){var b=c(this),a=b.data("sfOptions"),d;if(!a)return!1;d=b.find(a.popUpSelector).parent("li");clearTimeout(a.sfTimer);p(b,a);q(d);r(b);b.off(".superfish").off(".hoverIntent");d.children(a.popUpSelector).attr("style", function(a,b){return b.replace(/display[^;]+;?/g,"")});a.$path.removeClass(a.hoverClass+" sf-breadcrumb").addClass(a.pathClass);b.find("."+a.hoverClass).removeClass(a.hoverClass);a.onDestroy.call(b);b.removeData("sfOptions")})},init:function(b){return this.each(function(){var a=c(this);if(a.data("sfOptions"))return!1;var d=c.extend({},c.fn.superfish.defaults,b),e=a.find(d.popUpSelector).parent("li");d.$path=v(a,d);a.data("sfOptions",d);p(a,d,!0);q(e,!0);r(a);var g="li:has("+d.popUpSelector+")";if(c.fn.hoverIntent&& !d.disableHI)a.hoverIntent(k,m,g);else a.on("mouseenter.superfish",g,k).on("mouseleave.superfish",g,m);g="MSPointerDown.superfish";u&&(g="pointerdown.superfish");f||(g+=" touchend.superfish");l&&(g+=" mousedown.superfish");a.on("focusin.superfish","li",k).on("focusout.superfish","li",m).on(g,"a",d,w);e.not(".sf-breadcrumb").superfish("hide",!0);d.onInit.call(this)})}}}();c.fn.superfish=function(f,n){return l[f]?l[f].apply(this,Array.prototype.slice.call(arguments,1)):"object"!==typeof f&&f?c.error("Method "+ f+" does not exist on jQuery.fn.superfish"):l.init.apply(this,arguments)};c.fn.superfish.defaults={popUpSelector:"ul,.sf-mega",hoverClass:"sfHover",pathClass:"overrideThisToUse",pathLevels:1,delay:800,animation:{opacity:"show"},animationOut:{opacity:"hide"},speed:"normal",speedOut:"fast",cssArrows:!0,disableHI:!1,onInit:c.noop,onBeforeShow:c.noop,onShow:c.noop,onBeforeHide:c.noop,onHide:c.noop,onIdle:c.noop,onDestroy:c.noop,onHandleTouch:c.noop}})(jQuery,window);