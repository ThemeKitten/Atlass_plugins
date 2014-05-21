/*
  Similarpopup plugin
  (P) PSNet, 2008 - 2012
  http://psnet.lookformp3.net/
  http://livestreet.ru/profile/PSNet/
  http://livestreetcms.com/profile/PSNet/
*/

jQuery.fn.ShowMeSimilar = function (sSimilarWindow) {
  return this.each (function () {
  
    Similarpopup_TopicOffset = $ (this).offset ().top;
    Similarpopup_TopOffset = parseInt ($ (window).height () * 2 / 3);
    
    //
    // window scrolling
    //
    $ (window).bind ('scroll.sp', function () {
      Similarpopup_WindowScrolled = $ (window).scrollTop ();      // hided from screen
      
      bNeedToOpen = Similarpopup_WindowScrolled + Similarpopup_TopOffset - Similarpopup_TopicOffset;
      
      $ (sSimilarWindow).stop ().animate ({
        'left': (bNeedToOpen > 0) ? -30 : -500
      }, 300);
    });

    //
    // close button action
    //
    $ (sSimilarWindow).find ('.CloseBox').bind ('click.sp', function (e) {
      $ (window).unbind ('scroll.sp');
      
      $ (sSimilarWindow).stop ().animate ({
        'left': -500
      }, 300);
      return false;
    });
    
  });
};
