define("ext.wikia.adEngine.geo",[],function(){return function(t){var n={};function e(r){if(n[r])return n[r].exports;var o=n[r]={i:r,l:!1,exports:{}};return t[r].call(o.exports,o,o.exports,e),o.l=!0,o.exports}return e.m=t,e.c=n,e.d=function(t,n,r){e.o(t,n)||Object.defineProperty(t,n,{configurable:!1,enumerable:!0,get:r})},e.r=function(t){Object.defineProperty(t,"__esModule",{value:!0})},e.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(n,"a",n),n},e.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},e.p="",e(e.s=32)}([function(t,n,e){var r=e(26)("wks"),o=e(25),i=e(2).Symbol,u="function"==typeof i;(t.exports=function(t){return r[t]||(r[t]=u&&i[t]||(u?i:o)("Symbol."+t))}).store=r},function(t,n){var e=t.exports={version:"2.5.1"};"number"==typeof __e&&(__e=e)},function(t,n){var e=t.exports="undefined"!=typeof window&&window.Math==Math?window:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")();"number"==typeof __g&&(__g=e)},function(t,n){t.exports={}},function(t,n,e){var r=e(10),o=e(21);t.exports=e(5)?function(t,n,e){return r.f(t,n,o(1,e))}:function(t,n,e){return t[n]=e,t}},function(t,n,e){t.exports=!e(8)(function(){return 7!=Object.defineProperty({},"a",{get:function(){return 7}}).a})},function(t,n,e){var r=e(9);t.exports=function(t){if(!r(t))throw TypeError(t+" is not an object!");return t}},function(t,n){var e={}.hasOwnProperty;t.exports=function(t,n){return e.call(t,n)}},function(t,n){t.exports=function(t){try{return!!t()}catch(t){return!0}}},function(t,n){t.exports=function(t){return"object"==typeof t?null!==t:"function"==typeof t}},function(t,n,e){var r=e(6),o=e(52),i=e(51),u=Object.defineProperty;n.f=e(5)?Object.defineProperty:function(t,n,e){if(r(t),n=i(n,!0),r(e),o)try{return u(t,n,e)}catch(t){}if("get"in e||"set"in e)throw TypeError("Accessors not supported!");return"value"in e&&(t[n]=e.value),t}},function(t,n,e){var r=e(26)("keys"),o=e(25);t.exports=function(t){return r[t]||(r[t]=o(t))}},function(t,n){var e=Math.ceil,r=Math.floor;t.exports=function(t){return isNaN(t=+t)?0:(t>0?r:e)(t)}},function(t,n,e){var r=e(59),o=e(14);t.exports=function(t){return r(o(t))}},function(t,n){t.exports=function(t){if(void 0==t)throw TypeError("Can't call method on  "+t);return t}},function(t,n,e){"use strict";n.__esModule=!0;var r=i(e(50)),o=i(e(36));function i(t){return t&&t.__esModule?t:{default:t}}n.default=function(){return function(t,n){if(Array.isArray(t))return t;if((0,r.default)(Object(t)))return function(t,n){var e=[],r=!0,i=!1,u=void 0;try{for(var c,f=(0,o.default)(t);!(r=(c=f.next()).done)&&(e.push(c.value),!n||e.length!==n);r=!0);}catch(t){i=!0,u=t}finally{try{!r&&f.return&&f.return()}finally{if(i)throw u}}return e}(t,n);throw new TypeError("Invalid attempt to destructure non-iterable instance")}}()},function(t,n,e){var r=e(27),o=e(0)("toStringTag"),i="Arguments"==r(function(){return arguments}());t.exports=function(t){var n,e,u;return void 0===t?"Undefined":null===t?"Null":"string"==typeof(e=function(t,n){try{return t[n]}catch(t){}}(n=Object(t),o))?e:i?r(n):"Object"==(u=r(n))&&"function"==typeof n.callee?"Arguments":u}},function(t,n,e){"use strict";var r=e(38)(!0);e(19)(String,"String",function(t){this._t=String(t),this._i=0},function(){var t,n=this._t,e=this._i;return e>=n.length?{value:void 0,done:!0}:(t=r(n,e),this._i+=t.length,{value:t,done:!1})})},function(t,n,e){var r=e(10).f,o=e(7),i=e(0)("toStringTag");t.exports=function(t,n,e){t&&!o(t=e?t:t.prototype,i)&&r(t,i,{configurable:!0,value:n})}},function(t,n,e){"use strict";var r=e(45),o=e(23),i=e(44),u=e(4),c=e(7),f=e(3),a=e(43),s=e(18),l=e(39),p=e(0)("iterator"),d=!([].keys&&"next"in[].keys()),v=function(){return this};t.exports=function(t,n,e,y,h,g,x){a(e,n,y);var m,O,S,_=function(t){if(!d&&t in j)return j[t];switch(t){case"keys":case"values":return function(){return new e(this,t)}}return function(){return new e(this,t)}},b=n+" Iterator",w="values"==h,C=!1,j=t.prototype,M=j[p]||j["@@iterator"]||h&&j[h],P=M||_(h),L=h?w?_("entries"):P:void 0,T="Array"==n&&j.entries||M;if(T&&(S=l(T.call(new t)))!==Object.prototype&&S.next&&(s(S,b,!0),r||c(S,p)||u(S,p,v)),w&&M&&"values"!==M.name&&(C=!0,P=function(){return M.call(this)}),r&&!x||!d&&!C&&j[p]||u(j,p,P),f[n]=P,f[b]=v,h)if(m={values:w?P:_("values"),keys:g?P:_("keys"),entries:L},x)for(O in m)O in j||i(j,O,m[O]);else o(o.P+o.F*(d||C),n,m);return m}},function(t,n,e){e(48);for(var r=e(2),o=e(4),i=e(3),u=e(0)("toStringTag"),c="CSSRuleList,CSSStyleDeclaration,CSSValueList,ClientRectList,DOMRectList,DOMStringList,DOMTokenList,DataTransferItemList,FileList,HTMLAllCollection,HTMLCollection,HTMLFormElement,HTMLSelectElement,MediaList,MimeTypeArray,NamedNodeMap,NodeList,PaintRequestList,Plugin,PluginArray,SVGLengthList,SVGNumberList,SVGPathSegList,SVGPointList,SVGStringList,SVGTransformList,SourceBufferList,StyleSheetList,TextTrackCueList,TextTrackList,TouchList".split(","),f=0;f<c.length;f++){var a=c[f],s=r[a],l=s&&s.prototype;l&&!l[u]&&o(l,u,a),i[a]=i.Array}},function(t,n){t.exports=function(t,n){return{enumerable:!(1&t),configurable:!(2&t),writable:!(4&t),value:n}}},function(t,n,e){var r=e(9),o=e(2).document,i=r(o)&&r(o.createElement);t.exports=function(t){return i?o.createElement(t):{}}},function(t,n,e){var r=e(2),o=e(1),i=e(54),u=e(4),c=function(t,n,e){var f,a,s,l=t&c.F,p=t&c.G,d=t&c.S,v=t&c.P,y=t&c.B,h=t&c.W,g=p?o:o[n]||(o[n]={}),x=g.prototype,m=p?r:d?r[n]:(r[n]||{}).prototype;for(f in p&&(e=n),e)(a=!l&&m&&void 0!==m[f])&&f in g||(s=a?m[f]:e[f],g[f]=p&&"function"!=typeof m[f]?e[f]:y&&a?i(s,r):h&&m[f]==s?function(t){var n=function(n,e,r){if(this instanceof t){switch(arguments.length){case 0:return new t;case 1:return new t(n);case 2:return new t(n,e)}return new t(n,e,r)}return t.apply(this,arguments)};return n.prototype=t.prototype,n}(s):v&&"function"==typeof s?i(Function.call,s):s,v&&((g.virtual||(g.virtual={}))[f]=s,t&c.R&&x&&!x[f]&&u(x,f,s)))};c.F=1,c.G=2,c.S=4,c.P=8,c.B=16,c.W=32,c.U=64,c.R=128,t.exports=c},function(t,n){t.exports="constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf".split(",")},function(t,n){var e=0,r=Math.random();t.exports=function(t){return"Symbol(".concat(void 0===t?"":t,")_",(++e+r).toString(36))}},function(t,n,e){var r=e(2),o=r["__core-js_shared__"]||(r["__core-js_shared__"]={});t.exports=function(t){return o[t]||(o[t]={})}},function(t,n){var e={}.toString;t.exports=function(t){return e.call(t).slice(8,-1)}},function(t,n,e){var r=e(60),o=e(24);t.exports=Object.keys||function(t){return r(t,o)}},function(t,n,e){var r=e(14);t.exports=function(t){return Object(r(t))}},function(t,n,e){var r,o;
/*!
 * JavaScript Cookie v2.2.0
 * https://github.com/js-cookie/js-cookie
 *
 * Copyright 2006, 2015 Klaus Hartl & Fagner Brack
 * Released under the MIT license
 */!function(i){if(void 0===(o="function"==typeof(r=i)?r.call(n,e,n,t):r)||(t.exports=o),!0,t.exports=i(),!!0){var u=window.Cookies,c=window.Cookies=i();c.noConflict=function(){return window.Cookies=u,c}}}(function(){function t(){for(var t=0,n={};t<arguments.length;t++){var e=arguments[t];for(var r in e)n[r]=e[r]}return n}return function n(e){function r(n,o,i){var u;if("undefined"!=typeof document){if(arguments.length>1){if("number"==typeof(i=t({path:"/"},r.defaults,i)).expires){var c=new Date;c.setMilliseconds(c.getMilliseconds()+864e5*i.expires),i.expires=c}i.expires=i.expires?i.expires.toUTCString():"";try{u=JSON.stringify(o),/^[\{\[]/.test(u)&&(o=u)}catch(t){}o=e.write?e.write(o,n):encodeURIComponent(String(o)).replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g,decodeURIComponent),n=(n=(n=encodeURIComponent(String(n))).replace(/%(23|24|26|2B|5E|60|7C)/g,decodeURIComponent)).replace(/[\(\)]/g,escape);var f="";for(var a in i)i[a]&&(f+="; "+a,!0!==i[a]&&(f+="="+i[a]));return document.cookie=n+"="+o+f}n||(u={});for(var s=document.cookie?document.cookie.split("; "):[],l=/(%[0-9A-Z]{2})+/g,p=0;p<s.length;p++){var d=s[p].split("="),v=d.slice(1).join("=");this.json||'"'!==v.charAt(0)||(v=v.slice(1,-1));try{var y=d[0].replace(l,decodeURIComponent);if(v=e.read?e.read(v,y):e(v,y)||v.replace(l,decodeURIComponent),this.json)try{v=JSON.parse(v)}catch(t){}if(n===y){u=v;break}n||(u[y]=v)}catch(t){}}return u}}return r.set=r,r.get=function(t){return r.call(r,t)},r.getJSON=function(){return r.apply({json:!0},[].slice.call(arguments))},r.defaults={},r.remove=function(n,e){r(n,"",t(e,{expires:-1}))},r.withConverter=n,r}(function(){})})},function(t,n,e){t.exports={default:e(62),__esModule:!0}},function(t,n,e){"use strict";e.r(n);var r=e(31),o=e.n(r),i=e(15),u=e.n(i),c=e(30),f=e.n(c);var a={getRandom:function(){return Math.random()}};e.d(n,"setGeoData",function(){return O}),e.d(n,"getCountryCode",function(){return S}),e.d(n,"getContinentCode",function(){return _}),e.d(n,"getRegionCode",function(){return b}),e.d(n,"isProperCountry",function(){return w}),e.d(n,"isProperRegion",function(){return C}),e.d(n,"isProperContinent",function(){return j}),e.d(n,"resetSamplingCache",function(){return P}),e.d(n,"getSamplingResults",function(){return L}),e.d(n,"isProperGeo",function(){return T});var s="XX",l="non-",p=Math.pow(10,6),d="/",v=null,y={};function h(t){var n=t.split(d),e=u()(n,2)[1];return 0|Math.round(parseFloat(e)*p)}function g(t,n){var e=0|Math.round(a.getRandom()*(100*p)),r=t.some(function(t){return e<t});return n&&function(t,n,e){var r=u()(e,1)[0];y[t]={name:t,group:n?"B":"A",limit:(n?r:100*p-r)/p,result:n}}(n,r,t),r}function x(t,n,e){var r=t.filter(function(t){return function(n){return 0!==n.indexOf(l)&&n.indexOf(t+d)>-1}}(n));return 0!==r.length&&g(r.map(h),e)}function m(){if(null===v){var t=decodeURIComponent(f.a.get("Geo"));try{v=JSON.parse(t)||{}}catch(t){v={}}}return v}function O(t){v=t}function S(){return m().country}function _(){return m().continent}function b(){return m().region}function w(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],n=arguments[1];return!!(t&&t.indexOf&&(t.indexOf(S())>-1||x(t,S(),n)))}function C(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],n=arguments[1],e=S()+"-"+b();return!!(t&&t.indexOf&&(t.indexOf(e)>-1||x(t,e,n)))}function j(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],n=arguments[1];return!(!t||!t.indexOf||!function(t,n){return t.indexOf(s)>-1||x(t,s,n)}(t,n)&&!function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],n=arguments[1],e=s+"-"+_();return t.indexOf(e)>-1||x(t,e,n)}(t,n))}function M(t){var n=y[t];return n.name+"_"+n.group+"_"+n.limit}function P(){y={}}function L(){return o()(y).map(M)}function T(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:void 0;return void 0!==n&&void 0!==y[n]?y[n].result:!(!t||!t.indexOf||function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];return!!(t.indexOf(""+l+S())>-1||t.indexOf(""+l+S()+"-"+b())>-1||t.indexOf(""+l+s+"-"+_())>-1)}(t)||!(j(t,n)||w(t,n)||C(t,n)))}n.default={getContinentCode:_,getCountryCode:S,getRegionCode:b,getSamplingResults:L,isProperGeo:T,resetSamplingCache:P}},function(t,n,e){var r=e(16),o=e(0)("iterator"),i=e(3);t.exports=e(1).getIteratorMethod=function(t){if(void 0!=t)return t[o]||t["@@iterator"]||i[r(t)]}},function(t,n,e){var r=e(6),o=e(33);t.exports=e(1).getIterator=function(t){var n=o(t);if("function"!=typeof n)throw TypeError(t+" is not iterable!");return r(n.call(t))}},function(t,n,e){e(20),e(17),t.exports=e(34)},function(t,n,e){t.exports={default:e(35),__esModule:!0}},function(t,n,e){var r=e(16),o=e(0)("iterator"),i=e(3);t.exports=e(1).isIterable=function(t){var n=Object(t);return void 0!==n[o]||"@@iterator"in n||i.hasOwnProperty(r(n))}},function(t,n,e){var r=e(12),o=e(14);t.exports=function(t){return function(n,e){var i,u,c=String(o(n)),f=r(e),a=c.length;return f<0||f>=a?t?"":void 0:(i=c.charCodeAt(f))<55296||i>56319||f+1===a||(u=c.charCodeAt(f+1))<56320||u>57343?t?c.charAt(f):i:t?c.slice(f,f+2):u-56320+(i-55296<<10)+65536}}},function(t,n,e){var r=e(7),o=e(29),i=e(11)("IE_PROTO"),u=Object.prototype;t.exports=Object.getPrototypeOf||function(t){return t=o(t),r(t,i)?t[i]:"function"==typeof t.constructor&&t instanceof t.constructor?t.constructor.prototype:t instanceof Object?u:null}},function(t,n,e){var r=e(2).document;t.exports=r&&r.documentElement},function(t,n,e){var r=e(10),o=e(6),i=e(28);t.exports=e(5)?Object.defineProperties:function(t,n){o(t);for(var e,u=i(n),c=u.length,f=0;c>f;)r.f(t,e=u[f++],n[e]);return t}},function(t,n,e){var r=e(6),o=e(41),i=e(24),u=e(11)("IE_PROTO"),c=function(){},f=function(){var t,n=e(22)("iframe"),r=i.length;for(n.style.display="none",e(40).appendChild(n),n.src="javascript:",(t=n.contentWindow.document).open(),t.write("<script>document.F=Object<\/script>"),t.close(),f=t.F;r--;)delete f.prototype[i[r]];return f()};t.exports=Object.create||function(t,n){var e;return null!==t?(c.prototype=r(t),e=new c,c.prototype=null,e[u]=t):e=f(),void 0===n?e:o(e,n)}},function(t,n,e){"use strict";var r=e(42),o=e(21),i=e(18),u={};e(4)(u,e(0)("iterator"),function(){return this}),t.exports=function(t,n,e){t.prototype=r(u,{next:o(1,e)}),i(t,n+" Iterator")}},function(t,n,e){t.exports=e(4)},function(t,n){t.exports=!0},function(t,n){t.exports=function(t,n){return{value:n,done:!!t}}},function(t,n){t.exports=function(){}},function(t,n,e){"use strict";var r=e(47),o=e(46),i=e(3),u=e(13);t.exports=e(19)(Array,"Array",function(t,n){this._t=u(t),this._i=0,this._k=n},function(){var t=this._t,n=this._k,e=this._i++;return!t||e>=t.length?(this._t=void 0,o(1)):o(0,"keys"==n?e:"values"==n?t[e]:[e,t[e]])},"values"),i.Arguments=i.Array,r("keys"),r("values"),r("entries")},function(t,n,e){e(20),e(17),t.exports=e(37)},function(t,n,e){t.exports={default:e(49),__esModule:!0}},function(t,n,e){var r=e(9);t.exports=function(t,n){if(!r(t))return t;var e,o;if(n&&"function"==typeof(e=t.toString)&&!r(o=e.call(t)))return o;if("function"==typeof(e=t.valueOf)&&!r(o=e.call(t)))return o;if(!n&&"function"==typeof(e=t.toString)&&!r(o=e.call(t)))return o;throw TypeError("Can't convert object to primitive value")}},function(t,n,e){t.exports=!e(5)&&!e(8)(function(){return 7!=Object.defineProperty(e(22)("div"),"a",{get:function(){return 7}}).a})},function(t,n){t.exports=function(t){if("function"!=typeof t)throw TypeError(t+" is not a function!");return t}},function(t,n,e){var r=e(53);t.exports=function(t,n,e){if(r(t),void 0===n)return t;switch(e){case 1:return function(e){return t.call(n,e)};case 2:return function(e,r){return t.call(n,e,r)};case 3:return function(e,r,o){return t.call(n,e,r,o)}}return function(){return t.apply(n,arguments)}}},function(t,n,e){var r=e(23),o=e(1),i=e(8);t.exports=function(t,n){var e=(o.Object||{})[t]||Object[t],u={};u[t]=n(e),r(r.S+r.F*i(function(){e(1)}),"Object",u)}},function(t,n,e){var r=e(12),o=Math.max,i=Math.min;t.exports=function(t,n){return(t=r(t))<0?o(t+n,0):i(t,n)}},function(t,n,e){var r=e(12),o=Math.min;t.exports=function(t){return t>0?o(r(t),9007199254740991):0}},function(t,n,e){var r=e(13),o=e(57),i=e(56);t.exports=function(t){return function(n,e,u){var c,f=r(n),a=o(f.length),s=i(u,a);if(t&&e!=e){for(;a>s;)if((c=f[s++])!=c)return!0}else for(;a>s;s++)if((t||s in f)&&f[s]===e)return t||s||0;return!t&&-1}}},function(t,n,e){var r=e(27);t.exports=Object("z").propertyIsEnumerable(0)?Object:function(t){return"String"==r(t)?t.split(""):Object(t)}},function(t,n,e){var r=e(7),o=e(13),i=e(58)(!1),u=e(11)("IE_PROTO");t.exports=function(t,n){var e,c=o(t),f=0,a=[];for(e in c)e!=u&&r(c,e)&&a.push(e);for(;n.length>f;)r(c,e=n[f++])&&(~i(a,e)||a.push(e));return a}},function(t,n,e){var r=e(29),o=e(28);e(55)("keys",function(){return function(t){return o(r(t))}})},function(t,n,e){e(61),t.exports=e(1).Object.keys}])});