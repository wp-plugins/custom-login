/*************************************************
** Get Gravatar v1.2
** Copyright � 2009 Josh Pyles / Pixelmatrix Design LLC
** http://pixelmatrixdesign.com
**************************************************/
(function(a){a.fn.getGravatar=function(b){var c=a.extend({},a.fn.getGravatar.defaults,b);return this.each(function(){$this=a(this);var e=a.meta?a.extend({},c,$this.data()):c;var d="";if($this.is("input[type='text']")){a.fn.getGravatar.getUrl(e,$this.val());$this.keyup(function(){clearTimeout(d);var f=$this.val();d=setTimeout(function(){a.fn.getGravatar.getUrl(e,f)},500)})}})};a.fn.getGravatar.getUrl=function(d,c){if(d.start){d.start($this)}id=a.fn.getGravatar.md5(c);var b="http://gravatar.com/avatar.php?gravatar_id="+id+"&default="+d.fallback+"&size="+d.avatarSize;a.fn.getGravatar.output(d.avatarContainer,b,d.stop)};a.fn.getGravatar.output=function(b,c,d){img=new Image();a(img).load(function(){a(b).attr("src",c);if(d){d()}}).attr("src",c)};a.fn.getGravatar.md5=function(C){var D;var w=function(c,b){return(c<<b)|(c>>>(32-b))};var H=function(x,c){var W,b,k,V,d;k=(x&2147483648);V=(c&2147483648);W=(x&1073741824);b=(c&1073741824);d=(x&1073741823)+(c&1073741823);if(W&b){return(d^2147483648^k^V)}if(W|b){if(d&1073741824){return(d^3221225472^k^V)}else{return(d^1073741824^k^V)}}else{return(d^k^V)}};var r=function(b,d,c){return(b&d)|((~b)&c)};var q=function(b,d,c){return(b&c)|(d&(~c))};var p=function(b,d,c){return(b^d^c)};var n=function(b,d,c){return(d^(b|(~c)))};var u=function(W,V,aa,Z,k,X,Y){W=H(W,H(H(r(V,aa,Z),k),Y));return H(w(W,X),V)};var f=function(W,V,aa,Z,k,X,Y){W=H(W,H(H(q(V,aa,Z),k),Y));return H(w(W,X),V)};var F=function(W,V,aa,Z,k,X,Y){W=H(W,H(H(p(V,aa,Z),k),Y));return H(w(W,X),V)};var t=function(W,V,aa,Z,k,X,Y){W=H(W,H(H(n(V,aa,Z),k),Y));return H(w(W,X),V)};var e=function(W){var X;var k=W.length;var d=k+8;var c=(d-(d%64))/64;var V=(c+1)*16;var Y=new Array(V-1);var b=0;var x=0;while(x<k){X=(x-(x%4))/4;b=(x%4)*8;Y[X]=(Y[X]|(W.charCodeAt(x)<<b));x++}X=(x-(x%4))/4;b=(x%4)*8;Y[X]=Y[X]|(128<<b);Y[V-2]=k<<3;Y[V-1]=k>>>29;return Y};var s=function(k){var b="",c="",x,d;for(d=0;d<=3;d++){x=(k>>>(d*8))&255;c="0"+x.toString(16);b=b+c.substr(c.length-2,2)}return b};var E=[],L,h,G,v,g,U,T,S,R,O=7,M=12,J=17,I=22,B=5,A=9,z=14,y=20,o=4,m=11,l=16,j=23,Q=6,P=10,N=15,K=21;C=a.fn.getGravatar.utf8_encode(C);E=e(C);U=1732584193;T=4023233417;S=2562383102;R=271733878;D=E.length;for(L=0;L<D;L+=16){h=U;G=T;v=S;g=R;U=u(U,T,S,R,E[L+0],O,3614090360);R=u(R,U,T,S,E[L+1],M,3905402710);S=u(S,R,U,T,E[L+2],J,606105819);T=u(T,S,R,U,E[L+3],I,3250441966);U=u(U,T,S,R,E[L+4],O,4118548399);R=u(R,U,T,S,E[L+5],M,1200080426);S=u(S,R,U,T,E[L+6],J,2821735955);T=u(T,S,R,U,E[L+7],I,4249261313);U=u(U,T,S,R,E[L+8],O,1770035416);R=u(R,U,T,S,E[L+9],M,2336552879);S=u(S,R,U,T,E[L+10],J,4294925233);T=u(T,S,R,U,E[L+11],I,2304563134);U=u(U,T,S,R,E[L+12],O,1804603682);R=u(R,U,T,S,E[L+13],M,4254626195);S=u(S,R,U,T,E[L+14],J,2792965006);T=u(T,S,R,U,E[L+15],I,1236535329);U=f(U,T,S,R,E[L+1],B,4129170786);R=f(R,U,T,S,E[L+6],A,3225465664);S=f(S,R,U,T,E[L+11],z,643717713);T=f(T,S,R,U,E[L+0],y,3921069994);U=f(U,T,S,R,E[L+5],B,3593408605);R=f(R,U,T,S,E[L+10],A,38016083);S=f(S,R,U,T,E[L+15],z,3634488961);T=f(T,S,R,U,E[L+4],y,3889429448);U=f(U,T,S,R,E[L+9],B,568446438);R=f(R,U,T,S,E[L+14],A,3275163606);S=f(S,R,U,T,E[L+3],z,4107603335);T=f(T,S,R,U,E[L+8],y,1163531501);U=f(U,T,S,R,E[L+13],B,2850285829);R=f(R,U,T,S,E[L+2],A,4243563512);S=f(S,R,U,T,E[L+7],z,1735328473);T=f(T,S,R,U,E[L+12],y,2368359562);U=F(U,T,S,R,E[L+5],o,4294588738);R=F(R,U,T,S,E[L+8],m,2272392833);S=F(S,R,U,T,E[L+11],l,1839030562);T=F(T,S,R,U,E[L+14],j,4259657740);U=F(U,T,S,R,E[L+1],o,2763975236);R=F(R,U,T,S,E[L+4],m,1272893353);S=F(S,R,U,T,E[L+7],l,4139469664);T=F(T,S,R,U,E[L+10],j,3200236656);U=F(U,T,S,R,E[L+13],o,681279174);R=F(R,U,T,S,E[L+0],m,3936430074);S=F(S,R,U,T,E[L+3],l,3572445317);T=F(T,S,R,U,E[L+6],j,76029189);U=F(U,T,S,R,E[L+9],o,3654602809);R=F(R,U,T,S,E[L+12],m,3873151461);S=F(S,R,U,T,E[L+15],l,530742520);T=F(T,S,R,U,E[L+2],j,3299628645);U=t(U,T,S,R,E[L+0],Q,4096336452);R=t(R,U,T,S,E[L+7],P,1126891415);S=t(S,R,U,T,E[L+14],N,2878612391);T=t(T,S,R,U,E[L+5],K,4237533241);U=t(U,T,S,R,E[L+12],Q,1700485571);R=t(R,U,T,S,E[L+3],P,2399980690);S=t(S,R,U,T,E[L+10],N,4293915773);T=t(T,S,R,U,E[L+1],K,2240044497);U=t(U,T,S,R,E[L+8],Q,1873313359);R=t(R,U,T,S,E[L+15],P,4264355552);S=t(S,R,U,T,E[L+6],N,2734768916);T=t(T,S,R,U,E[L+13],K,1309151649);U=t(U,T,S,R,E[L+4],Q,4149444226);R=t(R,U,T,S,E[L+11],P,3174756917);S=t(S,R,U,T,E[L+2],N,718787259);T=t(T,S,R,U,E[L+9],K,3951481745);U=H(U,h);T=H(T,G);S=H(S,v);R=H(R,g)}var i=s(U)+s(T)+s(S)+s(R);return i.toLowerCase()};a.fn.getGravatar.utf8_encode=function(b){var i=(b+"");var j="";var c,f;var d=0;c=f=0;d=i.length;for(var e=0;e<d;e++){var h=i.charCodeAt(e);var g=null;if(h<128){f++}else{if(h>127&&h<2048){g=String.fromCharCode((h>>6)|192)+String.fromCharCode((h&63)|128)}else{g=String.fromCharCode((h>>12)|224)+String.fromCharCode(((h>>6)&63)|128)+String.fromCharCode((h&63)|128)}}if(g!==null){if(f>c){j+=i.substring(c,f)}j+=g;c=f=e+1}}if(f>c){j+=i.substring(c,i.length)}return j};a.fn.getGravatar.defaults={fallback:"",avatarSize:50,avatarContainer:"#gravatar",start:null,stop:null}})(jQuery);