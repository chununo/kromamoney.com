(function(){"use strict";function k(t,e){for(let i in e)e.hasOwnProperty(i)&&(t[i]=e[i]);return t}function T(t){if(typeof t>"u"||typeof t[0]>"u")return!1;let e=[],i=t.length,n=t[0].length;for(let a=0;a<i;a++)e=e.concat(t[a]);e=E(e);let r=[],h=0;for(let a=0;a<i;a++){let p=[];for(let u=0;u<n;u++)p.push(e[h]),h++;r.push(p)}return r}function E(t){let e=t.length,i,n;for(;e;)n=Math.floor(Math.random()*e--),i=t[e],t[e]=t[n],t[n]=i;return t}function o(t,e){this.el=t,this.inner=this.el.querySelector("div"),this.allItems=[].slice.call(this.inner.children),this.allItemsCount=this.allItems.length,this.allItemsCount&&(this.items=[].slice.call(this.inner.querySelectorAll("figure:not([data-dummy])")),this.itemsCount=this.items.length,this.current=0,this.options=k({},this.options),k(this.options,e),this._init())}o.prototype.options={},o.prototype._init=function(){this.currentItem=this.items[this.current],this._addNavigation(),this._getSizes(),this._initEvents()},o.prototype._addNavigation=function(){this.nav=document.createElement("nav");let t="";for(let e=0;e<this.itemsCount;++e)t+="<span></span>";this.nav.innerHTML=t,this.el.appendChild(this.nav),this.navDots=[].slice.call(this.nav.children)},o.prototype._initEvents=function(){let t=this,e=this.el.classList.contains("photostack-start"),i=function(){let n=function(){t.el.classList.add("photostack-transition")};e?(this.removeEventListener("click",i),t.el.classList.remove("photostack-start"),n()):(t.openDefault=!0,setTimeout(n,25)),t.started=!0,t._showPhoto(t.current)};e?(this._shuffle(),this.el.addEventListener("click",i)):i(),this.navDots.forEach(function(n,r){n.addEventListener("click",function(){if(r===t.current)t._rotateItem();else{let h=function(){t._showPhoto(r)};t.flipped?t._rotateItem(h):h()}})})},o.prototype._resizeHandler=function(){let t=this;function e(){t._resize(),t._resizeTimeout=null}this._resizeTimeout&&clearTimeout(this._resizeTimeout),this._resizeTimeout=setTimeout(e,100)},o.prototype._resize=function(){let t=this,e=function(){t._shuffle(!0)};this._getSizes(),this.started&&this.flipped?this._rotateItem(e):e()},o.prototype._showPhoto=function(t){if(this.isShuffling)return!1;this.isShuffling=!0,this.currentItem.classList.contains("photostack-flip")&&(this._removeItemPerspective(),this.navDots[this.current].classList.remove("flippable")),this.navDots[this.current].classList.remove("current"),this.currentItem.classList.remove("photostack-current"),this.current=t,this.currentItem=this.items[this.current],this.navDots[this.current].classList.add("current"),this.currentItem.querySelector(".photostack-back")&&this.navDots[t].classList.add("flippable"),this._shuffle()},o.prototype._shuffle=function(t){let e=t?1:this.currentItem.getAttribute("data-shuffle-iteration")||1;(e<=0||!this.started||this.openDefault)&&(e=1),this.openDefault&&(this.currentItem.classList.add("photostack-flip"),this.openDefault=!1,this.isShuffling=!1);let i=.5,n=Math.ceil(this.sizes.inner.width/(this.sizes.item.width*i)),r=Math.ceil(this.sizes.inner.height/(this.sizes.item.height*i)),h=n*this.sizes.item.width*i+this.sizes.item.width/2-this.sizes.inner.width,a=r*this.sizes.item.height*i+this.sizes.item.height/2-this.sizes.inner.height,p=h/2,u=a/2,m=35,f=-35,s=this,L=function(){--e;let x=[];for(let c=0;c<r;++c){let I=x[c]=[];for(let l=0;l<n;++l){let d=l*(s.sizes.item.width*i)-p,M=c*(s.sizes.item.height*i)-u,g=0,z=0;if(s.started&&e===0){let _=s._isOverlapping({x:d,y:M});if(_.overlapping)switch(g=_.noOverlap.x,z=_.noOverlap.y,Math.floor(Math.random()*3)){case 0:g=0;break;case 1:z=0;break}}I[l]={x:d+g,y:M+z}}}x=T(x);let y=0,v=0,w=0;s.allItems.forEach(function(c){y===n-1?(v=v===r-1?0:v+1,y=1):++y;let I=x[v][y-1],l={x:I.x,y:I.y},d=function(){++w,this.removeEventListener("transitionend",d),w===s.allItemsCount&&(e>0?L.call():(s.currentItem.classList.add("photostack-flip"),s.isShuffling=!1,typeof s.options.callback=="function"&&s.options.callback(s.currentItem)))};s.items.indexOf(c)===s.current&&s.started&&e===0?(s.currentItem.style.WebkitTransform="translate("+s.centerItem.x+"px,"+s.centerItem.y+"px) rotate(0deg)",s.currentItem.style.msTransform="translate("+s.centerItem.x+"px,"+s.centerItem.y+"px) rotate(0deg)",s.currentItem.style.transform="translate("+s.centerItem.x+"px,"+s.centerItem.y+"px) rotate(0deg)",s.currentItem.querySelector(".photostack-back")&&s._addItemPerspective(),s.currentItem.classList.add("photostack-current")):(c.style.WebkitTransform="translate("+l.x+"px,"+l.y+"px) rotate("+Math.floor(Math.random()*(m-f+1)+f)+"deg)",c.style.msTransform="translate("+l.x+"px,"+l.y+"px) rotate("+Math.floor(Math.random()*(m-f+1)+f)+"deg)",c.style.transform="translate("+l.x+"px,"+l.y+"px) rotate("+Math.floor(Math.random()*(m-f+1)+f)+"deg)"),s.started&&c.addEventListener("transitionend",d)})};L.call()},o.prototype._getSizes=function(){this.sizes={inner:{width:this.inner.offsetWidth,height:this.inner.offsetHeight},item:{width:this.currentItem.offsetWidth,height:this.currentItem.offsetHeight}},this.centerItem={x:this.sizes.inner.width/2-this.sizes.item.width/2,y:this.sizes.inner.height/2-this.sizes.item.height/2}},o.prototype._isOverlapping=function(t){let e=this.sizes.item.width+this.sizes.item.width/3,i=this.sizes.item.height+this.sizes.item.height/3,n={x:this.sizes.inner.width/2-e/2,y:this.sizes.inner.height/2-i/2},r=this.sizes.item.width,h=this.sizes.item.height;if(!(t.x+r<n.x||t.x>n.x+e||t.y+h<n.y||t.y>n.y+i)){let a=Math.random()<.5,p=Math.floor(Math.random()*(r/4+1)),u=Math.floor(Math.random()*(h/4+1)),m=a?(t.x-n.x+r)*-1-p:n.x+e-(t.x+r)+r+p,f=a?(t.y-n.y+h)*-1-u:n.y+i-(t.y+h)+h+u;return{overlapping:!0,noOverlap:{x:m,y:f}}}return{overlapping:!1}},o.prototype._addItemPerspective=function(){this.el.classList.add("photostack-perspective")},o.prototype._removeItemPerspective=function(){this.el.classList.remove("photostack-perspective"),this.currentItem.classList.remove("photostack-flip")},o.prototype._rotateItem=function(t){if(this.el.classList.contains("photostack-perspective")&&!this.isRotating&&!this.isShuffling){this.isRotating=!0;let e=this,i=function(){this.removeEventListener("transitionend",i),e.isRotating=!1,typeof t=="function"&&t()};this.flipped?(this.navDots[this.current].classList.remove("flip"),this.currentItem.style.WebkitTransform="translate("+this.centerItem.x+"px,"+this.centerItem.y+"px) rotateY(0deg)",this.currentItem.style.transform="translate("+this.centerItem.x+"px,"+this.centerItem.y+"px) rotateY(0deg)"):(this.navDots[this.current].classList.add("flip"),this.currentItem.style.WebkitTransform="translate("+this.centerItem.x+"px,"+this.centerItem.y+"px) translate("+this.sizes.item.width+"px) rotateY(-179.9deg)",this.currentItem.style.transform="translate("+this.centerItem.x+"px,"+this.centerItem.y+"px) translate("+this.sizes.item.width+"px) rotateY(-179.9deg)"),this.flipped=!this.flipped,this.currentItem.addEventListener("transitionend",i)}},window.Photostack=o})();