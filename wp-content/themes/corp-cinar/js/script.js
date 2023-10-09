$ = jQuery;
/* Masked Input Version: 1.4.1 */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):jQuery)}(function(a){var b,c=navigator.userAgent,d=/iphone/i.test(c),e=/chrome/i.test(c),f=/android/i.test(c);a.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},autoclear:!0,dataName:"rawMaskFn",placeholder:"_"},a.fn.extend({caret:function(a,b){var c;if(0!==this.length&&!this.is(":hidden"))return"number"==typeof a?(b="number"==typeof b?b:a,this.each(function(){this.setSelectionRange?this.setSelectionRange(a,b):this.createTextRange&&(c=this.createTextRange(),c.collapse(!0),c.moveEnd("character",b),c.moveStart("character",a),c.select())})):(this[0].setSelectionRange?(a=this[0].selectionStart,b=this[0].selectionEnd):document.selection&&document.selection.createRange&&(c=document.selection.createRange(),a=0-c.duplicate().moveStart("character",-1e5),b=a+c.text.length),{begin:a,end:b})},unmask:function(){return this.trigger("unmask")},mask:function(c,g){var h,i,j,k,l,m,n,o;if(!c&&this.length>0){h=a(this[0]);var p=h.data(a.mask.dataName);return p?p():void 0}return g=a.extend({autoclear:a.mask.autoclear,placeholder:a.mask.placeholder,completed:null},g),i=a.mask.definitions,j=[],k=n=c.length,l=null,a.each(c.split(""),function(a,b){"?"==b?(n--,k=a):i[b]?(j.push(new RegExp(i[b])),null===l&&(l=j.length-1),k>a&&(m=j.length-1)):j.push(null)}),this.trigger("unmask").each(function(){function h(){if(g.completed){for(var a=l;m>=a;a++)if(j[a]&&C[a]===p(a))return;g.completed.call(B)}}function p(a){return g.placeholder.charAt(a<g.placeholder.length?a:0)}function q(a){for(;++a<n&&!j[a];);return a}function r(a){for(;--a>=0&&!j[a];);return a}function s(a,b){var c,d;if(!(0>a)){for(c=a,d=q(b);n>c;c++)if(j[c]){if(!(n>d&&j[c].test(C[d])))break;C[c]=C[d],C[d]=p(d),d=q(d)}z(),B.caret(Math.max(l,a))}}function t(a){var b,c,d,e;for(b=a,c=p(a);n>b;b++)if(j[b]){if(d=q(b),e=C[b],C[b]=c,!(n>d&&j[d].test(e)))break;c=e}}function u(){var a=B.val(),b=B.caret();if(o&&o.length&&o.length>a.length){for(A(!0);b.begin>0&&!j[b.begin-1];)b.begin--;if(0===b.begin)for(;b.begin<l&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}else{for(A(!0);b.begin<n&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}h()}function v(){A(),B.val()!=E&&B.change()}function w(a){if(!B.prop("readonly")){var b,c,e,f=a.which||a.keyCode;o=B.val(),8===f||46===f||d&&127===f?(b=B.caret(),c=b.begin,e=b.end,e-c===0&&(c=46!==f?r(c):e=q(c-1),e=46===f?q(e):e),y(c,e),s(c,e-1),a.preventDefault()):13===f?v.call(this,a):27===f&&(B.val(E),B.caret(0,A()),a.preventDefault())}}function x(b){if(!B.prop("readonly")){var c,d,e,g=b.which||b.keyCode,i=B.caret();if(!(b.ctrlKey||b.altKey||b.metaKey||32>g)&&g&&13!==g){if(i.end-i.begin!==0&&(y(i.begin,i.end),s(i.begin,i.end-1)),c=q(i.begin-1),n>c&&(d=String.fromCharCode(g),j[c].test(d))){if(t(c),C[c]=d,z(),e=q(c),f){var k=function(){a.proxy(a.fn.caret,B,e)()};setTimeout(k,0)}else B.caret(e);i.begin<=m&&h()}b.preventDefault()}}}function y(a,b){var c;for(c=a;b>c&&n>c;c++)j[c]&&(C[c]=p(c))}function z(){B.val(C.join(""))}function A(a){var b,c,d,e=B.val(),f=-1;for(b=0,d=0;n>b;b++)if(j[b]){for(C[b]=p(b);d++<e.length;)if(c=e.charAt(d-1),j[b].test(c)){C[b]=c,f=b;break}if(d>e.length){y(b+1,n);break}}else C[b]===e.charAt(d)&&d++,k>b&&(f=b);return a?z():k>f+1?g.autoclear||C.join("")===D?(B.val()&&B.val(""),y(0,n)):z():(z(),B.val(B.val().substring(0,f+1))),k?b:l}var B=a(this),C=a.map(c.split(""),function(a,b){return"?"!=a?i[a]?p(b):a:void 0}),D=C.join(""),E=B.val();B.data(a.mask.dataName,function(){return a.map(C,function(a,b){return j[b]&&a!=p(b)?a:null}).join("")}),B.one("unmask",function(){B.off(".mask").removeData(a.mask.dataName)}).on("focus.mask",function(){if(!B.prop("readonly")){clearTimeout(b);var a;E=B.val(),a=A(),b=setTimeout(function(){B.get(0)===document.activeElement&&(z(),a==c.replace("?","").length?B.caret(0,a):B.caret(a))},10)}}).on("blur.mask",v).on("keydown.mask",w).on("keypress.mask",x).on("input.mask paste.mask",function(){B.prop("readonly")||setTimeout(function(){var a=A(!0);B.caret(a),h()},0)}),e&&f&&B.off("input.mask").on("input.mask",u),A()})}})});

/*! jQuery UI - v1.13.2 - 2023-06-27
* http://jqueryui.com
* Includes: keycode.js, widgets/datepicker.js
* Copyright jQuery Foundation and other contributors; Licensed MIT */

