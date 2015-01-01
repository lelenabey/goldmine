    var vidIds = [];
    var current = 0;
    var repeat =0;
    
        function onPlayerReady(event) {
          event.target.loadVideoById(vidIds[current]);
          event.target.playVideo();
        }

        function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.ENDED) {

            playNext(event);
        }
      }

      function playNext(event){
        if(repeat==0){
              current++;
              if(current >=vidIds.length){
            current =0;
          }
              console.log(current);
              event.target.loadVideoById(vidIds[current]);
              event.target.playVideo();
            }
        else if(repeat ==1){
          event.target.playVideo();
        }
        else{
          current = Math.floor((Math.random() * vidIds.length-1) + 0);
          event.target.loadVideoById(vidIds[current]);
          event.target.playVideo();
        }
            
      }


// 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.

      function stopVideo() {
        player.stopVideo();
      }

