		{hook run='content_end'}

<div class="login-site-name">
	<a href="{cfg name='path.root.web'}" alt="{cfg name='view.name'}" title="{cfg name='view.description'}">
	{cfg name='view.name'}
		</a>
</div>

	<div class="clear"></div>

		</div> <!-- /content-content -->
		</div> <!-- /hight-resolution -->
		</div> <!-- /content -->

{if {cfg name='theme.login.style'} == 'images'}
			<section id="photostack-1" class="photostack photostack-start" style="background: url({cfg name='path.static.skin'}/images/theme-loginbg-{cfg name='view.theme'}.jpg);">
				<div>
					<figure>
						<a href="#" class="photostack-img"><img src="{cfg name='path.static.skin'}/images/login/1.jpg" alt="img01"/></a>
						<figcaption>
							<h2 class="photostack-title">Serenity Beach</h2>
						</figcaption>
					</figure>
					<figure>
						<a href="#" class="photostack-img"><img src="{cfg name='path.static.skin'}/images/login/2.jpg" alt="img02"/></a>
						<figcaption>
							<h2 class="photostack-title">Happy Days</h2>
						</figcaption>
					</figure>
					<figure>
						<a href="#" class="photostack-img"><img src="{cfg name='path.static.skin'}/images/login/3.jpg" alt="img03"/></a>
						<figcaption>
							<h2 class="photostack-title">Beautywood</h2>
						</figcaption>
					</figure>
					<figure>
						<a href="#" class="photostack-img"><img src="{cfg name='path.static.skin'}/images/login/4.jpg" alt="img04"/></a>
						<figcaption>
							<h2 class="photostack-title">Heaven of time</h2>
						</figcaption>
					</figure>
					<figure>
						<a href="#" class="photostack-img"><img src="{cfg name='path.static.skin'}/images/login/5.jpg" alt="img05"/></a>
						<figcaption>
							<h2 class="photostack-title">Speed Racer</h2>
						</figcaption>
					</figure>
					<figure>
						<a href="#" class="photostack-img"><img src="{cfg name='path.static.skin'}/images/login/6.jpg" alt="img06"/></a>
						<figcaption>
							<h2 class="photostack-title">Forever this</h2>
						</figcaption>
					</figure>
					<figure data-dummy>
						<a href="#" class="photostack-img"><img src="{cfg name='path.static.skin'}/images/login/7.jpg" alt="img07"/></a>
						<figcaption>
							<h2 class="photostack-title">Lovely Green</h2>
						</figcaption>
					</figure>
					<figure data-dummy>
						<a href="#" class="photostack-img"><img src="{cfg name='path.static.skin'}/images/login/8.jpg" alt="img08"/></a>
						<figcaption>
							<h2 class="photostack-title">Wonderful</h2>
						</figcaption>
					</figure>
					<figure data-dummy>
						<a href="#" class="photostack-img"><img src="{cfg name='path.static.skin'}/images/login/9.jpg" alt="img09"/></a>
						<figcaption>
							<h2 class="photostack-title">Love Addict</h2>
						</figcaption>
					</figure>
					<figure data-dummy>
						<a href="#" class="photostack-img"><img src="{cfg name='path.static.skin'}/images/login/10.jpg" alt="img10"/></a>
						<figcaption>
							<h2 class="photostack-title">Friendship</h2>
						</figcaption>
					</figure>
					<figure data-dummy>
						<a href="#" class="photostack-img"><img src="{cfg name='path.static.skin'}/images/login/11.jpg" alt="img11"/></a>
						<figcaption>
							<h2 class="photostack-title">White Nights</h2>
						</figcaption>
					</figure>
					<figure data-dummy>
						<a href="#" class="photostack-img"><img src="{cfg name='path.static.skin'}/images/login/12.jpg" alt="img12"/></a>
						<figcaption>
							<h2 class="photostack-title">Serendipity</h2>
						</figcaption>
					</figure>
					<figure data-dummy>
						<a href="#" class="photostack-img"><img src="{cfg name='path.static.skin'}/images/login/13.jpg" alt="img13"/></a>
						<figcaption>
							<h2 class="photostack-title">Pure Soul</h2>
						</figcaption>
					</figure>
					<figure data-dummy>
						<a href="#" class="photostack-img"><img src="{cfg name='path.static.skin'}/images/login/14.jpg" alt="img14"/></a>
						<figcaption>
							<h2 class="photostack-title">Winds of Peace</h2>
						</figcaption>
					</figure>
					<figure data-dummy>
						<a href="#" class="photostack-img"><img src="{cfg name='path.static.skin'}/images/login/15.jpg" alt="img15"/></a>
						<figcaption>
							<h2 class="photostack-title">Shades of blue</h2>
						</figcaption>
					</figure>
					<figure data-dummy>
						<a href="#" class="photostack-img"><img src="{cfg name='path.static.skin'}/images/login/16.jpg" alt="img16"/></a>
						<figcaption>
							<h2 class="photostack-title">Lightness</h2>
						</figcaption>
					</figure>
				</div>
			</section>

<link rel='stylesheet' type='text/css' href='{cfg name='path.static.skin'}/css/theme-login-component.css' />
<script type='text/javascript' src='{cfg name='path.static.skin'}/js/login-modernizr.min.js'></script>
<script type='text/javascript' src='{cfg name='path.static.skin'}/js/login-classie.js'></script>
<script type='text/javascript' src='{cfg name='path.static.skin'}/js/login-photostack.js'></script>

<script>
			// [].slice.call( document.querySelectorAll( '.photostack' ) ).forEach( function( el ) { new Photostack( el ); } );
			
			new Photostack( document.getElementById( 'photostack-1' ), {
				callback : function( item ) {
					//console.log(item)
				}
			} );
			new Photostack( document.getElementById( 'photostack-2' ), {
				callback : function( item ) {
					//console.log(item)
				}
			} );
			new Photostack( document.getElementById( 'photostack-3' ), {
				callback : function( item ) {
					//console.log(item)
				}
			} );
</script>
{/if}
{if {cfg name='theme.login.style'} == 'video'}
<section id="photostack-1" class="photostack photostack-start"></section>

<link rel='stylesheet' type='text/css' href='{cfg name='path.static.skin'}/css/theme-login-component.css' />

<script type='text/javascript' src='{cfg name='path.static.skin'}/js/login-video.js'></script>

{literal}<script type="text/javascript">
$().ready(function() {
$('#photostack-1').tubular({videoId: '{/literal}{cfg name='theme.login.videoid'}{literal}'});
});
</script>{/literal}

<style type="text/css">
#main { z-index: 99999999999999; }
</style>

{/if}

	{hook run='body_end'}

	</div> <!-- /wrapper -->

	{include file='toolbar.tpl'}

</div> <!-- /container -->
</div>

{include file='settings.tpl'}


</body>
</html>