<?php
$num="../resolution/resolution/clock.m3u8";
$num1="hdaa.m3u8";
?> 
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>videojs-resolution-switcher</title>
  
  
  <link rel='stylesheet prefetch' href='http://rawgit.com/mkhazov/videojs-resolution-switcher/master/lib/videojs-resolution-switcher.css'>
<link rel='stylesheet prefetch' href='http://vjs.zencdn.net/5.10.7/video-js.css'>

  
  
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
  <video id="player" class="video-js vjs-default-skin vjs-big-play-centered"
       controls
       preload="none"
       autoplay
       width="940" height="460"
       >

</video>
    
    <button onclick="myFunction_clock()">Svenska</button>
<button onclick="myFunction_hdaa()">Engelska</button>


    
  <script src='http://vjs.zencdn.net/5.10.7/video.js'></script>
<script src='http://rawgit.com/mkhazov/videojs-resolution-switcher/master/lib/videojs-resolution-switcher.js'></script>

    <!-- Or if you want a more recent alpha version -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/hls.js@alpha"></script> -->
    <!-- Or if you want a more recent alpha version -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/hls.js@alpha"></script> -->
    <script>
      var video = document.getElementById("player");
        
      var videoSrc = "bunny1.m3u8";
          
    
        
        
        
        
      if (Hls.isSupported()) {
        var hls = new Hls();
        hls.loadSource(videoSrc);
        hls.attachMedia(video);
      }
      // hls.js is not supported on platforms that do not have Media Source
      // Extensions (MSE) enabled.
      //
      // When the browser has built-in HLS support (check using `canPlayType`),
      // we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video
      // element through the `src` property. This is using the built-in support
      // of the plain video element, without using hls.js.
      //
      // Note: it would be more normal to wait on the 'canplay' event below however
      // on Safari (where you are most likely to find built-in HLS support) the
      // video.src URL must be on the user-driven white-list before a 'canplay'
      // event will be emitted; the last video event that can be reliably
      // listened-for when the URL is not on the white-list is 'loadedmetadata'.
      else if (video.canPlayType("application/vnd.apple.mpegurl")) {
        video.src = videoSrc;
      }
    </script>
  
    
    <script>
    function myFunction_clock() {
    
      var video = document.getElementById("player");
        
      var videoSrc = "<?php echo $num ?>";
        
      if (Hls.isSupported()) {
        var hls = new Hls();
        hls.loadSource(videoSrc);
        hls.attachMedia(video);
      }
      // hls.js is not supported on platforms that do not have Media Source
      // Extensions (MSE) enabled.
      //
      // When the browser has built-in HLS support (check using `canPlayType`),
      // we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video
      // element through the `src` property. This is using the built-in support
      // of the plain video element, without using hls.js.
      //
      // Note: it would be more normal to wait on the 'canplay' event below however
      // on Safari (where you are most likely to find built-in HLS support) the
      // video.src URL must be on the user-driven white-list before a 'canplay'
      // event will be emitted; the last video event that can be reliably
      // listened-for when the URL is not on the white-list is 'loadedmetadata'.
      else if (video.canPlayType("application/vnd.apple.mpegurl")) {
        video.src = videoSrc;
      }
    
    
}
    
    
    
    function myFunction_hdaa() {
    
      var video = document.getElementById("player");
        
      var videoSrc = "hdaa.m3u8";
        
      if (Hls.isSupported()) {
        var hls = new Hls();
        hls.loadSource(videoSrc);
        hls.attachMedia(video);
      }
      // hls.js is not supported on platforms that do not have Media Source
      // Extensions (MSE) enabled.
      //
      // When the browser has built-in HLS support (check using `canPlayType`),
      // we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video
      // element through the `src` property. This is using the built-in support
      // of the plain video element, without using hls.js.
      //
      // Note: it would be more normal to wait on the 'canplay' event below however
      // on Safari (where you are most likely to find built-in HLS support) the
      // video.src URL must be on the user-driven white-list before a 'canplay'
      // event will be emitted; the last video event that can be reliably
      // listened-for when the URL is not on the white-list is 'loadedmetadata'.
      else if (video.canPlayType("application/vnd.apple.mpegurl")) {
        video.src = videoSrc;
      }
    
    
}
        
</script>
    <!-- END OF VIDEO --> 


</body>

</html>