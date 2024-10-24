(function($) {
	var __, sprintf;

	if (!window['wordfenceExt']) {
		window['wordfenceExt'] = {
			nonce: false,
			loadingCount: 0,
			isSmallScreen: false,
			init: function(){
				this.nonce = WordfenceAdminVars.firstNonce;
				this.isSmallScreen = window.matchMedia("only screen and (max-width: 500px)").matches;
			},
			showLoading: function(){
				this.loadingCount++;
				if (this.loadingCount == 1) {
					jQuery('<div id="wordfenceWorking">' + __('Wordfence is working...') + '</div>').appendTo('body');
				}
			},
			removeLoading: function(){
				this.loadingCount--;
				if(this.loadingCount == 0){
					jQuery('#wordfenceWorking').remove();
				}
			},
			autoUpdateChoice: function(choice){
				this.ajax('wordfence_autoUpdateChoice', {
						choice: choice
					},
					function(res){ jQuery('#wordfenceAutoUpdateChoice').fadeOut(); },
					function(){ jQuery('#wordfenceAutoUpdateChoice').fadeOut(); }
				);
			},
			misconfiguredHowGetIPsChoice : function(choice) {
				this.ajax('wordfence_misconfiguredHowGetIPsChoice', {
						choice: choice
					},
					function(res){ jQuery('#wordfenceMisconfiguredHowGetIPsNotice').fadeOut(); },
					function(){ jQuery('#wordfenceMisconfiguredHowGetIPsNotice').fadeOut(); }
				);
			},
			centralUrlMismatchChoice : function(choice) {
				var payload = {};
				switch (choice) {
					case 'local':
						payload['local'] = true;
						break;
					case 'global':
						payload['force'] = true;
						break;
					case 'dismiss':
						payload['dismiss'] = true;
				}
				this.ajax('wordfence_wfcentral_disconnect', payload,
					function(res) { jQuery('#wordfenceMismatchedCentralUrlNotice').fadeOut(); },
					function() { jQuery('#wordfenceMismatchedCentralUrlNotice').fadeOut(); }
				);
			},
			switchLiveTrafficSecurityOnlyChoice: function(choice) {
				this.ajax('wordfence_switchLiveTrafficSecurityOnlyChoice', {
						choice: choice
					},
					function(res){ jQuery('#switchLiveTrafficSecurityOnlyChoice').fadeOut(); },
					function(){ jQuery('#switchLiveTrafficSecurityOnlyChoice').fadeOut(); }
				);
			},
			dismissAdminNotice: function(nid) {
				this.ajax('wordfence_dismissAdminNotice', {
						id: nid
					},
					function(res){ jQuery('.wf-admin-notice[data-notice-id="' + nid + '"]').fadeOut(); },
					function(){ jQuery('.wf-admin-notice[data-notice-id="' + nid + '"]').fadeOut(); }
				);
			},
			hideNoticeForUser: function(id) {
				this.ajax('wordfence_hideNoticeForUser',
					{
						id: id
					},
					function(res) {
						$("#" + id).fadeOut();
					},
					function() {
					}
				);
			},
			setOption: function(key, value, successCallback, errorCallback) {
				var changes = {};
				changes[key] = value;
				if (typeof errorCallback !== 'function')
					errorCallback = function() {};
				this.ajax('wordfence_saveOptions', {changes: JSON.stringify(changes)}, function(res) {
					if (res.success) {
						typeof successCallback == 'function' && successCallback(res);
					}
					else {
						errorCallback(res);
					}
				}, errorCallback);
			},
			ajax: function(action, data, cb, cbErr, noLoading){
				if(typeof(data) == 'string'){
					if(data.length > 0){
						data += '&';
					}
					data += 'action=' + action + '&nonce=' + this.nonce;
				} else if(typeof(data) == 'object'){
					data['action'] = action;
					data['nonce'] = this.nonce;
				}
				if(! cbErr){
					cbErr = function(){};
				}
				var self = this;
				if(! noLoading){
					this.showLoading();
				}
				jQuery.ajax({
					type: 'POST',
					url: WordfenceAdminVars.ajaxURL,
					dataType: "json",
					data: data,
					success: function(json){
						if(! noLoading){
							self.removeLoading();
						}
						if(json && json.nonce){
							self.nonce = json.nonce;
						}
						cb(json);
					},
					error: function(response){
						if(! noLoading){
							self.removeLoading();
						}
						cbErr(response);
					}
				});
			},
			hashSHA256: function(s) {
				return sjcl.codec.hex.fromBits(sjcl.hash.sha256.hash(s))
			},
			isEmailBlacklisted: function(email) {
				var hash = this.hashSHA256(email);
				for (var i = 0; i < WordfenceAdminVars.alertEmailBlacklist.length; i++) {
					if (hash === WordfenceAdminVars.alertEmailBlacklist[i]) {
						return true;
					}
				}
				return false;
			},
			parseEmails: function(raw) {
				var emails = [];
				if (typeof raw !== 'string') {
					return emails;
				}

				var rawEmails = raw.replace(/\s/g, '').split(',');
				for (var i = 0; i < rawEmails.length; i++) {
					var e = rawEmails[i].toLowerCase();
					//From https://html.spec.whatwg.org/multipage/forms.html#valid-e-mail-address
					if (/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(rawEmails[i]) && !this.isEmailBlacklisted(e)) {
						emails.push(e);
					}
				}
				return emails;
			},
			onboardingProcessEmails: function(emails, subscribe, touppAgreed, callback) {
				var subscribe = !!subscribe;
				var pendingCount = 1 + (touppAgreed ? 1 : 0) + (subscribe ? 1 : 0);
				var failed = false;
				var called = false;
				function complete(response) {
					if (called)
						return;
					if (--pendingCount === 0 || failed) {
						called = true;
						var error = null;
						if (response && typeof response.error == 'string')
							error = response.error;
						callback(!failed, error);
					}
				}
				function onError() {
					failed = true;
					complete();
				}
				wordfenceExt.setOption('alertEmails', emails.join(', '), complete, onError);
				
				if (touppAgreed) {
					this.ajax('wordfence_recordTOUPP', {}, complete, onError);
				}

				if (subscribe) {
					this.ajax('wordfence_mailingSignup', {emails: JSON.stringify(emails)}, complete, onError);
				}
			},
			onboardingInstallLicense: function(license, successCallback, errorCallback) {
				var self = this;
				function performRequest(statusChange, onSuccess, onError) {
					self.ajax(
						'wordfence_installLicense',
						{
							license: license,
							status_change: statusChange
						},
						onSuccess,
						onError
					);
				}
				performRequest(
					false,
					function (res) {
						if (res.success) {
							performRequest(
								true,
								function () {
									typeof successCallback == 'function' && successCallback(res);
								},
								function () {
									errorCallback();
								}
							);
						}
						else {
							typeof errorCallback == 'function' && errorCallback((typeof res.error === 'string') ? res.error : null);
						}
					},
					function () {
						errorCallback();
					}
				);
			}
		};
	}

	__ = window.wfi18n.__;
	sprintf = window.wfi18n.sprintf;

	$(function() {
		wordfenceExt.init();
	});
})(jQuery);