!function(e){"use strict";"function"==typeof define&&define.amd?define(["jquery"],e):e(jQuery)}(function(V){"use strict";V.ui=V.ui||{};var n;V.ui.version="1.13.2",V.ui.keyCode={BACKSPACE:8,COMMA:188,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,LEFT:37,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SPACE:32,TAB:9,UP:38};function e(){this._curInst=null,this._keyEvent=!1,this._disabledInputs=[],this._datepickerShowing=!1,this._inDialog=!1,this._mainDivId="ui-datepicker-div",this._inlineClass="ui-datepicker-inline",this._appendClass="ui-datepicker-append",this._triggerClass="ui-datepicker-trigger",this._dialogClass="ui-datepicker-dialog",this._disableClass="ui-datepicker-disabled",this._unselectableClass="ui-datepicker-unselectable",this._currentClass="ui-datepicker-current-day",this._dayOverClass="ui-datepicker-days-cell-over",this.regional=[],this.regional[""]={closeText:"Done",prevText:"Prev",nextText:"Next",currentText:"Today",monthNames:["January","February","March","April","May","June","July","August","September","October","November","December"],monthNamesShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],dayNames:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],dayNamesShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],dayNamesMin:["Su","Mo","Tu","We","Th","Fr","Sa"],weekHeader:"Wk",dateFormat:"mm/dd/yy",firstDay:0,isRTL:!1,showMonthAfterYear:!1,yearSuffix:"",selectMonthLabel:"Select month",selectYearLabel:"Select year"},this._defaults={showOn:"focus",showAnim:"fadeIn",showOptions:{},defaultDate:null,appendText:"",buttonText:"...",buttonImage:"",buttonImageOnly:!1,hideIfNoPrevNext:!1,navigationAsDateFormat:!1,gotoCurrent:!1,changeMonth:!1,changeYear:!1,yearRange:"c-10:c+10",showOtherMonths:!1,selectOtherMonths:!1,showWeek:!1,calculateWeek:this.iso8601Week,shortYearCutoff:"+10",minDate:null,maxDate:null,duration:"fast",beforeShowDay:null,beforeShow:null,onSelect:null,onChangeMonthYear:null,onClose:null,onUpdateDatepicker:null,numberOfMonths:1,showCurrentAtPos:0,stepMonths:1,stepBigMonths:12,altField:"",altFormat:"",constrainInput:!0,showButtonPanel:!1,autoSize:!1,disabled:!1},V.extend(this._defaults,this.regional[""]),this.regional.en=V.extend(!0,{},this.regional[""]),this.regional["en-US"]=V.extend(!0,{},this.regional.en),this.dpDiv=a(V("<div id='"+this._mainDivId+"' class='ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>"))}function a(e){var t="button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a";return e.on("mouseout",t,function(){V(this).removeClass("ui-state-hover"),-1!==this.className.indexOf("ui-datepicker-prev")&&V(this).removeClass("ui-datepicker-prev-hover"),-1!==this.className.indexOf("ui-datepicker-next")&&V(this).removeClass("ui-datepicker-next-hover")}).on("mouseover",t,d)}function d(){V.datepicker._isDisabledDatepicker((n.inline?n.dpDiv.parent():n.input)[0])||(V(this).parents(".ui-datepicker-calendar").find("a").removeClass("ui-state-hover"),V(this).addClass("ui-state-hover"),-1!==this.className.indexOf("ui-datepicker-prev")&&V(this).addClass("ui-datepicker-prev-hover"),-1!==this.className.indexOf("ui-datepicker-next")&&V(this).addClass("ui-datepicker-next-hover"))}function o(e,t){for(var a in V.extend(e,t),t)null==t[a]&&(e[a]=t[a]);return e}V.extend(V.ui,{datepicker:{version:"1.13.2"}}),V.extend(e.prototype,{markerClassName:"hasDatepicker",maxRows:4,_widgetDatepicker:function(){return this.dpDiv},setDefaults:function(e){return o(this._defaults,e||{}),this},_attachDatepicker:function(e,t){var a,i=e.nodeName.toLowerCase(),s="div"===i||"span"===i;e.id||(this.uuid+=1,e.id="dp"+this.uuid),(a=this._newInst(V(e),s)).settings=V.extend({},t||{}),"input"===i?this._connectDatepicker(e,a):s&&this._inlineDatepicker(e,a)},_newInst:function(e,t){return{id:e[0].id.replace(/([^A-Za-z0-9_\-])/g,"\\\\$1"),input:e,selectedDay:0,selectedMonth:0,selectedYear:0,drawMonth:0,drawYear:0,inline:t,dpDiv:t?a(V("<div class='"+this._inlineClass+" ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>")):this.dpDiv}},_connectDatepicker:function(e,t){var a=V(e);t.append=V([]),t.trigger=V([]),a.hasClass(this.markerClassName)||(this._attachments(a,t),a.addClass(this.markerClassName).on("keydown",this._doKeyDown).on("keypress",this._doKeyPress).on("keyup",this._doKeyUp),this._autoSize(t),V.data(e,"datepicker",t),t.settings.disabled&&this._disableDatepicker(e))},_attachments:function(e,t){var a,i=this._get(t,"appendText"),s=this._get(t,"isRTL");t.append&&t.append.remove(),i&&(t.append=V("<span>").addClass(this._appendClass).text(i),e[s?"before":"after"](t.append)),e.off("focus",this._showDatepicker),t.trigger&&t.trigger.remove(),"focus"!==(a=this._get(t,"showOn"))&&"both"!==a||e.on("focus",this._showDatepicker),"button"!==a&&"both"!==a||(i=this._get(t,"buttonText"),a=this._get(t,"buttonImage"),this._get(t,"buttonImageOnly")?t.trigger=V("<img>").addClass(this._triggerClass).attr({src:a,alt:i,title:i}):(t.trigger=V("<button type='button'>").addClass(this._triggerClass),a?t.trigger.html(V("<img>").attr({src:a,alt:i,title:i})):t.trigger.text(i)),e[s?"before":"after"](t.trigger),t.trigger.on("click",function(){return V.datepicker._datepickerShowing&&V.datepicker._lastInput===e[0]?V.datepicker._hideDatepicker():(V.datepicker._datepickerShowing&&V.datepicker._lastInput!==e[0]&&V.datepicker._hideDatepicker(),V.datepicker._showDatepicker(e[0])),!1}))},_autoSize:function(e){var t,a,i,s,r,n;this._get(e,"autoSize")&&!e.inline&&(r=new Date(2009,11,20),(n=this._get(e,"dateFormat")).match(/[DM]/)&&(t=function(e){for(s=i=a=0;s<e.length;s++)e[s].length>a&&(a=e[s].length,i=s);return i},r.setMonth(t(this._get(e,n.match(/MM/)?"monthNames":"monthNamesShort"))),r.setDate(t(this._get(e,n.match(/DD/)?"dayNames":"dayNamesShort"))+20-r.getDay())),e.input.attr("size",this._formatDate(e,r).length))},_inlineDatepicker:function(e,t){var a=V(e);a.hasClass(this.markerClassName)||(a.addClass(this.markerClassName).append(t.dpDiv),V.data(e,"datepicker",t),this._setDate(t,this._getDefaultDate(t),!0),this._updateDatepicker(t),this._updateAlternate(t),t.settings.disabled&&this._disableDatepicker(e),t.dpDiv.css("display","block"))},_dialogDatepicker:function(e,t,a,i,s){var r,n=this._dialogInst;return n||(this.uuid+=1,r="dp"+this.uuid,this._dialogInput=V("<input type='text' id='"+r+"' style='position: absolute; top: -100px; width: 0px;'/>"),this._dialogInput.on("keydown",this._doKeyDown),V("body").append(this._dialogInput),(n=this._dialogInst=this._newInst(this._dialogInput,!1)).settings={},V.data(this._dialogInput[0],"datepicker",n)),o(n.settings,i||{}),t=t&&t.constructor===Date?this._formatDate(n,t):t,this._dialogInput.val(t),this._pos=s?s.length?s:[s.pageX,s.pageY]:null,this._pos||(r=document.documentElement.clientWidth,i=document.documentElement.clientHeight,t=document.documentElement.scrollLeft||document.body.scrollLeft,s=document.documentElement.scrollTop||document.body.scrollTop,this._pos=[r/2-100+t,i/2-150+s]),this._dialogInput.css("left",this._pos[0]+20+"px").css("top",this._pos[1]+"px"),n.settings.onSelect=a,this._inDialog=!0,this.dpDiv.addClass(this._dialogClass),this._showDatepicker(this._dialogInput[0]),V.blockUI&&V.blockUI(this.dpDiv),V.data(this._dialogInput[0],"datepicker",n),this},_destroyDatepicker:function(e){var t,a=V(e),i=V.data(e,"datepicker");a.hasClass(this.markerClassName)&&(t=e.nodeName.toLowerCase(),V.removeData(e,"datepicker"),"input"===t?(i.append.remove(),i.trigger.remove(),a.removeClass(this.markerClassName).off("focus",this._showDatepicker).off("keydown",this._doKeyDown).off("keypress",this._doKeyPress).off("keyup",this._doKeyUp)):"div"!==t&&"span"!==t||a.removeClass(this.markerClassName).empty(),n===i&&(n=null,this._curInst=null))},_enableDatepicker:function(t){var e,a=V(t),i=V.data(t,"datepicker");a.hasClass(this.markerClassName)&&("input"===(e=t.nodeName.toLowerCase())?(t.disabled=!1,i.trigger.filter("button").each(function(){this.disabled=!1}).end().filter("img").css({opacity:"1.0",cursor:""})):"div"!==e&&"span"!==e||((a=a.children("."+this._inlineClass)).children().removeClass("ui-state-disabled"),a.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled",!1)),this._disabledInputs=V.map(this._disabledInputs,function(e){return e===t?null:e}))},_disableDatepicker:function(t){var e,a=V(t),i=V.data(t,"datepicker");a.hasClass(this.markerClassName)&&("input"===(e=t.nodeName.toLowerCase())?(t.disabled=!0,i.trigger.filter("button").each(function(){this.disabled=!0}).end().filter("img").css({opacity:"0.5",cursor:"default"})):"div"!==e&&"span"!==e||((a=a.children("."+this._inlineClass)).children().addClass("ui-state-disabled"),a.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled",!0)),this._disabledInputs=V.map(this._disabledInputs,function(e){return e===t?null:e}),this._disabledInputs[this._disabledInputs.length]=t)},_isDisabledDatepicker:function(e){if(!e)return!1;for(var t=0;t<this._disabledInputs.length;t++)if(this._disabledInputs[t]===e)return!0;return!1},_getInst:function(e){try{return V.data(e,"datepicker")}catch(e){throw"Missing instance data for this datepicker"}},_optionDatepicker:function(e,t,a){var i,s,r=this._getInst(e);if(2===arguments.length&&"string"==typeof t)return"defaults"===t?V.extend({},V.datepicker._defaults):r?"all"===t?V.extend({},r.settings):this._get(r,t):null;i=t||{},"string"==typeof t&&((i={})[t]=a),r&&(this._curInst===r&&this._hideDatepicker(),s=this._getDateDatepicker(e,!0),t=this._getMinMaxDate(r,"min"),a=this._getMinMaxDate(r,"max"),o(r.settings,i),null!==t&&void 0!==i.dateFormat&&void 0===i.minDate&&(r.settings.minDate=this._formatDate(r,t)),null!==a&&void 0!==i.dateFormat&&void 0===i.maxDate&&(r.settings.maxDate=this._formatDate(r,a)),"disabled"in i&&(i.disabled?this._disableDatepicker(e):this._enableDatepicker(e)),this._attachments(V(e),r),this._autoSize(r),this._setDate(r,s),this._updateAlternate(r),this._updateDatepicker(r))},_changeDatepicker:function(e,t,a){this._optionDatepicker(e,t,a)},_refreshDatepicker:function(e){e=this._getInst(e);e&&this._updateDatepicker(e)},_setDateDatepicker:function(e,t){e=this._getInst(e);e&&(this._setDate(e,t),this._updateDatepicker(e),this._updateAlternate(e))},_getDateDatepicker:function(e,t){e=this._getInst(e);return e&&!e.inline&&this._setDateFromField(e,t),e?this._getDate(e):null},_doKeyDown:function(e){var t,a,i=V.datepicker._getInst(e.target),s=!0,r=i.dpDiv.is(".ui-datepicker-rtl");if(i._keyEvent=!0,V.datepicker._datepickerShowing)switch(e.keyCode){case 9:V.datepicker._hideDatepicker(),s=!1;break;case 13:return(a=V("td."+V.datepicker._dayOverClass+":not(."+V.datepicker._currentClass+")",i.dpDiv))[0]&&V.datepicker._selectDay(e.target,i.selectedMonth,i.selectedYear,a[0]),(t=V.datepicker._get(i,"onSelect"))?(a=V.datepicker._formatDate(i),t.apply(i.input?i.input[0]:null,[a,i])):V.datepicker._hideDatepicker(),!1;case 27:V.datepicker._hideDatepicker();break;case 33:V.datepicker._adjustDate(e.target,e.ctrlKey?-V.datepicker._get(i,"stepBigMonths"):-V.datepicker._get(i,"stepMonths"),"M");break;case 34:V.datepicker._adjustDate(e.target,e.ctrlKey?+V.datepicker._get(i,"stepBigMonths"):+V.datepicker._get(i,"stepMonths"),"M");break;case 35:(e.ctrlKey||e.metaKey)&&V.datepicker._clearDate(e.target),s=e.ctrlKey||e.metaKey;break;case 36:(e.ctrlKey||e.metaKey)&&V.datepicker._gotoToday(e.target),s=e.ctrlKey||e.metaKey;break;case 37:(e.ctrlKey||e.metaKey)&&V.datepicker._adjustDate(e.target,r?1:-1,"D"),s=e.ctrlKey||e.metaKey,e.originalEvent.altKey&&V.datepicker._adjustDate(e.target,e.ctrlKey?-V.datepicker._get(i,"stepBigMonths"):-V.datepicker._get(i,"stepMonths"),"M");break;case 38:(e.ctrlKey||e.metaKey)&&V.datepicker._adjustDate(e.target,-7,"D"),s=e.ctrlKey||e.metaKey;break;case 39:(e.ctrlKey||e.metaKey)&&V.datepicker._adjustDate(e.target,r?-1:1,"D"),s=e.ctrlKey||e.metaKey,e.originalEvent.altKey&&V.datepicker._adjustDate(e.target,e.ctrlKey?+V.datepicker._get(i,"stepBigMonths"):+V.datepicker._get(i,"stepMonths"),"M");break;case 40:(e.ctrlKey||e.metaKey)&&V.datepicker._adjustDate(e.target,7,"D"),s=e.ctrlKey||e.metaKey;break;default:s=!1}else 36===e.keyCode&&e.ctrlKey?V.datepicker._showDatepicker(this):s=!1;s&&(e.preventDefault(),e.stopPropagation())},_doKeyPress:function(e){var t,a=V.datepicker._getInst(e.target);if(V.datepicker._get(a,"constrainInput"))return t=V.datepicker._possibleChars(V.datepicker._get(a,"dateFormat")),a=String.fromCharCode(null==e.charCode?e.keyCode:e.charCode),e.ctrlKey||e.metaKey||a<" "||!t||-1<t.indexOf(a)},_doKeyUp:function(e){e=V.datepicker._getInst(e.target);if(e.input.val()!==e.lastVal)try{V.datepicker.parseDate(V.datepicker._get(e,"dateFormat"),e.input?e.input.val():null,V.datepicker._getFormatConfig(e))&&(V.datepicker._setDateFromField(e),V.datepicker._updateAlternate(e),V.datepicker._updateDatepicker(e))}catch(e){}return!0},_showDatepicker:function(e){var t,a,i,s;"input"!==(e=e.target||e).nodeName.toLowerCase()&&(e=V("input",e.parentNode)[0]),V.datepicker._isDisabledDatepicker(e)||V.datepicker._lastInput===e||(s=V.datepicker._getInst(e),V.datepicker._curInst&&V.datepicker._curInst!==s&&(V.datepicker._curInst.dpDiv.stop(!0,!0),s&&V.datepicker._datepickerShowing&&V.datepicker._hideDatepicker(V.datepicker._curInst.input[0])),!1!==(a=(i=V.datepicker._get(s,"beforeShow"))?i.apply(e,[e,s]):{})&&(o(s.settings,a),s.lastVal=null,V.datepicker._lastInput=e,V.datepicker._setDateFromField(s),V.datepicker._inDialog&&(e.value=""),V.datepicker._pos||(V.datepicker._pos=V.datepicker._findPos(e),V.datepicker._pos[1]+=e.offsetHeight),t=!1,V(e).parents().each(function(){return!(t|="fixed"===V(this).css("position"))}),i={left:V.datepicker._pos[0],top:V.datepicker._pos[1]},V.datepicker._pos=null,s.dpDiv.empty(),s.dpDiv.css({position:"absolute",display:"block",top:"-1000px"}),V.datepicker._updateDatepicker(s),i=V.datepicker._checkOffset(s,i,t),s.dpDiv.css({position:V.datepicker._inDialog&&V.blockUI?"static":t?"fixed":"absolute",display:"none",left:i.left+"px",top:i.top+"px"}),s.inline||(a=V.datepicker._get(s,"showAnim"),i=V.datepicker._get(s,"duration"),s.dpDiv.css("z-index",function(e){for(var t,a;e.length&&e[0]!==document;){if(("absolute"===(t=e.css("position"))||"relative"===t||"fixed"===t)&&(a=parseInt(e.css("zIndex"),10),!isNaN(a)&&0!==a))return a;e=e.parent()}return 0}(V(e))+1),V.datepicker._datepickerShowing=!0,V.effects&&V.effects.effect[a]?s.dpDiv.show(a,V.datepicker._get(s,"showOptions"),i):s.dpDiv[a||"show"](a?i:null),V.datepicker._shouldFocusInput(s)&&s.input.trigger("focus"),V.datepicker._curInst=s)))},_updateDatepicker:function(e){this.maxRows=4,(n=e).dpDiv.empty().append(this._generateHTML(e)),this._attachHandlers(e);var t,a=this._getNumberOfMonths(e),i=a[1],s=e.dpDiv.find("."+this._dayOverClass+" a"),r=V.datepicker._get(e,"onUpdateDatepicker");0<s.length&&d.apply(s.get(0)),e.dpDiv.removeClass("ui-datepicker-multi-2 ui-datepicker-multi-3 ui-datepicker-multi-4").width(""),1<i&&e.dpDiv.addClass("ui-datepicker-multi-"+i).css("width",17*i+"em"),e.dpDiv[(1!==a[0]||1!==a[1]?"add":"remove")+"Class"]("ui-datepicker-multi"),e.dpDiv[(this._get(e,"isRTL")?"add":"remove")+"Class"]("ui-datepicker-rtl"),e===V.datepicker._curInst&&V.datepicker._datepickerShowing&&V.datepicker._shouldFocusInput(e)&&e.input.trigger("focus"),e.yearshtml&&(t=e.yearshtml,setTimeout(function(){t===e.yearshtml&&e.yearshtml&&e.dpDiv.find("select.ui-datepicker-year").first().replaceWith(e.yearshtml),t=e.yearshtml=null},0)),r&&r.apply(e.input?e.input[0]:null,[e])},_shouldFocusInput:function(e){return e.input&&e.input.is(":visible")&&!e.input.is(":disabled")&&!e.input.is(":focus")},_checkOffset:function(e,t,a){var i=e.dpDiv.outerWidth(),s=e.dpDiv.outerHeight(),r=e.input?e.input.outerWidth():0,n=e.input?e.input.outerHeight():0,d=document.documentElement.clientWidth+(a?0:V(document).scrollLeft()),o=document.documentElement.clientHeight+(a?0:V(document).scrollTop());return t.left-=this._get(e,"isRTL")?i-r:0,t.left-=a&&t.left===e.input.offset().left?V(document).scrollLeft():0,t.top-=a&&t.top===e.input.offset().top+n?V(document).scrollTop():0,t.left-=Math.min(t.left,t.left+i>d&&i<d?Math.abs(t.left+i-d):0),t.top-=Math.min(t.top,t.top+s>o&&s<o?Math.abs(s+n):0),t},_findPos:function(e){for(var t=this._getInst(e),a=this._get(t,"isRTL");e&&("hidden"===e.type||1!==e.nodeType||V.expr.pseudos.hidden(e));)e=e[a?"previousSibling":"nextSibling"];return[(t=V(e).offset()).left,t.top]},_hideDatepicker:function(e){var t,a,i=this._curInst;!i||e&&i!==V.data(e,"datepicker")||this._datepickerShowing&&(t=this._get(i,"showAnim"),a=this._get(i,"duration"),e=function(){V.datepicker._tidyDialog(i)},V.effects&&(V.effects.effect[t]||V.effects[t])?i.dpDiv.hide(t,V.datepicker._get(i,"showOptions"),a,e):i.dpDiv["slideDown"===t?"slideUp":"fadeIn"===t?"fadeOut":"hide"](t?a:null,e),t||e(),this._datepickerShowing=!1,(e=this._get(i,"onClose"))&&e.apply(i.input?i.input[0]:null,[i.input?i.input.val():"",i]),this._lastInput=null,this._inDialog&&(this._dialogInput.css({position:"absolute",left:"0",top:"-100px"}),V.blockUI&&(V.unblockUI(),V("body").append(this.dpDiv))),this._inDialog=!1)},_tidyDialog:function(e){e.dpDiv.removeClass(this._dialogClass).off(".ui-datepicker-calendar")},_checkExternalClick:function(e){var t;V.datepicker._curInst&&(t=V(e.target),e=V.datepicker._getInst(t[0]),(t[0].id===V.datepicker._mainDivId||0!==t.parents("#"+V.datepicker._mainDivId).length||t.hasClass(V.datepicker.markerClassName)||t.closest("."+V.datepicker._triggerClass).length||!V.datepicker._datepickerShowing||V.datepicker._inDialog&&V.blockUI)&&(!t.hasClass(V.datepicker.markerClassName)||V.datepicker._curInst===e)||V.datepicker._hideDatepicker())},_adjustDate:function(e,t,a){var i=V(e),e=this._getInst(i[0]);this._isDisabledDatepicker(i[0])||(this._adjustInstDate(e,t,a),this._updateDatepicker(e))},_gotoToday:function(e){var t=V(e),a=this._getInst(t[0]);this._get(a,"gotoCurrent")&&a.currentDay?(a.selectedDay=a.currentDay,a.drawMonth=a.selectedMonth=a.currentMonth,a.drawYear=a.selectedYear=a.currentYear):(e=new Date,a.selectedDay=e.getDate(),a.drawMonth=a.selectedMonth=e.getMonth(),a.drawYear=a.selectedYear=e.getFullYear()),this._notifyChange(a),this._adjustDate(t)},_selectMonthYear:function(e,t,a){var i=V(e),e=this._getInst(i[0]);e["selected"+("M"===a?"Month":"Year")]=e["draw"+("M"===a?"Month":"Year")]=parseInt(t.options[t.selectedIndex].value,10),this._notifyChange(e),this._adjustDate(i)},_selectDay:function(e,t,a,i){var s=V(e);V(i).hasClass(this._unselectableClass)||this._isDisabledDatepicker(s[0])||((s=this._getInst(s[0])).selectedDay=s.currentDay=parseInt(V("a",i).attr("data-date")),s.selectedMonth=s.currentMonth=t,s.selectedYear=s.currentYear=a,this._selectDate(e,this._formatDate(s,s.currentDay,s.currentMonth,s.currentYear)))},_clearDate:function(e){e=V(e);this._selectDate(e,"")},_selectDate:function(e,t){var a=V(e),e=this._getInst(a[0]);t=null!=t?t:this._formatDate(e),e.input&&e.input.val(t),this._updateAlternate(e),(a=this._get(e,"onSelect"))?a.apply(e.input?e.input[0]:null,[t,e]):e.input&&e.input.trigger("change"),e.inline?this._updateDatepicker(e):(this._hideDatepicker(),this._lastInput=e.input[0],"object"!=typeof e.input[0]&&e.input.trigger("focus"),this._lastInput=null)},_updateAlternate:function(e){var t,a,i=this._get(e,"altField");i&&(t=this._get(e,"altFormat")||this._get(e,"dateFormat"),a=this._getDate(e),e=this.formatDate(t,a,this._getFormatConfig(e)),V(document).find(i).val(e))},noWeekends:function(e){e=e.getDay();return[0<e&&e<6,""]},iso8601Week:function(e){var t=new Date(e.getTime());return t.setDate(t.getDate()+4-(t.getDay()||7)),e=t.getTime(),t.setMonth(0),t.setDate(1),Math.floor(Math.round((e-t)/864e5)/7)+1},parseDate:function(t,s,e){if(null==t||null==s)throw"Invalid arguments";if(""===(s="object"==typeof s?s.toString():s+""))return null;for(var a,i,r,n=0,d=(e?e.shortYearCutoff:null)||this._defaults.shortYearCutoff,d="string"!=typeof d?d:(new Date).getFullYear()%100+parseInt(d,10),o=(e?e.dayNamesShort:null)||this._defaults.dayNamesShort,c=(e?e.dayNames:null)||this._defaults.dayNames,l=(e?e.monthNamesShort:null)||this._defaults.monthNamesShort,h=(e?e.monthNames:null)||this._defaults.monthNames,u=-1,p=-1,g=-1,_=-1,f=!1,k=function(e){e=v+1<t.length&&t.charAt(v+1)===e;return e&&v++,e},D=function(e){var t=k(e),t="@"===e?14:"!"===e?20:"y"===e&&t?4:"o"===e?3:2,t=new RegExp("^\\d{"+("y"===e?t:1)+","+t+"}"),t=s.substring(n).match(t);if(!t)throw"Missing number at position "+n;return n+=t[0].length,parseInt(t[0],10)},m=function(e,t,a){var i=-1,t=V.map(k(e)?a:t,function(e,t){return[[t,e]]}).sort(function(e,t){return-(e[1].length-t[1].length)});if(V.each(t,function(e,t){var a=t[1];if(s.substr(n,a.length).toLowerCase()===a.toLowerCase())return i=t[0],n+=a.length,!1}),-1!==i)return i+1;throw"Unknown name at position "+n},y=function(){if(s.charAt(n)!==t.charAt(v))throw"Unexpected literal at position "+n;n++},v=0;v<t.length;v++)if(f)"'"!==t.charAt(v)||k("'")?y():f=!1;else switch(t.charAt(v)){case"d":g=D("d");break;case"D":m("D",o,c);break;case"o":_=D("o");break;case"m":p=D("m");break;case"M":p=m("M",l,h);break;case"y":u=D("y");break;case"@":u=(r=new Date(D("@"))).getFullYear(),p=r.getMonth()+1,g=r.getDate();break;case"!":u=(r=new Date((D("!")-this._ticksTo1970)/1e4)).getFullYear(),p=r.getMonth()+1,g=r.getDate();break;case"'":k("'")?y():f=!0;break;default:y()}if(n<s.length&&(i=s.substr(n),!/^\s+/.test(i)))throw"Extra/unparsed characters found in date: "+i;if(-1===u?u=(new Date).getFullYear():u<100&&(u+=(new Date).getFullYear()-(new Date).getFullYear()%100+(u<=d?0:-100)),-1<_)for(p=1,g=_;;){if(g<=(a=this._getDaysInMonth(u,p-1)))break;p++,g-=a}if((r=this._daylightSavingAdjust(new Date(u,p-1,g))).getFullYear()!==u||r.getMonth()+1!==p||r.getDate()!==g)throw"Invalid date";return r},ATOM:"yy-mm-dd",COOKIE:"D, dd M yy",ISO_8601:"yy-mm-dd",RFC_822:"D, d M y",RFC_850:"DD, dd-M-y",RFC_1036:"D, d M y",RFC_1123:"D, d M yy",RFC_2822:"D, d M yy",RSS:"D, d M y",TICKS:"!",TIMESTAMP:"@",W3C:"yy-mm-dd",_ticksTo1970:24*(718685+Math.floor(492.5)-Math.floor(19.7)+Math.floor(4.925))*60*60*1e7,formatDate:function(t,e,a){if(!e)return"";function i(e,t,a){var i=""+t;if(l(e))for(;i.length<a;)i="0"+i;return i}function s(e,t,a,i){return(l(e)?i:a)[t]}var r,n=(a?a.dayNamesShort:null)||this._defaults.dayNamesShort,d=(a?a.dayNames:null)||this._defaults.dayNames,o=(a?a.monthNamesShort:null)||this._defaults.monthNamesShort,c=(a?a.monthNames:null)||this._defaults.monthNames,l=function(e){e=r+1<t.length&&t.charAt(r+1)===e;return e&&r++,e},h="",u=!1;if(e)for(r=0;r<t.length;r++)if(u)"'"!==t.charAt(r)||l("'")?h+=t.charAt(r):u=!1;else switch(t.charAt(r)){case"d":h+=i("d",e.getDate(),2);break;case"D":h+=s("D",e.getDay(),n,d);break;case"o":h+=i("o",Math.round((new Date(e.getFullYear(),e.getMonth(),e.getDate()).getTime()-new Date(e.getFullYear(),0,0).getTime())/864e5),3);break;case"m":h+=i("m",e.getMonth()+1,2);break;case"M":h+=s("M",e.getMonth(),o,c);break;case"y":h+=l("y")?e.getFullYear():(e.getFullYear()%100<10?"0":"")+e.getFullYear()%100;break;case"@":h+=e.getTime();break;case"!":h+=1e4*e.getTime()+this._ticksTo1970;break;case"'":l("'")?h+="'":u=!0;break;default:h+=t.charAt(r)}return h},_possibleChars:function(t){for(var e="",a=!1,i=function(e){e=s+1<t.length&&t.charAt(s+1)===e;return e&&s++,e},s=0;s<t.length;s++)if(a)"'"!==t.charAt(s)||i("'")?e+=t.charAt(s):a=!1;else switch(t.charAt(s)){case"d":case"m":case"y":case"@":e+="0123456789";break;case"D":case"M":return null;case"'":i("'")?e+="'":a=!0;break;default:e+=t.charAt(s)}return e},_get:function(e,t){return(void 0!==e.settings[t]?e.settings:this._defaults)[t]},_setDateFromField:function(e,t){if(e.input.val()!==e.lastVal){var a=this._get(e,"dateFormat"),i=e.lastVal=e.input?e.input.val():null,s=this._getDefaultDate(e),r=s,n=this._getFormatConfig(e);try{r=this.parseDate(a,i,n)||s}catch(e){i=t?"":i}e.selectedDay=r.getDate(),e.drawMonth=e.selectedMonth=r.getMonth(),e.drawYear=e.selectedYear=r.getFullYear(),e.currentDay=i?r.getDate():0,e.currentMonth=i?r.getMonth():0,e.currentYear=i?r.getFullYear():0,this._adjustInstDate(e)}},_getDefaultDate:function(e){return this._restrictMinMax(e,this._determineDate(e,this._get(e,"defaultDate"),new Date))},_determineDate:function(d,e,t){var a,i,e=null==e||""===e?t:"string"==typeof e?function(e){try{return V.datepicker.parseDate(V.datepicker._get(d,"dateFormat"),e,V.datepicker._getFormatConfig(d))}catch(e){}for(var t=(e.toLowerCase().match(/^c/)?V.datepicker._getDate(d):null)||new Date,a=t.getFullYear(),i=t.getMonth(),s=t.getDate(),r=/([+\-]?[0-9]+)\s*(d|D|w|W|m|M|y|Y)?/g,n=r.exec(e);n;){switch(n[2]||"d"){case"d":case"D":s+=parseInt(n[1],10);break;case"w":case"W":s+=7*parseInt(n[1],10);break;case"m":case"M":i+=parseInt(n[1],10),s=Math.min(s,V.datepicker._getDaysInMonth(a,i));break;case"y":case"Y":a+=parseInt(n[1],10),s=Math.min(s,V.datepicker._getDaysInMonth(a,i))}n=r.exec(e)}return new Date(a,i,s)}(e):"number"==typeof e?isNaN(e)?t:(a=e,(i=new Date).setDate(i.getDate()+a),i):new Date(e.getTime());return(e=e&&"Invalid Date"===e.toString()?t:e)&&(e.setHours(0),e.setMinutes(0),e.setSeconds(0),e.setMilliseconds(0)),this._daylightSavingAdjust(e)},_daylightSavingAdjust:function(e){return e?(e.setHours(12<e.getHours()?e.getHours()+2:0),e):null},_setDate:function(e,t,a){var i=!t,s=e.selectedMonth,r=e.selectedYear,t=this._restrictMinMax(e,this._determineDate(e,t,new Date));e.selectedDay=e.currentDay=t.getDate(),e.drawMonth=e.selectedMonth=e.currentMonth=t.getMonth(),e.drawYear=e.selectedYear=e.currentYear=t.getFullYear(),s===e.selectedMonth&&r===e.selectedYear||a||this._notifyChange(e),this._adjustInstDate(e),e.input&&e.input.val(i?"":this._formatDate(e))},_getDate:function(e){return!e.currentYear||e.input&&""===e.input.val()?null:this._daylightSavingAdjust(new Date(e.currentYear,e.currentMonth,e.currentDay))},_attachHandlers:function(e){var t=this._get(e,"stepMonths"),a="#"+e.id.replace(/\\\\/g,"\\");e.dpDiv.find("[data-handler]").map(function(){var e={prev:function(){V.datepicker._adjustDate(a,-t,"M")},next:function(){V.datepicker._adjustDate(a,+t,"M")},hide:function(){V.datepicker._hideDatepicker()},today:function(){V.datepicker._gotoToday(a)},selectDay:function(){return V.datepicker._selectDay(a,+this.getAttribute("data-month"),+this.getAttribute("data-year"),this),!1},selectMonth:function(){return V.datepicker._selectMonthYear(a,this,"M"),!1},selectYear:function(){return V.datepicker._selectMonthYear(a,this,"Y"),!1}};V(this).on(this.getAttribute("data-event"),e[this.getAttribute("data-handler")])})},_generateHTML:function(e){var t,a,i,s,r,n,d,o,c,l,h,u,p,g,_,f,k,D,m,y,v,M,b,w,C,I,x,Y,S,N,T,F,A=new Date,K=this._daylightSavingAdjust(new Date(A.getFullYear(),A.getMonth(),A.getDate())),j=this._get(e,"isRTL"),O=this._get(e,"showButtonPanel"),E=this._get(e,"hideIfNoPrevNext"),L=this._get(e,"navigationAsDateFormat"),R=this._getNumberOfMonths(e),H=this._get(e,"showCurrentAtPos"),A=this._get(e,"stepMonths"),P=1!==R[0]||1!==R[1],W=this._daylightSavingAdjust(e.currentDay?new Date(e.currentYear,e.currentMonth,e.currentDay):new Date(9999,9,9)),U=this._getMinMaxDate(e,"min"),z=this._getMinMaxDate(e,"max"),B=e.drawMonth-H,J=e.drawYear;if(B<0&&(B+=12,J--),z)for(t=this._daylightSavingAdjust(new Date(z.getFullYear(),z.getMonth()-R[0]*R[1]+1,z.getDate())),t=U&&t<U?U:t;this._daylightSavingAdjust(new Date(J,B,1))>t;)--B<0&&(B=11,J--);for(e.drawMonth=B,e.drawYear=J,H=this._get(e,"prevText"),H=L?this.formatDate(H,this._daylightSavingAdjust(new Date(J,B-A,1)),this._getFormatConfig(e)):H,a=this._canAdjustMonth(e,-1,J,B)?V("<a>").attr({class:"ui-datepicker-prev ui-corner-all","data-handler":"prev","data-event":"click",title:H}).append(V("<span>").addClass("ui-icon ui-icon-circle-triangle-"+(j?"e":"w")).text(H))[0].outerHTML:E?"":V("<a>").attr({class:"ui-datepicker-prev ui-corner-all ui-state-disabled",title:H}).append(V("<span>").addClass("ui-icon ui-icon-circle-triangle-"+(j?"e":"w")).text(H))[0].outerHTML,H=this._get(e,"nextText"),H=L?this.formatDate(H,this._daylightSavingAdjust(new Date(J,B+A,1)),this._getFormatConfig(e)):H,i=this._canAdjustMonth(e,1,J,B)?V("<a>").attr({class:"ui-datepicker-next ui-corner-all","data-handler":"next","data-event":"click",title:H}).append(V("<span>").addClass("ui-icon ui-icon-circle-triangle-"+(j?"w":"e")).text(H))[0].outerHTML:E?"":V("<a>").attr({class:"ui-datepicker-next ui-corner-all ui-state-disabled",title:H}).append(V("<span>").attr("class","ui-icon ui-icon-circle-triangle-"+(j?"w":"e")).text(H))[0].outerHTML,A=this._get(e,"currentText"),E=this._get(e,"gotoCurrent")&&e.currentDay?W:K,A=L?this.formatDate(A,E,this._getFormatConfig(e)):A,H="",e.inline||(H=V("<button>").attr({type:"button",class:"ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all","data-handler":"hide","data-event":"click"}).text(this._get(e,"closeText"))[0].outerHTML),L="",O&&(L=V("<div class='ui-datepicker-buttonpane ui-widget-content'>").append(j?H:"").append(this._isInRange(e,E)?V("<button>").attr({type:"button",class:"ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all","data-handler":"today","data-event":"click"}).text(A):"").append(j?"":H)[0].outerHTML),s=parseInt(this._get(e,"firstDay"),10),s=isNaN(s)?0:s,r=this._get(e,"showWeek"),n=this._get(e,"dayNames"),d=this._get(e,"dayNamesMin"),o=this._get(e,"monthNames"),c=this._get(e,"monthNamesShort"),l=this._get(e,"beforeShowDay"),h=this._get(e,"showOtherMonths"),u=this._get(e,"selectOtherMonths"),p=this._getDefaultDate(e),g="",f=0;f<R[0];f++){for(k="",this.maxRows=4,D=0;D<R[1];D++){if(m=this._daylightSavingAdjust(new Date(J,B,e.selectedDay)),y=" ui-corner-all",v="",P){if(v+="<div class='ui-datepicker-group",1<R[1])switch(D){case 0:v+=" ui-datepicker-group-first",y=" ui-corner-"+(j?"right":"left");break;case R[1]-1:v+=" ui-datepicker-group-last",y=" ui-corner-"+(j?"left":"right");break;default:v+=" ui-datepicker-group-middle",y=""}v+="'>"}for(v+="<div class='ui-datepicker-header ui-widget-header ui-helper-clearfix"+y+"'>"+(/all|left/.test(y)&&0===f?j?i:a:"")+(/all|right/.test(y)&&0===f?j?a:i:"")+this._generateMonthYearHeader(e,B,J,U,z,0<f||0<D,o,c)+"</div><table class='ui-datepicker-calendar'><thead><tr>",M=r?"<th class='ui-datepicker-week-col'>"+this._get(e,"weekHeader")+"</th>":"",_=0;_<7;_++)M+="<th scope='col'"+(5<=(_+s+6)%7?" class='ui-datepicker-week-end'":"")+"><span title='"+n[b=(_+s)%7]+"'>"+d[b]+"</span></th>";for(v+=M+"</tr></thead><tbody>",C=this._getDaysInMonth(J,B),J===e.selectedYear&&B===e.selectedMonth&&(e.selectedDay=Math.min(e.selectedDay,C)),w=(this._getFirstDayOfMonth(J,B)-s+7)%7,C=Math.ceil((w+C)/7),I=P&&this.maxRows>C?this.maxRows:C,this.maxRows=I,x=this._daylightSavingAdjust(new Date(J,B,1-w)),Y=0;Y<I;Y++){for(v+="<tr>",S=r?"<td class='ui-datepicker-week-col'>"+this._get(e,"calculateWeek")(x)+"</td>":"",_=0;_<7;_++)N=l?l.apply(e.input?e.input[0]:null,[x]):[!0,""],F=(T=x.getMonth()!==B)&&!u||!N[0]||U&&x<U||z&&z<x,S+="<td class='"+(5<=(_+s+6)%7?" ui-datepicker-week-end":"")+(T?" ui-datepicker-other-month":"")+(x.getTime()===m.getTime()&&B===e.selectedMonth&&e._keyEvent||p.getTime()===x.getTime()&&p.getTime()===m.getTime()?" "+this._dayOverClass:"")+(F?" "+this._unselectableClass+" ui-state-disabled":"")+(T&&!h?"":" "+N[1]+(x.getTime()===W.getTime()?" "+this._currentClass:"")+(x.getTime()===K.getTime()?" ui-datepicker-today":""))+"'"+(T&&!h||!N[2]?"":" title='"+N[2].replace(/'/g,"&#39;")+"'")+(F?"":" data-handler='selectDay' data-event='click' data-month='"+x.getMonth()+"' data-year='"+x.getFullYear()+"'")+">"+(T&&!h?"&#xa0;":F?"<span class='ui-state-default'>"+x.getDate()+"</span>":"<a class='ui-state-default"+(x.getTime()===K.getTime()?" ui-state-highlight":"")+(x.getTime()===W.getTime()?" ui-state-active":"")+(T?" ui-priority-secondary":"")+"' href='#' aria-current='"+(x.getTime()===W.getTime()?"true":"false")+"' data-date='"+x.getDate()+"'>"+x.getDate()+"</a>")+"</td>",x.setDate(x.getDate()+1),x=this._daylightSavingAdjust(x);v+=S+"</tr>"}11<++B&&(B=0,J++),k+=v+="</tbody></table>"+(P?"</div>"+(0<R[0]&&D===R[1]-1?"<div class='ui-datepicker-row-break'></div>":""):"")}g+=k}return g+=L,e._keyEvent=!1,g},_generateMonthYearHeader:function(e,t,a,i,s,r,n,d){var o,c,l,h,u,p,g=this._get(e,"changeMonth"),_=this._get(e,"changeYear"),f=this._get(e,"showMonthAfterYear"),k=this._get(e,"selectMonthLabel"),D=this._get(e,"selectYearLabel"),m="<div class='ui-datepicker-title'>",y="";if(r||!g)y+="<span class='ui-datepicker-month'>"+n[t]+"</span>";else{for(o=i&&i.getFullYear()===a,c=s&&s.getFullYear()===a,y+="<select class='ui-datepicker-month' aria-label='"+k+"' data-handler='selectMonth' data-event='change'>",l=0;l<12;l++)(!o||l>=i.getMonth())&&(!c||l<=s.getMonth())&&(y+="<option value='"+l+"'"+(l===t?" selected='selected'":"")+">"+d[l]+"</option>");y+="</select>"}if(f||(m+=y+(!r&&g&&_?"":"&#xa0;")),!e.yearshtml)if(e.yearshtml="",r||!_)m+="<span class='ui-datepicker-year'>"+a+"</span>";else{for(n=this._get(e,"yearRange").split(":"),h=(new Date).getFullYear(),u=(k=function(e){e=e.match(/c[+\-].*/)?a+parseInt(e.substring(1),10):e.match(/[+\-].*/)?h+parseInt(e,10):parseInt(e,10);return isNaN(e)?h:e})(n[0]),p=Math.max(u,k(n[1]||"")),u=i?Math.max(u,i.getFullYear()):u,p=s?Math.min(p,s.getFullYear()):p,e.yearshtml+="<select class='ui-datepicker-year' aria-label='"+D+"' data-handler='selectYear' data-event='change'>";u<=p;u++)e.yearshtml+="<option value='"+u+"'"+(u===a?" selected='selected'":"")+">"+u+"</option>";e.yearshtml+="</select>",m+=e.yearshtml,e.yearshtml=null}return m+=this._get(e,"yearSuffix"),f&&(m+=(!r&&g&&_?"":"&#xa0;")+y),m+="</div>"},_adjustInstDate:function(e,t,a){var i=e.selectedYear+("Y"===a?t:0),s=e.selectedMonth+("M"===a?t:0),t=Math.min(e.selectedDay,this._getDaysInMonth(i,s))+("D"===a?t:0),t=this._restrictMinMax(e,this._daylightSavingAdjust(new Date(i,s,t)));e.selectedDay=t.getDate(),e.drawMonth=e.selectedMonth=t.getMonth(),e.drawYear=e.selectedYear=t.getFullYear(),"M"!==a&&"Y"!==a||this._notifyChange(e)},_restrictMinMax:function(e,t){var a=this._getMinMaxDate(e,"min"),e=this._getMinMaxDate(e,"max"),t=a&&t<a?a:t;return e&&e<t?e:t},_notifyChange:function(e){var t=this._get(e,"onChangeMonthYear");t&&t.apply(e.input?e.input[0]:null,[e.selectedYear,e.selectedMonth+1,e])},_getNumberOfMonths:function(e){e=this._get(e,"numberOfMonths");return null==e?[1,1]:"number"==typeof e?[1,e]:e},_getMinMaxDate:function(e,t){return this._determineDate(e,this._get(e,t+"Date"),null)},_getDaysInMonth:function(e,t){return 32-this._daylightSavingAdjust(new Date(e,t,32)).getDate()},_getFirstDayOfMonth:function(e,t){return new Date(e,t,1).getDay()},_canAdjustMonth:function(e,t,a,i){var s=this._getNumberOfMonths(e),s=this._daylightSavingAdjust(new Date(a,i+(t<0?t:s[0]*s[1]),1));return t<0&&s.setDate(this._getDaysInMonth(s.getFullYear(),s.getMonth())),this._isInRange(e,s)},_isInRange:function(e,t){var a=this._getMinMaxDate(e,"min"),i=this._getMinMaxDate(e,"max"),s=null,r=null,n=this._get(e,"yearRange");return n&&(e=n.split(":"),n=(new Date).getFullYear(),s=parseInt(e[0],10),r=parseInt(e[1],10),e[0].match(/[+\-].*/)&&(s+=n),e[1].match(/[+\-].*/)&&(r+=n)),(!a||t.getTime()>=a.getTime())&&(!i||t.getTime()<=i.getTime())&&(!s||t.getFullYear()>=s)&&(!r||t.getFullYear()<=r)},_getFormatConfig:function(e){var t=this._get(e,"shortYearCutoff");return{shortYearCutoff:t="string"!=typeof t?t:(new Date).getFullYear()%100+parseInt(t,10),dayNamesShort:this._get(e,"dayNamesShort"),dayNames:this._get(e,"dayNames"),monthNamesShort:this._get(e,"monthNamesShort"),monthNames:this._get(e,"monthNames")}},_formatDate:function(e,t,a,i){t||(e.currentDay=e.selectedDay,e.currentMonth=e.selectedMonth,e.currentYear=e.selectedYear);t=t?"object"==typeof t?t:this._daylightSavingAdjust(new Date(i,a,t)):this._daylightSavingAdjust(new Date(e.currentYear,e.currentMonth,e.currentDay));return this.formatDate(this._get(e,"dateFormat"),t,this._getFormatConfig(e))}}),V.fn.datepicker=function(e){if(!this.length)return this;V.datepicker.initialized||(V(document).on("mousedown",V.datepicker._checkExternalClick),V.datepicker.initialized=!0),0===V("#"+V.datepicker._mainDivId).length&&V("body").append(V.datepicker.dpDiv);var t=Array.prototype.slice.call(arguments,1);return"string"==typeof e&&("isDisabled"===e||"getDate"===e||"widget"===e)||"option"===e&&2===arguments.length&&"string"==typeof arguments[1]?V.datepicker["_"+e+"Datepicker"].apply(V.datepicker,[this[0]].concat(t)):this.each(function(){"string"==typeof e?V.datepicker["_"+e+"Datepicker"].apply(V.datepicker,[this].concat(t)):V.datepicker._attachDatepicker(this,e)})},V.datepicker=new e,V.datepicker.initialized=!1,V.datepicker.uuid=(new Date).getTime(),V.datepicker.version="1.13.2";V.datepicker});


/*  jQuery Nice Select - v1.0
    https://github.com/hernansartorio/jquery-nice-select
    Made by HernÃ¡n Sartorio  */
!function(e){e.fn.niceSelect=function(t){function s(t){t.after(e("<div></div>").addClass("nice-select").addClass(t.attr("class")||"").addClass(t.attr("disabled")?"disabled":"").attr("tabindex",t.attr("disabled")?null:"0").html('<span class="current"></span><ul class="list"></ul>'));var s=t.next(),n=t.find("option"),i=t.find("option:selected");s.find(".current").html(i.data("display")||i.text()),n.each(function(t){var n=e(this),i=n.data("display");s.find("ul").append(e("<li></li>").attr("data-value",n.val()).attr("data-display",i||null).addClass("option"+(n.is(":selected")?" selected":"")+(n.is(":disabled")?" disabled":"")).html(n.text()))})}if("string"==typeof t)return"update"==t?this.each(function(){var t=e(this),n=e(this).next(".nice-select"),i=n.hasClass("open");n.length&&(n.remove(),s(t),i&&t.next().trigger("click"))}):"destroy"==t?(this.each(function(){var t=e(this),s=e(this).next(".nice-select");s.length&&(s.remove(),t.css("display",""))}),0==e(".nice-select").length&&e(document).off(".nice_select")):console.log('Method "'+t+'" does not exist.'),this;this.hide(),this.each(function(){var t=e(this);t.next().hasClass("nice-select")||s(t)}),e(document).off(".nice_select"),e(document).on("click.nice_select",".nice-select",function(t){var s=e(this);e(".nice-select").not(s).removeClass("open"),s.toggleClass("open"),s.hasClass("open")?(s.find(".option"),s.find(".focus").removeClass("focus"),s.find(".selected").addClass("focus")):s.focus()}),e(document).on("click.nice_select",function(t){0===e(t.target).closest(".nice-select").length&&e(".nice-select").removeClass("open").find(".option")}),e(document).on("click.nice_select",".nice-select .option:not(.disabled)",function(t){var s=e(this),n=s.closest(".nice-select");n.find(".selected").removeClass("selected"),s.addClass("selected");var i=s.data("display")||s.text();n.find(".current").text(i),n.prev("select").val(s.data("value")).trigger("change")}),e(document).on("keydown.nice_select",".nice-select",function(t){var s=e(this),n=e(s.find(".focus")||s.find(".list .option.selected"));if(32==t.keyCode||13==t.keyCode)return s.hasClass("open")?n.trigger("click"):s.trigger("click"),!1;if(40==t.keyCode){if(s.hasClass("open")){var i=n.nextAll(".option:not(.disabled)").first();i.length>0&&(s.find(".focus").removeClass("focus"),i.addClass("focus"))}else s.trigger("click");return!1}if(38==t.keyCode){if(s.hasClass("open")){var l=n.prevAll(".option:not(.disabled)").first();l.length>0&&(s.find(".focus").removeClass("focus"),l.addClass("focus"))}else s.trigger("click");return!1}if(27==t.keyCode)s.hasClass("open")&&s.trigger("click");else if(9==t.keyCode&&s.hasClass("open"))return!1});var n=document.createElement("a").style;return n.cssText="pointer-events:auto","auto"!==n.pointerEvents&&e("html").addClass("no-csspointerevents"),this}}(jQuery);

/* jQuery ui-datepicker extension */
$.datepicker._get_original=$.datepicker._get,$.datepicker._get=function(t,e){var i=$.datepicker._get_original(t,e),a=t.settings.range;if(!a)return i;var s=this;switch(a){case"period":case"multiple":var n=$(this.dpDiv).data("datepickerExtensionRange");switch(n||(n=new _datepickerExtension,$(this.dpDiv).data("datepickerExtensionRange",n)),n.range=a,n.range_multiple_max=t.settings.range_multiple_max||0,e){case"onSelect":var r=i;r||(r=function(){}),i=function(t,e){n.onSelect(t,e),r(t,e,n),s._datepickerShowing=!1,setTimeout(function(){s._updateDatepicker(e),s._datepickerShowing=!0}),n.setClassActive(e)};break;case"beforeShowDay":var r=i;r||(r=function(){return[!0,""]}),i=function(t){var e=r(t);return e=n.fillDay(t,e)};break;case"beforeShow":var r=i;r||(r=function(){}),i=function(t,e){r(t,e),n.setClassActive(e)};break;case"onChangeMonthYear":var r=i;r||(r=function(){}),i=function(t,e,i){r(t,e,i),n.setClassActive(i)}}}return i},$.datepicker._setDate_original=$.datepicker._setDate,$.datepicker._setDate=function(t,e,i){var a=t.settings.range;if(!a)return $.datepicker._setDate_original(t,e,i);var s=this.dpDiv.data("datepickerExtensionRange");if(!s)return $.datepicker._setDate_original(t,e,i);switch(a){case"period":("object"!=typeof e||void 0==e.length)&&(e=[e,e]),s.step=0,$.datepicker._setDate_original(t,e[0],i),s.startDate=this._getDate(t),s.startDateText=this._formatDate(t),$.datepicker._setDate_original(t,e[1],i),s.endDate=this._getDate(t),s.endDateText=this._formatDate(t),s.setClassActive(t);break;case"multiple":("object"!=typeof e||void 0==e.length)&&(e=[e]),s.dates=[],s.datesText=[];var n=this;$.map(e,function(e){$.datepicker._setDate_original(t,e,i),s.dates.push(n._getDate(t)),s.datesText.push(n._formatDate(t))}),s.setClassActive(t)}};var _datepickerExtension=function(){this.range=!1,this.range_multiple_max=0,this.step=0,this.dates=[],this.datesText=[],this.startDate=null,this.endDate=null,this.startDateText="",this.endDateText="",this.onSelect=function(t,e){switch(this.range){case"period":return this.onSelectPeriod(t,e);case"multiple":return this.onSelectMultiple(t,e)}},this.onSelectPeriod=function(t,e){this.step++,this.step%=2,this.step?(this.startDate=this.getSelectedDate(e),this.endDate=this.startDate,this.startDateText=t,this.endDateText=this.startDateText):(this.endDate=this.getSelectedDate(e),this.endDateText=t,this.startDate.getTime()>this.endDate.getTime()&&(this.endDate=this.startDate,this.startDate=this.getSelectedDate(e),this.endDateText=this.startDateText,this.startDateText=t))},this.onSelectMultiple=function(t,e){var i=this.getSelectedDate(e),a=-1;$.map(this.dates,function(t,e){t.getTime()==i.getTime()&&(a=e)});var s=$.inArray(t,this.datesText);-1!=a?this.dates.splice(a,1):this.dates.push(i),-1!=s?this.datesText.splice(s,1):this.datesText.push(t),this.range_multiple_max&&this.dates.length>this.range_multiple_max&&(this.dates.splice(0,1),this.datesText.splice(0,1))},this.fillDay=function(t,e){var i=e[1];switch(1==t.getDate()&&(i+=" first-of-month"),t.getDate()==new Date(t.getFullYear(),t.getMonth()+1,0).getDate()&&(i+=" last-of-month"),e[1]=i.trim(),this.range){case"period":return this.fillDayPeriod(t,e);case"multiple":return this.fillDayMultiple(t,e)}},this.fillDayPeriod=function(t,e){if(!this.startDate||!this.endDate)return e;var i=e[1];return t>=this.startDate&&t<=this.endDate&&(i+=" selected"),t.getTime()==this.startDate.getTime()&&(i+=" selected-start"),t.getTime()==this.endDate.getTime()&&(i+=" selected-end"),e[1]=i.trim(),e},this.fillDayMultiple=function(t,e){var i=e[1],a=!1;return $.map(this.dates,function(e){e.getTime()==t.getTime()&&(a=!0)}),a&&(i+=" selected selected-start selected-end"),e[1]=i.trim(),e},this.getSelectedDate=function(t){return new Date(t.selectedYear,t.selectedMonth,t.selectedDay)},this.setClassActive=function(t){var e=this;setTimeout(function(){$("td.selected > *",t.dpDiv).addClass("ui-state-active"),"multiple"==e.range&&$("td:not(.selected)",t.dpDiv).removeClass("ui-datepicker-current-day").children().removeClass("ui-state-active")})}};

document.addEventListener( 'wpcf7mailsent', function( event ) {
Swal.fire(
  'Успешно отправлено',
  'Спасибо за Ваше сообщение. ',
  'success',
) 
  
}, false );


document.addEventListener('DOMContentLoaded', function(){


	$('.search_show').on('click', function() {
        $('.searchform').removeClass('closed');
    });	

	$('.close_search').on('click', function() {
        $('.searchform').addClass('closed');
    });	
	
    $("#load-more").click(function() {
		var offset = 6;
		var cat = $(this).attr('data-cat');
        $.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            data: {
                action: "load_more_posts",
                offset: offset,
				cat:cat,
            },
            success: function(response) {
                $("#post-container").append(response);
                $("#load-more").hide();  // Скрыть кнопку после загрузки всех постов
            }
        });
    });


   // Если ширину окна меньше 768 пикселей
    if ($(window).width() < 768) {
        // Отобразим первый текстовый блок под первой вкладкой
        $('.su_items_btns_ul li:first-child').after($('.su_item_text:first').show());
        // Добавим класс 'active' к первой вкладке
        $('.su_items_btns_ul li:first-child').addClass('active');
    }

$('.tab-links a').on('click', function(e) {
    e.preventDefault();
    
    var currentAttrValue = $(this).attr('href');

    if ($(window).width() < 768) {
        // Для мобильных устройств
        if ($(this).parent('li').hasClass('active')) {
            // Если текущий элемент уже активен, просто скрываем его
            $('.tab-content ' + currentAttrValue).slideUp();
            $(this).parent('li').removeClass('active');
        } else {
            // Скрываем все текстовые блоки
            $('.su_item_text').slideUp();
            // Показываем текст под активной вкладкой
            $(this).parent('li').after($('.tab-content ' + currentAttrValue).slideDown());

            // Добавляем класс 'active' к текущей вкладке
            $(this).parent('li').addClass('active').siblings().removeClass('active');
        }
    } else {
        // Для десктопов
        $('.tab-content ' + currentAttrValue).show().siblings().hide();
        $(this).parent('li').addClass('active').siblings().removeClass('active');
    }
});


$('.main_section').addClass('active');

$('select').niceSelect();

$('.container-in a').attr('data-fancybox', 'content-in');

function addDelim(nStr) {
    nStr += '';
    var x = nStr.split(' ');
    var x1 = x[0];
    var x2 = x.length > 1 ? ' ' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ' ' + '$2');
    }
	var resultnum = x1 + x2;
	var resultnumfinal = resultnum.replace(".", ",");
	
    return resultnumfinal;
}	

function sumqitem() {
    var qitem = 0;
    $('.qitem').each(function() {
        qitem += Number($(this).val());
		console.log(qitem);
    });
	
	var summcost = qitem * Number($('.littleform_item_cost').attr('data-oneitemcost'));
	console.log(summcost);
	$('.littleform_item_cost span').text(addDelim(summcost));
}


  
  
  
	var n = 1; //n is equal to 1
  //On click add 1 to n
  $('.littleform_qty_plus').on('click', function(){
	var addInput = $(this).parents('.littleform_qty_in').find('input');
	var n = Number($(this).parents('.littleform_qty_in').find('input').val());
	
    $(addInput).val(++n);
	sumqitem();
  });

  $('.littleform_qty_minus').on('click', function(){
	  var addInput = $(this).parents('.littleform_qty_in').find('input');
		var n = Number($(this).parents('.littleform_qty_in').find('input').val());
    if (n >= 1) {
      $(addInput).val(--n);
    } else {
      //Otherwise do nothing
    }
	sumqitem();
  });

var extensionRange = $('.your-date').datepicker('widget').data('datepickerExtensionRange');

$('.your-date').datepicker({
	dateFormat : "dd.mm.yy",
	monthNames : ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
	dayNamesMin : ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
	
	//range: 'period', // возможные значения: period, multiple
	//numberOfMonths: 1,
	// onSelect: function(dateText, inst, extensionRange) { // extensionRange - объект расширения
     // $('.your-date').val(extensionRange.startDateText + ' - ' + extensionRange.endDateText);
   // }
});


$(function() {
	var tab = $('#tabs .tabs-items > div.tabs-item'); 
	tab.hide().filter(':first').show(); 
	
	// Клики по вкладкам.
	$('#tabs .tabs-nav-btn a').click(function(){
		$('.rs_wrap').slick('refresh');
		tab.hide(); 
		tab.filter(this.hash).show(); 
		$('#tabs .tabs-nav-btn a').removeClass('active');
		$(this).addClass('active');
		return false;
	}).filter(':first').click();
 
	// Клики по якорным ссылкам.
	$('.tabs-target').click(function(){
		$('#tabs .tabs-nav-btn a[href=' + $(this).attr('href')+ ']').click();
		
	});
	
	
});

if(window.outerWidth > 820) {
$( ".su_item_wrap" ).hover(
  function() {
	var currentheight = $(this).height();
	$(this).find(".fill_flex").css("height", currentheight);
    $(this).find(".spec_bg .sub_main_list").stop().slideDown(300);
  }, function() {
    $(this).find(".spec_bg .sub_main_list").stop().slideUp(300);
  }
);
}
	
	
 $('ul.tabs__caption').on('click', 'li:not(.active)', function() {
    $(this)
      .addClass('active').siblings().removeClass('active')
      .closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
  });
	
	
	
	$('.idphone').mask('+7(999) 999-9999',{autoclear: true});





$('.vpr_gallery').slick({
  centerMode: false,
  lazyLoad: 'ondemand',
  slidesToShow: 1,
  arrows: false,
  dots: true,
});

$('.main-rev-wrap').slick({
  centerMode: false,
  lazyLoad: 'ondemand',
  slidesToShow: 1,
  arrows: true,
  dots: true,
  responsive: [
    {
      breakpoint: 990,
      settings: {
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
      }
    },
]
});


$('.clients_row_cur').slick({
  centerMode: false,
  lazyLoad: 'ondemand',
  slidesToShow: 1,
  arrows: false,
  dots: true,
  responsive: [
    {
      breakpoint: 990,
      settings: {
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
      }
    },
]
});






$('.cur_achiev_row').on('init reInit afterChange', function(event, slick, currentSlide) {
    var i = (currentSlide ? currentSlide : 0) + 1;
    var slidesToShow = slick.options.slidesToShow;
    var currentSlidePosition = Math.ceil(i / slidesToShow);
    var totalSlides = Math.ceil(slick.slideCount / slidesToShow);
    $('.achiev_list_num_item').text(currentSlidePosition + ' из ' + totalSlides + ' слайдев');
});

$('.cur_achiev_row').slick({
  centerMode: false,
  lazyLoad: 'ondemand',
  slidesToShow: 4,
  slidesToScroll: 4,
  arrows: true,
  prevArrow:'<div class="arrow_c arrow_prev_slick"><svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5833 13H5.41667" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13 5.4165L5.41667 12.9998L13 20.5832" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
  nextArrow:'<div class="arrow_c arrow_next_slick"><svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.41663 13H20.5833" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13 5.4165L20.5833 12.9998L13 20.5832" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
  infinite:false,
  dots: true,
  responsive: [
    {
      breakpoint: 990,
      settings: {
		slidesToShow: 2,
		slidesToScroll: 2,
		arrows: false,
      }
    },
]
});

$('.cur_achiev_row_2').slick({
  centerMode: false,
  lazyLoad: 'ondemand',
  slidesToShow: 4,
  arrows: false,
  dots: true,
  responsive: [
    {
      breakpoint: 990,
      settings: {
		slidesToShow: 3,
		slidesToScroll: 3,
		arrows: false,
      }
    },
]
});

$('.rs_wrap').slick({
  centerMode: false,
  lazyLoad: 'ondemand',
  slidesToShow: 1,
  arrows: true,
  fade: true,
  dots: true,
  prevArrow:'<div class="arrow_c arrow_prev_slick"><svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5833 13H5.41667" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13 5.4165L5.41667 12.9998L13 20.5832" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
  nextArrow:'<div class="arrow_c arrow_next_slick"><svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.41663 13H20.5833" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13 5.4165L20.5833 12.9998L13 20.5832" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
  responsive: [
    {
      breakpoint: 990,
      settings: {
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
      }
    },
]
});

$('.gallery_content').slick({
  centerMode: false,
  lazyLoad: 'ondemand',
  slidesToShow: 1,
  arrows: true,
  fade: true,
  dots: true,
  prevArrow:'<div class="arrow_c arrow_prev_slick"><svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5833 13H5.41667" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13 5.4165L5.41667 12.9998L13 20.5832" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
  nextArrow:'<div class="arrow_c arrow_next_slick"><svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.41663 13H20.5833" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13 5.4165L20.5833 12.9998L13 20.5832" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
  responsive: [
    {
      breakpoint: 990,
      settings: {
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
      }
    },
]
});

$('.single-gallery-slick').slick({
  centerMode: false,
  lazyLoad: 'ondemand',
  slidesToShow: 4,
  arrows: false,      
  infinite: false,
  dots: true,
  responsive: [
    {
      breakpoint: 990,
      settings: {
		slidesToShow: 2,
		slidesToScroll: 2,
		arrows: false,
      }
    },
]
});

$('.row_consist').slick({
  centerMode: false,
  lazyLoad: 'ondemand',
  slidesToShow: 4,
  arrows: true,      
  infinite: false,
  dots: true,
  prevArrow:'<div class="arrow_c arrow_prev_slick"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M25.3334 16H6.66669" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 25.3334L6.66669 16.0001L16 6.66675" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
  nextArrow:'<div class="arrow_c arrow_next_slick"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.66665 16H25.3333" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 25.3334L25.3333 16.0001L16 6.66675" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
	responsive: [
    {
      breakpoint: 990,
      settings: {
		slidesToShow: 2,
		slidesToScroll: 2,
		arrows: true,
      }
    },
	]
});



$('.row_reviews').slick({
  centerMode: false,
  lazyLoad: 'ondemand',
  slidesToShow: 2,
  arrows: true,      
  infinite: false,
  dots: true,  
  prevArrow:'<div class="arrow_c arrow_prev_slick"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M25.3334 16H6.66669" stroke="#121E2D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 25.3334L6.66669 16.0001L16 6.66675" stroke="#121E2D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
  nextArrow:'<div class="arrow_c arrow_next_slick"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.66665 16H25.3333" stroke="#121E2D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 25.3334L25.3333 16.0001L16 6.66675" stroke="#121E2D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
	responsive: [
    {
      breakpoint: 990,
      settings: {
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
      }
    },
]
});


// Обновление счетчика при инициализации и при перелистывании
$('.row_consist').on('init reInit afterChange', function(event, slick, currentSlide, nextSlide) {
    // Текущий слайд
    var currentStart = (currentSlide ? currentSlide : 0) + 1;
    
    // Определение последнего показанного слайда на основе настроек
    var currentEnd = currentStart + slick.options.slidesToShow - 1;
    if (currentEnd > slick.slideCount) {
        currentEnd = slick.slideCount;
    }

    // Обновление текста счетчика
    $('.slide-counter').text(currentEnd + ' мероприятия из ' + slick.slideCount);
});

// Запуск события 'init' после инициализации слайдера
$('.row_consist').slick('setPosition');



$('.tabs__caption').slick({
  mobileFirst: true,
  lazyLoad: 'ondemand',
  slidesToShow: 2,
  centerMode: false,
  arrows: false,
  infinite: false,
  dots: true,
   responsive: [
          {
                  breakpoint: 768,
                  settings: 'unslick',
          }
    ]
});






 $('.clients_content_row').slick({
  slidesToShow: 4,
  slidesToScroll: 4,
  arrows: false,
  dots: true,
  fade: false,
  infinite: true,
  centerMode: false,
  variableWidth: false,
  autoplay: true,
  autoplaySpeed: 5000,
  responsive: [
    {
      breakpoint: 1440,
      settings: {
		slidesToShow: 3,
		slidesToScroll: 3,
      }
    },
	{
      breakpoint: 990,
      settings: {
		slidesToShow: 2,
		slidesToScroll: 2,
		centerMode: false,
      }
    },
	{
      breakpoint: 640,
      settings: {
		slidesToShow: 3,
		slidesToScroll: 3,
		centerMode: true,
      }
    },
	{
      breakpoint: 470,
      settings: {
		slidesToShow: 1,
		slidesToScroll: 1,
		centerMode: true,
      }
    }
  ]
});


$(document).on('click', '.price_row_load_more', function(){ 
	if (!$(this).attr('data-toggled') || $(this).attr('data-toggled') == 'off'){
		$(this).addClass('active'); 
		$(this).attr('data-toggled','on');
		$('.price_table_row_more').slideDown();
		$(this).find('span').text('Скрыть');
	} else if ($(this).attr('data-toggled') == 'on'){ 
		$(this).attr('data-toggled','off');
		$(this).removeClass('active');
		$('.price_table_row_more').slideUp();
		$(this).find('span').text('Показать все');
	}
});

$(document).on('click', '.q_item', function(){ 
	if (!$(this).attr('data-toggled') || $(this).attr('data-toggled') == 'off'){
		$(this).find('.plusminus_label').text('Скрыть ответ'); 
		$(this).addClass('active'); 
		$(this).attr('data-toggled','on');
		$(this).find('.q_item_answer').slideDown();
	} else if ($(this).attr('data-toggled') == 'on'){ 
	$(this).find('.plusminus_label').text('Раскрыть ответ'); 
		$(this).attr('data-toggled','off');
		$(this).removeClass('active');
		$(this).find('.q_item_answer').slideUp();
	}
});


$(document).on('click', '.box_spoil_wrap', function(){ 
	if (!$(this).attr('data-toggled') || $(this).attr('data-toggled') == 'off'){
		$(this).addClass('active'); 
		$(this).attr('data-toggled','on');
		$(this).find('.box_spoil_content').slideDown();
	} else if ($(this).attr('data-toggled') == 'on'){ 
		$(this).attr('data-toggled','off');
		$(this).removeClass('active');
		$(this).find('.box_spoil_content').slideUp();
	}
});


$(document).on('click', '.load_more_work', function(){ 
	$('.vpr_content_more').slideDown();
	$(this).fadeOut(300);
	$('.vpr_gallery').slick('refresh');
});

$(document).on('click', '.contact-item-col-tab-nav-item', function(){ 
	$('.contact-item-col-tab-nav-item').not(this).removeClass('active');
	$(this).addClass('active');
	var dataid = $(this).attr('data-id');
	$( ".contact-item-tab-map" ).removeClass('active');
	$( ".contact-item-tab-map[data-id='"+dataid+"']" ).addClass('active');
});



$( ".mobile_menu_overlay" ).click(function() {
	$(".menu-toggle").trigger('click');
});

$( ".menu-toggle" ).click(function() {
	if (!$(this).attr('data-toggled') || $(this).attr('data-toggled') == 'off'){
		$('.mobile_menu').addClass('active'); 
		$(this).attr('data-toggled','on');
		$(this).addClass('menu-toggle-active');
		$('.mobile_menu_overlay').fadeIn(300);
	} else if ($(this).attr('data-toggled') == 'on'){ 
		$('.mobile_menu').removeClass('active'); 
		$(this).attr('data-toggled','off');
		$(this).removeClass('menu-toggle-active');
		$('.mobile_menu_overlay').fadeOut(300);
	}
});


$(function() {
    $(document).on("click", ".mobile_menu .menu-item-has-children>a", function(e) {
        e.preventDefault();
        $(".mobile_menu .activity").removeClass("activity");
        $(this).siblings("ul").addClass("loaded").addClass("activity");
    });
    $(document).on("click", ".mobile_menu .back", function(e) {
        e.preventDefault();
        $(".mobile_menu .activity").removeClass("activity");
        $(this).parent().parent().removeClass("loaded");
        $(this).parent().parent().parent().parent().addClass("activity");
    });
});

$('.datatextcopy').on('click', function(){
	
	var datatext = $(this).attr('data-text');
	var product_link = $(this).attr('data-text-product_link');
	var product_name = $(this).attr('data-text-product_name');
	var dataimg = $(this).attr('data-img-product');
	var datades = $(this).attr('data-text-product-des');
	
	$('.data-text-product_des').attr('src', dataimg);
	$('.init_img').attr('src', dataimg);
	$('.init_name').text(product_name);
	$('.init_des').text(datades);
	$('.init_box').text(datatext);
	$('.init_name').val(product_name);
	$('.text-product_link').val(product_link);
	
	
});	


/* одно из двух в форме расчета */
if($(".form_usluga").val() == 0 || $(".form_product").val() == 0){
  $(".order_button.form_item_3").attr("disabled", "disabled");
}
$('.form_usluga').on("change",function () {
  if($(".form_usluga").val() == 0 && $(".form_product").val() == 0){
	$(".order_button.form_item_3").attr("disabled", "disabled");
  } else if ($(".form_usluga").val() == 0 && $(".form_product").val() !== 0){
	$(".order_button.form_item_3").removeAttr("disabled");
  } else {
	$(".order_button.form_item_3").removeAttr("disabled");
  }
});
$('.form_product').on("change",function () {
  if($(".form_usluga").val() == 0 && $(".form_product").val() == 0){
	$(".order_button.form_item_3").attr("disabled", "disabled");
  } else if ($(".form_product").val() == 0 && $(".form_usluga").val() !== 0){
	$(".order_button.form_item_3").removeAttr("disabled");
  } else {
	$(".order_button.form_item_3").removeAttr("disabled");
  }
}); 

$(document).on('click', '.littleform_item_selector', function(){ 
	if (!$(this).attr('data-toggled') || $(this).attr('data-toggled') == 'off'){
		$(this).parents('.littleform_item_selector_wpap').addClass('active'); 
		$(this).attr('data-toggled','on');
		$(this).next('.littleform_item_selector_list').slideDown();
	} else if ($(this).attr('data-toggled') == 'on'){ 
		$(this).attr('data-toggled','off');
		$(this).parents('.littleform_item_selector_wpap').removeClass('active');
		$(this).next('.littleform_item_selector_list').fadeOut(200);
	}
});


function calc(thisitem) {
	var calctype = thisitem.parents('.section-calc').attr('data-calc');
	console.log(calctype);
	
	if(calctype == 'cover') { 
		var checkbox1 = thisitem.parents('.section-calc').find('.sl-zapah');
		var checkbox2 = thisitem.parents('.section-calc').find('.sl-pytna');
		var checkbox3 = thisitem.parents('.section-calc').find('.sl-zamkad');
		var zamkadkmitem = thisitem.parents('.section-calc').find('.zamkadkm');
		var zamkadkm = Number(thisitem.parents('.section-calc').find('.zamkadkm').val());
		var selectvalitem = thisitem.parents('.section-calc').find('.typebox1');
		var selectval = thisitem.parents('.section-calc').find('.typebox1').attr('data-current-val');
		var current_size = thisitem.parents('.section-calc').find('.idsize').val();
		var resultbox = thisitem.parents('.section-calc').find('.littleform_item_result span');
		
		if(Number(selectval) > 1) {
		
		
		if(current_size < 1) { var current_size = 1; } 
		var current_sum = Number(selectval) * Number(current_size);
		
		
		if($(checkbox1).is(':checked')) {
			var current_sum = current_sum + 1000;
		} 
		
		if($(checkbox2).is(':checked')) {
			var current_sum = current_sum + 500;
		} 
		
		if($(checkbox3).is(':checked')) {
			
			//zamkadkmitem.fadeIn(300);
			if(zamkadkm > 2) {
				var current_sum = current_sum + (zamkadkm * 25);
			} else {
				var current_sum = current_sum + (2 * 25);
			}
		} else {
			zamkadkmitem.val('');
			//zamkadkmitem.fadeOut(300);
		}
		
		console.log(current_sum);
		
		if(current_sum > 2500) {
			resultbox.text(current_sum); 
		} else {
			resultbox.text(2500); 
		}
		selectvalitem.removeClass('error');
		
	} else {
		selectvalitem.addClass('error');
	}
	}
	
	if(calctype == 'divan') {
		var checkbox1 = thisitem.parents('.section-calc').find('.sl-spmestadivan');
		var checkbox2 = thisitem.parents('.section-calc').find('.sl-slozhzapahdivan');
		var checkbox3 = thisitem.parents('.section-calc').find('.sl-divan-vilvet');
		var checkbox4 = thisitem.parents('.section-calc').find('.sl-divan-barhat');
		var checkbox5 = thisitem.parents('.section-calc').find('.sl-divan-kozha');
		var checkbox6 = thisitem.parents('.section-calc').find('.sl-divan-viskoza');
		var checkbox7 = thisitem.parents('.section-calc').find('.sl-divan-hlopok');
		var checkbox8 = thisitem.parents('.section-calc').find('.sl-zamkaddivan');
		
		var zamkadkmitem = thisitem.parents('.section-calc').find('.zamkadkm');
		var zamkadkm = Number(thisitem.parents('.section-calc').find('.zamkadkm').val());
		var selectvalitem = thisitem.parents('.section-calc').find('.typebox1');
		var selectvalitem2 = thisitem.parents('.section-calc').find('.typebox2');
		
		var selectval = thisitem.parents('.section-calc').find('.typebox1').attr('data-current-val');
		var selectval2 = thisitem.parents('.section-calc').find('.typebox2').attr('data-current-val');

		var resultbox = thisitem.parents('.section-calc').find('.littleform_item_result span');
		
		if(Number(selectval) > 1) {
		
		var current_sum = Number(selectval);
		var current_sum_izdelie = Number(selectval);
		console.log(current_sum);
		
		if(Number(selectval2) > 1) {
			var current_sum = Number(current_sum) + Number(selectval2);
			var current_sum_izdelie = Number(current_sum) + Number(selectval2);
			console.log(current_sum);
		}
		
		if($(checkbox1).is(':checked')) {
			var current_sum = current_sum + 500;
			console.log(current_sum);
		} 
		
		if($(checkbox2).is(':checked')) {
			var current_sum = current_sum + 1000;
			console.log(current_sum);
		} 
		
		if($(checkbox3).is(':checked')) {
			var current_sum = current_sum + ((current_sum_izdelie / 100) * 40);
			console.log(current_sum);
		} 
		
		if($(checkbox4).is(':checked')) {
			var current_sum = current_sum + ((current_sum_izdelie / 100) * 40);
			console.log(current_sum);
		} 
		
		if($(checkbox5).is(':checked')) {
			var current_sum = current_sum + ((current_sum_izdelie / 100) * 40);
			console.log(current_sum);
		} 
		
		
		if($(checkbox6).is(':checked')) {
			var current_sum = current_sum + ((current_sum_izdelie / 100) * 40);
			console.log(current_sum);
		} 
		
		if($(checkbox7).is(':checked')) {
			var current_sum = current_sum + ((current_sum_izdelie / 100) * 40);
			console.log(current_sum);
		} 
		
		
		if($(checkbox8).is(':checked')) {
			
			//zamkadkmitem.fadeIn(300);
			if(zamkadkm > 2) {
				var current_sum = current_sum + (zamkadkm * 25);
			} else {
				var current_sum = current_sum + (2 * 25);
			}
		} else {
			zamkadkmitem.val('');
			//zamkadkmitem.fadeOut(300);
		}
		
		if(current_sum > 2500) {
			resultbox.text(current_sum); 
		} else {
			resultbox.text(2500); 
		}
		
		}
		
	}	

	if(calctype == 'matras') {
		var checkbox1 = thisitem.parents('.section-calc').find('.sl-twosidematras');
		var checkbox2 = thisitem.parents('.section-calc').find('.sl-zapahmatras');
		var checkbox3 = thisitem.parents('.section-calc').find('.sl-pytnamatras');
		var checkbox4 = thisitem.parents('.section-calc').find('.sl-zamkadmatras');
		var zamkadkmitem = thisitem.parents('.section-calc').find('.zamkadkm');
		var zamkadkm = Number(thisitem.parents('.section-calc').find('.zamkadkm').val());
		var selectvalitem = thisitem.parents('.section-calc').find('.typebox1');
		var selectval = thisitem.parents('.section-calc').find('.typebox1').attr('data-current-val');
		var selectval2 = thisitem.parents('.section-calc').find('.typebox1').attr('data-current-val2');
		var resultbox = thisitem.parents('.section-calc').find('.littleform_item_result span');
		
		
		if(Number(selectval) > 1) {
			var current_sum = Number(selectval);
			console.log(current_sum);
			
			if($(checkbox1).is(':checked')) {
				var current_sum = current_sum + Number(selectval2);
			} 
			
			if($(checkbox2).is(':checked')) {
				var current_sum = current_sum + 1000;
			} 
			
			if($(checkbox3).is(':checked')) {
				var current_sum = current_sum + 500;
			} 
			
			
		if($(checkbox4).is(':checked')) {
			
			//zamkadkmitem.fadeIn(300);
			if(zamkadkm > 2) {
				var current_sum = current_sum + (zamkadkm * 25);
			} else {
				var current_sum = current_sum + (2 * 25);
			}
		} else {
			zamkadkmitem.val('');
			//zamkadkmitem.fadeOut(300);
		}
		
		if(current_sum > 2500) {
			resultbox.text(current_sum); 
		} else {
			resultbox.text(2500); 
		}
		
		}
			
		}
		
		if(calctype == 'kreslastulya') {
			var checkbox1 = thisitem.parents('.section-calc').find('.sl-spalnoemestokreslo');
			var checkbox2 = thisitem.parents('.section-calc').find('.sl-slozhzapahkreslo');
			var checkbox3 = thisitem.parents('.section-calc').find('.sl-kreslo-vilvet');
			var checkbox4 = thisitem.parents('.section-calc').find('.sl-kreslo-barhat');
			var checkbox5 = thisitem.parents('.section-calc').find('.sl-kreslo-kozha');
			var checkbox6 = thisitem.parents('.section-calc').find('.sl-kreslo-viskoza');
			var checkbox7 = thisitem.parents('.section-calc').find('.sl-kreslo-hlopok');
			var checkbox8 = thisitem.parents('.section-calc').find('.sl-zamkadkreslo');
			var current_qty = Number(thisitem.parents('.section-calc').find('.colizdel').val());
			var zamkadkmitem = thisitem.parents('.section-calc').find('.zamkadkm');
			var zamkadkm = Number(thisitem.parents('.section-calc').find('.zamkadkm').val());
			var selectvalitem = thisitem.parents('.section-calc').find('.typebox1');
			var selectval = thisitem.parents('.section-calc').find('.typebox1').attr('data-current-val');
			var resultbox = thisitem.parents('.section-calc').find('.littleform_item_result span');
			
			
		if(Number(selectval) > 1) {
			var current_sum = Number(selectval);
			console.log(current_sum);
			
			if(current_qty < 1) { var current_qty = 1; } 
			var current_sum = Number(selectval) * current_qty;
			
			
		if($(checkbox1).is(':checked')) {
			var current_sum = current_sum + 500;
			console.log(current_sum);
		} 
		
		if($(checkbox2).is(':checked')) {
			var current_sum = current_sum + 1000;
			console.log(current_sum);
		} 
		
		if($(checkbox3).is(':checked')) {
			var current_sum = current_sum + ((Number(selectval) / 100) * 40);
			console.log(current_sum);
		} 
		
		if($(checkbox4).is(':checked')) {
			var current_sum = current_sum + ((Number(selectval) / 100) * 40);
			console.log(current_sum);
		} 
		
		if($(checkbox5).is(':checked')) {
			var current_sum = current_sum + ((Number(selectval) / 100) * 40);
			console.log(current_sum);
		} 
		
		
		if($(checkbox6).is(':checked')) {
			var current_sum = current_sum + ((Number(selectval) / 100) * 40);
			console.log(current_sum);
		} 
		
		if($(checkbox7).is(':checked')) {
			var current_sum = current_sum + ((Number(selectval) / 100) * 40);
			console.log(current_sum);
		} 
		
		if($(checkbox8).is(':checked')) {
			
			//zamkadkmitem.fadeIn(300);
			if(zamkadkm > 2) {
				var current_sum = current_sum + (zamkadkm * 25);
			} else {
				var current_sum = current_sum + (2 * 25);
			}
		} else {
			zamkadkmitem.val('');
			//zamkadkmitem.fadeOut(300);
		}
		
		if(current_sum > 2500) {
			resultbox.text(current_sum); 
		} else {
			resultbox.text(2500); 
		}
		
		}
			
		}
		
		if(calctype == 'shtor') {
			var checkbox1 = thisitem.parents('.section-calc').find('.sl-zapahshtor');
			var checkbox2 = thisitem.parents('.section-calc').find('.sl-pytnashtor');
			var checkbox3 = thisitem.parents('.section-calc').find('.sl-zamkadshtor');
			var current_size = thisitem.parents('.section-calc').find('.idsize').val();
			
			var zamkadkmitem = thisitem.parents('.section-calc').find('.zamkadkm');
			var zamkadkm = Number(thisitem.parents('.section-calc').find('.zamkadkm').val());
			var selectvalitem = thisitem.parents('.section-calc').find('.typebox1');
			var selectval = thisitem.parents('.section-calc').find('.typebox1').attr('data-current-val');
			var resultbox = thisitem.parents('.section-calc').find('.littleform_item_result span');
			
			if(Number(selectval) > 1) {
				var current_sum = Number(selectval);
				console.log(current_sum);
				
				if(current_size < 1) { var current_size = 1; } 
				var current_sum = Number(selectval) * Number(current_size);
				
				if($(checkbox1).is(':checked')) {
					var current_sum = current_sum + 500;
					console.log(current_sum);
				} 
				
				if($(checkbox2).is(':checked')) {
					var current_sum = current_sum + 1000;
					console.log(current_sum);
				} 
				
				
		if($(checkbox3).is(':checked')) {
			
			//zamkadkmitem.fadeIn(300);
			if(zamkadkm > 2) {
				var current_sum = current_sum + (zamkadkm * 25);
			} else {
				var current_sum = current_sum + (2 * 25);
			}
		} else {
			zamkadkmitem.val('');
			//zamkadkmitem.fadeOut(300);
		}
		
		if(current_sum > 2500) {
			resultbox.text(current_sum); 
		} else {
			resultbox.text(2500); 
		}
				
			}
		}
	
}

$(document).on('click', '.littleform_item_selector_item', function(){ 
	var item = $(this).text();
	var thisitem = $(this);
	var item_val = $(this).attr('data-value');
	var item_val2 = $(this).attr('data-value2');
	$(this).addClass('active'); 
	$(this).parents('.littleform_item_selector_wpap').find('.littleform_item_selector_item').not(this).removeClass('active'); 
	$(this).parents('.littleform_item_selector_wpap').find('.littleform_item_selector span').text(item);
	$(this).parents('.littleform_item_selector_wpap').find('.littleform_item_selector').attr('data-current-val', item_val);
	$(this).parents('.littleform_item_selector_wpap').find('.littleform_item_selector').attr('data-current-val2', item_val2);
	$(this).parents('.littleform_item_selector_wpap').find('.littleform_item_inp').val(item);
	$(this).parents('.littleform_item_selector_wpap').find('.littleform_item_selector').trigger('click');
	
	
	calc(thisitem);
	
});

$(".zamkadkm, .idsize, .colizdel").on("input", function() {
	var thisitem = $(this);
	calc(thisitem);
});

$(document).on('change', '.section-calc input[type="checkbox"], .section-calc input[type="radio"]', function(){ 
	var thisitem = $(this);
	calc(thisitem);
});


// Restricts input for each element in the set of matched elements to the given inputFilter.
(function($) {
  $.fn.inputFilter = function(callback, errMsg) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(e) {
      if (callback(this.value)) {
        // Accepted value
        if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
          $(this).removeClass("input-error");
          this.setCustomValidity("");
        }
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        // Rejected value - restore the previous one
        $(this).addClass("input-error");
        this.setCustomValidity(errMsg);
        this.reportValidity();
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        // Rejected value - nothing to restore
        this.value = "";
      }
    });
  };
}(jQuery));


// Install input filters.
$(".onlynum").inputFilter(function(value) {
  return /^-?\d*$/.test(value); }, "Только цифры");





});

