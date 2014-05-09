			{hook run='content_end'}
		</div> <!-- /content -->

		
		<footer id="footer">
			<div class="footer-inner">
				<ul class="footer-links clearfix">
					<li><a href="{cfg name='path.root.web'}/?force-mobile=off">{$aLang.desktop_version}</a></li>
					<li><a href="{router page='rss'}">RSS</a></li>
				</ul>
				
				<div class="copyright">
					&copy; {cfg name='view.name'}
					
					<br />
					<br />
				
					{hook run='copyright'}<br />
					Mod by <a href="http://angelsmedia.org">AngelsmediaThemes</a>, основание от <a href="http://designmobile.ru">DesignMobile</a>
				</div>
			</div>
			
			{hook run='footer_end'}
		</footer>
	</div> <!-- /wrapper -->
</div> <!-- /container -->

{hook run='body_end'}

</body>
</html>