//Stanford Javascript Crypto Library: https://bitwiseshiftleft.github.io/sjcl/
"use strict";var sjcl={cipher:{},hash:{},keyexchange:{},mode:{},misc:{},codec:{},exception:{corrupt:function(f){this.toString=function(){return"CORRUPT: "+this.message};this.message=f},invalid:function(f){this.toString=function(){return"INVALID: "+this.message};this.message=f},bug:function(f){this.toString=function(){return"BUG: "+this.message};this.message=f},notReady:function(f){this.toString=function(){return"NOT READY: "+this.message};this.message=f}}};
(function(f){f.cipher.aes=function(a){this.s[0][0][0]||this.T();var b,c,d,e,g=this.s[0][4],h=this.s[1];b=a.length;var k=1;if(4!==b&&6!==b&&8!==b)throw new f.exception.invalid("invalid aes key size");this.b=[d=a.slice(0),e=[]];for(a=b;a<4*b+28;a++){c=d[a-1];if(0===a%b||8===b&&4===a%b)c=g[c>>>24]<<24^g[c>>16&255]<<16^g[c>>8&255]<<8^g[c&255],0===a%b&&(c=c<<8^c>>>24^k<<24,k=k<<1^283*(k>>7));d[a]=d[a-b]^c}for(b=0;a;b++,a--)c=d[b&3?a:a-4],e[b]=4>=a||4>b?c:h[0][g[c>>>24]]^h[1][g[c>>16&255]]^h[2][g[c>>8&
255]]^h[3][g[c&255]]};f.cipher.aes.prototype={encrypt:function(a){return this.$(a,0)},decrypt:function(a){return this.$(a,1)},s:[[[],[],[],[],[]],[[],[],[],[],[]]],T:function(){var a=this.s[0],b=this.s[1],c=a[4],d=b[4],e,f,h,k=[],l=[],m,n,p,q;for(e=0;0x100>e;e++)l[(k[e]=e<<1^283*(e>>7))^e]=e;for(f=h=0;!c[f];f^=m||1,h=l[h]||1)for(p=h^h<<1^h<<2^h<<3^h<<4,p=p>>8^p&255^99,c[f]=p,d[p]=f,n=k[e=k[m=k[f]]],q=0x1010101*n^0x10001*e^0x101*m^0x1010100*f,n=0x101*k[p]^0x1010100*p,e=0;4>e;e++)a[e][f]=n=n<<24^n>>>8,b[e][p]=
		q=q<<24^q>>>8;for(e=0;5>e;e++)a[e]=a[e].slice(0),b[e]=b[e].slice(0)},$:function(a,b){if(4!==a.length)throw new f.exception.invalid("invalid aes block size");var c=this.b[b],d=a[0]^c[0],e=a[b?3:1]^c[1],g=a[2]^c[2],h=a[b?1:3]^c[3],k,l,m,n=c.length/4-2,p,q=4,t=[0,0,0,0];k=this.s[b];var r=k[0],u=k[1],v=k[2],w=k[3],x=k[4];for(p=0;p<n;p++)k=r[d>>>24]^u[e>>16&255]^v[g>>8&255]^w[h&255]^c[q],l=r[e>>>24]^u[g>>16&255]^v[h>>8&255]^w[d&255]^c[q+1],m=r[g>>>24]^u[h>>16&255]^v[d>>8&255]^w[e&255]^c[q+2],h=r[h>>>24]^
		u[d>>16&255]^v[e>>8&255]^w[g&255]^c[q+3],q+=4,d=k,e=l,g=m;for(p=0;4>p;p++)t[b?3&-p:p]=x[d>>>24]<<24^x[e>>16&255]<<16^x[g>>8&255]<<8^x[h&255]^c[q++],k=d,d=e,e=g,g=h,h=k;return t}};f.bitArray={bitSlice:function(a,b,c){a=f.bitArray.ga(a.slice(b/32),32-(b&31)).slice(1);return void 0===c?a:f.bitArray.clamp(a,c-b)},extract:function(a,b,c){var d=Math.floor(-b-c&31);return((b+c-1^b)&-32?a[b/32|0]<<32-d^a[b/32+1|0]>>>d:a[b/32|0]>>>d)&(1<<c)-1},concat:function(a,b){if(0===a.length||0===b.length)return a.concat(b);
		var c=a[a.length-1],d=f.bitArray.getPartial(c);return 32===d?a.concat(b):f.bitArray.ga(b,d,c|0,a.slice(0,a.length-1))},bitLength:function(a){var b=a.length;return 0===b?0:32*(b-1)+f.bitArray.getPartial(a[b-1])},clamp:function(a,b){if(32*a.length<b)return a;a=a.slice(0,Math.ceil(b/32));var c=a.length;b=b&31;0<c&&b&&(a[c-1]=f.bitArray.partial(b,a[c-1]&2147483648>>b-1,1));return a},partial:function(a,b,c){return 32===a?b:(c?b|0:b<<32-a)+0x10000000000*a},getPartial:function(a){return Math.round(a/0x10000000000)||
		32},equal:function(a,b){if(f.bitArray.bitLength(a)!==f.bitArray.bitLength(b))return!1;var c=0,d;for(d=0;d<a.length;d++)c|=a[d]^b[d];return 0===c},ga:function(a,b,c,d){var e;e=0;for(void 0===d&&(d=[]);32<=b;b-=32)d.push(c),c=0;if(0===b)return d.concat(a);for(e=0;e<a.length;e++)d.push(c|a[e]>>>b),c=a[e]<<32-b;e=a.length?a[a.length-1]:0;a=f.bitArray.getPartial(e);d.push(f.bitArray.partial(b+a&31,32<b+a?c:d.pop(),1));return d},i:function(a,b){return[a[0]^b[0],a[1]^b[1],a[2]^b[2],a[3]^b[3]]},byteswapM:function(a){var b,
		c;for(b=0;b<a.length;++b)c=a[b],a[b]=c>>>24|c>>>8&0xff00|(c&0xff00)<<8|c<<24;return a}};f.codec.utf8String={fromBits:function(a){var b="",c=f.bitArray.bitLength(a),d,e;for(d=0;d<c/8;d++)0===(d&3)&&(e=a[d/4]),b+=String.fromCharCode(e>>>8>>>8>>>8),e<<=8;return decodeURIComponent(escape(b))},toBits:function(a){a=unescape(encodeURIComponent(a));var b=[],c,d=0;for(c=0;c<a.length;c++)d=d<<8|a.charCodeAt(c),3===(c&3)&&(b.push(d),d=0);c&3&&b.push(f.bitArray.partial(8*(c&3),d));return b}};f.codec.hex={fromBits:function(a){var b=
		"",c;for(c=0;c<a.length;c++)b+=((a[c]|0)+0xf00000000000).toString(16).substr(4);return b.substr(0,f.bitArray.bitLength(a)/4)},toBits:function(a){var b,c=[],d;a=a.replace(/\s|0x/g,"");d=a.length;a=a+"00000000";for(b=0;b<a.length;b+=8)c.push(parseInt(a.substr(b,8),16)^0);return f.bitArray.clamp(c,4*d)}};f.codec.base32={D:"ABCDEFGHIJKLMNOPQRSTUVWXYZ234567",da:"0123456789ABCDEFGHIJKLMNOPQRSTUV",BITS:32,BASE:5,REMAINING:27,fromBits:function(a,b,c){var d=f.codec.base32.BASE,e=f.codec.base32.REMAINING,g=
		"",h=0,k=f.codec.base32.D,l=0,m=f.bitArray.bitLength(a);c&&(k=f.codec.base32.da);for(c=0;g.length*d<m;)g+=k.charAt((l^a[c]>>>h)>>>e),h<d?(l=a[c]<<d-h,h+=e,c++):(l<<=d,h-=d);for(;g.length&7&&!b;)g+="=";return g},toBits:function(a,b){a=a.replace(/\s|=/g,"").toUpperCase();var c=f.codec.base32.BITS,d=f.codec.base32.BASE,e=f.codec.base32.REMAINING,g=[],h,k=0,l=f.codec.base32.D,m=0,n,p="base32";b&&(l=f.codec.base32.da,p="base32hex");for(h=0;h<a.length;h++){n=l.indexOf(a.charAt(h));if(0>n){if(!b)try{return f.codec.base32hex.toBits(a)}catch(q){}throw new f.exception.invalid("this isn't "+
		p+"!");}k>e?(k-=e,g.push(m^n>>>k),m=n<<c-k):(k+=d,m^=n<<c-k)}k&56&&g.push(f.bitArray.partial(k&56,m,1));return g}};f.codec.base32hex={fromBits:function(a,b){return f.codec.base32.fromBits(a,b,1)},toBits:function(a){return f.codec.base32.toBits(a,1)}};f.codec.base64={D:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",fromBits:function(a,b,c){var d="",e=0,g=f.codec.base64.D,h=0,k=f.bitArray.bitLength(a);c&&(g=g.substr(0,62)+"-_");for(c=0;6*d.length<k;)d+=g.charAt((h^a[c]>>>e)>>>26),
		6>e?(h=a[c]<<6-e,e+=26,c++):(h<<=6,e-=6);for(;d.length&3&&!b;)d+="=";return d},toBits:function(a,b){a=a.replace(/\s|=/g,"");var c=[],d,e=0,g=f.codec.base64.D,h=0,k;b&&(g=g.substr(0,62)+"-_");for(d=0;d<a.length;d++){k=g.indexOf(a.charAt(d));if(0>k)throw new f.exception.invalid("this isn't base64!");26<e?(e-=26,c.push(h^k>>>e),h=k<<32-e):(e+=6,h^=k<<32-e)}e&56&&c.push(f.bitArray.partial(e&56,h,1));return c}};f.codec.base64url={fromBits:function(a){return f.codec.base64.fromBits(a,1,1)},toBits:function(a){return f.codec.base64.toBits(a,
		1)}};f.hash.sha256=function(a){this.b[0]||this.T();a?(this.H=a.H.slice(0),this.C=a.C.slice(0),this.l=a.l):this.reset()};f.hash.sha256.hash=function(a){return(new f.hash.sha256).update(a).finalize()};f.hash.sha256.prototype={blockSize:512,reset:function(){this.H=this.ea.slice(0);this.C=[];this.l=0;return this},update:function(a){"string"===typeof a&&(a=f.codec.utf8String.toBits(a));var b,c=this.C=f.bitArray.concat(this.C,a);b=this.l;a=this.l=b+f.bitArray.bitLength(a);if(0x1fffffffffffff<a)throw new f.exception.invalid("Cannot hash more than 2^53 - 1 bits");
		if("undefined"!==typeof Uint32Array){var d=new Uint32Array(c),e=0;for(b=512+b-(512+b&0x1ff);b<=a;b+=512)this.M(d.subarray(16*e,16*(e+1))),e+=1;c.splice(0,16*e)}else for(b=512+b-(512+b&0x1ff);b<=a;b+=512)this.M(c.splice(0,16));return this},finalize:function(){var a,b=this.C,c=this.H,b=f.bitArray.concat(b,[f.bitArray.partial(1,1)]);for(a=b.length+2;a&15;a++)b.push(0);b.push(Math.floor(this.l/0x100000000));for(b.push(this.l|0);b.length;)this.M(b.splice(0,16));this.reset();return c},ea:[],b:[],T:function(){function a(a){return 0x100000000*
		(a-Math.floor(a))|0}for(var b=0,c=2,d,e;64>b;c++){e=!0;for(d=2;d*d<=c;d++)if(0===c%d){e=!1;break}e&&(8>b&&(this.ea[b]=a(Math.pow(c,.5))),this.b[b]=a(Math.pow(c,1/3)),b++)}},M:function(a){var b,c,d,e=this.H,f=this.b,h=e[0],k=e[1],l=e[2],m=e[3],n=e[4],p=e[5],q=e[6],t=e[7];for(b=0;64>b;b++)16>b?c=a[b]:(c=a[b+1&15],d=a[b+14&15],c=a[b&15]=(c>>>7^c>>>18^c>>>3^c<<25^c<<14)+(d>>>17^d>>>19^d>>>10^d<<15^d<<13)+a[b&15]+a[b+9&15]|0),c=c+t+(n>>>6^n>>>11^n>>>25^n<<26^n<<21^n<<7)+(q^n&(p^q))+f[b],t=q,q=p,p=n,n=
		m+c|0,m=l,l=k,k=h,h=c+(k&l^m&(k^l))+(k>>>2^k>>>13^k>>>22^k<<30^k<<19^k<<10)|0;e[0]=e[0]+h|0;e[1]=e[1]+k|0;e[2]=e[2]+l|0;e[3]=e[3]+m|0;e[4]=e[4]+n|0;e[5]=e[5]+p|0;e[6]=e[6]+q|0;e[7]=e[7]+t|0}};f.mode.ccm={name:"ccm",I:[],listenProgress:function(a){f.mode.ccm.I.push(a)},unListenProgress:function(a){a=f.mode.ccm.I.indexOf(a);-1<a&&f.mode.ccm.I.splice(a,1)},ma:function(a){var b=f.mode.ccm.I.slice(),c;for(c=0;c<b.length;c+=1)b[c](a)},encrypt:function(a,b,c,d,e){var g,h=b.slice(0),k=f.bitArray,l=k.bitLength(c)/
		8,m=k.bitLength(h)/8;e=e||64;d=d||[];if(7>l)throw new f.exception.invalid("ccm: iv must be at least 7 bytes");for(g=2;4>g&&m>>>8*g;g++);g<15-l&&(g=15-l);c=k.clamp(c,8*(15-g));b=f.mode.ccm.Z(a,b,c,d,e,g);h=f.mode.ccm.F(a,h,c,b,e,g);return k.concat(h.data,h.tag)},decrypt:function(a,b,c,d,e){e=e||64;d=d||[];var g=f.bitArray,h=g.bitLength(c)/8,k=g.bitLength(b),l=g.clamp(b,k-e),m=g.bitSlice(b,k-e),k=(k-e)/8;if(7>h)throw new f.exception.invalid("ccm: iv must be at least 7 bytes");for(b=2;4>b&&k>>>8*b;b++);
		b<15-h&&(b=15-h);c=g.clamp(c,8*(15-b));l=f.mode.ccm.F(a,l,c,m,e,b);a=f.mode.ccm.Z(a,l.data,c,d,e,b);if(!g.equal(l.tag,a))throw new f.exception.corrupt("ccm: tag doesn't match");return l.data},ua:function(a,b,c,d,e,g){var h=[],k=f.bitArray,l=k.i;d=[k.partial(8,(b.length?64:0)|d-2<<2|g-1)];d=k.concat(d,c);d[3]|=e;d=a.encrypt(d);if(b.length)for(c=k.bitLength(b)/8,65279>=c?h=[k.partial(16,c)]:0xffffffff>=c&&(h=k.concat([k.partial(16,65534)],[c])),h=k.concat(h,b),b=0;b<h.length;b+=4)d=a.encrypt(l(d,h.slice(b,
		b+4).concat([0,0,0])));return d},Z:function(a,b,c,d,e,g){var h=f.bitArray,k=h.i;e/=8;if(e%2||4>e||16<e)throw new f.exception.invalid("ccm: invalid tag length");if(0xffffffff<d.length||0xffffffff<b.length)throw new f.exception.bug("ccm: can't deal with 4GiB or more data");c=f.mode.ccm.ua(a,d,c,e,h.bitLength(b)/8,g);for(d=0;d<b.length;d+=4)c=a.encrypt(k(c,b.slice(d,d+4).concat([0,0,0])));return h.clamp(c,8*e)},F:function(a,b,c,d,e,g){var h,k=f.bitArray;h=k.i;var l=b.length,m=k.bitLength(b),n=l/50,p=
		n;c=k.concat([k.partial(8,g-1)],c).concat([0,0,0]).slice(0,4);d=k.bitSlice(h(d,a.encrypt(c)),0,e);if(!l)return{tag:d,data:[]};for(h=0;h<l;h+=4)h>n&&(f.mode.ccm.ma(h/l),n+=p),c[3]++,e=a.encrypt(c),b[h]^=e[0],b[h+1]^=e[1],b[h+2]^=e[2],b[h+3]^=e[3];return{tag:d,data:k.clamp(b,m)}}};f.mode.ocb2={name:"ocb2",encrypt:function(a,b,c,d,e,g){if(128!==f.bitArray.bitLength(c))throw new f.exception.invalid("ocb iv must be 128 bits");var h,k=f.mode.ocb2.W,l=f.bitArray,m=l.i,n=[0,0,0,0];c=k(a.encrypt(c));var p,
		q=[];d=d||[];e=e||64;for(h=0;h+4<b.length;h+=4)p=b.slice(h,h+4),n=m(n,p),q=q.concat(m(c,a.encrypt(m(c,p)))),c=k(c);p=b.slice(h);b=l.bitLength(p);h=a.encrypt(m(c,[0,0,0,b]));p=l.clamp(m(p.concat([0,0,0]),h),b);n=m(n,m(p.concat([0,0,0]),h));n=a.encrypt(m(n,m(c,k(c))));d.length&&(n=m(n,g?d:f.mode.ocb2.pmac(a,d)));return q.concat(l.concat(p,l.clamp(n,e)))},decrypt:function(a,b,c,d,e,g){if(128!==f.bitArray.bitLength(c))throw new f.exception.invalid("ocb iv must be 128 bits");e=e||64;var h=f.mode.ocb2.W,
		k=f.bitArray,l=k.i,m=[0,0,0,0],n=h(a.encrypt(c)),p,q,t=f.bitArray.bitLength(b)-e,r=[];d=d||[];for(c=0;c+4<t/32;c+=4)p=l(n,a.decrypt(l(n,b.slice(c,c+4)))),m=l(m,p),r=r.concat(p),n=h(n);q=t-32*c;p=a.encrypt(l(n,[0,0,0,q]));p=l(p,k.clamp(b.slice(c),q).concat([0,0,0]));m=l(m,p);m=a.encrypt(l(m,l(n,h(n))));d.length&&(m=l(m,g?d:f.mode.ocb2.pmac(a,d)));if(!k.equal(k.clamp(m,e),k.bitSlice(b,t)))throw new f.exception.corrupt("ocb: tag doesn't match");return r.concat(k.clamp(p,q))},pmac:function(a,b){var c,
		d=f.mode.ocb2.W,e=f.bitArray,g=e.i,h=[0,0,0,0],k=a.encrypt([0,0,0,0]),k=g(k,d(d(k)));for(c=0;c+4<b.length;c+=4)k=d(k),h=g(h,a.encrypt(g(k,b.slice(c,c+4))));c=b.slice(c);128>e.bitLength(c)&&(k=g(k,d(k)),c=e.concat(c,[-2147483648,0,0,0]));h=g(h,c);return a.encrypt(g(d(g(k,d(k))),h))},W:function(a){return[a[0]<<1^a[1]>>>31,a[1]<<1^a[2]>>>31,a[2]<<1^a[3]>>>31,a[3]<<1^135*(a[0]>>>31)]}};f.mode.gcm={name:"gcm",encrypt:function(a,b,c,d,e){var g=b.slice(0);b=f.bitArray;d=d||[];a=f.mode.gcm.F(!0,a,g,d,c,e||
		128);return b.concat(a.data,a.tag)},decrypt:function(a,b,c,d,e){var g=b.slice(0),h=f.bitArray,k=h.bitLength(g);e=e||128;d=d||[];e<=k?(b=h.bitSlice(g,k-e),g=h.bitSlice(g,0,k-e)):(b=g,g=[]);a=f.mode.gcm.F(!1,a,g,d,c,e);if(!h.equal(a.tag,b))throw new f.exception.corrupt("gcm: tag doesn't match");return a.data},ra:function(a,b){var c,d,e,g,h,k=f.bitArray.i;e=[0,0,0,0];g=b.slice(0);for(c=0;128>c;c++){(d=0!==(a[Math.floor(c/32)]&1<<31-c%32))&&(e=k(e,g));h=0!==(g[3]&1);for(d=3;0<d;d--)g[d]=g[d]>>>1|(g[d-
	1]&1)<<31;g[0]>>>=1;h&&(g[0]^=-0x1f000000)}return e},j:function(a,b,c){var d,e=c.length;b=b.slice(0);for(d=0;d<e;d+=4)b[0]^=0xffffffff&c[d],b[1]^=0xffffffff&c[d+1],b[2]^=0xffffffff&c[d+2],b[3]^=0xffffffff&c[d+3],b=f.mode.gcm.ra(b,a);return b},F:function(a,b,c,d,e,g){var h,k,l,m,n,p,q,t,r=f.bitArray;p=c.length;q=r.bitLength(c);t=r.bitLength(d);k=r.bitLength(e);h=b.encrypt([0,0,0,0]);96===k?(e=e.slice(0),e=r.concat(e,[1])):(e=f.mode.gcm.j(h,[0,0,0,0],e),e=f.mode.gcm.j(h,e,[0,0,Math.floor(k/0x100000000),
		k&0xffffffff]));k=f.mode.gcm.j(h,[0,0,0,0],d);n=e.slice(0);d=k.slice(0);a||(d=f.mode.gcm.j(h,k,c));for(m=0;m<p;m+=4)n[3]++,l=b.encrypt(n),c[m]^=l[0],c[m+1]^=l[1],c[m+2]^=l[2],c[m+3]^=l[3];c=r.clamp(c,q);a&&(d=f.mode.gcm.j(h,k,c));a=[Math.floor(t/0x100000000),t&0xffffffff,Math.floor(q/0x100000000),q&0xffffffff];d=f.mode.gcm.j(h,d,a);l=b.encrypt(e);d[0]^=l[0];d[1]^=l[1];d[2]^=l[2];d[3]^=l[3];return{tag:r.bitSlice(d,0,g),data:c}}};f.misc.hmac=function(a,b){this.ca=b=b||f.hash.sha256;var c=[[],[]],d,e=
	b.prototype.blockSize/32;this.A=[new b,new b];a.length>e&&(a=b.hash(a));for(d=0;d<e;d++)c[0][d]=a[d]^909522486,c[1][d]=a[d]^1549556828;this.A[0].update(c[0]);this.A[1].update(c[1]);this.V=new b(this.A[0])};f.misc.hmac.prototype.encrypt=f.misc.hmac.prototype.mac=function(a){if(this.ha)throw new f.exception.invalid("encrypt on already updated hmac called!");this.update(a);return this.digest(a)};f.misc.hmac.prototype.reset=function(){this.V=new this.ca(this.A[0]);this.ha=!1};f.misc.hmac.prototype.update=
	function(a){this.ha=!0;this.V.update(a)};f.misc.hmac.prototype.digest=function(){var a=this.V.finalize(),a=(new this.ca(this.A[1])).update(a).finalize();this.reset();return a};f.misc.pbkdf2=function(a,b,c,d,e){c=c||1E4;if(0>d||0>c)throw new f.exception.invalid("invalid params to pbkdf2");"string"===typeof a&&(a=f.codec.utf8String.toBits(a));"string"===typeof b&&(b=f.codec.utf8String.toBits(b));e=e||f.misc.hmac;a=new e(a);var g,h,k,l,m=[],n=f.bitArray;for(l=1;32*m.length<(d||1);l++){e=g=a.encrypt(n.concat(b,
	[l]));for(h=1;h<c;h++)for(g=a.encrypt(g),k=0;k<g.length;k++)e[k]^=g[k];m=m.concat(e)}d&&(m=n.clamp(m,d));return m};f.prng=function(a){this.c=[new f.hash.sha256];this.m=[0];this.U=0;this.J={};this.R=0;this.Y={};this.fa=this.f=this.o=this.oa=0;this.b=[0,0,0,0,0,0,0,0];this.h=[0,0,0,0];this.O=void 0;this.P=a;this.G=!1;this.N={progress:{},seeded:{}};this.u=this.na=0;this.K=1;this.L=2;this.ja=0x10000;this.X=[0,48,64,96,128,192,0x100,384,512,768,1024];this.ka=3E4;this.ia=80};f.prng.prototype={randomWords:function(a,
																																																																																																																																	 b){var c=[],d;d=this.isReady(b);var e;if(d===this.u)throw new f.exception.notReady("generator isn't seeded");d&this.L&&this.ya(!(d&this.K));for(d=0;d<a;d+=4)0===(d+1)%this.ja&&this.ba(),e=this.S(),c.push(e[0],e[1],e[2],e[3]);this.ba();return c.slice(0,a)},setDefaultParanoia:function(a,b){if(0===a&&"Setting paranoia=0 will ruin your security; use it only for testing"!==b)throw new f.exception.invalid("Setting paranoia=0 will ruin your security; use it only for testing");this.P=a},addEntropy:function(a,
																																																																																																																																																																																																																																																															 b,c){c=c||"user";var d,e,g=(new Date).valueOf(),h=this.J[c],k=this.isReady(),l=0;d=this.Y[c];void 0===d&&(d=this.Y[c]=this.oa++);void 0===h&&(h=this.J[c]=0);this.J[c]=(this.J[c]+1)%this.c.length;switch(typeof a){case "number":void 0===b&&(b=1);this.c[h].update([d,this.R++,1,b,g,1,a|0]);break;case "object":c=Object.prototype.toString.call(a);if("[object Uint32Array]"===c){e=[];for(c=0;c<a.length;c++)e.push(a[c]);a=e}else for("[object Array]"!==c&&(l=1),c=0;c<a.length&&!l;c++)"number"!==typeof a[c]&&
	(l=1);if(!l){if(void 0===b)for(c=b=0;c<a.length;c++)for(e=a[c];0<e;)b++,e=e>>>1;this.c[h].update([d,this.R++,2,b,g,a.length].concat(a))}break;case "string":void 0===b&&(b=a.length);this.c[h].update([d,this.R++,3,b,g,a.length]);this.c[h].update(a);break;default:l=1}if(l)throw new f.exception.bug("random: addEntropy only supports number, array of numbers or string");this.m[h]+=b;this.f+=b;k===this.u&&(this.isReady()!==this.u&&this.aa("seeded",Math.max(this.o,this.f)),this.aa("progress",this.getProgress()))},
	isReady:function(a){a=this.X[void 0!==a?a:this.P];return this.o&&this.o>=a?this.m[0]>this.ia&&(new Date).valueOf()>this.fa?this.L|this.K:this.K:this.f>=a?this.L|this.u:this.u},getProgress:function(a){a=this.X[a?a:this.P];return this.o>=a?1:this.f>a?1:this.f/a},startCollectors:function(){if(!this.G){this.a={loadTimeCollector:this.B(this.ta),mouseCollector:this.B(this.va),keyboardCollector:this.B(this.sa),accelerometerCollector:this.B(this.la),touchCollector:this.B(this.za)};if(window.addEventListener)window.addEventListener("load",
		this.a.loadTimeCollector,!1),window.addEventListener("mousemove",this.a.mouseCollector,!1),window.addEventListener("keypress",this.a.keyboardCollector,!1),window.addEventListener("devicemotion",this.a.accelerometerCollector,!1),window.addEventListener("touchmove",this.a.touchCollector,!1);else if(document.attachEvent)document.attachEvent("onload",this.a.loadTimeCollector),document.attachEvent("onmousemove",this.a.mouseCollector),document.attachEvent("keypress",this.a.keyboardCollector);else throw new f.exception.bug("can't attach event");
		this.G=!0}},stopCollectors:function(){this.G&&(window.removeEventListener?(window.removeEventListener("load",this.a.loadTimeCollector,!1),window.removeEventListener("mousemove",this.a.mouseCollector,!1),window.removeEventListener("keypress",this.a.keyboardCollector,!1),window.removeEventListener("devicemotion",this.a.accelerometerCollector,!1),window.removeEventListener("touchmove",this.a.touchCollector,!1)):document.detachEvent&&(document.detachEvent("onload",this.a.loadTimeCollector),document.detachEvent("onmousemove",
		this.a.mouseCollector),document.detachEvent("keypress",this.a.keyboardCollector)),this.G=!1)},addEventListener:function(a,b){this.N[a][this.na++]=b},removeEventListener:function(a,b){var c,d,e=this.N[a],f=[];for(d in e)e.hasOwnProperty(d)&&e[d]===b&&f.push(d);for(c=0;c<f.length;c++)d=f[c],delete e[d]},B:function(a){var b=this;return function(){a.apply(b,arguments)}},S:function(){for(var a=0;4>a&&(this.h[a]=this.h[a]+1|0,!this.h[a]);a++);return this.O.encrypt(this.h)},ba:function(){this.b=this.S().concat(this.S());
		this.O=new f.cipher.aes(this.b)},xa:function(a){this.b=f.hash.sha256.hash(this.b.concat(a));this.O=new f.cipher.aes(this.b);for(a=0;4>a&&(this.h[a]=this.h[a]+1|0,!this.h[a]);a++);},ya:function(a){var b=[],c=0,d;this.fa=b[0]=(new Date).valueOf()+this.ka;for(d=0;16>d;d++)b.push(0x100000000*Math.random()|0);for(d=0;d<this.c.length&&(b=b.concat(this.c[d].finalize()),c+=this.m[d],this.m[d]=0,a||!(this.U&1<<d));d++);this.U>=1<<this.c.length&&(this.c.push(new f.hash.sha256),this.m.push(0));this.f-=c;c>this.o&&
	(this.o=c);this.U++;this.xa(b)},sa:function(){this.w(1)},va:function(a){var b,c;try{b=a.x||a.clientX||a.offsetX||0,c=a.y||a.clientY||a.offsetY||0}catch(d){c=b=0}0!=b&&0!=c&&this.addEntropy([b,c],2,"mouse");this.w(0)},za:function(a){a=a.touches[0]||a.changedTouches[0];this.addEntropy([a.pageX||a.clientX,a.pageY||a.clientY],1,"touch");this.w(0)},ta:function(){this.w(2)},w:function(a){"undefined"!==typeof window&&window.performance&&"function"===typeof window.performance.now?this.addEntropy(window.performance.now(),
		a,"loadtime"):this.addEntropy((new Date).valueOf(),a,"loadtime")},la:function(a){a=a.accelerationIncludingGravity.x||a.accelerationIncludingGravity.y||a.accelerationIncludingGravity.z;if(window.orientation){var b=window.orientation;"number"===typeof b&&this.addEntropy(b,1,"accelerometer")}a&&this.addEntropy(a,2,"accelerometer");this.w(0)},aa:function(a,b){var c,d=f.random.N[a],e=[];for(c in d)d.hasOwnProperty(c)&&e.push(d[c]);for(c=0;c<e.length;c++)e[c](b)}};f.random=new f.prng(6);(function(){try{var a,
	b,c,d;if(d="undefined"!==typeof module&&module.exports){var e;try{e=require("crypto")}catch(g){e=null}d=b=e}if(d&&b.randomBytes)a=b.randomBytes(128),a=new Uint32Array((new Uint8Array(a)).buffer),f.random.addEntropy(a,1024,"crypto['randomBytes']");else if("undefined"!==typeof window&&"undefined"!==typeof Uint32Array){c=new Uint32Array(32);if(window.crypto&&window.crypto.getRandomValues)window.crypto.getRandomValues(c);else if(window.msCrypto&&window.msCrypto.getRandomValues)window.msCrypto.getRandomValues(c);
else return;f.random.addEntropy(c,1024,"crypto['getRandomValues']")}}catch(g){"undefined"!==typeof window&&window.console&&(console.log("There was an error collecting entropy from the browser:"),console.log(g))}})();f.json={defaults:{v:1,iter:1E4,ks:128,ts:64,mode:"ccm",adata:"",cipher:"aes"},qa:function(a,b,c,d){c=c||{};d=d||{};var e=f.json,g=e.g({iv:f.random.randomWords(4,0)},e.defaults),h;e.g(g,c);c=g.adata;"string"===typeof g.salt&&(g.salt=f.codec.base64.toBits(g.salt));"string"===typeof g.iv&&
	(g.iv=f.codec.base64.toBits(g.iv));if(!f.mode[g.mode]||!f.cipher[g.cipher]||"string"===typeof a&&100>=g.iter||64!==g.ts&&96!==g.ts&&128!==g.ts||128!==g.ks&&192!==g.ks&&0x100!==g.ks||2>g.iv.length||4<g.iv.length)throw new f.exception.invalid("json encrypt: invalid parameters");"string"===typeof a?(h=f.misc.cachedPbkdf2(a,g),a=h.key.slice(0,g.ks/32),g.salt=h.salt):f.ecc&&a instanceof f.ecc.elGamal.publicKey&&(h=a.kem(),g.kemtag=h.tag,a=h.key.slice(0,g.ks/32));"string"===typeof b&&(b=f.codec.utf8String.toBits(b));
		"string"===typeof c&&(g.adata=c=f.codec.utf8String.toBits(c));h=new f.cipher[g.cipher](a);e.g(d,g);d.key=a;g.ct="ccm"===g.mode&&f.arrayBuffer&&f.arrayBuffer.ccm&&b instanceof ArrayBuffer?f.arrayBuffer.ccm.encrypt(h,b,g.iv,c,g.ts):f.mode[g.mode].encrypt(h,b,g.iv,c,g.ts);return g},encrypt:function(a,b,c,d){var e=f.json,g=e.qa.apply(e,arguments);return e.encode(g)},pa:function(a,b,c,d){c=c||{};d=d||{};var e=f.json;b=e.g(e.g(e.g({},e.defaults),b),c,!0);var g,h;g=b.adata;"string"===typeof b.salt&&(b.salt=
		f.codec.base64.toBits(b.salt));"string"===typeof b.iv&&(b.iv=f.codec.base64.toBits(b.iv));if(!f.mode[b.mode]||!f.cipher[b.cipher]||"string"===typeof a&&100>=b.iter||64!==b.ts&&96!==b.ts&&128!==b.ts||128!==b.ks&&192!==b.ks&&0x100!==b.ks||!b.iv||2>b.iv.length||4<b.iv.length)throw new f.exception.invalid("json decrypt: invalid parameters");"string"===typeof a?(h=f.misc.cachedPbkdf2(a,b),a=h.key.slice(0,b.ks/32),b.salt=h.salt):f.ecc&&a instanceof f.ecc.elGamal.secretKey&&(a=a.unkem(f.codec.base64.toBits(b.kemtag)).slice(0,
		b.ks/32));"string"===typeof g&&(g=f.codec.utf8String.toBits(g));h=new f.cipher[b.cipher](a);g="ccm"===b.mode&&f.arrayBuffer&&f.arrayBuffer.ccm&&b.ct instanceof ArrayBuffer?f.arrayBuffer.ccm.decrypt(h,b.ct,b.iv,b.tag,g,b.ts):f.mode[b.mode].decrypt(h,b.ct,b.iv,g,b.ts);e.g(d,b);d.key=a;return 1===c.raw?g:f.codec.utf8String.fromBits(g)},decrypt:function(a,b,c,d){var e=f.json;return e.pa(a,e.decode(b),c,d)},encode:function(a){var b,c="{",d="";for(b in a)if(a.hasOwnProperty(b)){if(!b.match(/^[a-z0-9]+$/i))throw new f.exception.invalid("json encode: invalid property name");
		c+=d+'"'+b+'":';d=",";switch(typeof a[b]){case "number":case "boolean":c+=a[b];break;case "string":c+='"'+escape(a[b])+'"';break;case "object":c+='"'+f.codec.base64.fromBits(a[b],0)+'"';break;default:throw new f.exception.bug("json encode: unsupported type");}}return c+"}"},decode:function(a){a=a.replace(/\s/g,"");if(!a.match(/^\{.*\}$/))throw new f.exception.invalid("json decode: this isn't json!");a=a.replace(/^\{|\}$/g,"").split(/,/);var b={},c,d;for(c=0;c<a.length;c++){if(!(d=a[c].match(/^\s*(?:(["']?)([a-z][a-z0-9]*)\1)\s*:\s*(?:(-?\d+)|"([a-z0-9+\/%*_.@=\-]*)"|(true|false))$/i)))throw new f.exception.invalid("json decode: this isn't json!");
		null!=d[3]?b[d[2]]=parseInt(d[3],10):null!=d[4]?b[d[2]]=d[2].match(/^(ct|adata|salt|iv)$/)?f.codec.base64.toBits(d[4]):unescape(d[4]):null!=d[5]&&(b[d[2]]="true"===d[5])}return b},g:function(a,b,c){void 0===a&&(a={});if(void 0===b)return a;for(var d in b)if(b.hasOwnProperty(d)){if(c&&void 0!==a[d]&&a[d]!==b[d])throw new f.exception.invalid("required parameter overridden");a[d]=b[d]}return a},Ba:function(a,b){var c={},d;for(d in a)a.hasOwnProperty(d)&&a[d]!==b[d]&&(c[d]=a[d]);return c},Aa:function(a,
																																																																																																																															  b){var c={},d;for(d=0;d<b.length;d++)void 0!==a[b[d]]&&(c[b[d]]=a[b[d]]);return c}};f.encrypt=f.json.encrypt;f.decrypt=f.json.decrypt;f.misc.wa={};f.misc.cachedPbkdf2=function(a,b){var c=f.misc.wa,d;b=b||{};d=b.iter||1E3;c=c[a]=c[a]||{};d=c[d]=c[d]||{firstSalt:b.salt&&b.salt.length?b.salt.slice(0):f.random.randomWords(2,0)};c=void 0===b.salt?d.firstSalt:b.salt;d[c]=d[c]||f.misc.pbkdf2(a,c,b.iter);return{key:d[c].slice(0),salt:c.slice(0)}};"undefined"!==typeof module&&module.exports&&(module.exports=
	f);"function"===typeof define&&define([],function(){return f})})(sjcl);
